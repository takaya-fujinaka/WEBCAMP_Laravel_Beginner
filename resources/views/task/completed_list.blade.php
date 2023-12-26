@extends('layout')
{{-- タイトル --}}
@section('title')(詳細画面)@endsection

{{-- メインコンテンツ --}}
@section('contets')
        <h1>完了タスク一覧</h1>
        @foreach ($completed_list as $task)
                <tr>
                    <td>{{ $task->name }}
                    <td>{{ $task->period }}
                    <td>{{ $task->priority }}
                    <td>{{ $task->datetime }}
        @endforeach