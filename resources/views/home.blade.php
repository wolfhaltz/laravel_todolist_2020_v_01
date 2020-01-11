@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>You are logged in <strong>{{ Auth::user()->name }}</strong>!</p>

                    @if( $projects->isEmpty() )
                        <p>Let's create a project to change the world! \o/</p>

                        <form method="POST" action="{{ URL::action('ProjectController@store') }}" class="m-5">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <label for="name">Give it a name:</label>
                                    <input type="text" name="name" placeholder="Type something amazing!" class="form-control" />
                                </div>
                                <div class="col">
                                    <label for="description">Description:</label>
                                    <input type="text" name="description" placeholder="Tell me more about your project ;) " class="form-control" />
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="marker_color">Choose a color:</label>
                                <input type="color" name="marker_color" class="form-control" />
                            </div>

                            <div class="form-group form-check">
                                <input type="checkbox" name="favorite" class="form-check-input" value="YES">
                                <label class="form-check-label" for="favorite">Is it something really special?</label>
                            </div>

                            <button type="submit" class="btn default-btn col-md-12">Save project</button>
                        </form>
                    @else
                        <p>Here's all your projects:</p>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Project</th>
                                    <th>Description</th>
                                    <th>Destroy</th>
                                </tr>
                            </thead>
                            @foreach($projects as $project)
                            <tbody>
                                <tr onclick="window.location='{{ URL::action('ProjectController@show', $project->id) }}';">
                                    <td>{{ $project->name }}</td>
                                    <td>- {{ $project->description }}</td>
                                    <td>
                                        <a href="{{ url("/project/delete/{$project->id}") }}">
                                            <button type="button" class="btn btn-xs btn-danger">
                                                Destroy Project!
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    @endif

                    <p>Wanna create more projects?</p>
                    <button class="btn btn-primary default-btn col-md-12" onclick="openModal();" id="btnToOpenModal">
                        Create new project!
                    </button>

                    <div id="createProjectModal" class="modal">
                        <div class="modal-content col-md-6">
                            <span class="close">&times;</span>
                            <p>Creating a legen...(WAIT FOR IT!)...dary project!</p>

                            <form method="POST" action="{{ URL::action('ProjectController@store') }}" class="m-5">
                                @csrf

                                <div class="row">
                                    <div class="col">
                                        <label for="name">Give it a name:</label>
                                        <input type="text" name="name" placeholder="Type something amazing!" class="form-control" />
                                    </div>
                                    <div class="col">
                                        <label for="description">Description:</label>
                                        <input type="text" name="description" placeholder="Tell me more about your project ;) " class="form-control" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="marker_color">Choose a color:</label>
                                    <input type="color" name="marker_color" class="form-control" />
                                </div>

                                <div class="form-group form-check">
                                    <input type="checkbox" name="favorite" class="form-check-input" value="YES">
                                    <label class="form-check-label" for="favorite">Is it something really special?</label>
                                </div>

                                <button type="submit" class="btn default-btn col-md-12">Save project!</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')

    <script>
        function openModal() {
            // Get the modal
            var modal = document.getElementById("createProjectModal");

            // Get the button that opens the modal
            var btn = document.getElementById("btnToOpenModal");

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
@stop
