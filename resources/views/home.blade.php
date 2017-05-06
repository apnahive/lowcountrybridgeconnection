@extends('layouts.app')

@section('content')
		<header class="home1">
            <div class="container" id="maincontent" tabindex="-1">
                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>
            </div>
        </header>

        <!-- Portfolio Grid Section -->
        <section id="portfolio" style="background-color: white;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>News & information</h2>
                        <hr class="star-primary">
                    </div>
                </div>
                <div class="row" style="font-size: 16px;line-height: 25px;text-transform: capitalize;">
                    <p>for news and information about a bridge club, please visit the links below.</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Event Name</th>
                                <th>Event Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Home Hilton Head Island</td>
                                <td>
                                    <button type="button" class="btn btn-info">HHI Bridge Center</button>
                                </td>
                            </tr>
                            <tr>
                                <td>Okatie creek bridge club</td>
                                <td>
                                    <button type="button" class="btn btn-info">Okatie Creek - Sun City</button>
                                </td>
                            </tr>
                            <tr>
                                <td>fripp island bridge club</td>
                                <td>
                                    <button type="button" class="btn btn-info">Cypress</button>
                                </td>
                            </tr>
                            <tr>
                                <td>cypress duplicate </td>
                                <td>
                                    <button type="button" class="btn btn-info">Dataw</button>
                                </td>
                            </tr>
                            <tr>
                                <td>dataw island bridge clube </td>
                                <td>
                                    <button type="button" class="btn btn-info">Beaufort Bridge Club</button>
                                </td>
                            </tr>
                            <tr>
                                <td>beaufort bridge club </td>
                                <td>
                                    <button type="button" class="btn btn-info">Beaufort Bridge Club</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>




<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User Dashboard</div>

                

                
                    <p>You are logged in as <strong>USER</strong>!</p>
                    <a href="{{route('sendEmail')}}" class="btn btn-block btn-primary">Send Email</a>

                
            </div>
        </div>
    </div>
</div>
<footer class="text-center">
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">                    
                    Copyright © Bridge Club 2017
                </div>
            </div>
        </div>
    </div>
</footer>
@endsection
