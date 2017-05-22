@extends('layouts.app')

@section('content')


<header class="profile1">
    <div class="container" id="maincontent" tabindex="-1">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
    </div>
</header>
    <div class="row full1">    
        <div class="container col-md-2"></div>
        <div class="container col-md-4">
                <h1>Register Today & Tell A Friend. It's free and easy!</h1>
                <p>No matter what your skill level or interest in Bridge you will find a variety of useful online information about Bridge activities in your area. Receive the information you want and what is useful to you.  </p>
	
            </div>
        <div class="container col-md-4">
<h3>Amazing Benefits enjoyed when registering with low country bridge connection. </h3>
          
	<ul style="font-size: 20px;" class="listmob">
      <li>Be informed of local clubs, classes & seminars</li>
      <li>Access to game & tournament schedules</li>
      <li>Awareness of special games & celebrations</li>
      <li>Information about mentoring & supervised play</li>
    <li>Enroll in bridge classes, seminars & special events </li>
    </ul>
	<div class="container col-md-2"></div>
            </div>
        </div>
        <!-- Portfolio Grid Section -->
        <!-- Tab start Section -->
        <div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-5 col-sm-8 col-xs-9 bhoechie-tab-container">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item active text-center">
                  <h4 class="glyphicon glyphicon-plane"></h4><br/>Personal Profile
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-lock"></h4><br/>Update Password
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-road"></h4><br/>Subscription
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-home"></h4><br/>Classes
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-cutlery"></h4><br/>Games
                </a>
                
              </div>
            </div>
            
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- Profile section -->
                <div class="bhoechie-tab-content active">
          <div class="row">
    <div class="col-md-8 col-md-offset-1">
      <form method="POST" action="/profiles"class="form-horizontal" role="form" >
        {{ csrf_field() }}
        <fieldset>

          <!-- Form Name -->
          <legend>Personal Profile</legend>

          <!-- Text input-->

          <div class="form-group" >
            <label class="col-sm-2 control-label" for="textinput">Email</label>
            <div class="col-sm-10">
              <label class="col-sm-2 control-label" for="textinput">john.cena@example.com</label>
            </div>
          </div>


          <div class="form-group">
            <label class="col-sm-2 control-label" for="firstname">First Name</label>
            <div class="col-sm-10">
              <input type="text" placeholder="John " class="form-control" id="firstname" name="firstname">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="lastname">Last Name</label>
            <div class="col-sm-10">
              <input type="text" placeholder="Cena" class="form-control" id="lastname" name="lastname">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="city">City</label>
            <div class="col-sm-10">
              <input type="text" placeholder="City" class="form-control" id="city" name="city">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="state">State</label>
            <div class="col-sm-4">
              <input type="text" placeholder="State" class="form-control" id="state" name="state">
            </div>

            <label class="col-sm-2 control-label" for="zipcode">Zipcode</label>
            <div class="col-sm-4">
              <input type="text" placeholder="110001" class="form-control" id="zipcode" name="zipcode">
            </div>
          </div>



          <!-- Text input-->
          
          
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <div class="pull-right">
              <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </div>
          </div>

          

        </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
                   
                </div>

                <!-- Password section -->
                <div class="bhoechie-tab-content">
          <div class="row">
    <div class="col-md-8 col-md-offset-1">
      <form class="form-horizontal" role="form">
        <fieldset>

          <!-- Form Name -->
          <legend>Update Profile Password</legend>
          
          <div class="form-group">
            <label class="col-sm-4 control-label" for="textinput">Current Password</label>
            <div class="col-sm-8">
              <input type="text" placeholder="Password" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label" for="textinput">New Password</label>
            <div class="col-sm-8">
              <input type="text" placeholder="Password" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-4 control-label" for="textinput">Confirm Password</label>
            <div class="col-sm-8">
              <input type="text" placeholder="Password" class="form-control">
            </div>
          </div> 
          <div class="form-group pull-right pull-right1">
            <div class="col-sm-4">              
            </div>  
            <button type="submit" class="btn btn-primary">Update</button>          
          </div>

        </fieldset>
      </form>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
                   
                </div>
                <!-- Newsletter section -->
                <div class="bhoechie-tab-content">
      <div class="container">
       <form role="form">
        <div class="row">
            <div class="col-md-8">
                <fieldset>
                    <legend>
                        Manage Subscriptions
                    </legend>
                    <p>
                        Select Which Low Country Bridge Connection Emails You Wish To Receive.
                    </p>
                    <div class="checkbox">
                        <input id="checkbox1" type="checkbox" name="checkbox1">
                        <label for="checkbox1">
                            Send All
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox2" type="checkbox">
                        <label for="checkbox2">
                            Classes & Seminars
                        </label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input id="checkbox3" type="checkbox">
                        <label for="checkbox3">
                            Special Games
                        </label>
                    </div>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox4" type="checkbox">
                        <label for="checkbox4">
                            Tournaments
                        </label>
                    </div>
                    <div class="checkbox checkbox-warning">
                        <input id="checkbox5" type="checkbox">
                        <label for="checkbox5">
                            None
                        </label>
                    </div>
                </fieldset>
                <div class="form-group">
                  <div class="col-sm-10">
                    <div class="pull-right">                      
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
            </div>
           
        </div>
    </form>
  
