<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\SubTask;

class SubTaskController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    /**
          _      _      _
        >(.)__ <(.)__ =(.)__
         (___/  (___/  (___/

     */
    public function store(Request $request, $id)
    {
        $task = Task::where('id', $id)->first();

        $new_subtask               = new SubTask();
        $new_subtask->title        = $request->title;
        $new_subtask->description  = $request->description;
        $new_subtask->tags         = $request->tags;
        $new_subtask->remember_at  = $request->remember_at;
        $new_subtask->task_id      = $task->id;

        $new_subtask->save();

        return redirect()->back()->with('success', 'Your task was saved!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $subtask = SubTask::where('id', $id)->first();

        $subtask->delete();

        return redirect()->back()->with('success', 'Your subtask was deleted!');
    }
}
