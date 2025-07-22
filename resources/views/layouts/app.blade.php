<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>1行日記アプリ</title>

    {{-- Tailwind CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Heroicons（必要であれば） --}}
    <script>
        tailwind.config = {
            theme: {
                extend: {},
            },
        };
    </script>
</head>

<body class="bg-gray-100 text-gray-900">

    {{-- ナビゲーション（Tailblocks風） --}}
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="{{ route('diaries.index') }}" class="text-xl font-bold text-blue-600">1行日記</a>
        </div>
    </header>

    {{-- メッセージ --}}
    @if (session('success'))
    <div class="container mx-auto px-4 mt-4">
        @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
        @endif
    </div>
    @endif

    {{-- メイン --}}
    <main class="container mx-auto px-4 py-6">
        @yield('content')
    </main>

</body>

</html>