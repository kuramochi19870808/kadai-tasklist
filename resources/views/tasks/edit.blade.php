@extends('layouts.app')

@section('content')
@if (Auth::id() == $task->user_id)
<div class="pt-3 pb-3">
    <h1>id: {{ $task->id }} のタスク編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}

                <div class="form-group mt-4">
                    {!! Form::label('content', 'タスク:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('status', '進捗状況:') !!}
                    {!! 
                    Form::select('status', 
                        [
                        '' => '選択してください',
                        '未着手' => '未着手', 
                        '作業中' => '作業中', 
                        '完了' => '完了'
                        ],
                        '選択してください', ['class' => 'form-control'])
                    !!}
                </div>
                
                <div class="mt-5">
                    {!! Form::submit('更新', ['class' => 'btn btn-primary w-150px']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>    
</div>
@endif  
@endsection