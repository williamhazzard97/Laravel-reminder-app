@extends('layout')

@section('content')

<div class="container">
    <h2>Edit Reminder</h2>
    <br>
    <form name="editReminderForm" action="{{ url('update/'.$reminder->id) }}" method="post" id="editReminderForm" action="my_reminders.blade.php">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    @method('PUT')
        <label for="title">Title:</label>
        <input type="text" placeholder="Title..." name="title" value="{{ $reminder->title }}">

        <label for="description">Description:</label>
        <input type="text" placeholder="Decription..." name="description" value="{{ $reminder->description }}">

        <label for="priority">Priority:</label>
        <select name="priority" value="{{ $reminder->priority }}">
            <option value="Low">Low</option>
            <option value="Low">Medium</option>
            <option value="Low">High</option>
        </select>

        <label for="notify">Notify:</label>
        <input type="datetime-local" name="notify" value="{{ $reminder->notify }}">

        <button type="submit" value="Add Reminder" class="btn btn-primary">Update Reminder</button>
    </form>
</div>

@endsection