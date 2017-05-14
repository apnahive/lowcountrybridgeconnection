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
<div class="container" style="margin-top: 60px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <a href=""><button type="button" class="btn btn-lg btn-info">Back</button></a>
            <a href="/games/create" class="pull-right"><button type="button" class="btn btn-lg btn-info pull-right">Add a new Game</button></a>
            <div class="panel panel-default" style="margin-top: 30px;">
                <div class="panel-heading">Available Games</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2">#</div>
                        <div class="col-md-3">Game Name</div>
                        <div class="col-md-3">Game Date</div>
                        <div class="col-md-3" style="text-align: center;">
                            <div class="col-md-6">Edit</div> 
                            <div class="col-md-6">View</div> 
                        </div>
                    </div>
                    @foreach ($games as $gamekey => $value) 
                    <div class="row" style="margin-top: 15px;">
                        <div class="col-md-2">{{ $value->id }}</div>
                        <div class="col-md-3">{{ $value->game_name }}</div>
                        <div class="col-md-3">{{ $value->game_date }}</div>
                        <div class="col-md-3" style="text-align: center">
                            <div class="col-md-6"><a href="/games/edit/{{ $value->id }}"><button type="button" class="btn btn-priamry">Edit</button></a></div> 
                            <div class="col-md-6"><a href="/games/{{ $value->id }}"><button type="button" class="btn btn-priamry">Veiw</button></a></div>                            
                            
                        </div>
                    </div>                                        
                    @endforeach 
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="text-center">
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; Bridge Club 2017
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
