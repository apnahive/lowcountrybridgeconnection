@extends('layouts.app')

@section('content')
<header class="teacher">
            <div class="container" id="maincontent" tabindex="-1">
                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>
            </div>
        </header>
        <!-- Portfolio Grid Section --> 
    <div class="row" style="width: 100%">
                    <div class="col-lg-12 text-center">
                        
                    <h2>Teacher's​ Dashboard</h2>
                     <hr class="star-primary">
                       
                    </div>
                </div>
        <section id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <img src="img/teacher.jpg">
                    <h5>Mr. Teach Teacherson</h5>
                        <hr class="star-primary">
                    </div>
                </div>
             <div class="row text-center">
        <div class="col-md-4"><a href="{{ route('classes.create') }}"> <button type="button" class="btn btn-primary" >Create class </button></a></div>
        <div class="col-md-4"><a href="{{ route('classes.index') }}"><button type="button" class="btn btn-primary">Modify an existing Class</button></a></div>
        <div class="col-md-4"><a href="#"><button type="button" class="btn btn-primary">Edit profile</button></a></div>
      </div>
        </section>
        
                </div>
            </div>
        </div>
    </div>
   
</div>
<br>
<br>

        <!-- Footer -->
        
@endsection
