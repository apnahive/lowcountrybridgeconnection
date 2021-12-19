@extends('layouts.app')

@section('content')

<!-- Portfolio Grid Section -->


		 

        <div class="row full1">
            <div class="mid-section">
                <div class="col-md-4"><img src="img/heart.jpg" style="margin-top: 22px;"></div>
                <div class="col-md-4"><h3 style="font-size: 20px; margin-top: 32px;font-weight: 700;color: black; border-bottom: 3px black solid;text-transform:uppercase;">Contact Administrator </h3></div>
                <div class="col-md-4"><img src="img/heart.jpg" style="margin-top: 22px;"></div>

            </div>
        </div>
        <div class="row full1">
            <div class="mid-section">
                <h3 style="font-size: 17px; margin-top: 32px; font-weight: 400;">To contact the site administrator with any questions please submit your information using the automated form below.</h3>                
            </div>
        </div>

        <form class="form-horizontal" role="form" style="text-align: center;" method="POST" action="{{ route('messagex') }}">
            {{ csrf_field() }}
        <fieldset>
        <label class="col-md-12 control-label" for="textinput" style="text-align: center!important; font-size: 18px">Message</label>
        <div class="form-group full1" style="text-align: center;">
            
            <div class="col-md-12">
             
            <textarea  rows="6" cols="100" name="message" id="message" placeholder="This is a required field." style="width: 94%;" required autofocus></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="text-align: center;">Send Message</button>
          </div>
          
        </fieldset>

        </form>       
      
        


       



       

@endsection
