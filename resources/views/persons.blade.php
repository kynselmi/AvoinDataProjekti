@extends('tabletemplate')

@section('tableheaders')
    <th>ID</th>
    <th>First Name</th>
    <th>Professional</th>
    <th>Address</th>
    <th>Phone</th>
    <th>Action</th>
@endsection

@section('tablecontents')
    @foreach($persons as $person)
        <tr>
            <td>{{$person->Id}}</td>
            <td><a href="persons/{{$person->Id}}">{{$person->FirstName}} {{$person->LastName}}</td>
            <td>{{$person->IsProfessional}}</td>
            <td>{{$person->Street}} {{$person->StreetNumber}}, {{$person->ZipCode}} {{$person->City}}</td>
            <td>{{$person->PhoneNumber}}</td>
            <td>{!! Form::open(['method' => 'delete', 'route' => ['persons.destroy', $person->Id]]) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}</td>
        </tr>
    @endforeach
@endsection


@section('addcontent')
    <div class="container">
        <div class="row col-lg-6">
            {!! Form::open(['route' => ['persons.store', $person->Id], 'class' => 'form', 'method' => 'post']) !!}

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
                {!! Form::label('Professional') !!}
                {!! Form::checkbox('Professional', 1) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Person', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection