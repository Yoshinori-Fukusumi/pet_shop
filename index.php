<?php
require_once __DIR__ . '/functions.php';

$lists = display_list();

?>

<!DOCTYPE html>
<html lang="ja">
<link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css" />
<style>
    body { padding: 20px;}
</style>
<body>

    <h2>本日のご紹介ペット！</h2>

    <?php foreach ($lists as $list) : ?>
        <br>
        <p><?= h($list['type']) . 'の' . h($list['classification']) . 'ちゃん' ?></p>
        <p><?= h($list['description']) ?></p>
        <p><?= h($list['birthday']) . ' 生まれ' ?></p>
        <p><?= '出身地 ' . h($list['birthplace']) ?></p>
        <br><hr>
    <?php endforeach; ?>


</body>

</html>
