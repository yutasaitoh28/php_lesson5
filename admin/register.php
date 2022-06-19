<?php
session_start();
require_once('../funcs.php');
loginCheck();

$title = $_POST['title'];
$content  = $_POST['content'];
$img_name = '';

// imgがある場合
if ($_SESSION['post']['image_data']) {
    $img_name = date('YmdHis') . '_' . $_SESSION['post']['file_name'];
}

// 簡単なバリデーション処理。
if (trim($_POST['title']) === '') {
    $err[] = 'タイトルを確認してください。';
}
if (trim($_POST['content']) === '') {
    $err[] = '内容を確認してください';
}
if (!empty($img_name)) {
    $check =  substr($img_name, -3);
    if ($check != 'jpg' && $check != 'gif' && $check != 'png') {
        $err[] = '写真の内容を確認してください。';
    }
}

// もしerr配列に何か入っている場合はエラーなので、redirect関数でindexに戻す。その際、GETでerrを渡す。
if (count($err) > 0) {
    redirect('post.php?error=1');
}

/**
 * (1)$_FILES['img']['tmp_name']... 一時的にアップロードされたファイル
 * (2)'../picture/' . $image...写真を保存したい場所。先にフォルダを作成しておく。
 * (3)move_uploaded_fileで、（１）の写真を（２）に移動させる。
 */
if ($_SESSION['post']['image_data']) {
    file_put_contents('../images/' . $img_name, $_SESSION['post']['image_data']);
}

//2. DB接続します
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('INSERT INTO gs_content_table(
                        title,content,img,date
                    )VALUES(
                        :title,:content,:img,sysdate()
                    )');
$stmt->bindValue(':title', $title, PDO::PARAM_STR);      //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':content', $content, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':img', $img_name, PDO::PARAM_STR);        //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行

//４．データ登録処理後
if (!$status) {
    sql_error($stmt);
} else {
    $_SESSION['post'] = [] ;
    redirect('index.php');
}
