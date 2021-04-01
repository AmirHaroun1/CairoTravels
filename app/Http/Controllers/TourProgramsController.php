<?php


namespace App\Http\Controllers;
use App\Company;
use App\Http\TourFilter;
use App\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class TourProgramsController extends Controller
{
    public  function index()
    {

       $tours = Tour::withStatus()->paginate(10);
       $companies = Company::all('id','name');

       $companiesMap = $companies->mapWithKeys(function($company){
          return [$company->id => $company];
       });
       $tours->each(function ($tour) use ($companiesMap){

           $tour->setRelation('company',$companiesMap[$tour->company_id]);

       });

        return view('admin.AllPrograms',compact('tours','companies'));
    }

    public function search()
    {
        $tours = (new TourFilter())->GetFilteredToursWithStatus(request(),null);

        $companies = Company::all('id','name');
        $companiesMap = $companies->mapWithKeys(function($company){
            return [$company->id => $company];
        });
        $tours->each(function ($tour) use ($companiesMap){

            $tour->setRelation('company',$companiesMap[$tour->company_id]);

        });
        return view('admin.AllPrograms',compact('tours','companies'));
    }
    public function create()
    {
        $companies = Company::all('id','name');
        return view('admin.CreateProgram',compact('companies'));
    }
    public function store(Request $request)
    {
        $image = request('image')->store('TourPictures');
        $NewTour = tour::create($request->all());
        $NewTour->image = $image;
        $NewTour->lastDayToBook = \Carbon\Carbon::parse($request->pickupDate)->subDays(5);

        $NewTour->save();

        return back();
    }
    public function show($tourID)
    {
        $companies = Company::all('id','name');
         $tour = Tour::WithMoneyMade()->findOrFail($tourID);
        return view('admin.TourProgram',compact('tour','companies'));
    }

    public function update(Request $request,$tourID)
    {

        $tour = Tour::findOrFail($tourID);

        $tour->lastDayToBook =  \Carbon\Carbon::parse($request->pickupDate)->subDays(5);


        //if there's no uploaded photo keep the old one
        if(!request()->file('image')) $request->image = $tour->image;
        //if there's delete the old one first then save the new one
        else {
            // checking if the last image was a real image, if it was real image and exists in file delete it
            // if its not real image , There's no need to delete any last image
            if(!file_exists(public_path().'/storage'.$tour->image)) {
                unlink('storage/' . $tour->image);
            }
           $request->image = request('image')->store('TourPictures');

        }
        $tour->update($request->all());
        $tour->image = $request->image;
        $tour->save();

        return redirect(route('program.index'))->with('success','Tour has been updated successfully');
    }

}
