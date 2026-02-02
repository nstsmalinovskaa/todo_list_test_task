<?php

namespace App\Services;

use App\Dto\TaskCreateDto;
use App\Dto\TaskData;
use App\Dto\TaskUpdateDto;
use App\Models\Task;

class TaskService
{
    /**
     * @return TaskData[]
     */
    public function getTasks(): array
    {
        $tasks = Task::all();
        foreach ($tasks as $task) {
            $result[] = TaskData::from($task);
        }
        return $result ?? [];
    }
    public function getTask(int $taskId): TaskData
    {
        return TaskData::from(Task::findOrFail($taskId));
    }

    public function createTask(TaskCreateDto $createDto): void
    {
        Task::create($createDto->toArray());
    }

    public function updateTask(TaskUpdateDto $updateDto): void
    {
        /** @var Task $task */
        $task = Task::findOrFail($updateDto->id);
        $data = array_filter($updateDto->toArray(), fn($v) => $v !== null );
        $task->update($data);
    }

    public function deleteTask(int $taskId): void
    {
        $task = Task::findOrFail($taskId);
        $task->delete();
    }
}
