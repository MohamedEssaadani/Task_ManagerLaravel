<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\task;
class TaskController extends Controller
{
    //insert new task
    function post(Request $request)
    {
      $newTask  = new task();
      $newTask->title   = $request->input('title');
      $newTask->status  = $request->input('status');
      $newTask->date    = $request->input('date');

      $newTask->save();

      return $newTask;
    }

    //get all tasks
    function get()
    {
      $tasks = task::all();

      return response()->json($tasks);
    }

    function delete(Request $request)
    {
      $id = $request->input('id');
      $task = task::destroy($id);

      //$response = array('id'=>$id);
      return response()->json(null, 204);
    }

    function getTask(Request $request)
    {
      $id = $request->input('id');
      $task = task::find($id);

      return response()->json($task);
    }
}
