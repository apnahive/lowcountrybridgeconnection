<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bridge Club</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        
    </head>
    <body>
        <div class="position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    
                @endif
            </div>
        @endif 

        <div class="container" style="margin-top: 25px;">
            <div class="row" style="margin-bottom: 61px;text-align: center;">
                <h1 style="background: #0087ff;color: white;margin-bottom: 53px;">Level 1 login</h1>
                <div class="col-md-6">
                    <a href="/teacher/login"><button type="button" class="btn btn-primary">Teacher</button></a>   
                </div>
                <div class="col-md-6">
                    <a href="/manager/login"><button type="button" class="btn btn-primary">Manager</button></a>   
                </div>                
            </div>            
            <div class="row" style="margin-bottom: 183px;text-align: center;">
                <h1 style="background: #0087ff;color: white;margin-bottom: 53px;">Level 2 login</h1>
                <div class="col-md-6">
                    <a href="/unitadmin/login"><button type="button" class="btn btn-primary">Unit admin</button></a>   
                </div>
                <div class="col-md-6">
                    
                </div>                
            </div>            
        </div>

            
            

            

            
                    


        </div>


    </body>
</html>
