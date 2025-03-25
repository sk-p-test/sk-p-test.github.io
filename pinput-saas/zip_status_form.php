<?php
// zip_status_form.php
// ZipStatusクラスを読み込む
require_once __DIR__ . '/PinputProjectAPI/zip_status_api.php';

$message = '';

// フォームが送信された場合（POSTリクエストの場合）
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 入力値の取得と簡易バリデーション
    $company_id = isset($_POST['company_id']) ? intval($_POST['company_id']) : 0;
    $zip_identifier = isset($_POST['zip_identifier']) ? trim($_POST['zip_identifier']) : '';
    $container_name = isset($_POST['container_name']) ? trim($_POST['container_name']) : '';
    $target_directory = isset($_POST['target_directory']) ? trim($_POST['target_directory']) : '';
    $sas_url = isset($_POST['sas_url']) ? trim($_POST['sas_url']) : '';

    if ($company_id > 0 && !empty($zip_identifier) && !empty($container_name) && !empty($target_directory) && !empty($sas_url)) {
        // ZipStatusクラスのインスタンスを生成し、createメソッドを実行
        $zipStatus = new ZipStatus();
        $result = $zipStatus->create($company_id, $zip_identifier, $container_name, $target_directory, $sas_url);
        if ($result) {
            $message = "新しいZIPステータスが作成されました。ID: " . htmlspecialchars($result);
        } else {
            $message = "データ作成中にエラーが発生しました。";
        }
    } else {
        $message = "すべてのフィールドに正しい値を入力してください。";
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Zip Status 新規作成フォーム</title>
</head>
<body>
    <h1>Zip Status 新規作成フォーム</h1>
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="company_id">会社ID:</label><br>
        <input type="number" id="company_id" name="company_id" required><br><br>

        <label for="zip_identifier">ZIP識別子:</label><br>
        <input type="text" id="zip_identifier" name="zip_identifier" required><br><br>

        <label for="container_name">コンテナ名:</label><br>
        <input type="text" id="container_name" name="container_name" required><br><br>

        <label for="target_directory">ターゲットディレクトリ:</label><br>
        <input type="text" id="target_directory" name="target_directory" required><br><br>

        <label for="sas_url">SAS URL:</label><br>
        <input type="text" id="sas_url" name="sas_url" required><br><br>

        <button type="submit">作成</button>
    </form>
</body>
</html> 