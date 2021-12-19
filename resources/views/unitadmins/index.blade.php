@extends('layouts.unitadmin')

@section('content')
<div class="row" style="width: 100%">
                    <div class="col-lg-12 text-center">
                        
                    <h2>{{ $user->name }}'s​ Dashboard</h2>
                     <hr class="star-primary">
                       
                    </div>
                </div>
        <section id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <img src="img/teacher.jpg">
                    <h5>{{ $user->name }} </h5>                    
                        <hr class="star-primary">
                    </div>
                </div>
             <div class="row text-center">
                <div class="col-md-12"><a href="{{ route('unitadmins.edit', $user->id) }}"><button type="button" class="btn btn-primary">Edit profile</button></a></div>
            </div>
        </section>
<br>
<br>

        <!-- Footer -->

@endsection
