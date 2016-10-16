@extends('template')

@section('content')
    <div class="container">
        <div class="row col-lg-4">
            <ul>
                <li>ID: {{$bird->Id}}</li>
                <li>Bird name: {{$bird->BirdName}}</li>
                <li>Species: {{$bird->Species}}</li>
            </ul>
        </div>
    </div>
@endsection
@section('addcontent')
    <div class="container">
        <div class="row col-lg-6">
            {!! Form::open(['route' => ['birds.update', $bird->Id], 'class' => 'form', 'method' => 'put']) !!}

            <div class="form-group">
                {!! Form::label('Bird name') !!}
                {!! Form::text('birdname', null, array('required', 'class' => 'form-control', 'placeholder' => "Name of the bird")) !!}
                {!! Form::label('Species') !!}
                {!! Form::text('species', null, ['required', 'class' => 'form-control', 'placeholder' => 'Species of the bird']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection