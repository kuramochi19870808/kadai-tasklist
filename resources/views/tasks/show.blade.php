@extends('layouts.app')

@section('content')
@if (Auth::id() == $task->user_id)
<div class="pt-3 pb-3 tasklist-show">
    <h1 class="pc">
        id = {{ $task->id }} の
        タスク詳細ページ
    </h1>
    <h1 class="sp">
        id = {{ $task->id }} </br>
        タスク詳細ページ
    </h1>

    <table class="table table-bordered mt-3">
        <tr>
            <th>id</th>
            <td>{{ $task->id }}</td>
        </tr>
        <tr>
            <th>タスク</th>
            <td>{{ $task->content }}</td>
        </tr>
        <tr>
            <th>進捗状況</th>
            <td>{{ $task->status }}</td>
        </tr>
        <tr>
            <th>登録日</th>
            <td>{{ $task->created_at }}</td>
        </tr>
        <tr>
            <th>更新日</th>
            <td>{{ $task->updated_at }}</td>
        </tr>
    </table>

    <div class="flex d-none d-sm-inline-flex">
        <div>
            {{-- タスク編集ページへのリンク --}}
            {!! link_to_route('tasks.edit', 'このタスクを編集', ['task' => $task->id], ['class' => 'btn btn-success mr-3 w-200px']) !!}
        </div>
        <div>
            {{-- タスク削除フォーム --}}
            {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger w-200px']) !!}
            {!! Form::close() !!}
        </div>
    </div>
    <div class="d-block d-sm-none">
        <div class="mt-4">
            {{-- タスク編集ページへのリンク --}}
            {!! link_to_route('tasks.edit', 'このタスクを編集', ['task' => $task->id], ['class' => 'btn btn-success mr-2 w-50']) !!}
        </div>
        <div class="mt-3">
            {{-- タスク削除フォーム --}}
            {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-danger w-50']) !!}
            {!! Form::close() !!}
        </div>
    </div>


</div>
@endif    
@endsection