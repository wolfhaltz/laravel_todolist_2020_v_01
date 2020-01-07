@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <a href="{{ URL::action('HomeController@index') }}">Back to home</a>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Project</th>
                                    <th>Description</th>
                                    <th>Marker</th>
                                    <th>Favorite?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td style="background-color: {{ $project->marker_color }}"></td>
                                    <td>{{ $project->favorite }}</td>
                                </tr>
                            </tbody>
                        </table>

                    @if( $tasks->isEmpty() )
                        <h6> The project <strong>{{ $project->name }}</strong> doesn't have a task yet! Wanna add?</h6>
                        <form method="POST" action="{{ URL::action('TaskController@store', $project->id) }}">
                            @csrf

                            <input type="text" name="title" placeholder="Title" />
                            <input type="text" name="description" placeholder="Description" />
                            <input type="text" name="tags" placeholder="tags" />
                            <input type="text" name="remember_at" placeholder="remember_at" />

                            <button type="submit" class="btn btn-primary col-md-12">Save the task!</button>
                        </form>


                    @else
                        <div class="col-md-12 mt-5 mb-5">
                            <h6>Here are the tasks!</h6>
                            @foreach($tasks as $task)
                            <p>Task:<br>
                                <strong>{{ $task->title }}</strong>
                                <a href="{{ url("/project/task/delete/{$task->id}") }}">
                                    <button type="button" class="btn btn-xs btn-danger">
                                        Destroy Task!
                                    </button>
                                </a>
                            </p>

                            @foreach(App\Models\SubTask::where('task_id', $task->id)->get() as $subtask)
                            <p class="ml-3">
                                SubTasks:<br>
                                {{ $subtask->title }}
                                <a href="{{ url("/project/task/subtask/delete/{$subtask->id}") }}">
                                    <button type="button" class="btn btn-xs btn-danger">
                                        Destroy SubTask!
                                    </button>
                                </a>
                            </p>
                            @endforeach

                            <h6>Wanna add a subtask to this task?</h6>
                            <form method="POST" action="{{ URL::action('SubTaskController@store', $task->id) }}">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" name="title" placeholder="Title" />
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="description" placeholder="Description" />
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" name="tags" placeholder="tags" />
                                    </div>
                                    <div class="col">
                                        <input type="date" class="form-control" name="remember_at" placeholder="remember_at" />
                                    </div>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary col-md-12 mt-3">Save the subtask!</button>
                                </div>
                            </form>
                        </div>

                        @endforeach

                        <div class="col-md-12 mt-5 mb-5">
                            <h6>Wanna add more tasks for the project <strong>{{ $project->name }}</strong>?</h6>
                            <form method="POST" action="{{ URL::action('TaskController@store', $project->id) }}">
                                @csrf

                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" name="title" placeholder="Title" />
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="description" placeholder="Description" />
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="tags" placeholder="tags" />
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" name="remember_at" placeholder="remember_at" />
                                </div>
                            </div>

                                <div>
                                    <button type="submit" class="btn btn-primary col-md-12 mt-3">Save the task!</button>
                                </div>
                            </form>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
