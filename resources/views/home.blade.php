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

                            <button type="submit" class="btn btn-primary col-md-12">Save project</button>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
