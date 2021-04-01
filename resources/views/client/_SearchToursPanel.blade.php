<div style="padding-top: 130px;padding-bottom: 130px" class="col-lg-4 col-md-6 banner-right">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="Tours" aria-selected="true">
                Search Tours</a>
        </li>

    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active align-content-center" id="flight" role="tabpanel" aria-labelledby="flight-tab">
            {!! Form::open(['method' => 'GET' , 'route'=>'home.search', 'class'=>'form-wrap']) !!}

            <label>Destination</label>

                <select  name="destination" tabindex="0" class="nice-select ml-4">
                    <option disabled selected>--- Choose Destination ---</option>
                    <option value="sharmElSheikh">Sharm EL-Sheikh</option>
                    <option value="dahab">Dahab</option>
                    <option value="siwa">siwa</option>
                    <option value="haurghada">haurghada</option>
                    <option value="ain-sokhna">Ain-sokhna</option>
                    <option value="auxor">Auxor</option>
                    <option value="aswan">Aswan</option>
                </select>
<br>
                <label class="mt-3">Arrival Date</label>
                <input type="date" class="form-control" name="arrivalDate">


                <label>Return Date</label>
                <input type="date" class="form-control" name="returnDate">


                <a href="#"  onclick="this.closest('form').submit();return false;" class="primary-btn text-uppercase">Search</a>
            {!! Form::close() !!}
        </div>
    </div>
</div>
