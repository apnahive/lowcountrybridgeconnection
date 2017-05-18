@extends('layouts.app')

@section('content')

    <!-- Header -->
        <header class="classes">
            <div class="container" id="maincontent" tabindex="-1">
                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>
            </div>
        </header>
        <!-- Portfolio Grid Section -->
        <div class="row full1">
            <div class="mid-section">
                <div class="col-md-3"><img src="img/heart.jpg" style="margin-top: 22px;"></div>
                <div class="col-md-6"><h3 class="text-uppercase" style="font-size: 17px;font-weight: 700;color: black; margin-top: 32px; border-bottom: 3px black solid;">local bridge classes & seminar information</h3></div>
                <div class="col-md-3"><img src="img/heart.jpg" style="margin-top: 22px;"></div>

            </div>
        </div>
        <div class="row full1">
            <div class="mid-section">
                <h3 class="text-uppercase" style="font-size: 17px; margin-top: 32px; font-weight: 400;">bridge is a fascinating game...........check out our current offerings.</h3>
                <hr style="border-top: 1px solid rgb(35, 34, 34);width: 50%;">
            </div>
        </div>
        <div class="row full1">
            <div class="mid-section">                
                <div class="col-md-6">
                <p style="font-weight: 700;">Hilton Head Island Winter Classes</p>
                @foreach ($classes as $classkey => $value)
                    <div class="row sapce1">                    
                        <div class="col-md-6">
                            {{ $value->class_name }}
                        </div>
                        <div class="col-md-6 right1">
                            <a href="{!! route('subscription.update', $value['id']) !!}"><button type="button" class="btn btn-primary sp">Join Now</button></a>
                        </div>
                    </div>
                @endforeach 
                </div>                    
                <div class="col-md-6">
                    <p style="font-weight: 700;">Hilton Head Island Spring Classes</p>
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Doubles
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
                        </div>
                    </div>
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Stayman & Transfer
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
                        </div>
                    </div>
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Popular Conventions II
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
                        </div>
                    </div>
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Convention Card
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
                        </div>
                    </div>
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Absolute Beginner Bridge
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        <div class="row full1">
            <div class="mid-section" style="margin-bottom: 53px;">
                <div class="row">
                    <div class="col-md-6">
                        <p style="font-weight: 700;">Beaufort Bridge Club</p>
                        <div class="row sapce1">
                                <div class="col-md-6">
                                    Absolute Beginner Bridge
                                </div>
                                <div class="col-md-6 right1">
                                    <button type="button" class="btn btn-primary sp">Join Now</button>
                                </div>
                            </div>
                     </div>       
                 </div>
            </div>
        </div>        

        <div class="row full1">
            <div class="mid-section">
                <h3 style="font-size: 17px; margin-top: 32px; font-weight: 400;text-transform: uppercase;">enroll in a class or seminar</h3>
                <hr style="border-top: 1px solid #232222;width: 25%;">
                                
            </div>
        </div>

        <div class="row full1">
            <div class="mid-section">                
                <div class="col-md-6">
                <p style="font-weight: 700;">Winter Classes</p>
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Enroll Now - Competitive Bidding
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
                        </div>
                    </div>
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Enroll Now - Slam School
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
                        </div>
                    </div>
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Enroll Now - Absolute Beginner Bridge
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
                        </div>
                    </div>
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Enroll Now - Popular Conventions
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
                        </div>
                    </div>                    
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Junior Bridge Lessons
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
                        </div>
                    </div>                    
                </div>
                <div class="col-md-6">
                    <p style="font-weight: 700;">Spring Classes</p>
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Enroll Now - Doubles
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
                        </div>
                    </div>
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Enroll Now - Stayman & Transfer
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
                        </div>
                    </div>
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Enroll Now - Popular Conventions II
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
                        </div>
                    </div>
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Enroll Now - Convention Card
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
                        </div>
                    </div>
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Enroll Now - Absolute Beginner Bridge
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
                        </div>
                    </div>
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Junior Bridge Lessons
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
                        </div>
                    </div>
                    <div class="row sapce1">
                        <div class="col-md-6">
                            Enroll Now - Beaufort Beginner Bridge
                        </div>
                        <div class="col-md-6 right1">
                            <button type="button" class="btn btn-primary sp">Join Now</button>
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
