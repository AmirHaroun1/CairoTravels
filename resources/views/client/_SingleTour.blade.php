<div class="col-lg-4">
    <div class="single-destinations">
        <div class="thumb">
            <img src="{{$tour->getImage()}}" alt="">
        </div>
        <div class="details text-center">
            <h4 class="d-flex justify-content-between">
                <span>{{$tour->title}}</span>
                <div class="star">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </div>
            </h4>
            <p>
                <span>Tour Details : </span>
                {{$tour->description}}
            </p>
            <ul class="package-list">
                <li class="d-flex justify-content-between align-items-center">
                    <span>Price</span>
                    <a href="#" class="price-btn">{{$tour->price}}$/<span class="small">individual</span></a>
                </li>
                <li class="d-flex justify-content-between align-items-center">
                    <span>Destination</span>
                    <span>{{$tour->destination}}</span>
                </li>

                <li class="d-flex justify-content-between align-items-center">
                    <span>Arrival Date</span>
                    <span>{{\Carbon\Carbon::parse($tour->arrivalDate)->format('Y-M-d')}}</span>
                </li>
                <li class="d-flex justify-content-between align-items-center">
                    <span>Return Date</span>
                    <span>{{\Carbon\Carbon::parse($tour->returnDate)->format('Y-M-d')}}</span>
                </li>
                <li class="d-flex justify-content-between align-items-center">
                    <span>Pickup Location</span>
                    <span>{{$tour->pickupLocation}}</span>
                </li>
                <li class="d-flex justify-content-between align-items-center">
                    <span>Pickup Date</span>
                    <span>{{\Carbon\Carbon::parse($tour->pickupDate)->format('Y-M-d')}}</span>
                </li>



            </ul>
            @if($tour->fullyBooked)
                <button href="javascript:void(0)" class="btn-success" style="color: white">Fully Booked</button>

            @else
            <a href="{{route('tour.show',$tour->id)}}" class="price-btn" style="color: white">Check Tour Page</a>
                @endif
        </div>
    </div>
</div>
