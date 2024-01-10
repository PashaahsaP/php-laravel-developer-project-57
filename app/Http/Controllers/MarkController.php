<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marks = Mark::all();

        return view('Models.marks.index',compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mark = new Mark();

        return view('Models.marks.create',compact('mark'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Mark $mark)
    {
        flash(__('flash.somethid wrong'))->error();
        $data = $this->validate($request,[
            'name'=>'required',
        ]);
        flash(__('flash.markCreated'))->success();

        $mark->fill($data);
        $mark->description = $request->input('description');
        $mark->save();

        return redirect()->route('marks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mark $mark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mark $mark)
    {
        return view('Models.marks.edit', compact('mark'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mark $mark)
    {
        flash(__('flash.somethid wrong'))->error();
        $data = $this->validate($request,[
            'name'=>'required',
        ]);
        flash(__('flash.markEdited'))->success();

        $mark->fill($data);
        $mark->description = $request->input('description');
        $mark->save();

        return redirect()->route('marks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mark $mark)
    {
        $tasks = $mark->tasks->all();

        if(count($tasks) !== 0){
            flash(__("flash.can'tRemovedMark"))->error();
            return redirect()->route('marks.index');
        }

        $mark->delete();
        flash(__("flash.markRemoved"))->success();
        return redirect()->route('marks.index');
    }
}
