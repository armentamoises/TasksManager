@extends('template')

@section('title')
    {{ Lang::get('tasks.tasks')}} - {{env('APP_NAME')}}
@stop


@section('content')

  <!--  <div class="row">
        <iframe src="https://trello.com/b/14GtHUAw.html" frameBorder="0" width="100%" height="600"></iframe>
</div> -->

<div class="row">
        <iframe class="col-lg-12 col-md-12 col-sm-12" width="50%" height="800px" style="border:none;" src="https://trello.com/b/14GtHUAw.html"></iframe>
</div>

@stop



