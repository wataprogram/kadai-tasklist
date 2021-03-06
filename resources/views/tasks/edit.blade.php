@extends('layouts.app')

@section('content')

@include('commons.error_message')
<!-- ここにページ毎のコンテンツを書く -->
<h1>id: {{ $task->id }} のタスク編集ページ</h1>
    <div class="row">
        <div class="col-6">
             {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
        
                <div class="form-group">
                    {!! Form::label('content', 'タスク:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('status', 'ステータス:') !!}
                    {!! Form::select('status', ['未完了' => '未完了' , '進行中' => '進行中' , '完了済み' => '完了済み' ], null,  ['class' => 'form-control']) !!}
                </div>
        
                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        
            {!! Form::close() !!}
        </div>
    </div>
@endsection