@extends('layout')

@section('content')

<div class="container">
    <h2>Add New Reminder</h2>
    <br>
    <form name="addReminderForm" action="{{url('saveData')}}" method="post" id="addReminderForm" action="my_reminders.blade.php" enctype="multipart/form-data">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"><input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
        <label for="title">Title:</label>
        <input type="text" placeholder="Title..." name="title">

        <label for="description">Description:</label>
        <input type="text" placeholder="Decription..." name="description">

        <label for="priority">Priority:</label>
        <select name="priority">
            <option value="Low">Low</option>
            <option value="Low">Medium</option>
            <option value="Low">High</option>
        </select>

        <label for="notify">Notify:</label>
        <input type="datetime-local" name="notify">

        <input type="file" name="file" id="chooseFile">
        <label  for="chooseFile">Select file</label>

        <button type="submit" value="Add Reminder" class="btn btn-primary">Save New Reminder</button>
    </form>
</div>

@endsection