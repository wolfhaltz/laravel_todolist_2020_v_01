<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class TaskController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request, $id)
    {
        $project = Project::where('id', $id)->first();

        $new_task               = new Task();
        $new_task->title        = $request->title;
        $new_task->description  = $request->description;
        $new_task->tags         = $request->tags;
        $new_task->remember_at  = $request->remember_at;
        $new_task->project_id   = $project->id;

        $new_task->save();

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

    /**
                _   _
               (.)_(.)
            _ (   _   ) _
           / \/`-----'\/ \
         __\ ( (     ) ) /__
         )   /\ \._./ /\   (
          )_/ /|\   /|\ \_(

     */

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $task = Task::where('id', $id)->first();


        $task->delete();

        return redirect()->back()->with('success', 'Your task was deleted!');
    }
}
