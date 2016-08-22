
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
	                
	             	<div class="panel panel-white" style="margin: 50px 50px; padding: 30px 30px 30px 30px;">
					<div class="panel-heading">
						<h4 class="panel-title">Whoops! </h4>
						
					</div>
					<div class="panel-body">
						<div class="alert alert-block alert-danger fade in">
							
							<h4 class="alert-heading"><i class="fa fa-warning"></i> {{Lang::get('errors.error')}} {{$error_code}}</h4>
							@if($error_code == 404)
								<p>
									{{Lang::get('errors.explanation-404')}}
								</p>
							@elseif($error_code == 500)
								<p>
									{{Lang::get('errors.explanation-500')}}
								</p>
							@endif
							
							<br>
							<p>
								<a href="/" class="btn btn-red">
									Go to Dashboard
								</a>
								
							</p>
						</div>
						
					</div>
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
	            }
	        </style>
	    </body>
	    <!-- end: BODY -->
	</html>
