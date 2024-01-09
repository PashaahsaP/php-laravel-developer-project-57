<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = TaskStatus::all();

        return view('Models.status.index',compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $taskStatus = new TaskStatus();
        return view('Models.status.create',compact('taskStatus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, TaskStatus $taskStatus)
    {
        $data = $this->validate($request,
        [
            'name'=>'required'
        ]);

        flash(__('flash.statusCreated'))->success();
        $taskStatus->fill($data);
        $taskStatus->save();

        return redirect()->route('taskStatuses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TaskStatus $taskStatus)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskStatus $taskStatus)
    {
        return view('Models.status.edit',compact('taskStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskStatus $taskStatus)
    {
        $data = $this->validate($request,
        [
            'name'=>'required'
        ]);
        dump($data);
        $taskStatus->fill($data);
        $taskStatus->save();
        flash(__('flash.statusChanged'))->success();
        return redirect()->route('taskStatuses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskStatus $taskStatus)
    {
        $tasksCount = Task::where('status_id','=',"{$taskStatus->id}")->count();

        if($tasksCount !== 0)
        {
            flash(__('flash.statusFailureDeleting'))->error();
            return redirect()->route('taskStatuses.index');
        }

        $taskStatus->delete();
        flash(__('flash.statusDeleted'))->success();

        return redirect()->route('taskStatuses.index');
    }
}
