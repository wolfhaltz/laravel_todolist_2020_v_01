<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::all();
        return view ('project.index', compact('projects'));
    }

    public function create()
    {

    }


    public function store(Request $request)
    {
        $new_project = new Project();
        $new_project->name          = $request->name;
        $new_project->description   = $request->description;
        $new_project->marker_color  = $request->marker_color;

        if($request->favorite == null)
            { $new_project->favorite = 'NO'; }
        else {
            $new_project->favorite = $request->favorite;
        }

        $new_project->save();

        return redirect()->back()->with('success', 'Your new amazing project was created!');

    }

    public function show($id)
    {
        $project = Project::where('id', $id)->first();
        $tasks = Task::where('project_id', $project->id)->get();

        return view ('project.show', compact('project', 'tasks'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    /**
        SUMMON THE DOWN BELLOW FUNCTION TO DESTROY EVERYTHING!
                                ______
                           .d$$$******$$$$c.
                        .d$P"            "$$c
                       $$$$$.           .$$$*$.
                     .$$ 4$L*$$.     .$$Pd$  '$b
                     $F   *$. "$$e.e$$" 4$F   ^$b
                    d$     $$   z$$$e   $$     '$.
                    $P     `$L$$P` `"$$d$"      $$
                    $$     e$$F       4$$b.     $$
                    $b  .$$" $$      .$$ "4$b.  $$
                    $$e$P"    $b     d$`    "$$c$F
                    '$P$$$$$$$$$$$$$$$$$$$$$$$$$$
                     "$c.      4$.  $$       .$$
                      ^$$.      $$ d$"      d$P
                        "$$c.   `$b$F    .d$P"
                          `4$$$c.$$$..e$$P"
                              `^^^^^^^`

     */
    public function destroy($id)
    {
        $project = Project::where('id', $id)->first();

        $project->delete();

        return redirect()->back()->with('success', 'Your project was deleted!');
    }

}
