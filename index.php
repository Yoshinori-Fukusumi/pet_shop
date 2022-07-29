<?php
require_once __DIR__ . '/functions.php';

$lists = display_list();
$keyword = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $keyword = filter_input(INPUT_GET, 'keyword');
    $keyword_param = '%' . $keyword . '%';
    $lists = search_list($keyword_param);
}

?>

<!DOCTYPE html>
<html lang="ja">
<style>
    body {
        padding: 20px;
    }

    p {
        margin: 0;
    }
</style>

<body>

    <h2>本日のご紹介ペット！</h2>

    <form action="" method="get">
        <span>キーワード:</span>
        <input type="search" name="keyword" placeholder="キーワードの入力">
        <input type="submit" value="検索"><br>
    </form>

    <?php foreach ($lists as $list) : ?>
        <br>
        <p><?= h($list['type']) . 'の' . h($list['classification']) . 'ちゃん' ?></p>
        <p><?= h($list['description']) ?></p>
        <p><?= h($list['birthday']) . ' 生まれ' ?></p>
        <p><?= '出身地 ' . h($list['birthplace']) ?></p>
        <br>
        <hr>
    <?php endforeach; ?>


</body>

</html>
