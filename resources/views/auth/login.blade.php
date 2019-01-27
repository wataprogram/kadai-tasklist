@extends('layouts.app')

@section('content')

    <div class="text-center">
        <h1>ログイン</h1>
    </div>

    <div class="row">
        <div class="col-md-6 offset-md-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::submit('ログイン', ['class' => 'btn btn-primary btn-block']) !!}
                </div>
            {!! Form::close() !!}

            <p class="mt-3"><span class="btn btn-success">{!! link_to_route('signup.get', '新規ユーザー登録はこちら',null , ['class' => 'text-light']) !!}</span></p>
        </div>
    </div>
    

@endsection