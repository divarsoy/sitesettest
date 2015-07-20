@extends('layouts.master')

@section('title', 'Create')

@section('content')
    <h1>Create a page</h1>


{!! Form::open(array('url' => 'page/store')) !!}
    <!-- if there are creation errors, they will show here -->
    {!! Html::ul($errors->all()) !!}
<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', Input::old('title'), array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('content', 'Content') !!}
    {!! Form::textarea('content', Input::old('content'), array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('client_id', 'Client') !!}
    {!! Form::select('client_id', [''=>''] +  $clients->all(), Input::old('client_id'), array('class' => 'form-control')) !!}
</div>

<div class="form-group">
    {!! Form::label('site_id', 'Site') !!}
    {!! Form::select('site_id', [''=>''] +  $sites->all(), Input::old('site_id'), array('class' => 'form-control')) !!}
</div>


{!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}

{!! Form::close() !!}
@endsection
