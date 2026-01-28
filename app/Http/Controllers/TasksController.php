<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TasksController extends Controller
{
    public function index(): JsonResource
    {
        $tasks = Task::all();
        return TaskResource::collection($tasks);
    }

    public function create()
    {
        //
    }

    public function store(StoreTaskRequest $request): JsonResponse
    {
        $task = $request->validated();

        Task::create($task);

        return response()->json([], 204);
    }

    public function show(Task $task): JsonResource
    {
        return new TaskResource($task);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(UpdateTaskRequest $request, Task $task): JsonResponse
    {
        $task->update($request->validated());

        return response()->json([], 204);
    }

    public function destroy(Task $task): JsonResponse
    {
        $task->delete();
        return response()->json([], 204);
    }
}
