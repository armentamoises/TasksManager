
	@extends('template')



	@section('title')
		{{env('APP_NAME', 'Tasks Manager')}}
	@stop


	@section('content')

	<div class="row" style="margin-top:50px">
		<div class="col-md-12">
			
			<div class="panel panel-white">
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

					
					@if(env('APP_DEBUG') == true)
						<div class="alert alert-block alert-danger fade in">
							<?php
								echo "<pre>";
									var_dump($e);
								echo "</pre>";
							?>
						</div>
					@endif
						
				</div>
			</div>
			
		</div>
	</div>

	@stop





