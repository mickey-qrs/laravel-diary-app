<?php

namespace App\Http\Controllers;

use App\Models\Diary;
use App\Http\Requests\StoreDiaryRequest;
use App\Http\Requests\UpdateDiaryRequest;
use Illuminate\Support\Facades\Storage;

class DiaryController extends Controller
{
    public function index()
    {
        $diaries = Diary::latest()->paginate(config('diary.per_page'));
        return view('diaries.index', compact('diaries'));
    }

    public function create()
    {
        return view('diaries.create');
    }

    public function store(StoreDiaryRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('images', 'public');
        }

        Diary::create($data);

        return redirect()->route('diaries.index')->with('success', '日記を投稿しました');
    }

    public function edit(Diary $diary)
    {
        return view('diaries.edit', compact('diary'));
    }

    public function update(UpdateDiaryRequest $request, Diary $diary)
    {
        $data = $request->validated();

        // 新しい画像がある場合、古い画像を削除
        if ($request->hasFile('image')) {
            if ($diary->image_path && Storage::disk('public')->exists($diary->image_path)) {
                Storage::disk('public')->delete($diary->image_path);
            }

            $data['image_path'] = $request->file('image')->store('images', 'public');
        }

        $diary->update($data);

        return redirect()->route('diaries.index')->with('success', '日記を更新しました');
    }

    public function destroy(Diary $diary)
    {
        $diary->delete(); // Observerで画像も削除
        return redirect()->route('diaries.index')->with('success', '日記を削除しました');
    }
}
