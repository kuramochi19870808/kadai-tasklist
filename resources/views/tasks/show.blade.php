@extends('layouts.app')

@section('content')
@if (Auth::id() == $task->user_id)
    <h1>id = {{ $task->id }} のタスク詳細ページ</h1>

    <table class="table table-bordered">
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

    {{-- タスク編集ページへのリンク --}}
    {!! link_to_route('tasks.edit', 'このタスクを編集', ['task' => $task->id], ['class' => 'btn btn-light']) !!}

    {{-- タスク削除フォーム --}}
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@endif    
@endsection