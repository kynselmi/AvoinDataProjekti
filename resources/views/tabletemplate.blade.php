@extends('template')

@section('content')
<script>$(document).ready(function () {
        $('#datatable')
                .DataTable();
    });
</script>
<table id="datatable" class="display" cellspacing="0" width="100%">
    <thead>
    <tr>
        @yield('tableheaders')
    </tr>
    </thead>
    <tbody>
        @yield('tablecontents')
    </tbody>
</table>
@endsection