<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (\App\Company::all() as $company)
        {
            factory(App\Tour::class,2)->create([

                'company_id'=>$company->id,


            ]);
        }


    }
}
