@extends('layouts.app')

@section('content')

<header class="games">
    <div class="container" id="maincontent" tabindex="-1">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
    </div>
</header>

<div class="row full1">
    <div class="mid-section">
        <div class="col-md-3"><img src="img/heart.jpg" style="margin-top: 22px;"></div>
        <div class="col-md-6"><h3 style="font-size: 20px;font-weight: 700;color: black; margin-top: 32px; border-bottom: 3px black solid;">Tournaments - Special Games- Events</h3></div>
        <div class="col-md-3"><img src="img/heart.jpg" style="margin-top: 22px;"></div>

    </div>
</div>
<div class="row full1">
    <div class="mid-section1">
        <h3 class="text-uppercase" style="border-bottom: 3px solid black;width: 30%;">local Tournaments</h3>
        <h4 class="text-uppercase">Pine Cone Sectional 3/24 thru 3/26</h4>
        <p class="text-uppercase">Join us at the Hilton Head Beach and Tennis Resort for the Pine Cone Sectional. <a href="">Click here for the flyer.</a> </p>
        <br>
        <h3 class="text-uppercase" style="border-bottom: 3px solid black;width: 35%;">special games & events </h3>
    </div>
</div>
<div class="row full1">
    <div class="mid-section1">
        @foreach ($games as $gamekey => $value)
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-3">
                <h5 class="text-uppercase sport1">{{ $value->game_name }}</h5>
            </div>
            <div class="col-md-6"><p class="text-uppercase">{{ $value->game_description }}</p></div>
            <div class="col-md-3"><a href="{!! route('enroll.show', $value['id']) !!}"><button type="button" class="btn btn-primary">Enroll</button></a></div>
        </div>
        @endforeach 
        <div class="row">
            <div class="col-md-3">
                <h5 class="text-uppercase sport1">Beaufort & Jasper Counties Bridge Clubs</h5>
            </div>
            <div class="col-md-6"><p class="text-uppercase">The week of 3/13 has Unit Championship Games at various clubs throughout the week. Check your club's schedule for these games that reward masterpoints at 63.6% of a sectional.</p></div>
            <div class="col-md-3"></div>
        </div>

        <div class="row" style="margin-top: 50px;">
            <div class="col-md-3">
                <h5 class="text-uppercase sport1">hilton head bridge club</h5>
            </div>
            <div class="col-md-6">
                <p class="text-uppercase">a Unit Charity Game is scheduled on Monday March 6th at 1:00pm. This game rewards masterpoints at nearly 82% of a sectional tournament. </p>

                <p class="text-uppercase">An Acbl-wide senior pairs game is scheduled for Monday, March 27th at 1:00pm. This game is for folks born prior to 1/1/1959 and offers 72% of sectional masterpoints. Winners are recognized in the ACBL website and in the Bridge Bulletin. Nationally prepared hand records and analyses will be provided.</p>

                <p class="text-uppercase">Hilton Head will conduct an ACBL-wide Charity Game on Thursday morning April 27th to players with less than 600 masterpoints. The recognition and analysis provided are similar to the Senior Pairs game. The reward is nearly 82% of a sectional. </p>
            </div>
            <div class="col-md-3" style="text-align: center;"><button type="submit" class="btn btn-primary">Enroll</button></div>
        </div>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-3">
                <h5 class="text-uppercase sport1">okatie (sun city) bridge club</h5>
            </div>
            <div class="col-md-6">
                <p class="text-uppercase">a Unit Charity Game is scheduled on Monday March 6th at 1:00pm. This game rewards masterpoints at nearly 82% of a sectional tournament. </p>

                <p class="text-uppercase">An Acbl-wide senior pairs game is scheduled for Monday, March 27th at 1:00pm. This game is for folks born prior to 1/1/1959 and offers 72% of sectional masterpoints. Winners are recognized in the ACBL website and in the Bridge Bulletin. Nationally prepared hand records and analyses will be provided.</p>
            </div>
            <div class="col-md-3" style="text-align: center;"><button type="submit" class="btn btn-primary">Enroll</button></div>
        </div>


    </div>
</div>    

        





<footer class="text-center">
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright © The Low Country Bridge Connection 2017
                </div>
            </div>
        </div>
    </div>
</footer>

@endsection
