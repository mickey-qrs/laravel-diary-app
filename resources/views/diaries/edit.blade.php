@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">投稿を編集</h2>

    <form action="{{ route('diaries.update', $diary) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- 画像プレビュー --}}
        @if ($diary->image_path)
        <div class="mb-4">
            <p class="text-sm text-gray-600">現在の画像:</p>
            <img src="{{ asset('storage/' . $diary->image_path) }}" alt="日記画像" class="w-64 h-auto mt-2 rounded border">
        </div>
        @endif
        @include('diaries.form', ['diary' => $diary])
        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('diaries.index', request()->query()) }}" class="text-sm text-blue-600 hover:underline">← 一覧に戻る</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded transition">更新</button>
        </div>
    </form>
</div>
@endsection