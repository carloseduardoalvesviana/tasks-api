<?php

namespace App\Http\Controllers\Api;

use App\Services\TaskService;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function __construct(
        protected TaskService $taskService
    ) {
    }

    public function index()
    {
        $tasks = $this->taskService->getAll();
        return response()->json($tasks, 200);
    }

    public function store(CreateTaskRequest $request)
    {
        $task = $this->taskService->createTask($request->all(), auth()->id());
        return response()->json($task, 201);
    }

    public function show($id)
    {
        $task = $this->taskService->getTask($id, auth()->id());

        if(!$task) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return response()->json($task, 200);
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $task = $this->taskService->updateTask($id, auth()->id(), $request->all());

        if(!$task) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return response()->json('', 204);
    }

    public function destroy($id)
    {
        $task = $this->taskService->deleteTask($id, auth()->id());

        if(!$task) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return response()->json('', 204);
    }
}
