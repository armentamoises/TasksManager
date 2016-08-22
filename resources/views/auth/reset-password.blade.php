<!DOCTYPE html>
<!-- Template Name: Rapido - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>{{env('APP_NAME')}}</title>
        <!-- start: META -->
        <meta charset="utf-8" />
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- end: META -->
        <!-- start: MAIN CSS -->
        <!-- Bootstrap Core CSS -->
        <link href="/assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,200,100,800' rel='stylesheet' type='text/css'>
        <!--[if IE 7]>
        <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
        <![endif]-->
        <!-- end: MAIN CSS -->
        <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
        <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    </head>
    <!-- end: HEAD -->
    <!-- start: BODY -->
    <body class="login">
        <div class="row">
            <div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="logo">
                    <br><br>
                    <center>    
                        <!-- <img src="/images/logo.png"> -->
                        <h2><i class="fa fa-envelope fa" style="font-size: 1em;"></i> {{env('APP_NAME')}}</h2>
                    </center> 
                </div>
                <!-- start: LOGIN BOX -->
                <div class="panel panel-default" style="margin-top:50px; padding: 30px 30px 30px 30px;">
                    <ul class="nav navbar-top-links navbar-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-globe"></i>  <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                        <li>
                                            <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                    <br>
                    <h3>{{Lang::get('login.set-password')}}</h3>

                    <form id="form-new-password" role="form" action="{{ url('/Update-User-Password') }}" method="post">

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <p>{{Lang::get('login.msg-set-password')}}</p>
                        <br>
                        <fieldset>
                            <div class="form-group">
                                <label><i class="fa fa-lock"></i> {{Lang::get('login.new-password')}}</label>
                                <input type="password" class="form-control"  id="password" name="password">
                            </div>

                            <div class="form-group">
                                <label><i class="fa fa-lock"></i> {{Lang::get('login.confirm-password')}}</label>
                                <input type="password" class="form-control password"  name="password_confirmation">
                            </div>
                            
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary pull-right">
                                    {{Lang::get('login.save-password')}}
                                </button>
                            </div>
                        </fieldset>
                    </form>
                    <br><br>
                    <!-- start: COPYRIGHT -->
                    <center>
                        <div class="copyright">
                            <?php echo date('Y');?> &copy; {{env('APP_DEVELOPER')}}
                        </div>
                    </center>
                    <!-- end: COPYRIGHT -->

                </div>
                <!-- end: LOGIN BOX -->

            </div>
        </div>
        <!-- start: MAIN JAVASCRIPTS -->
        <!--[if lt IE 9]>
        <script src="assets/plugins/respond.min.js"></script>
        <script src="assets/plugins/excanvas.min.js"></script>
        <script type="text/javascript" src="assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
        <![endif]-->
        <!--[if gte IE 9]><!-->
        <script src="/assets/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="/assets/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        

        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        
        <script type="text/javascript" src="/assets/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="/js/login.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->

    </body>
    <!-- end: BODY -->
</html>