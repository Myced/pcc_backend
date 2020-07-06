@extends('layouts.main')

@section('title')
    {{ __("Dashboard") }}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-pink hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">playlist_add_check</i>
                    </div>
                    <div class="content">
                        <div class="text">ALL PURCHASES</div>
                        <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20">125</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-cyan hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">help</i>
                    </div>
                    <div class="content">
                        <div class="text">NEW TICKETS</div>
                        <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20">257</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-light-green hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">forum</i>
                    </div>
                    <div class="content">
                        <div class="text">NEW COMMENTS</div>
                        <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">243</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-orange hover-expand-effect">
                    <div class="icon">
                        <i class="material-icons">person_add</i>
                    </div>
                    <div class="content">
                        <div class="text">ALL USERS</div>
                        <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">1225</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Widgets -->

        <div class="row clearfix">
            <!-- Task Info -->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <h2>LATEST PURCHASES</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-hover dashboard-task-infos">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Client</th>
                                        <th>Telephone</th>
                                        <th>Item</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Ndi Cedric</td>
                                        <td>678 569 985</td>
                                        <td>
                                            <span class="label bg-green">
                                                Diary 2020
                                            </span>
                                        </td>
                                        <td>500</td>
                                        <td>
                                            12/Jun/2020
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Task B</td>
                                        <td><span class="label bg-blue">To Do</span></td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Task C</td>
                                        <td><span class="label bg-light-blue">On Hold</span></td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-light-blue" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Task D</td>
                                        <td><span class="label bg-orange">Wait Approvel</span></td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Task E</td>
                                        <td>
                                            <span class="label bg-red">Suspended</span>
                                        </td>
                                        <td>John Doe</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar bg-red" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%"></div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Task Info -->
            <!-- Browser Usage -->
            {{-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                <div class="card">
                    <div class="header">
                        <h2>PURCHASE STATISTICS</h2>
                        
                    </div>
                    <div class="body">
                        <div id="donut_chart" class="dashboard-donut-chart"><svg height="265" version="1.1" width="270" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; left: -0.65625px;"><desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Created with Raphaël 2.2.0</desc><defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs><path fill="none" stroke="#e91e63" d="M135,214.16666666666669A81.66666666666667,81.66666666666667,0,0,0,197.36598314293147,79.77497187236375" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#e91e63" stroke="#ffffff" d="M135,217.16666666666669A84.66666666666667,84.66666666666667,0,0,0,199.65697844205954,77.83813410440976L224.73064921585035,56.64052075513561A117.5,117.5,0,0,1,135,250Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#00bcd4" d="M197.36598314293147,79.77497187236375A81.66666666666667,81.66666666666667,0,0,0,66.93689880580898,87.36842900724861" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path><path fill="#00bcd4" stroke="#ffffff" d="M199.65697844205954,77.83813410440976A84.66666666666667,84.66666666666667,0,0,0,64.4366216190836,85.71053456261693L32.90534820871349,64.80264351087293A122.5,122.5,0,0,1,228.5489747143972,53.41245780854564Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#ff9800" d="M66.93689880580898,87.36842900724861A81.66666666666667,81.66666666666667,0,0,0,65.44216513257356,175.29196248129173" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#ff9800" stroke="#ffffff" d="M64.4366216190836,85.71053456261693A84.66666666666667,84.66666666666667,0,0,0,62.88697936193341,176.86391212346163L34.92189064992728,194.06802765165443A117.5,117.5,0,0,1,37.07247685325579,67.56580091859239Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#009688" d="M65.44216513257356,175.29196248129173A81.66666666666667,81.66666666666667,0,0,0,115.52090387726372,211.80957860615354" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#009688" stroke="#ffffff" d="M62.88697936193341,176.86391212346163A84.66666666666667,84.66666666666667,0,0,0,114.80534524418361,214.72299169780814L106.97395353769576,246.60867942313925A117.5,117.5,0,0,1,34.92189064992728,194.06802765165443Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><path fill="none" stroke="#607d8b" d="M115.52090387726372,211.80957860615354A81.66666666666667,81.66666666666667,0,0,0,134.9743436604178,214.16666263657822" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path><path fill="#607d8b" stroke="#ffffff" d="M114.80534524418361,214.72299169780814A84.66666666666667,84.66666666666667,0,0,0,134.97340118263722,217.1666624885342L134.96308628692765,249.99999420160748A117.5,117.5,0,0,1,106.97395353769576,246.60867942313925Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path><text x="135" y="122.5" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="15px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 15px; font-weight: 800;" font-weight="800" transform="matrix(2.402,0,0,2.402,-190.4257,-183.6569)" stroke-width="0.41632653061224484"><tspan dy="5.5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">Firefox</tspan></text><text x="135" y="142.5" text-anchor="middle" font-family="&quot;Arial&quot;" font-size="14px" stroke="none" fill="#000000" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-family: Arial; font-size: 14px;" transform="matrix(1.7014,0,0,1.7014,-94.5286,-94.3368)" stroke-width="0.5877551020408163"><tspan dy="5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">30%</tspan></text></svg></div>
                    </div>
                </div>
            </div> --}}
            <!-- #END# Browser Usage -->
        </div>
    </div>
@endsection
