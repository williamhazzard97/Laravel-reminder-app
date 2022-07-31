<?php

namespace App\Http\Controllers;

use App\Models\reminders;
use Illuminate\Http\Request;

class ReminderController extends Controller
{
    //
    public function index(){
        return view('addReminderForm');
    }

    public function insertReminder(Request $request){
        $data = new reminders;
        $data->title = $request->title;
        $data->description = $request->description;
        $data->priority = $request->priority;
        $data->notify = $request->notify;

    
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $data->file_path = '/storage/' . $filePath;
        

        $data->save();

        return view('my_reminders', [
            'heading' => 'Active Reminders',
            'my_reminders' => reminders::all()
        ]);

    }

    public function delete($id) {
        $data = reminders::find($id);
        $data->delete();
        return redirect()->back();
        
    }

    public function edit($id) {
        $reminder = reminders::find($id);

        return view('reminder_edit', compact('reminder'));
    }

    public function update(Request $request, $id) {
        $reminder = reminders::find($id);

        $reminder->title = $request->input('title');
        $reminder->description = $request->input('description');
        $reminder->priority = $request->input('priority');
        $reminder->notify = $request->input('notify');

        $reminder->update();

        return redirect('/')->with('status', "Data updated successfully");
    }

    public function createForm(){
        return view('file-upload');
      }
      public function fileUpload(Request $req){
            $req->validate([
            'file' => 'required|mimes:csv,txt,xlx,xls,pdf|max:2048'
            ]);
            $fileModel = new reminders;
            if($req->file()) {
                $fileName = time().'_'.$req->file->getClientOriginalName();
                $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
                $fileModel->file_path = '/storage/' . $filePath;
                $fileModel->save();
                return back()
                ->with('success','File has been uploaded.')
                ->with('file', $fileName);
            }
       }
}
?>