<?php

namespace App\Services;

use App\Models\Task;

class TaskService
{
    public function getAll()
    {
        return Task::where('user_id', auth()->id())->paginate();
    }

    public function createTask(array $data, int $id)
    {
        $data['user_id'] = $id;
        $task = Task::create($data);
        return $task;
    }

    public function getTask(int $id_task, int $id_user)
    {
        $task = Task::query()
            ->where('id', $id_task)
            ->where('user_id', $id_user)
            ->first();

        return $task;
    }

    public function updateTask(int $id_task, int $id_user, array $data)
    {
        $task = Task::query()
            ->where('id', $id_task)
            ->where('user_id', $id_user)
            ->update($data);
        return $task;
    }

    public function deleteTask(int $id_task, int $id_user)
    {
        $task = Task::query()
            ->where('id', $id_task)
            ->where('user_id', $id_user)
            ->delete();
        return $task;
    }
}
