<?php

namespace App\Http\Controllers;

use App\Company;
use App\Tour;
use Illuminate\Http\Request;

class TourCompaniesController extends Controller
{
    //
    public function index($orderByCase = "latest" , $CompanyName=null)
    {

        if(\request('CompanyName')) $CompanyName =\request('CompanyName');
        $companies = Company::query()
                        ->when(!is_null($CompanyName),function($query) use ($CompanyName){
                            return $query->where('name','LIKE','%'.$CompanyName.'%');
                        })
                        ->when(!is_null($orderByCase), function($query) use ($orderByCase){
                            switch ($orderByCase)
                            {
                                case "FilterName": return $query->OrderByName();
                                case "FilterVerified": return $query->OrderByVerified();
                                case "FilterAddress" : return $query->OrderByAddress();
                                case "FilterOfferedTours" : return $query;
                            }
                        })

                    ->latest()
                    ->withCount('tours')
                    ->paginate(10)
                    ->appends(['CompanyName'=> \request('CompanyName')]);

        return view('admin.companies',compact('companies','orderByCase','CompanyName'));
    }
    public function offeredTours($CopmanyID)
    {
        $tours = Tour::where('company_id',$CopmanyID)->withStatus()->latest()->paginate(10);

        $companies = null;
        session()->flash('CompanyTours',$CopmanyID);
        return view('admin.AllPrograms',compact( 'tours','companies'));

    }
    public function create()
    {
        return view('admin.CreateTourCompany');
    }
    public function store(Request $request)
    {
        $image = request('image')->store('CompanyProfilePictures');
        $NewCompany = Company::create($request->all());
        $NewCompany->image = $image;
        $NewCompany->save();

        return redirect(route('company.show',$NewCompany->id))
                ->with('success','New Company has been created successfully');
    }
    public function show($id)
    {
        $company = Company::withCount('tours')->findOrFail($id);

        return view('admin.CompanyProfile',compact('company'));
    }
    public function update(Company $company)
    {
        //if there's no uploaded photo keep the old one
        if(!request()->file('image')) $image = $company->image;
        //if there's delete the old one first then save the new one
        else {
            // checking if the last image was a real image, if it was real image and exists in file delete it
            // if its not real image , There's no need to delete any last image
            if(!file_exists(public_path().'/storage'.$company->image)) {
                unlink('storage/' . $company->image);
            }
            $image = request('image')->store('CompanyProfilePictures');

        }
        $company->update(request()->all());
        $company->image = $image;
        $company->save();

        return back()->with('success','Company has been updated successfully');
    }

}
