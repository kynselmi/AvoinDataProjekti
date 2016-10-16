@extends('tabletemplate')

@section('tableheaders')
    <th>Id</th>
    <th>Bird</th>
    <th>Location</th>
    <th>Observator</th>
    <th>Time of observation</th>
@endsection


@section('tablecontents')

    @foreach($observations as $observation)
        <tr>
            <td><a href="observations/{{$observation->Id}}">{{$observation->Id}}</a></td>
            <td><a href="birds/{{$observation->Bird_id}}">{{$observation->BirdName}}</a></td>
            <td><a href="locations/{{$observation->Location_id}}">{{$observation->LocationName}}</a></td>
            <td><a href="persons/{{$observation->Person_id}}">{{$observation->FirstName.' '.$observation->LastName}}</a>
            </td>
            <td>{{$observation->Observated}}</td>
        </tr>
    @endforeach
@endsection

@section('addcontent')
    <div class="container">
        <div class="row col-lg-6">
            {!! Form::open(['route' => ['observations.store', $observation->Id], 'class' => 'form', 'method' => 'post']) !!}

            <div class="form-group">
                {!! Form::label('Choose Bird') !!}
                {!! Form::select('bird_id', $birds, null, ['class' => 'form-control']) !!}
                {!! Form::label('Choose Location') !!}
                {!! Form::select('location_id', $locations, null, ['class' => 'form-control']) !!}
                {!! Form::label('Choose Person') !!}
                {!! Form::select('person_id', $persons, null, ['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Observation', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection