<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labels = Label::paginate();

        return view('Models.labels.index', compact('labels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $label = new Label();

        return view('Models.labels.create', compact('label'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Label $label)
    {
        flash(__('flash.somethid wrong'))->error();
        $data = $this->validate($request, [
            'name' => 'required|unique:labels',
        ]);
        flash(__('flash.labelCreated'))->success();

        $label->fill($data);
        $label->description = $request->input('description');
        $label->save();

        return redirect()->route('labels.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Label $label)
    {
        return view('Models.labels.edit', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Label $label)
    {
        flash(__('flash.somethid wrong'))->error();
        $data = $this->validate($request, [
            'name' => 'required',
        ]);
        flash(__('flash.labelEdited'))->success();

        $label->fill($data);
        $label->description = $request->input('description');
        $label->save();

        return redirect()->route('labels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Label $label)
    {
        $tasks = $label->tasks()->get();

        if (count($tasks) !== 0) {
            flash(__("flash.can'tRemovedLabel"))->error();
            return redirect()->route('labels.index');
        }

        $label->delete();
        flash(__("flash.labelRemoved"))->success();
        return redirect()->route('labels.index');
    }
}
