@extends('layouts.manager_app')

@section('content')

        <!-- Portfolio Grid Section --> 
    <div class="row" style="width: 100%">
                    <div class="col-lg-12 text-center">
                        
                    <h2>Manager's​ dashboard</h2>
                     <hr class="star-primary">
                       
                    </div>
                </div>
        <section id="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <img src="img/teacher.jpg">
                    <h5>Mr. {{ $user->name }}</h5>
                        <hr class="star-primary">
                    </div>
                </div>
             <div class="row text-center">
        <div class="col-md-4"><a href="/games/create"><button type="button" class="btn btn-primary">Create game </button></a></div>
        <div class="col-md-4"><a href="{{ route('games.index') }}"><button type="button" class="btn btn-primary">Modify an existing game</button></a></div>
         <div class="col-md-4"><a href="{{ route('manager.edit', $user->id) }}"><button type="button" class="btn btn-primary">Edit profile</button></a></div>
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
