<?php

use Illuminate\Support\Facades\Route;
use App\Models\reminders;
use App\Http\Controllers\ReminderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*All reminders*/
Route::get('/', function () {
    return view('my_reminders', [
        'heading' => 'Active Reminders',
        'my_reminders' => reminders::all()
    ]);
});

/*Single reminder*/
Route::get('/my_reminders/{id}', function($id) {
    return view('my_reminder', [
        'my_reminder' => reminders::find($id)
    ]);
});

/*Add Reminder Form*/
Route::get('reminder_create', function() {
    return view('reminder_create');
});

Route::get('addReminderForm', [ReminderController::class, 'index']);
Route::post('saveData', [ReminderController::class, 'insertReminder']);

/*Delete Reminders */
Route::get('delete/{id}', [ReminderController::class, 'delete']);

/*Update Reminders */
Route::get('edit/{id}', [ReminderController::class, 'edit']);
Route::put('update/{id}', [ReminderController::class, 'update']);

/*File Upload */
Route::get('/upload-file', [ReminderController::class, 'createForm']);
Route::post('/upload-file', [ReminderController::class, 'fileUpload'])->name('fileUpload');