@if($active_session == true)
    
    @extends('template')


    @section('title')
        {{ Lang::get('about.about')}} - {{env('APP_NAME', 'Tasks Manager')}}
    @stop


    @section('content')
        <div class="row">
            <div class="col-md-12">
                
                <div class="panel panel-default" style="margin: 20px 20px; padding: 30px 30px 30px 30px;">
                    
                    <div class="alert alert-block alert-success fade in">
                        
                        <h2 class="alert-heading"><i class="fa fa-code"></i> {{ Lang::get('about.about')}}</h2>
                        <p>
                            I've coded this app to show it as part of my Developer Portfolio since i want to prove that i know how to code. 
                        </p>
                        <p>
                            This app was made with PHP Frameworl Laravel 5.2
                        </p>
                        <p>
                            Please read the 'readme.md' file included in this repository to know more details about the features in this app.
                        </p>
                        
                        <center>
                            <br>
                            <div class="panel panel-white">
                                <br>
                                <img src="/img/about/moises-armenta.jpg" width="150px" style="border-radius:50%;">
                                <br><br>
                                <table>
                                    <tr>
                                        <td style="font-size:2em;">
                                            <center><b> Moises Armenta</b></center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <center>
                                                <div style="font-size:3em;">
                                                    <a href="http://twitter.com/mowarmenta" target="_blank">
                                                        <i class="fa fa-twitter-square"></i>
                                                    </a>
                                                    <a href="http://www.facebook.com/moises.armenta" target="_blank">
                                                        <i class="fa fa-facebook-square"></i>
                                                    </a>
                                                    <a href="http://www.instagram.com/mowarmenta" target="_blank">
                                                        <i class="fa fa-instagram"></i>
                                                    </a>
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="http://www.instagram.com/mowarmenta" target="_blank">
                                                <center><b>moisesarmenta.xyz</b></center>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <center><b>Cancun, Mexico</b></center>
                                        </td>
                                    </tr>
                                    
                                </table>
                                <br>
                            </div>
                        </center>
                    </div> 
                    <a href="/">
                        <center><i class="fa fa-home"></i><b>&nbsp;&nbsp;{{ Lang::get('about.home')}}</b></center>
                    </a>
                </div>

            </div>
        </div>
    @stop

@else
<!DOCTYPE html>
<!-- Template Name: Rapido - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.0 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
    <!--<![endif]-->
    <!-- start: HEAD -->
    <head>
        <title>{{ Lang::get('about.about')}} - {{env('APP_NAME')}}</title>
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
        <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
            <div class="col-md-12">
                
                <div class="panel panel-default" style="margin: 50px 50px; padding: 30px 30px 30px 30px;">
                    
                    <div class="alert alert-block alert-success fade in">
                        
                        <h2 class="alert-heading"><i class="fa fa-code"></i> {{ Lang::get('about.about')}}</h2>
                        <p>
                            I've coded this app to show it as part of my Developer Portfolio since i want to prove that i know how to code. 
                        </p>
                        <p>
                            This app was made with PHP Frameworl Laravel 5.2
                        </p>
                        <p>
                            Please read the 'readme.md' file included in this repository to know more details about the features in this app.
                        </p>
                        
                        <center>
                            <br>
                            <div class="panel panel-white">
                                <br>
                                <img src="/img/about/moises-armenta.jpg" width="150px" style="border-radius:50%;">
                                <br><br>
                                <table>
                                    <tr>
                                        <td style="font-size:2em;">
                                            <b> Moises Armenta</b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <center>
                                                <div style="font-size:3em;">
                                                    <a href="http://twitter.com/mowarmenta" target="_blank">
                                                        <i class="fa fa-twitter-square"></i>
                                                    </a>
                                                    <a href="http://www.facebook.com/moises.armenta" target="_blank">
                                                        <i class="fa fa-facebook-square"></i>
                                                    </a>
                                                    <a href="http://www.instagram.com/mowarmenta" target="_blank">
                                                        <i class="fa fa-instagram"></i>
                                                    </a>
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="http://www.instagram.com/mowarmenta" target="_blank">
                                                <center><b>moisesarmenta.xyz</b></center>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <center><b>Cancun, Mexico</b></center>
                                        </td>
                                    </tr>
                                    
                                </table>
                                <br>
                            </div>
                        </center>
                    </div> 
                    <a href="/">
                        <center><i class="fa fa-home"></i><b>&nbsp;&nbsp;{{ Lang::get('about.home')}}</b></center>
                    </a>
                </div>

            </div>
        </div>
        <!-- start: MAIN JAVASCRIPTS -->
        <!--[if lt IE 9]>
        <script src="assets/plugins/respond.min.js"></script>
        <script src="assets/plugins/excanvas.min.js"></script>
        <script type="text/javascript" src="assets/plugins/jQuery/jquery-1.11.1.min.js"></script>
        <![endif]-->
        <!--[if gte IE 9]><!-->
        <script src="assets/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="assets/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        
        <style>
            a{
                text-decoration: none !important;
                color: #3c763d !important;
            }
            a:hover{
                /*text-decoration: none !important;*/
                color: #647764 !important;
            }
        </style>
    </body>
    <!-- end: BODY -->
</html>
@endif