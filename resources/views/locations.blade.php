@extends('tabletemplate')

@section('tableheaders')
    <th>Name</th>
    <th>Coordinates</th>
    <th>Description</th>
    <th>Created</th>
    <th>Action</th>
@endsection

@section('tablecontents')
    @foreach($locations as $location)
        <tr>
            <td> <a href="locations/{{$location->LocationName}}">{{$location->LocationName}}</a></td>
            <td>{{"Lng: ".$location->Lng." Lat: ".$location->Lat}}</td>
            <td>{{$location->Description}}</td>
            <td>{{$location->DateCreated}}</td>
            <td>{!! Form::open(['method' => 'delete', 'route' => ['locations.destroy', $location->Id]]) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}</td>
        </tr>
    @endforeach
@endsection


@section('addcontent')
    <div class="container">
        <div class="row col-lg-6">
            {!! Form::open(['route' => ['locations.update', $location->Id], 'class' => 'form', 'method' => 'post']) !!}

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
                {!! Form::submit('Add Location', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection