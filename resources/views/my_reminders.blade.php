
@extends('layout')

@section('content')
<div class="col-12 d-flex justify-content-end">
<a href="reminder_create"><button class="btn btn-primary btn-block mt-4">Add New Reminder</button></a>
</div>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Priority</th>
            <th scope="col">Time</th>
            <th scope="col">Attachment</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
@foreach ($my_reminders as $my_reminder)
<tr>
    <td>
        <h3>
            <a href="/my_reminders/{{$my_reminder['id']}}">{{$my_reminder['title']}}</a>
        </h3>
    </td>
    
    <td>
       {{$my_reminder['description']}} 
    </td>
    <td>
       {{$my_reminder['priority']}} 
    </td>
    <td>
       {{$my_reminder['notify']}} 
    </td>
    <td>
       {{$my_reminder['file_path']}} 
    </td>
    <td>
        <a href="{{url('edit/'.$my_reminder->id)}}"><button class="btn btn-primary ">Edit</button> </a>
        <a href="delete/{{$my_reminder->id}}"><button class="btn btn-primary ">Delete</button> </a>
    </td>
</tr>
@endforeach

@endsection