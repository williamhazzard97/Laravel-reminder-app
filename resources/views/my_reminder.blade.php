@extends('layout')

@section('content')

<h2>
    {{$my_reminder['title']}}
</h2>
<p>
    {{$my_reminder['description']}}
    <br>
    {{$my_reminder['priority']}}
    <br>
    {{$my_reminder['notify']}}
</p>

@endsection