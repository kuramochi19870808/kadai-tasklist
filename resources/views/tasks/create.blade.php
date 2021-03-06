@extends('layouts.app')

@section('content')
<div class="tasklist-create pt-4 pb-4">
    <h1>タスク新規作成ページ</h1>

    <div class="row">
        <div class="col-10 col-sm-6">
            {!! Form::model($task, ['route' => 'tasks.store']) !!}

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
                    {!! Form::submit('投稿', ['class' => 'btn btn-primary w-200px']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection