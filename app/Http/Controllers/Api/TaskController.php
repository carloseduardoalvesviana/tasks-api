<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::query()->where('user_id', auth()->id())->paginate();
        return response()->json($tasks, 200);
    }

    public function store(CreateTaskRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $task = Task::create($data);
        return response()->json($task, 201);
    }

    public function show($id)
    {
        $task = Task::query()
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if(!$task) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return response()->json($task, 200);
    }

    public function update(UpdateTaskRequest $request, $id)
    {
        $task = Task::query()
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->update($request->all());

        if(!$task) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return response()->json('', 204);
    }

    public function destroy($id)
    {
        $task = Task::query()
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->delete();

        if(!$task) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return response()->json('', 204);
    }
}
