{{-- タイトル --}}
<div class="mb-4">
    <label class="block text-gray-700 font-semibold mb-1">タイトル</label>
    <input type="text" name="title" value="{{ old('title', $diary->title ?? '') }}"
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
    @error('title')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

{{-- 本文 --}}
<div class="mb-4">
    <label class="block text-gray-700 font-semibold mb-1">本文</label>
    <textarea name="body"
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
        rows="4">{{ old('body', $diary->body ?? '') }}</textarea>
</div>

{{-- 画像 --}}
<div class="mb-4">
    <label class="block text-gray-700 font-semibold mb-1">画像（jpg）</label>
    <input type="file" name="image"
        class="w-full px-4 py-2 border border-gray-300 rounded-md file:mr-4 file:py-2 file:px-4 file:border-0 file:bg-blue-600 file:text-white hover:file:bg-blue-700">
    @error('image')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror

    @if (!empty($diary->image_path))
    <img src="{{ asset('storage/' . $diary->image_path) }}" alt="現在の画像" class="mt-2 w-32 rounded shadow">
    @endif
</div>