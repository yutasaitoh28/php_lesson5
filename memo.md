やること

CMS演習

- CSMってなんだっけ？
- CSMを作成することで今までの復習

追加で教えること

- バリデーション
- 写真をアップ
- viewとコントローラーに分割
- 書き込み確認画面
- bootstrap?
- テーブル集計、結合？

必要な画面

### 誰でも見られる

投稿一覧 index.php
ログイン画面 login.php

### 管理者側

- 一覧画面 admin/index.php
- 記事投稿作成画面 admin/create.php
- 記事確認画面 admin/create-confirm.php

- 記事編集画面 admin/edit.php
- 記事編集画面 admin/edit-confirm.php

必要なテーブル

- 管理者管理テーブル
  - id
  - login_id
  - login_pw
  - date

- 記事テーブル
    `id` int(12) NOT NULL,
    `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
    `contents` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
    `img` varchar(256)
    `date` datetime NOT NULL,
    `update_date` datetime,
