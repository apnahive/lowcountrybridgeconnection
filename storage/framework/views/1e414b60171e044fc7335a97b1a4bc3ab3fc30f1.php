<?php $__env->startSection('content'); ?>

<div class="row full1">    
        <div class="container col-md-2"></div>
        <div class="container col-md-4">
                <h1>Register Today &amp; Tell A Friend. It's free and easy!</h1>
                <p>No matter what your skill level or interest in Bridge you will find a variety of useful online information about Bridge activities in your area. Receive the information you want and what is useful to you.  </p>
            </div>
        <div class="container col-md-4">
<h3>Amazing benefits enjoyed when registering with low country bridge connection. </h3>
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
    <div class="col-md-2"></div>
    <div> 
      <p><span style="background-color: yellow;font-weight: 700;"> *Please completely fill out your profile questions below, including the Mailing Options, Classes, and Games sections:</span></p>
    </div>
        <div class="col-lg-12 col-md-12 bhoechie-tab-container">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 bhoechie-tab-menu">
              <div class="list-group">
                <a href="#" class="list-group-item text-center <?php if(Session::get('password')): ?> a <?php else: ?> active <?php endif; ?>">
                  <h4 class="glyphicon glyphicon-user"></h4><br/>Personal Profile
                </a>
                <a href="#" class="list-group-item text-center <?php if(Session::get('password')): ?> active <?php endif; ?>">
                  <h4 class="glyphicon glyphicon-lock"></h4><br/>Update Password
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="glyphicon glyphicon-envelope"></h4><br/>Mailing Options
                </a>
                <a href="#" class="list-group-item text-center">
                  <h3 class="glyphicon glyphicon-education"></h3><br/>Classes
                </a>
                <a href="#" class="list-group-item text-center">
                  <h4 class="icomoon icon-spades" style="font-family: 'IcoMoon-Free' !important;
