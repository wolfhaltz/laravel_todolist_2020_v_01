@extends('layouts.app')
@section('page_title', 'Project')

@section('page_content')

    <a href=""
    <button>
        New project!
    </button>
    <table>
        <thead>
            <tr class="table-header">
                <th>Name</th>
            </tr>
        </thead>
        @foreach($projects as $project)
        <tbody>
            <tr class="table-click" onclick="window.location='{{ URL::action('ProjectController@show', $project->id) }}';">
                <td>{{ $project->name }}</td>
            </tr>
        </tbody>
        @endforeach
    </table>
@endsection
