@extends('layouts.app')

@section('content')

<!-- Portfolio Grid Section -->


		 <header class="classes">
            <div class="container" id="maincontent" tabindex="-1">
                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>
            </div>
        </header>

        <div class="row full1">
            <div class="mid-section">
                <div class="col-md-4"><img src="img/heart.jpg" style="margin-top: 22px;"></div>
                <div class="col-md-4"><h3 style="font-size: 20px; margin-top: 32px;font-weight: 700;color: black; border-bottom: 3px black solid;">contact administrator </h3></div>
                <div class="col-md-4"><img src="img/heart.jpg" style="margin-top: 22px;"></div>

            </div>
        </div>
        <div class="row full1">
            <div class="mid-section">
                <h3 style="font-size: 17px; margin-top: 32px; font-weight: 400;">To contact the site administrator with any questions please submit your information using the automated form below.</h3>                
            </div>
        </div>

        <form class="form-horizontal" role="form" style="text-align: center;">
        <fieldset>
            <label class="col-md-12 control-label" for="textinput" style="text-align: center; font-size: 18px">Message</label>
            <div class="form-group full1" style="text-align: center;">
                
                <div class="col-md-12">
                 
                <textarea  rows="6" cols="100" placeholder="This is a required field."></textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="text-align: center;">Send Message</button>
              </div>
              
              </fieldset>

              </form>       
        </div>
        


       



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
