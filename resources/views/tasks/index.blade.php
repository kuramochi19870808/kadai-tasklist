@extends('layouts.app')

@section('content')

@if (Auth::check())
    <h1>タスク一覧</h1>
    @if (count($tasks) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>タスク</th>
                    <th>進捗状況</th>
                    <th>登録日</th>
                    <th>更新日</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    {{-- タスク詳細ページへのリンク --}}
                    <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                    <td>{{ $task->content }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->created_at }}</td>
                    <td>{{ $task->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {{-- ページネーションのリンク --}}
    {{ $tasks->links() }}

    {{-- タスク作成ページへのリンク --}}
    {!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'btn btn-primary']) !!}

@else
    <div class="center jumbotron">
        <div class="text-center">
            <h1>TaskList</h1>
            <p>これはタスク管理用のアプリです。</p>
            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', 'SignUp', [], ['class' => 'btn btn-lg btn-primary mr-5']) !!}
            {!! link_to_route('login', 'Login', [], ['class' => 'btn btn-lg btn-success']) !!}
        </div>
    </div>
@endif

@endsection