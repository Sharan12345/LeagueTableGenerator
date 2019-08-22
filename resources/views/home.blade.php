@extends('layouts.landing') 
@section('content')
<div class="container row main p-0">
    @php
    $char = 65;
    @endphp
    @foreach( $table as $group_key=>$group_value)
    <div class="card col-md-3 m-4 p-0">
        <div class="card-header">
            Group {{ chr($char++) }}
        </div>
        <div class="card-body cardBody">
        <ul style="list-style-type:none;">
            @foreach( $group_value as $club) 
                <li class="m-2">
                <span class="mr-3"><img src="{{ asset('images/'.$club->club_name.'.png') }}" alt="Logo" height="48" width="48"/></span>
                <span>{{ $club->club_name }}</span>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
    @endforeach
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
@endsection