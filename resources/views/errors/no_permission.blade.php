
@extends('template')



@section('title')
{{$module}} - {{env('APP_NAME', 'Tasks Manager')}}
@stop




@section('content')

<div class="row" style="margin-top:50px">
	<div class="col-md-12">
		
		<div class="panel panel-white">
			<div class="panel-heading">
				<h4 class="panel-title">Permissions </h4>
				
			</div>
			<div class="panel-body">
				<div class="alert alert-block alert-danger fade in">
					
					<h4 class="alert-heading"><i class="fa fa-times"></i> Error!</h4>
					<p>
						It seems like your role doesn't have permission to access to the <b>{{$module}}</b> module.
					</p>
					<p>
						You can request access to a system administrator user.
					</p>
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

@endsection

