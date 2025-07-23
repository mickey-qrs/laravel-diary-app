@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">1行日記一覧</h2>
    <a href="{{ route('diaries.create', request()->query()) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        新規投稿
    </a>
</div>

<form method="GET" action="{{ route('diaries.index') }}" class="mb-4">
    <input type="text" name="keyword" placeholder="キーワード検索"
        value="{{ $keyword ?? '' }}"
        class="border px-3 py-1 rounded w-full md:w-1/3" />
</form>

@if ($diaries->isEmpty())
<p class="text-gray-500">まだ投稿がありません。</p>
@else
<div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
    @foreach ($diaries as $diary)
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        @if ($diary->image_path)
        <img src="{{ asset('storage/' . $diary->image_path) }}" alt="diary image" class="w-full h-48 object-cover">
        @else
        <div class="w-full h-48 flex items-center justify-center bg-gray-100 text-gray-500 text-sm border border-dashed rounded">
            画像が設定されていません
        </div>
        @endif
        <div class="p-4">
            <h3 class="text-lg font-semibold text-gray-800">{{ $diary->title }}</h3>
            <p class="mt-2 text-gray-600 text-sm">{{ $diary->body }}</p>

            {{-- 編集・削除ボタン --}}
            <div class="mt-4 flex justify-end space-x-2">
                <a href="{{ route('diaries.edit', ['diary' => $diary->id] + request()->query()) }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded">
                    編集
                </a>
                <form action="{{ route('diaries.destroy', $diary) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white text-sm px-4 py-2 rounded">
                        削除
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>

{{-- ページネーション --}}
<div class="mt-6">
    {{ $diaries->appends(request()->query())->links('pagination::tailwind') }}
</div>
@endif
@endsection