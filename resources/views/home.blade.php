@extends('template')


@section('title')
Dashboard - {{env('APP_NAME')}}
@stop


@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Dashboard</h1>
            <br><br>
            
            <div class="row">
                <a href="/Users">
                    <div class="col-lg-6 col-md-6 dashboard-element">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ Lang::get('menu.users')}}</div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="/Roles">
                    <div class="col-lg-6 col-md-6 dashboard-element">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ Lang::get('menu.users-roles')}}</div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="row">
                <a href="/Tasks">
                    <div class="col-lg-6 col-md-6 dashboard-element">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ Lang::get('menu.tasks')}}</div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>

                <a href="/Tasks-Types">
                    <div class="col-lg-6 col-md-6 dashboard-element">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ Lang::get('menu.tasks-types')}}</div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="row">
                <a href="/About">
                    <div class="col-lg-6 col-md-6 dashboard-element">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-code fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ Lang::get('menu.about')}}</div>
                                        <div></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

    </div>
</div>
@stop

@section('style')
    <style>
        .huge {
            font-size: 30px !important;
        }
        
    </style>
@stop

@section('script')
    <script src="/js/dashboard.js"></script>
    
@stop

