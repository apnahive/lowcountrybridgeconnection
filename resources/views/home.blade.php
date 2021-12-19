@extends('layouts.app')

@section('content')
		<!-- <header class="home1">
            <div class="container" id="maincontent" tabindex="-1">
                <div class="row">
                    <div class="col-lg-12">
                    </div>
                </div>
            </div>
        </header> -->

        <div class="row" style="margin-right: 0;margin-left: 0;">
            <div class="col-lg-12 text-center">
                <img src="img/teacher.jpg">
            <h5>{{ $user->name }} </h5>
            </div>
        </div>

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
                    <p style="margin: 0 13px 11px;">for news and information about a bridge club, please visit the links below.</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Event Name</th>
                                <th>Event Link</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Hilton Head Island</td>
                                <td>
                                    <a href="http://www.bridgewebs.com/hiltonheadisland/" target="_blank">
                                        <button type="button" class="btn btn-info">HHI Bridge Center</button>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Okatie creek bridge club</td>
                                <td>
                                    <a href="http://www.bridgewebs.com/okatiecreek/" target="_blank">
                                        <button type="button" class="btn btn-info">Okatie Creek - Sun City</button>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Fripp island bridge club</td>
                                <td>
                                    <a href="https://web3.acbl.org/club/profile?id=00017770480003300232" target="_blank">
                                        <button type="button" class="btn btn-info">Fripp Island Bridge club</button>
                                    </a>    
                                </td>
                            </tr>
                            <tr>
                                <td>Cypress duplicate </td>
                                <td>
                                    <a href="https://web3.acbl.org/club/profile?id=00016156350003000465" target="_blank">
                                        <button type="button" class="btn btn-info">Cypress</button>
                                    </a>    
                                </td>
                            </tr>
                            <tr>
                                <td>Dataw island bridge clube </td>
                                <td>
                                    <a href="https://web3.acbl.org/club/profile?id=00016830800003125720" target="_blank">
                                        <button type="button" class="btn btn-info">Dataw</button>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Beaufort bridge club </td>
                                <td>
                                    <a href="https://web3.acbl.org/club/profile?id=00011598160002153944" target="_blank">
                                        <button type="button" class="btn btn-info">Beaufort Bridge Club</button>
                                    </a>
                                </td>
                            </tr>
							 <tr>
                                <td>Belfair bridge club </td>
                                <td>
                                    <a href="http://www.bridgewebs.com/belfair/" target="_blank">
                                        <button type="button" class="btn btn-info">Belfair bridge club</button>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>




@endsection
