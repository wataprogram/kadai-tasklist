<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    //タスクを一覧表示
    public function index()
    {
        //
        $name = "wataru";
        $tasks = Task::all();

        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }


    //新しいタスクを追加する
    public function create()
    {
        
        $task = new Task;
        
         return view('tasks.create', [
            'task' => $task,
        ]);
        
        
    }


    //新しいタスクを保存する
    public function store(Request $request)
    {
        
        $this->validate($request,[
            
            'status' => 'required|max:10'
            
            ]);
            
        $task = new Task;
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();
        
        return redirect('/');
    }

     //タスクの詳細を確認
    public function show($id)
    {
        $task = Task::find($id);
        
        return view('tasks.show', [
            
             'task' => $task,
            
            ]);
    }

   //タスクの編集
    public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);
        
    }

    //タスクの更新
    public function update(Request $request, $id)
    {
        
        $task = Task::find($id);
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();
        
        return redirect('/');
        
    }

    //タスクの削除
    public function destroy($id)
    {
        //
        $task = Task::find($id);
        $task->delete();
        
        return redirect('/');
        
        
    }
}
