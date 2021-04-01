<div class="card">

    <div class="container-fluid">
        {!! Form::open(['method' => 'GET' , 'route'=>'bookings.search']) !!}
        <div class="row">

            <div class="col-md-3">
                <label>Booked At</label>

                <input class="form-control" type="date" name="BookingDate">
            </div>
            <div class="col-md-3">
                <label for="destination">destination</label>

                <select name="destination" class="form-control">
                    <option disabled selected>--Choose Destination--</option>
                    <option value="sharmElSheikh">Sharm EL-Sheikh</option>
                    <option value="dahab">Dahab</option>
                    <option value="siwa">siwa</option>
                    <option value="haurghada">haurghada</option>
                    <option value="ain-sokhna">Ain-sokhna</option>
                    <option value="auxor">Auxor</option>
                    <option value="aswan">Aswan</option>
                </select>

            </div>


            <div class="col-md-3">
                @if(session('tourID'))
                    <input type="hidden" name="tourID" value="{{session('tourID')}}">
                    @else
                <label for="companyName">Company</label>

                <select name="company_id" class="selectpicker" data-live-search="true">
                    <option disabled selected>Choose Company</option>
                    @foreach($companies as $company)

                        <option value="{{$company->id}}">{{$company->name}}</option>

                    @endforeach
                </select>
                @endif
            </div>
            <div class="col-md-4 mt-3">
                <select class="form-control" name="BookingStatus">
                    <option selected disabled>--Booking Status--</option>
                    <option value="FullyBooked">Fully Booked</option>
                    <option value="NotBooked">Not Fully Booked</option>
                </select>
            </div>
            <div class="col-md-4 mt-3">
               <input type="text" name="userName" class="form-control" placeholder="Search Bookings With User'Name">
            </div>
            <div class="col-md-4 mt-3">
                <button style="background-color:#20aee3; color:white"  type="submit" class="form-control">Search</button>
            </div>


        </div>
        {!! Form::close() !!}

    </div>

</div>
