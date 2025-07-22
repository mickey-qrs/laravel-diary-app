# Laravel 1行日記アプリ

Laravelを使用して構築した、シンプルな1行日記アプリです。  
1日1つの投稿を行い、画像（1枚）とともに一覧・編集・削除が可能です。

---

## ✅ 機能一覧

- 日記の新規投稿（画像アップロード対応）
- 日記の一覧表示（画像付き、ページネーションあり）
- 日記の編集（画像変更時は旧画像を削除）
- 日記の削除（画像も同時に削除）
- レスポンシブ対応（Bootstrap使用）
- `.env` で1ページあたりの件数を設定可能
- Factory・Seederを使用してテストデータ作成
- Observerを使用した画像ファイルの自動削除

---

## 🧱 技術スタック

- Laravel 11 or 12
- PHP 8.2
- MySQL 8.0
- Bootstrap 5
- Faker（ダミーデータ生成）
- Laravel Observer

---

## 🚀 セットアップ手順

```bash
# プロジェクトをクローン
git clone https://github.com/your-username/laravel-diary-app.git
cd laravel-diary-app

# 依存パッケージのインストール
composer install

# 環境ファイルをコピーして編集
cp .env.example .env
php artisan key:generate

# .env内のDB接続情報を編集しておく

# マイグレーションとシーディング
php artisan migrate --seed

# ストレージリンクの作成（画像表示用）
php artisan storage:link

# ローカル開発サーバ起動
php artisan serve