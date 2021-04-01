<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tour;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Tour::class, function (Faker $faker) {
    $LastDateToBook = $faker->unique()->dateTimeBetween('now', '+3 months');
    return array(

        'title'=> "Best Price haurghada",
        'description'=> $faker->sentence(2),
        'hotel'=> "hotel" . $faker->company,
        'destination'=>"haurghada",

        'pickupLocation' => "El Attaba Alley, Cairo, محافظة القاهرة, Egypt",
        'availablePlaces'=>50,
        'bookedPlaces' =>0,
        'image' =>"TourPictures/doVqWcNy7iNqGmuIAfnoZDHbBrXdqetnZuG8Pgng.jpeg",

        'lastDayToBook' => $LastDateToBook,

        'pickupDate' => date('Y-m-d',strtotime("+1 day", $LastDateToBook->getTimestamp() )),

        'arrivalDate' => date('Y-m-d',strtotime("+3 day", $LastDateToBook->getTimestamp() )),

        'returnDate' => date('Y-m-d',strtotime("+9 day", $LastDateToBook->getTimestamp() )),


    );
});
