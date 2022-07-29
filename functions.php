<?php
require_once __DIR__ . '/config.php';

// 接続処理を行う関数
function connect_db()
{
    try {
        return new PDO(
            DSN,
            USER,
            PASSWORD,
            [PDO::ATTR_ERRMODE =>
            PDO::ERRMODE_EXCEPTION]
        );
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}


// エスケープ処理を行う関数
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}


function display_list()
{
    $dbh = connect_db();

    $sql = <<<EOM
    SELECT
        *
    FROM
        animals
    EOM;

    $stmt = $dbh->prepare($sql);

    $stmt->execute();

    $lists = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $lists;
}


function search_list($keyword_param)
{
    $dbh = connect_db();

    $sql = <<<EOM
    SELECT
        *
    FROM
        animals
    WHERE
        description LIKE :keyword
    EOM;

    $stmt = $dbh->prepare($sql);

    $stmt->bindValue(':keyword', $keyword_param, PDO::PARAM_STR);

    $stmt->execute();

    $lists = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $lists;
}
