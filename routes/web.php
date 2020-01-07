<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// this show all tasks of an logged user:
Route::get('/home', 'HomeController@index')->name('home');

// this route will create a new project:
Route::post('/project', 'ProjectController@store')->name('store.project');

// this route will add a new task:
Route::post('/project/{id}/task', 'TaskController@store')->name('store.task');

// and with this one you'll add a new subtask:
Route::post('/project/task/{id}/subtask', 'SubTaskController@store')->name('store.subtask');

// use to show all the above stuff:
Route::get('/projects', 'ProjectController@index')->name('index.project');
Route::get('/project/{id}', 'ProjectController@show')->name('show.project');
Route::get('/project/task/{id}', 'TaskController@show')->name('show.task');
Route::get('/project/task/subtask/{id}', 'TaskController@show')->name('show.subtask');

// this route will delete the project and all tasks and subtasks:
Route::get('/project/delete/{id}', 'ProjectController@destroy')->name('destroy.project');

// this route will delete the task and all the subtasks:
Route::get('/project/task/delete/{id}', 'TaskController@destroy')->name('destroy.task');

// this route only will delete the subtask:
Route::get('/project/task/subtask/delete/{id}', 'SubTaskController@destroy')->name('destroy.subtask');

/**
            .------.____
         .-'       \ ___)  ENJOY :D
      .-'         \\\
   .-'        ___  \\)
.-'          /  (\  |)
         __  \  ( | |
        /  \  \__'| |
       /    \____).-'
     .'       /   |
    /     .  /    |
  .'     / \/     |
 /      /   \     |
       /    /    _|_
       \   /    /\ /\
        \ /    /__v__\
         '    |       |
              |     .#|
              |#.  .##|
              |#######|
              |#######|

**/
