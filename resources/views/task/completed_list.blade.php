@extends('layout')
{{-- タイトル --}}
@section('title')(詳細画面)@endsection

{{-- メインコンテンツ --}}
@section('contets')
        <h1>完了タスクの一覧</h1>
        <a href="/task/list">タスク一覧に戻る</a><br>
        <table border="1">
            <tr>
                <th>タスク名</th>
                <th>期限</th>
                <th>重要度</th>
                <th>タスク終了日</th>
            </tr>
        @foreach ($completed_list as $task)
            <tr>
                <td>{{ $task->name }}</td>
                <td>{{ $task->period }}</td>
                <td>{{ $task->getPriorityString() }}</td>
                <td>{{ $task->created_at }}</td>
            </tr>
        @endforeach
        </table>
        <!-- ページネーション -->
        {{-- $list->links() --}}
        現在 {{ $completed_list->currentPage() }} ページ目<br>
        @if ($completed_list->onFirstPage() === false)
        <a href="/completed_task/list">最初のページ</a>
        @else
        最初のページ
        @endif
        /
        @if ($completed_list->previousPageUrl() !== null)
            <a href="{{ $completed_list->previousPageUrl() }}">前に戻る</a>
        @else
        前に戻る
        @endif
        /
        @if ($completed_list->nextPageUrl() !== null)
        <a href="{{ $completed_list->nextPageUrl() }}">次に進む</a>
        @else
        次に進む
        @endif
        <br>
        <hr>
        <menu label="リンク">
        <a href="/logout">ログアウト</a><br>
        </menu>
        