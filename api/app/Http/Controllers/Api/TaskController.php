<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Jobs\ProcessTask;


class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
        ]);

        // Cria a tarefa com status 'pending'
        $task = Task::create([
            'title' => $validated['title'],
            'status' => 'pending',
        ]);

        // Atualiza o status para 'processing' e envia para a fila
        $task->update(['status' => 'processing']);
        ProcessTask::dispatch($task);

        return response()->json($task, 201);
    }
}
