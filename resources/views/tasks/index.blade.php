@extends('layouts.app')

@section('content')
<?php $i=1; ?>

@if (Auth::check())
    <div class="tasklist-index pt-4 pb-4">
        <h1>タスク一覧</h1>
        @if (count($tasks) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="d-none d-sm-table-cell">URL</th>
                        <th>No</th>
                        <th>タスク</th>
                        <th>進捗状況</th>
                        <th class="d-none d-sm-table-cell">登録日</th>
                        <th class="d-none d-sm-table-cell">更新日</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        {{-- タスク詳細ページへのリンク --}}
                        <td class="d-none d-sm-table-cell">{{ $task->id }}</td>
                        <td><?php echo $i;?></td>
                        <td>{!! link_to_route('tasks.show', $task->content, ['task' => $task->id],['class' => 'text-dark'])!!}</td>
                        <td><span class={{ "$task->status_class" }}>{{ $task->status }}</span></td>
                        <td class="d-none d-sm-table-cell">{{ $task->created_at }}</td>
                        <td class="d-none d-sm-table-cell">{{ $task->updated_at }}</td>
                    </tr>
                    <?php $i++; ?>
                    @endforeach
                </tbody>
            </table>
        @endif
    {{-- ページネーションのリンク --}}
    {{ $tasks->links() }}

    {{-- タスク作成ページへのリンク --}}
    {!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'btn btn-primary']) !!}
    </div>

@else
    <div class="bg">
    <div class="bg-mask">
        <div class="center pt-5">
            <div class="top text-center">
                <h1>TaskList</h1>
                <p>これはタスク管理用のアプリです。</p>
                <div class="d-none d-sm-block">
                    {{-- ユーザ登録ページへのリンク --}}
                    {!! link_to_route('signup.get', 'SignUp', [], ['class' => 'btn btn-lg btn-primary mr-3 w-150px']) !!}
                    {!! link_to_route('login', 'Login', [], ['class' => 'btn btn-lg btn-success w-150px']) !!}
                </div>
                <div class="d-block d-sm-none">
                    {{-- ユーザ登録ページへのリンク --}}
                    {!! link_to_route('signup.get', 'SignUp', [], ['class' => 'btn btn-lg btn-primary mb-2 w-75']) !!}
                    {!! link_to_route('login', 'Login', [], ['class' => 'btn btn-lg btn-success w-75']) !!}
                </div>
            </div>
        </div>
    </div>
    </div>
@endif

@endsection