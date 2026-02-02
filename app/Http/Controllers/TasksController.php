<?php

namespace App\Http\Controllers;

use App\Dto\TaskCreateDto;
use App\Dto\TaskUpdateDto;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class TasksController extends Controller
{
    public function __construct(private readonly TaskService $service)
    {
    }

    public function index(): JsonResource
    {
        return TaskResource::collection($this->service->getTasks());
    }

    public function store(StoreTaskRequest $request): JsonResponse
    {
        $this->service->createTask(TaskCreateDto::from($request->validated()));

        return response()->json([], 204);
    }

    public function show(int $taskId): TaskResource
    {
        return new TaskResource($this->service->getTask($taskId));
    }

    public function update(UpdateTaskRequest $request, Task $task): JsonResponse
    {
        $this->service->updateTask(TaskUpdateDto::from($request->validated()));

        return response()->json([], 204);
    }

    public function destroy(int $taskId): JsonResponse
    {
        $this->service->deleteTask($taskId);
        return response()->json([], 204);
    }
}
