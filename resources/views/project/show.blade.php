@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    Tasks of project <strong>{{ $project->name }}</strong>
                    <a href="{{ URL::action('HomeController@index') }}" class="font_indie_flower color_darkred font-weight-bold" style="margin-left: 50%;">...back to home!</a>


                </div>

                <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Marker</th>
                                    <th>Project</th>
                                    <th>Description</th>
                                    <th>Favorite?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span style="color: {{ $project->marker_color }};">&hearts; &hearts; &hearts;</span></td>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->favorite }}</td>
                                </tr>
                            </tbody>
                        </table>

                    @if( $tasks->isEmpty() )
                        <h6> The project <strong>{{ $project->name }}</strong> doesn't have a task yet! Wanna add?</h6>
                        <form method="POST" action="{{ URL::action('TaskController@store', $project->id) }}">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <label for="title">The title's task':</label>
                                    <input type="text" name="title" placeholder="Title" class="form-control" />
                                </div>
                                <div class="col">
                                    <label for="description">Description:</label>
                                    <input type="text" name="description" placeholder="Description" class="form-control" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="tags">Description:</label>
                                    <input type="text" name="tags" placeholder="tags" class="form-control" />
                                </div>
                                <div class="col">
                                    <label for="remember_at">Description:</label>
                                    <input type="date" name="remember_at" placeholder="remember_at" class="form-control" />
                                </div>
                            </div>

                            <button type="submit" class="btn default-btn col-md-12 m-2">Save the task!</button>
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
                            <button class="btn btn-primary default-btn col-md-12" onclick="openSubTaskModal();" id="btnToOpenSubTaskModal">
                                Create subtask to the task <br><strong>{{ $task->title }}</strong> !
                            </button>

                            <div id="createSubTaskModal" class="modal">
                                <div class="modal-content col-md-6">
                                    <span class="close">&times;</span>
                                    <p>Creating a subtask to the project <strong>{{ $project->name }}</strong></p>
                                    <form method="POST" action="{{ URL::action('SubTaskController@store', $task->id) }}">
                                        @csrf

                                        <div class="row">
                                            <div class="col">
                                                <label for="title">Subtask's name:</label>
                                                <input type="text" class="form-control" name="title" placeholder="Title" />
                                            </div>
                                            <div class="col">
                                                <label for="description">Subtask's description:</label>
                                                <input type="text" class="form-control" name="description" placeholder="Description" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="tags">Subtask's tags:</label>
                                                <input type="text" class="form-control" name="tags" placeholder="tags" />
                                            </div>
                                            <div class="col">
                                                <label for="remember_at">Subtask's remember:</label>
                                                <input type="date" class="form-control" name="remember_at" placeholder="remember_at" />
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn default-btn col-md-12 mt-3">Save the subtask!</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <script>
                            function openSubTaskModal()
                            {

                                // Get the modal
                                var modal = document.getElementById("createSubTaskModal");

                                // Get the button that opens the modal
                                var btn = document.getElementById("btnToOpenSubTaskModal");

                                // Get the <span> element that closes the modal
                                var span = document.getElementsByClassName("close")[0];

                                // When the user clicks on the button, open the modal
                                btn.onclick = function() {
                                  modal.style.display = "block";
                                }

                                // When the user clicks on <span> (x), close the modal
                                span.onclick = function() {
                                  modal.style.display = "none";
                                }

                                // When the user clicks anywhere outside of the modal, close it
                                window.onclick = function(event) {
                                  if (event.target == modal) {
                                    modal.style.display = "none";
                                  }
                                }
                            }
                        </script>

                        @endforeach

                        <div class="col-md-12 mt-5 mb-5">
                            <h6>Wanna add more tasks for the project <strong>{{ $project->name }}</strong>?</h6>
                            <button class="btn btn-primary default-btn col-md-12" onclick="openTaskModal();" id="btnToOpenTaskModal">
                                Create new task to the project <br><strong>{{ $project->name }}</strong> !
                            </button>


                            <div id="createTaskModal" class="modal">
                                <div class="modal-content col-md-6">
                                    <span class="close">&times;</span>
                                    <p>Creating a task to the project <strong>{{ $project->name }}</strong></p>
                                    <form method="POST" action="{{ URL::action('TaskController@store', $project->id) }}">
                                        @csrf

                                    <div class="row">
                                        <div class="col">
                                            <label for="title">Task's name:</label>
                                            <input type="text" class="form-control" name="title" placeholder="Title" />
                                        </div>
                                        <div class="col">
                                            <label for="description">Task's description:</label>
                                            <input type="text" class="form-control" name="description" placeholder="Description" />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label for="tags">Task's tags:</label>
                                            <input type="text" class="form-control" name="tags" placeholder="tags" />
                                        </div>
                                        <div class="col">
                                            <label for="remember_at">Task's remember:</label>
                                            <input type="date" class="form-control" name="remember_at" placeholder="remember_at" />
                                        </div>
                                    </div>

                                        <div>
                                            <button type="submit" class="btn default-btn col-md-12 mt-3">Save the task!</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <script>
                                function openTaskModal()
                                {

                                    // Get the modal
                                    var modal = document.getElementById("createTaskModal");

                                    // Get the button that opens the modal
                                    var btn = document.getElementById("btnToOpenTaskModal");

                                    // Get the <span> element that closes the modal
                                    var span = document.getElementsByClassName("close")[0];

                                    // When the user clicks on the button, open the modal
                                    btn.onclick = function() {
                                      modal.style.display = "block";
                                    }

                                    // When the user clicks on <span> (x), close the modal
                                    span.onclick = function() {
                                      modal.style.display = "none";
                                    }

                                    // When the user clicks anywhere outside of the modal, close it
                                    window.onclick = function(event) {
                                      if (event.target == modal) {
                                        modal.style.display = "none";
                                      }
                                    }
                                }
                            </script>

                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
