@if ($errors->any())
<div class="mb-4">
    <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
        @foreach ($errors->all() as $error)
        <li class="text-sm">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

{{-- タイトル --}}
<div class="mb-4">
    <label class="block text-gray-700 font-semibold mb-1">タイトル</label>
    <input type="text" name="title" value="{{ old('title', $diary->title ?? '') }}"
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
</div>

{{-- 本文 --}}
<div class="mb-4">
    <label class="block text-gray-700 font-semibold mb-1">本文<span class="text-red-700">*<span></label>
    <textarea name="body"
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
        rows="4">{{ old('body', $diary->body ?? '') }}</textarea>
</div>

{{-- 画像 --}}
<div class="mb-4">
    <label class="block text-gray-700 font-semibold mb-1">画像（jpg）※2MBまで</label>
    <input type="file" name="image"
        class="w-full px-4 py-2 border border-gray-300 rounded-md file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700">
</div>