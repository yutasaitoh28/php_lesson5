<?php
session_start();
require_once('../funcs.php');
require_once('../common/header_bar.php');
require_once('../common/head.php');
loginCheck();

$id = $_GET['id'];
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM gs_content_table WHERE id=:id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <?= $head ?>
    <title>内容更新</title>
</head>
<body>
    <?= $nav_bar ?>
    <?php if (isset($_GET['error'])): ?>
        <p class="text-danger">記入内容を確認してください</p>
    <?php endif;?>
    <form method="POST" action="update.php" enctype="multipart/form-data" class="mb-3">
        <div class="mb-3">
            <label for="title" class="form-label">タイトル</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="title" value="<?= $row["title"] ?>">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">記事内容</label>
            <textArea type="text" class="form-control" name="content" id="content" aria-describedby="content" rows="4" cols="40"><?= $row["content"] ?></textArea>
        </div>

        <?php if ($row['img']): ?>
        <div class="mb-3">
            <img src="<?= '../images/' . $row['img'] ?>" alt="">
        </div>
        <?php endif;?>

        <div class="mb-3">
            <label for="img" class="form-label">画像投稿</label>
            <input type="file" name="img">
            <div id="emailHelp" class="form-text">※画像変更したい場合だけ、画像を選択してください。</div>
        </div>
        <input type="hidden" name="id" id="id" aria-describedby="id" value="<?= $row["id"] ?>">
        <button type="submit" class="btn btn-primary">修正</button>
    </form>
    <form method="POST" action="delete.php?id=<?= $row['id'] ?>" class="mb-3">
        <button type="submit" class="btn btn-danger">削除</button>
    </form>
</body>

</html>
