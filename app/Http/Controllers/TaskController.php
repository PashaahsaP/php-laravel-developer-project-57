<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();

        return view('Models.tasks.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $task = new Task();
        $statuses = TaskStatus::all()->reduce(function($acc,$elem) {
                $acc[$elem->id] = $elem->name;
                return $acc;
            },[]);
        $users = User::all()->reduce(function($acc,$elem) {
            $acc[$elem->id] = $elem->name;
            return $acc;
        },[]);

        return view('Models.tasks.create',compact('task','statuses','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Task $task)
    {
        $data = $this->validate($request,
        [
            'name'=>'required',
            'status_id' =>'required'
        ]);

        $executor =  User::findOrFail($request->input('author_id'));
        $status = TaskStatus::findOrFail($request->input('status_id'));
        $author = User::findOrFail(Auth::id());

        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->status()->associate($status);
        $task->executor()->associate($executor);
        $task->author()->associate($author);

        $task->save();

        flash(__('flash.taskCreated'))->success();
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $status = TaskStatus::findOrFail($task->status_id);

        return view('Models.tasks.show',compact('task','status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $statuses = TaskStatus::all()->reduce(function($acc,$elem) {
            $acc[$elem->id] = $elem->name;
            return $acc;
        },[]);
        $users = User::all()->reduce(function($acc,$elem) {
            $acc[$elem->id] = $elem->name;
            return $acc;
        },[]);

    return view('Models.tasks.edit',compact('task','statuses','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $data = $this->validate($request,
        [
            'name'=>'required',
            'status_id' =>'required',
            'author_id' =>'required',
        ]);

        $executor =  User::findOrFail($request->input('author_id'));
        $status = TaskStatus::findOrFail($request->input('status_id'));
        $author = User::findOrFail(Auth::id());

        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->status()->associate($status);
        $task->executor()->associate($executor);
        $task->author()->associate($author);

        $task->save();

        flash(__('flash.taskChanged'))->success();
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {


        if(Auth::id() !== $task->author->id)
        {
            flash(__('flash.taskFailureDeleting'))->error();
            return redirect()->route('tasks.index');
        }


        $task->delete();
        flash(__('flash.taskDeleted'))->success();

        return redirect()->route('tasks.index');
    }
}
