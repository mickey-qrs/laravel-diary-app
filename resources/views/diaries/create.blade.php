@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">新規投稿</h2>

    <form action="{{ route('diaries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('diaries.form')
        <div class="flex justify-between items-center pt-4">
            <a href="{{ route('diaries.index') }}" class="text-sm text-blue-600 hover:underline">← 一覧に戻る</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded transition">投稿</button>
        </div>
    </form>
</div>

@endsection