"></h4>
                  <!-- <h4 class="icon-game2" style="font-size: 24px;color: #5f5aa5;"></h4> -->
                  <!-- <img src="<?php echo e(asset('img/games.png')); ?>">  -->Games
                </a>
                <a href="#" class="list-group-item text-center">
                  <h3 class=""><i class="fa fa-users" aria-hidden="true"></i></h3>Club
                </a>
              </div>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 bhoechie-tab">
                <!-- Profile section -->
                <div class="bhoechie-tab-content <?php if(Session::get('password')): ?> a <?php else: ?> active <?php endif; ?>">
          <div class="row">
    <div class="col-md-8 col-md-offset-1">
      <form class="form-horizontal" role="form" method="POST" action="<?php echo route('profiles.update', $profile['id']); ?>">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <fieldset>
          <!-- Form Name -->
          <legend>Personal Profile</legend>
          <!-- Text input-->
          <div class="form-group" >
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <label class="col-sm-2 control-label"><?php echo e($profile->email); ?></label>
            </div>
          </div>
          <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
            <label class="col-sm-2 control-label" for="name">First Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old( 'name', $profile['name'])); ?>" required autofocus>
            </div>
             <?php if($errors->has('name')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('name')); ?></strong>
                  </span>
              <?php endif; ?>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-sm-2 control-label" for="lastname">Last Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo e(old( 'lastname', $profile['lastname'])); ?>" required autofocus>
            </div>
            <?php if($errors->has('lastname')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('lastname')); ?></strong>
                  </span>
              <?php endif; ?>
          </div>
         
          <!-- Text input-->
          <div class="form-group">
           
            <label class="col-sm-2 control-label" for="zipcode">Zipcode</label>
            <div class="col-sm-4">
              <input type="text" placeholder="11001" class="form-control" id="zipcode" name="zipcode" value="<?php echo e(old( 'zipcode', $profile['zipcode'])); ?>" required autofocus>
            </div>
            <?php if($errors->has('zipcode')): ?>
                  <span class="help-block">
                      <strong><?php echo e($errors->first('zipcode')); ?></strong>
                  </span>
              <?php endif; ?>
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
                <div class="bhoechie-tab-content <?php if(Session::get('password')): ?> active <?php endif; ?>">
          <div class="row">
    <div class="col-md-8 col-md-offset-1">
      <form class="form-horizontal" role="form" method="POST" action="<?php echo route('profiles.update', $profile['id']); ?>">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="form-group<?php echo e($errors->has('old_password') ? ' has-error' : ''); ?>">
            <label for="password" class="col-md-4 control-label">Enter Old Password</label>
            <div class="col-md-8">
                <input id="old_password" type="password" class="form-control" name="old_password" value="" required autofocus>
                <?php if($errors->has('old_password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('old_password')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group<?php echo e($errors->has('new_password') ? ' has-error' : ''); ?>">
            <label for="new_password" class="col-md-4 control-label">New Password</label>
            <div class="col-md-8">
                <input id="new_password" type="password" class="form-control" name="new_password" value="" required autofocus>
                <?php if($errors->has('new_password')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('new_password')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
            <label for="password_confirmation" class="col-md-4 control-label">Confirm Password</label>
            <div class="col-md-8">
                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="" required autofocus>
                <?php if($errors->has('password_confirmation')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('password_confirmation')); ?></strong>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>
        </div>
    </form>  
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
                </div>
                <!-- Newsletter section -->
                <div class="bhoechie-tab-content">
      <div class="container">
       <form class="form-horizontal" role="form" method="POST" action="<?php echo route('profiles.update', $profile['id']); ?>">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="row">
            <div class="col-md-8">
                <fieldset>
                    <legend>
                        Manage Enrollment
                    </legend>
                    <p>
                        Select Which Low Country Bridge Connection Emails You Wish To Receive.
                    </p>
                    <div class="checkbox">
                        <input id="checkbox1" type="radio" name="mailing_options" value="A" <?php echo e($profile['mailing_options'] === "A" ? 'checked' : ''); ?>>
                        <label for="checkbox1">
                            Send All
                        </label>
                    </div>                    
                    <div class="checkbox checkbox-success">
                        <input id="checkbox3" type="radio" name="mailing_options" value="G" <?php echo e($profile['mailing_options'] === "G" ? 'checked' : ''); ?>>
                        <label for="checkbox3">
                            Special Games
                        </label>
                    </div>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox4" type="radio" name="mailing_options" value="T" <?php echo e($profile['mailing_options'] === "T" ? 'checked' : ''); ?>>
                        <label for="checkbox4">
                            Tournaments
                        </label>
                    </div>
                    <div class="checkbox checkbox-warning">
                        <input id="checkbox5" type="radio" name="mailing_options" value="N" <?php echo e($profile['mailing_options'] === "N" ? 'checked' : ''); ?>>
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
       <form class="form-horizontal" role="form" method="POST" action="<?php echo route('profiles.update', $profile['id']); ?>">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <div class="row">
            <div class="col-md-8">
                <fieldset>
                    <legend>
                        Manage Class Enrollment
                    </legend>
                    <p>
                        Which Category of Bridge Classes Have You Attended?
                    </p>
                    <div class="checkbox">
                        <input id="checkbox11" type="radio" name="attended_classes" value="Beginner" <?php echo e($profile['attended_classes'] === "Beginner" ? 'checked' : ''); ?>>
                        <label for="checkbox11">
                            Beginner
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox12" type="radio" name="attended_classes" value="Beginner/Intermediate" <?php echo e($profile['attended_classes'] === "Beginner/Intermediate" ? 'checked' : ''); ?>>
                        <label for="checkbox12">
                            Beginner Intermediate
                        </label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input id="checkbox13" type="radio" name="attended_classes" value="Both" <?php echo e($profile['attended_classes'] === "Both" ? 'checked' : ''); ?>>
                        <label for="checkbox13">
                             Both
                        </label>
                    </div>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox14" type="radio" name="attended_classes" value="Neither" <?php echo e($profile['attended_classes'] === "Neither" ? 'checked' : ''); ?>>
                        <label for="checkbox14">
                            Neither
                        </label>
                    </div>
                </fieldset>
                <fieldset>
                    <p>
                        Check The Bridge Workshops You Would Be Interested In Attending. (Check All That Apply)
                    </p>
                      <div class="col-md-8 padleft">
                          <div class="col-md-6 padleft">
                               <div class="checkbox checkbox-inline">
                                    <input type="hidden" name="absolute_beginner" value="false">
                                    <input type="checkbox" id="inlineCheckbox1" value="true" name="absolute_beginner" style="margin-left: 0;" <?php echo e($workshop['absolute_beginner'] === '1' ? 'checked' : ''); ?>>
                                    <label for="inlineCheckbox1"> Absolute Beginner </label>
                                </div>
                    </div>
                    <div class="col-md-6 padleft1">
                        <div class="checkbox checkbox-success checkbox-inline">
                            <input type="hidden" name="beginner_plus" value="false">
                            <input type="checkbox" id="inlineCheckbox2" value="true" name="beginner_plus" style="margin-left: 0;" <?php echo e($workshop['beginner_plus'] === '1' ? 'checked' : ''); ?>>
                            <label for="inlineCheckbox2"> Beginner Plus </label>
                        </div>
                    </div>    
            </div>
                    <div class="col-md-8 padleft">
                   <div class="col-md-6 padleft">
                       <div class="checkbox checkbox-inline">
                            <input type="hidden" name="polish_your_skills" value="false">
                            <input type="checkbox" id="inlineCheckbox11" value="true" name="polish_your_skills" style="margin-left: 0;" <?php echo e($workshop['polish_your_skills'] === '1' ? 'checked' : ''); ?>>
                            <label for="inlineCheckbox11"> Polish Your Skills </label>
                        </div>
                    </div>     
                    <div class="col-md-6 padleft1">
                        <div class="checkbox checkbox-success checkbox-inline">
                            <input type="hidden" name="competitive_bidding" value="false">
                            <input type="checkbox" id="inlineCheckbox12" value="true" name="competitive_bidding" style="margin-left: 0;" <?php echo e($workshop['competitive_bidding'] === '1' ? 'checked' : ''); ?>>
                            <label for="inlineCheckbox12"> Competitive Bidding </label>
                        </div>
                    </div>
            </div>
                      <div class="col-md-8 padleft">
                    <div class="col-md-6 padleft">    
                   <div class="checkbox checkbox-inline">
                        <input type="hidden" name="conventions" value="false">
                        <input type="checkbox" id="inlineCheckbox21" value="true" name="conventions" style="margin-left: 0;" <?php echo e($workshop['conventions'] === '1' ? 'checked' : ''); ?>>
                        <label for="inlineCheckbox21">  Conventions </label>
                    </div>
                    </div>
                    <div class="col-md-6 padleft1">
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="hidden" name="leads" value="false">
                        <input type="checkbox" id="inlineCheckbox22" value="true" name="leads" style="margin-left: 0;" <?php echo e($workshop['leads'] === '1' ? 'checked' : ''); ?>>
                        <label for="inlineCheckbox22"> Leads </label>
                    </div>
                    </div>
            </div>
                    <div class="col-md-8 padleft">
                     <div class="col-md-6 padleft">   
                   <div class="checkbox checkbox-inline">
                        <input type="hidden" name="defense" value="false">
                        <input type="checkbox" id="inlineCheckbox31" value="true" name="defense" style="margin-left: 0;" <?php echo e($workshop['defense'] === '1' ? 'checked' : ''); ?>>
                        <label for="inlineCheckbox31"> Defense </label>
                    </div>
                    </div>
                    <div class="col-md-6 padleft1">
                    <div class="checkbox checkbox-success checkbox-inline">
                        <input type="hidden" name="ph_no_trump" value="false">
                        <input type="checkbox" id="inlineCheckbox32" value="true" name="ph_no_trump" style="margin-left: 0;" <?php echo e($workshop['ph_no_trump'] === '1' ? 'checked' : ''); ?>>
                        <label for="inlineCheckbox32"> Play of Hand - No Trump </label>
                    </div>
                    </div>
                    </div>  
                    <div class="col-md-8 padleft">
                         <div class="col-md-6 padleft">   
                       <div class="checkbox checkbox-inline">
                            <input type="hidden" name="ph_suit" value="false">
                            <input type="checkbox" id="inlineCheckbox41" value="true" name="ph_suit" style="margin-left: 0;" <?php echo e($workshop['ph_suit'] === '1' ? 'checked' : ''); ?>>
                            <label for="inlineCheckbox41"> Play Hand - Suit </label>
                        </div>
                        </div>
                        <div class="col-md-6 padleft1">
                        <div class="checkbox checkbox-success checkbox-inline">
                            <input type="hidden" name="cuebids" value="false">
                            <input type="checkbox" id="inlineCheckbox42" value="true" name="cuebids" style="margin-left: 0;" <?php echo e($workshop['cuebids'] === '1' ? 'checked' : ''); ?>>
                            <label for="inlineCheckbox42">  Cuebids </label>
                        </div>
                        </div>
                    </div> 
                    <div class="col-md-8 padleft">
                         <div class="col-md-6 padleft">   
                       <div class="checkbox checkbox-inline">
                            <input type="hidden" name="over_1" value="false">
                            <input type="checkbox" id="inlineCheckbox51" value="true" name="over_1" style="margin-left: 0;" <?php echo e($workshop['over_1'] === '1' ? 'checked' : ''); ?>>
                            <label for="inlineCheckbox51"> 2 Over 1 </label>
                        </div>
                        </div>
                        <div class="col-md-6 padleft1">
                        <div class="checkbox checkbox-success checkbox-inline">
                            <input type="hidden" name="doubles" value="false">
                            <input type="checkbox" id="inlineCheckbox52" value="true" name="doubles" style="margin-left: 0;" <?php echo e($workshop['doubles'] === '1' ? 'checked' : ''); ?>>
                            <label for="inlineCheckbox52">  Doubles </label>
                        </div>
                        </div>
                    </div> 
                    <div class="col-md-8 padleft">
                         <div class="col-md-6 padleft">   
                       <div class="checkbox checkbox-inline">
                            <input type="hidden" name="counting" value="false">
                            <input type="checkbox" id="inlineCheckbox61" value="true" name="counting" style="margin-left: 0;" <?php echo e($workshop['counting'] === '1' ? 'checked' : ''); ?>>
                            <label for="inlineCheckbox61"> Counting </label>
                        </div>
                        </div>
                        <div class="col-md-6 padleft1">
                        <div class="checkbox checkbox-success checkbox-inline">
                            <input type="hidden" name="strayman_transfers" value="false">
                            <input type="checkbox" id="inlineCheckbox62" name="strayman_transfers" value="true" style="margin-left: 0;" <?php echo e($workshop['strayman_transfers'] === '1' ? 'checked' : ''); ?>>
                            <label for="inlineCheckbox62"> Stayman & Transfers </label>
                        </div>
                        </div>
                    </div> 
                    <div class="col-md-8 padleft">
                         <div class="col-md-6 padleft">   
                       <div class="checkbox checkbox-inline">
                            <input type="hidden" name="other" value="false">
                            <input type="checkbox" id="inlineCheckbox71" name="other" value="true" style="margin-left: 0;" <?php echo e($workshop['other'] === '1' ? 'checked' : ''); ?>>
                            <label for="inlineCheckbox71"> Other </label>
                        </div>
                        </div>                        
                    </div> 
                </fieldset>
                <fieldset>
                    <p>
                        Are You Interested In Meeting New Bridge Partners? 
                    </p>
                      <div class="col-md-8 padleft">
                   <div class="checkbox checkbox-inline">
                        <input type="hidden" name="new_partner_interested" value="false">
                        <input type="checkbox" id="inlineCheckbox81" name="new_partner_interested" value="true" style="margin-left: 0;" <?php echo e($profile['new_partner_interested'] === '1' ? 'checked' : ''); ?>>
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
       <form class="form-horizontal" role="form" method="POST" action="<?php echo route('profiles.update', $profile['id']); ?>">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
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
                        <input id="checkbox21" type="radio" name="play_frequency" value="1" <?php echo e($profile['play_frequency'] === '1' ? 'checked' : ''); ?>>
                        <label for="checkbox21">
                            1 - 5 Times Per Month
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox22" type="radio" name="play_frequency" value="6" <?php echo e($profile['play_frequency'] === '6' ? 'checked' : ''); ?>>
                        <label for="checkbox22">
                            6 - 10 Times Per Month
                       </label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input id="checkbox23" type="radio" name="play_frequency" value="11" <?php echo e($profile['play_frequency'] === '11' ? 'checked' : ''); ?>>
                        <label for="checkbox23">
                             11 - 20 Times Per Month
                        </label>
                    </div>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox24" type="radio" name="play_frequency" value="21" <?php echo e($profile['play_frequency'] === '21' ? 'checked' : ''); ?>>
                        <label for="checkbox24">
                            21+ Times Per Month
                        </label>
                    </div>
                 </fieldset>
                 
                <!-- mid code ends here -->
                 <fieldset>
                    <p>
                        How Would You classify Your Current Bridge Skills? 
                    </p>
                    <div class="checkbox">
                        <input id="checkbox31" type="radio" name="skill_level" value="N" <?php echo e($profile['skill_level'] === 'N' ? 'checked' : ''); ?>>
                        <label for="checkbox31">
                            Just Learning
                        </label>
                    </div>
                    <div class="checkbox checkbox-primary">
                        <input id="checkbox32" type="radio" name="skill_level" value="B" <?php echo e($profile['skill_level'] === 'B' ? 'checked' : ''); ?>>
                        <label for="checkbox32">
                            Beginner
                        </label>
                    </div>
                    <div class="checkbox checkbox-success">
                        <input id="checkbox33" type="radio" name="skill_level" value="I" <?php echo e($profile['skill_level'] === 'I' ? 'checked' : ''); ?>>
                        <label for="checkbox33">
                             Intermediate
                        </label>
                    </div>
                    <div class="checkbox checkbox-info">
                        <input id="checkbox34" type="radio" name="skill_level" value="A" <?php echo e($profile['skill_level'] === 'A' ? 'checked' : ''); ?>>
                        <label for="checkbox34">
                            Advanced
                        </label>
                    </div>
                </fieldset> 
                <fieldset>
                    <p>
                        How Many Master Points Do You Have?  
                    </p>
                    <div class="form-group<?php echo e($errors->has('master_points') ? ' has-error' : ''); ?> col-sm-8">
                        <input id="master_points" class="form-control" type="text" placeholder="Master Points" name="master_points" value="<?php echo e(old( 'master_points', $profile['master_points'])); ?>">
                        <?php if($errors->has('master_points')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('master_points')); ?></strong>
                            </span>
                        <?php endif; ?>
                    </div>
                </fieldset> 
                 <fieldset>
                    <p>If You Have An ACBL# Please Insert It Here.</p>
                    <div class="form-group<?php echo e($errors->has('acbl') ? ' has-error' : ''); ?> col-sm-8">                      
                      <input type="text" class="form-control" placeholder="ACBL#" id="acbl" name="acbl" value="<?php echo e(old( 'acbl', $profile['acbl'])); ?>">
                       <?php if($errors->has('acbl')): ?>
                            <span class="help-block">
                                <strong><?php echo e($errors->first('acbl')); ?></strong>
                            </span>
                        <?php endif; ?>
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
        </div>
    </form>
        </div>


<div class="bhoechie-tab-content">
          <div class="row">
    <div class="col-md-8 col-md-offset-1">
     
      <form class="form-horizontal" role="form" method="POST" action="<?php echo route('profiles.update', $profile['id']); ?>">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
        <fieldset>
            <legend>
                Manage Club Enrollment
            </legend>
            <p>
                Which Clubs do you belong to?
            </p>
            <div class="col-md-8 padleft">
              <?php $__currentLoopData = $clubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $clubkey => $club): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
              <div class="col-md-12 padleft">   
               <div class="checkbox checkbox-inline">
                    
                    <?php if($club->subscription['subscription_status']): ?>
                    
                    <input type="hidden" name="<?php echo e($club->name); ?>" value="false">
                    <input type="checkbox" id="club<?php echo e($club->name); ?>" value="true" name="<?php echo e($club->name); ?>" style="margin-left: 0;" checked="checked">
                    <label for="club<?php echo e($club->name); ?>"><?php echo e($club->club_name); ?></label>
                    <?php else: ?>
                    <input type="hidden" name="<?php echo e($club->name); ?>" value="false">
                    <input type="checkbox" id="club<?php echo e($club->name); ?>" value="true" name="<?php echo e($club->name); ?>" style="margin-left: 0;">
                    <label for="club<?php echo e($club->name); ?>"><?php echo e($club->club_name); ?></label>
                    <?php endif; ?>


                    <!-- <input type="hidden" name="<?php echo e($club->name); ?>" value="false">
                    <input type="checkbox" id="club<?php echo e($club->name); ?>" value="true" name="<?php echo e($club->name); ?>" style="margin-left: 0;">
                    <label for="club<?php echo e($club->name); ?>"><?php echo e($club->club_name); ?></label> -->
                    <br>
                    
                </div>
                </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
            </div>
            <input type="hidden" name="club" value="true">
        </fieldset> 
        <div class="form-group">
          <div class="col-sm-10">
            <div class="pull-right">                      
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>


      </form>










    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
                </div>
</div>
                </div>
            </div>
        </div>











  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>