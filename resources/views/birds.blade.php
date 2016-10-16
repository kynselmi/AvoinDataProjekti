@extends('tabletemplate')

@section('tableheaders')
    <th>Id</th>
    <th>Name</th>
    <th>Species</th>
    <th>Action</th>
@endsection

@section('tablecontents')
    @foreach($birds as $bird)
        <tr>
            <td>{{$bird->Id}}</td>
            <td><a href="birds/{{ $bird->Id }}">{{ $bird->BirdName }}</a></td>
            <td>{{ $bird->Species }}</td>
            <td>{!! Form::open(['method' => 'delete', 'route' => ['birds.destroy', $bird->Id]]) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}</td>
        </tr>
    @endforeach
@endsection

@section('addcontent')
    <div class="container">
        <div class="row col-lg-6">
            {!! Form::open(['route' => 'birds.store', 'class' => 'form', 'method' => 'post']) !!}

            <div class="form-group">
                {!! Form::label('Bird Name') !!}
                {!! Form::text('birdname', null, array('required', 'class' => 'form-control', 'placeholder' => "Name of the bird")) !!}
                {!! Form::label('Species') !!}
                {!! Form::text('species', null, ['required', 'class' => 'form-control', 'placeholder' => 'Species of the bird']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Bird', ['class' => 'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>
@endsection