</div>
                </div>
    
                <!-- Classes -->
                <div class="bhoechie-tab-content">
       
                
      <div class="container">
       <form role="form">
        <div class="row">
            <div class="col-md-8">
                <fieldset>
                    <legend>
                        Manage Class Subscriptions
                    </legend>
                    <p>
                        Which Category of Bridge Classes Have You Attended?
                    </p>
                    <div class="checkbox">
                        <input id="checkbox11" type="checkbox">
                        <label for="checkbox11">
                            Beginner
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox12" type="checkbox">
                        <label for="checkbox12">
                            Beginner Intermediate
                        </label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input id="checkbox13" type="checkbox">
                        <label for="checkbox13">
                             Both
                        </label>
                    </div>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox14" type="checkbox">
                        <label for="checkbox14">
                            Neither
                        </label>
                    </div>
                    
                </fieldset>
            </div>
           
        </div>
    </form>
     <form role="form">
        <div class="row">
            <div class="col-md-8">
                <fieldset>
                    
                    <p>
                        Check The Bridge Workshops You Would Be Interested In Attending. (Check All That Apply)
                    </p>
                      <div class="col-md-8 padleft">
                          <div class="col-md-6 padleft">
                            
                               <div class="checkbox checkbox-inline">
                                    <input type="checkbox" id="inlineCheckbox1" value="option1">
                                    <label for="inlineCheckbox1"> Absolute Beginner </label>
                                </div>
                    </div>
                    <div class="col-md-6 padleft1">
                        <div class="checkbox checkbox-success checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox2" value="option1">
                            <label for="inlineCheckbox2"> Beginner Plus </label>
                        </div>
                    </div>    
                    
            </div>
                    <div class="col-md-8 padleft">
                   <div class="col-md-6 padleft">
                       <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox11" value="option1">
                            <label for="inlineCheckbox11"> Polish Your Skills </label>
                        </div>
                    </div>     
                    <div class="col-md-6 padleft1">
                        <div class="checkbox checkbox-success checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox12" value="option1">
                            <label for="inlineCheckbox12"> Competitive Bidding </label>
                        </div>
                    </div>
                    
                        
                    
            </div>
                      <div class="col-md-8 padleft">

                    <div class="col-md-6 padleft">    
                   <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox21" value="option1">
                        <label for="inlineCheckbox21">  Conventions </label>
                    </div>
                    </div>
                    <div class="col-md-6 padleft1">
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox22" value="option1">
                        <label for="inlineCheckbox22"> Leads </label>
                    </div>

                        
                    </div>
            </div>
                    <div class="col-md-8 padleft">
                     <div class="col-md-6 padleft">   
                   <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox31" value="option1">
                        <label for="inlineCheckbox31"> Defense </label>
                    </div>
                    </div>
                    <div class="col-md-6 padleft1">
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox32" value="option1">
                        <label for="inlineCheckbox32"> Play of Hand - No Trump </label>
                    </div>
                    </div>
                        
                    
                    </div>  

                    <div class="col-md-8 padleft">
                         <div class="col-md-6 padleft">   
                       <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox41" value="option1">
                            <label for="inlineCheckbox41"> Play Hand - Suit </label>
                        </div>
                        </div>
                        <div class="col-md-6 padleft1">
                        <div class="checkbox checkbox-success checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox42" value="option1">
                            <label for="inlineCheckbox42">  Cuebids </label>
                        </div>
                        </div>
                    </div> 

                    <div class="col-md-8 padleft">
                         <div class="col-md-6 padleft">   
                       <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox51" value="option1">
                            <label for="inlineCheckbox51"> 2 Over 1 </label>
                        </div>
                        </div>
                        <div class="col-md-6 padleft1">
                        <div class="checkbox checkbox-success checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox52" value="option1">
                            <label for="inlineCheckbox52">  Doubles </label>
                        </div>
                        </div>
                    </div> 

                    <div class="col-md-8 padleft">
                         <div class="col-md-6 padleft">   
                       <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox61" value="option1">
                            <label for="inlineCheckbox61"> Counting </label>
                        </div>
                        </div>
                        <div class="col-md-6 padleft1">
                        <div class="checkbox checkbox-success checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox62" value="option1">
                            <label for="inlineCheckbox62"> Stayman & Transfers </label>
                        </div>
                        </div>
                    </div> 

                    <div class="col-md-8 padleft">
                         <div class="col-md-6 padleft">   
                       <div class="checkbox checkbox-inline">
                            <input type="checkbox" id="inlineCheckbox71" value="option1">
                            <label for="inlineCheckbox71"> Other </label>
                        </div>
                        </div>                        
                    </div> 

                    
                </fieldset>
            </div>
           
        </div>
    </form>
  <form role="form">
        <div class="row">
            <div class="col-md-8">
                <fieldset>
                    
                    <p>
                        Are You Interested In Meeting New Bridge Partners? 
                    </p>
                      <div class="col-md-8 padleft">
                        
                   <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox81" value="option1">
                        <label for="inlineCheckbox81"> Yes, I Am Interested In Meeting New Bridge Partners </label>
                    </div>                    
                </fieldset>

                <fieldset>
                  <div class="form-group">
                      <div class="col-sm-10">
                        <div class="pull-right">                      
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </div>
                    </div>
                </fieldset>
            </div>
           
        </div>
    </form>
