<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    //タスクを一覧表示
    public function index()
    {
        //ログイン状況の確認
        
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
            
            
        return view('tasks.index', $data);}
        
        
        else{
            
            return redirect('/');
            
        }
   
        
    }


    //新しいタスクを追加する
    public function create()
    {
        
        //ログイン状況の確認
        if(\Auth::check()){
            
         $task = new Task;
        
         return view('tasks.create', [
            'task' => $task,
          
        ]);
        }else{
            
            return redirect('tasks');
            
        }
        
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
        $task->user_id = \Auth::id();
        $task->save();
        
        return redirect('tasks');
    }

    //タスクの詳細を確認
    public function show($id)
    {
        $task = Task::find($id);
        
        if(\Auth::id() === $task->user_id){
        
        return view('tasks.show', [
            
             'task' => $task,
            
            ]);
        
        }else{
            
            return redirect('tasks');
            
        }
        
    }

   //タスクの編集
    public function edit($id)
    {
        $task = Task::find($id);
        
        if(\Auth::id() === $task->user_id){

        return view('tasks.edit', [
            'task' => $task,
        ]);
        
        }else{
            
            return redirect('tasks');
            
        }
        
    }

    //タスクの更新
    public function update(Request $request, $id)
    {
        
        $task = Task::find($id);
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();
        
        return redirect('tasks');
        
    }

    //タスクの削除
    public function destroy($id)
    {
        //
        $task = Task::find($id);
        
        if(\Auth::id() === $task->user_id){
        
        $task->delete();
        
        return redirect('tasks');
        
        }else{
            
            return redirect('tasks');
            
        }
        
        
    }
}
