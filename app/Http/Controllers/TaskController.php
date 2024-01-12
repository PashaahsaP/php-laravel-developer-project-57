<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;


class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters(
                [AllowedFilter::exact('status_id'),
                AllowedFilter::exact('author_id'),
                AllowedFilter::exact('executor_id')]
               )
            ->paginate();
        $status= null;
        $author= null;
        $executor = null;
        if(request()->input('filter') !== null)
        {
            $status = request()->input('filter')['status_id'];
            $author = request()->input('filter')['author_id'];
            $executor = request()->input('filter')["executor_id"];
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
                'selectedAuthor' => $author === null ? 'Автор': $author,
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

        $marks = Mark::all()->reduce(function ($acc, $elem) {
            $acc[$elem->id] = $elem->name;
            return $acc;
        }, []);

        return view('Models.tasks.create', compact('task', 'statuses', 'users', 'marks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Task $task)
    {
        $data = $this->validate(
            $request,
            [
                'name' => 'required',
                'status_id' => 'required'
            ]
        );

        $executor =  User::findOrFail($request->input('author_id'));
        $status = TaskStatus::findOrFail($request->input('status_id'));
        $author = User::findOrFail(Auth::id());
        $marks = null;

        if ($request->input('marks') !== null) {
            $marks = Mark::whereIn('id', $request->input('marks'))->get();
            $this->setMarks($marks);
        }

        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->status()->associate($status);
        $task->executor()->associate($executor);
        $task->author()->associate($author);
        $task->save();
        $task->marks()->attach($marks);

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
        $marks = Mark::all()->reduce(function ($acc, $elem) {
            $acc[$elem->id] = $elem->name;
            return $acc;
        }, []);
        $selectedMarks = $task->marks->map(fn ($elem) => $elem['id']);

        return view('Models.tasks.edit', compact('task', 'statuses', 'users', 'marks', 'selectedMarks'));
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
                'status_id' => 'required',
                'author_id' => 'required'
            ]
        );

        $executor =  User::findOrFail($request->input('author_id'));
        $status = TaskStatus::findOrFail($request->input('status_id'));
        $author = User::findOrFail(Auth::id());
        $marks = null;

        if ($request->input('marks') !== null) {
            $marks = Mark::whereIn('id', $request->input('marks'))->get();
            $this->setMarks($marks);
        }

        $task->name = $request->input('name');
        $task->description = $request->input('description');
        $task->status()->associate($status);
        $task->executor()->associate($executor);
        $task->author()->associate($author);
        $task->save();
        $task->marks()->sync($marks);

        flash(__('flash.taskCreated'))->success();
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {


        if (Auth::id() !== $task->author->id) {
            flash(__('flash.taskFailureDeleting'))->error();
            return redirect()->route('tasks.index');
        }

        $mark = $task->marks;
        $task->marks()->detach($mark);
        $task->delete();
        flash(__('flash.taskDeleted'))->success();

        return redirect()->route('tasks.index');
    }


    private function setMarks(&$marks)
    {
        foreach ($marks as $index => $value) {
            $value->color = Mark::getColor($index);
            $value->save();
        }
    }
}