</div>
                
                </div>
                <!--Games -->
                <div class="bhoechie-tab-content">
       
      <div class="container padleft">
       <form role="form">
        <div class="row">
            <div class="col-md-8">
                <fieldset>
                    <legend>
                        Details for bridge games
                    </legend>
                    <p>
                        How Many Times Per Month Do You Play Bridge? 
                    </p>
                    <div class="checkbox">
                        <input id="checkbox21" type="checkbox">
                        <label for="checkbox21">
                            1 - 5 Times Per Month
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox22" type="checkbox">
                        <label for="checkbox22">
                            6 - 10 Times Per Month
                        </label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input id="checkbox23" type="checkbox">
                        <label for="checkbox23">
                             11 - 20 Times Per Month
                        </label>
                    </div>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox24" type="checkbox">
                        <label for="checkbox24">
                            21+ Times Per Month
                        </label>
                    </div>
                 
            </div>
                </fieldset>
            </div>
           
        </div>
    </form>
     <form role="form">
        <div class="row">
            <div class="col-md-8">
                <fieldset>
                    
                    <p>
                        Where Do you Play Bridge? (Select All That Apply)
                    </p>
                    <div class="col-md-12 padleft">
                   <div class="col-md-6 padleft">
                   <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox91" value="option1">
                        <label for="inlineCheckbox91"> HHI Bridge Center </label>
                    </div>
                    </div>
                    <div class="col-md-6 padleft1">
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox92" value="option1">
                        <label for="inlineCheckbox92"> Are You A Member? </label>
                    </div>
                    </div>
                        
                    
            </div>
              <div class="col-md-12 padleft">
                <div class="col-md-6 padleft">                        
                   <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox101" value="option1">
                        <label for="inlineCheckbox101"> Belfair Bridge Club </label>
                    </div>
                    </div>
                    <div class="col-md-6 padleft1">
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox102" value="option1">
                        <label for="inlineCheckbox102"> Are You A Member? </label>
                    </div>
                        
                   </div> 
            </div>
              <div class="col-md-12 padleft">
                        <div class="col-md-6 padleft">
                   <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox111" value="option1">
                        <label for="inlineCheckbox111">  Cypress Bridge Club </label>
                    </div>
                    </div>
                    <div class="col-md-6 padleft1">
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox112" value="option1">
                        <label for="inlineCheckbox112"> Are You A Member? </label>
                    </div>
                    </div>
                        
                    
            </div>
                    <div class="col-md-12 padleft">
                        <div class="col-md-6 padleft">
                   <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox121" value="option1">
                        <label for="inlineCheckbox121"> Sun City Bridge Club </label>
                    </div>
                    </div>
                    <div class="col-md-6 padleft1">
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox122" value="option1">
                        <label for="inlineCheckbox122"> Are You A Member? </label>
                    </div>
                    </div>
                        
                    
            </div>
              <div class="col-md-12 padleft">
                        <div class="col-md-6 padleft">
                   <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox131" value="option1">
                        <label for="inlineCheckbox131"> Beaufort Bridge Club </label>
                    </div>
                    </div>
                    <div class="col-md-6 padleft1">
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox132" value="option1">
                        <label for="inlineCheckbox132"> Are You A Member? </label>
                    </div>
                    </div>
                        
                    
            </div>
              <div class="col-md-12 padleft">
                        <div class="col-md-6 padleft">
                   <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox141" value="option1">
                        <label for="inlineCheckbox141"> Fripp Island Bridge Club </label>
                    </div>
                    </div>
                    <div class="col-md-6 padleft1">
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox142" value="option1">
                        <label for="inlineCheckbox142"> Are You A Member? </label>
                    </div>
                     </div>   
                    
            </div>
                    <div class="col-md-12 padleft">
                        <div class="col-md-6 padleft">
                   <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox151" value="option1">
                        <label for="inlineCheckbox151">  Dataw Island Bridge Club </label>
                    </div>
                    </div>
                    <div class="col-md-6 padleft1">
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox152" value="option1">
                        <label for="inlineCheckbox152"> Are You A Member? </label>
                    </div>
                    </div>
                        
                    
            </div>
              <div class="col-md-12 padleft">
                        <div class="col-md-6 padleft">
                   <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox161" value="option1">
                        <label for="inlineCheckbox161"> Junior Bridge HHI </label>
                    </div>
                    </div>
                    <div class="col-md-6 padleft1">
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox162" value="option1">
                        <label for="inlineCheckbox162"> Are You A Member? </label>
                    </div>
                   </div>     
                    
            </div>
              <div class="col-md-12 padleft">
                        <div class="col-md-12 padleft">
                   <div class="checkbox checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox171" value="option1">
                        <label for="inlineCheckbox171"> Private Home Games </label>
                    </div>
                    </div>
                    <div class="col-md-12 padleft">
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="checkbox" id="inlineCheckbox172" value="option1">
                        <label for="inlineCheckbox172">  Plantation / Community Centers </label>
                    </div>
                    </div>
                        
                    
            </div>
                </fieldset>
            </div>
           
        </div>
    </form>
    
       <form role="form">
        <div class="row">
            <div class="col-md-8">
                <fieldset>
                    
                    <p>
                        How Would You classify Your Current Bridge Skills? 
                    </p>
                    <div class="checkbox">
                        <input id="checkbox31" type="checkbox">
                        <label for="checkbox31">
                            Just Learning
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox32" type="checkbox">
                        <label for="checkbox32">
                            Advanced Beginner
                        </label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input id="checkbox33" type="checkbox">
                        <label for="checkbox33">
                             Intermediate Beginner
                        </label>
                    </div>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox34" type="checkbox">
                        <label for="checkbox34">
                            Advanced
                        </label>
                    </div>
                </fieldset> 
            </div>
            </div>
            </form>


            <form role="form">
        <div class="row">
            <div class="col-md-8">
                <fieldset>
                    
                    <p>
                        How Many Master Points Do You Have?  
                    </p>
                    <div class="checkbox">
                        <input id="checkbox41" type="checkbox">
                        <label for="checkbox41">
                            0 - 50
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox42" type="checkbox">
                        <label for="checkbox42">
                            51 - 100
                        </label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input id="checkbox43" type="checkbox">
                        <label for="checkbox43">
                             101 - 300
                        </label>
                    </div>                    
                </fieldset> 
            </div>
            </div>
            </form>


            <form class="form-horizontal" role="form">
        <fieldset>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="textinput" style="text-align: left;">If You Have An ACBL# Please Insert It Here.</label>
                <div class="col-sm-8">
                  <input type="text" placeholder="ACBL# " class="form-control">
                </div>
              </div>
              </fieldset>
              <fieldset>
                  <div class="form-group">
                      <div class="col-sm-10">
                        <div class="pull-right">                      
                          <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                      </div>
                    </div>
                </fieldset>
              </form>       
        </div>
   

  
</div>

                
                
                </div>
              
            </div>
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
