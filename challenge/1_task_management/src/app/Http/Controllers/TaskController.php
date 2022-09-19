<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $tasks = Task::orderBy('is_completed')
            ->orderBy('id')
            ->get();

        return view('task.index')->with(compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        DB::transaction(fn() => Task::create($request->validated()));

        return to_route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Task $task
     * @return View
     */
    public function show(Task $task): View
    {
        return view('task.show')->with(compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Task $task
     * @return View
     */
    public function edit(Task $task): View
    {
        return view('task.edit')->with(compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Task $task): RedirectResponse
    {
        DB::transaction(fn() => $task->update($request->validated()));

        return to_route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Task $task): RedirectResponse
    {
        DB::transaction(fn() => $task->delete());

        return to_route('tasks.index');
    }

    /**
     * @param Task $task
     * @return RedirectResponse
     */
    public function complete(Task $task): RedirectResponse
    {
        DB::transaction(fn() => $task->update(['is_completed' => true]));

        return to_route('tasks.index');
    }

    /**
     * @param Task $task
     * @return RedirectResponse
     */
    public function yetComplete(Task $task): RedirectResponse
    {
        DB::transaction(fn() => $task->update(['is_completed' => false]));

        return to_route('tasks.index');
    }
}
