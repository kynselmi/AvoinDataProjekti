@extends('template')

@section('content')
    <div class="container">
        <div class="row col-lg-4">
            <ul>
                <li>ID: {{$person->Id}}</li>
                <li>Name: {{$person->FirstName}} {{$person->LastName}}</li>
                <li>Professional: {{$person->IsProfessional}}</li>
                <li>Address: {{$person->Street}} {{$person->StreetNumber}}, {{$person->ZipCode}} {{$person->City}}</li>
                <li>Phone Number: {{$person->PhoneNumber}}</li>
            </ul>
        </div>
    </div>
@endsection

@section('addcontent')
    <script>$(document).ready(function () {
            $('#datatable')
                    .DataTable();
        });
    </script>
    <div class="container">
        <h3>Observations</h3>
        <table  id="datatable" class="display" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Observation ID</th>
                <th>Bird</th>
                <th>Location</th>
                <th>Observation Time</th>
            </tr>
            </thead>
            @foreach($observations as $observation)
                <tr>
                    <td><a href="observations/{{$observation->Id}}">{{$observation->Id}}</a></td>
                    <td><a href="birds/{{$observation->Bird_id}}">{{$observation->BirdName}}</a></td>
                    <td><a href="locations/{{$observation->Location_id}}">{{$observation->LocationName}}</a></td>
                    <td>{{$observation->Observated}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="container">
        <div class="row col-lg-6">
            <h3>Update information</h3>
            {!! Form::open(['route' => ['persons.update', $person->Id], 'class' => 'form', 'method' => 'put']) !!}

            <div class="form-group">
                {!! Form::label('First Name') !!}
                {!! Form::text('firstname', null, array('required', 'class' => 'form-control', 'placeholder' => "Mikko")) !!}
                {!! Form::label('Last Name') !!}
                {!! Form::text('lastname', null, ['required', 'class' => 'form-control', 'placeholder' => 'Mallikas']) !!}
                {!! Form::label('Street') !!}
                {!! Form::text('street', null, ['class' => 'form-control', 'placeholder' => 'Bulevardi']) !!}
                {!! Form::label('Street Number') !!}
                {!! Form::text('streetnumber', null, ['class' => 'form-control', 'placeholder' => '31']) !!}
                {!! Form::label('City') !!}
                {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Helsinki']) !!}
                {!! Form::label('Zip Code') !!}
                {!! Form::text('zipcode', null, ['class' => 'form-control', 'placeholder' => '00100']) !!}
                {!! Form::label('Phone Number') !!}
                {!! Form::text('phonenumber', null, ['class' => 'form-control', 'placeholder' => '0401231234']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection

