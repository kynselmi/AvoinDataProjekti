@section('information')
    <ul>
    @foreach($itemproperties as $property)
        <li>{{key($property)}}: {{$property}}</li>
    @endforeach
    </ul>
@endsection