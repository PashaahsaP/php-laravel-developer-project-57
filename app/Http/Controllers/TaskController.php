<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

/**
 * @property string $color
 */
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters(
                [
                    AllowedFilter::exact('status_id'),
                    AllowedFilter::exact('created_by_id'),
                    AllowedFilter::exact('assigned_to_id')
                ]
            )
            ->paginate();
        $status = null;
        $author = null;
        $executor = null;
        if (request()->input('filter') !== null) {
            $status = request()->input('filter')['status_id'];
            $author = request()->input('filter')['created_by_id'];
            $executor = request()->input('filter')["assigned_to_id"];
        }
        $users = User::all()->reduce(function ($acc, $elem) {
            $acc[$elem->id] = $elem->name;
            return $acc;
        }, []);

        return view(
            'Models.tasks.index',
            [
                'tasks' => $tasks,
                'statuses' => TaskStatus::all()->reduce(function ($acc, $elem) {
                    $acc[$elem->id] = $elem->name;
                    return $acc;
                }, []),
                'authors' => $users,
                'executors' => $users,
                'selectedStatus' => $status === null ? 'Статус' : $status,
                'selectedAuthor' => $author === null ? 'Автор' : $author,
                'selectedExecutor' => $executor === null ? 'Исполнитель' : $executor,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $task = new Task();
        $statuses = TaskStatus::all()->reduce(function ($acc, $elem) {
            $acc[$elem->id] = $elem->name;
            return $acc;
        }, []);
        $users = User::all()->reduce(function ($acc, $elem) {
            $acc[$elem->id] = $elem->name;
            return $acc;
        }, []);

        $labels = Label::all()->reduce(function ($acc, $elem) {
            $acc[$elem->id] = $elem->name;
            return $acc;
        }, []);

        return view('Models.tasks.create', compact('task', 'statuses', 'users', 'labels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Task $task)
    {
        $data = $this->validate(
            $request,
            [
                'name' => 'required|unique:tasks',
                'status_id' => 'required'
            ]
        );

        $executor =  User::findOrFail($request->input('assigned_to_id'));
        $status = TaskStatus::findOrFail($request->input('status_id'));
        $author = User::findOrFail(Auth::id());
        $labels = null;

        if ($request->input('labels') !== null) {
            $labels = label::whereIn('id', $request->input('labels'))->get();
            #$this->setlabels($labels);
        }

        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->status()->associate($status);
        $task->executor()->associate($executor);
        $task->author()->associate($author);
        $task->save();
        $task->labels()->attach($labels);

        flash(__('flash.taskCreated'))->success();
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $status = TaskStatus::findOrFail($task->status_id);

        return view('Models.tasks.show', compact('task', 'status'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $statuses = TaskStatus::all()->reduce(function ($acc, $elem) {
            $acc[$elem->id] = $elem->name;
            return $acc;
        }, []);
        $users = User::all()->reduce(function ($acc, $elem) {
            $acc[$elem->id] = $elem->name;
            return $acc;
        }, []);
        $labels = Label::all()->reduce(function ($acc, $elem) {
            $acc[$elem->id] = $elem->name;
            return $acc;
        }, []);
        $selectedlabels = $task->labels()->get()->map(fn ($elem) => $elem['id']);
        return view('Models.tasks.edit', compact('task', 'statuses', 'users', 'labels', 'selectedlabels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $data = $this->validate(
            $request,
            [
                'name' => 'required',
                'status_id' => 'required'

            ]
        );

        $executor =  User::findOrFail($request->input('assigned_to_id'));
        $status = TaskStatus::findOrFail($request->input('status_id'));
        #$author = User::findOrFail(Auth::id());
        $labels = null;

        if ($request->input('labels') !== null) {
            $labels = Label::whereIn('id', $request->input('labels'))->get();
            // $this->setlabels($labels);
        }

        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->status()->associate($status);
        $task->executor()->associate($executor);
        #$task->author()->associate($author);
        $task->save();
        $task->labels()->sync($labels);

        flash(__('flash.taskChanged'))->success();
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if (Auth::id() !== $task->author()->get()[0]->id) {
            flash(__('flash.taskFailureDeleting'))->error();
            return redirect()->route('tasks.index');
        }

        $label = $task->labels()->get();
        $task->labels()->detach($label);
        $task->delete();
        flash(__('flash.taskDeleted'))->success();

        return redirect()->route('tasks.index');
    }

    // private function setlabels(Collection &$labels)
    // {
    //     foreach ($labels as $index => $value) {
    //         $value->get;
    //         $value->save();
    //     }
    // }
}
