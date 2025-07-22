@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-xl font-bold mb-4">投稿を編集</h2>

    <form action="{{ route('diaries.update', $diary) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('diaries.form', ['diary' => $diary])
        <div class="text-right">
            <button type="submit"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded transition">更新する</button>
        </div>
    </form>
</div>
@endsection