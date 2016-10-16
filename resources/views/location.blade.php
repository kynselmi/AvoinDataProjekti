@extends('template')

@section('content')
    <div class="container">
        <div class="row col-lg-4">
            <ul>
                <li>ID: {{$location->Id}}</li>
                <li>Bird name: {{$location->LocationName}}</li>
                <li>Species: {{$location->Description}}</li>
                <li>Coordinates: Lat: {{$location->Lat}}, Lng: {{$location->Lng}}</li>
                <li>Created: {{$location->DateCreated}}</li>
            </ul>
        </div>
    </div>
@endsection

@section('addcontent')
    <div class="container">
        <div class="row col-lg-6">
            {!! Form::open(['route' => ['locations.update', $location->Id], 'class' => 'form', 'method' => 'put']) !!}

            <div class="form-group">
                {!! Form::label('Location Name') !!}
                {!! Form::text('locationname', null, array('required', 'class' => 'form-control', 'placeholder' => "Name of the Location")) !!}
                {!! Form::label('Description') !!}
                {!! Form::text('description', null, ['required', 'class' => 'form-control', 'placeholder' => 'Describe the area, ex: Urban forest']) !!}
                {!! Form::label('Lateral coordinates') !!}
                {!! Form::text('lat', null, ['class' => 'form-control', 'placeholder' => 'Format is xx.xx.xx.x, ex. 60.13.34.4']) !!}
                {!! Form::label('Longitude coordinates') !!}
                {!! Form::text('lng', null, ['class' => 'form-control', 'placeholder' => 'Format is yy.yy.yy.y, ex. 24.49.05.3']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection