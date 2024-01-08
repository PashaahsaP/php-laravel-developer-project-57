<?php

namespace App\Http\Controllers;

use App\Models\TaskStatus;
use Illuminate\Http\Request;

class TaskStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $statuses = TaskStatus::all();

        return view('status.index',compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $taskStatus = new TaskStatus();
        return view('status.create',compact('taskStatus'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskStatus $taskStatus)
    {
        return view('status.edit',compact('taskStatus'));
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
        $taskStatus->delete();
        flash(__('flash.statusDeleted'))->success();

        return redirect()->route('taskStatuses.index');
    }
}
