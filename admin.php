<?php
session_start();
$conn = new mysqli('localhost', 'username', 'password', 'dark77');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        $username = $_POST['username'];

        $sql = "SELECT * FROM users WHERE username='$username' AND password_hash=PASSWORD('$password')";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $_SESSION['logged_in'] = true;
        } else {
            echo "كلمة السر أو اسم المستخدم غير صحيحين";
        }
    } elseif (isset($_POST['content'])) {
        $content = $_POST['content'];
        $sql = "UPDATE pages SET content='$content' WHERE page_name='Dark_H!k!r'";
        $conn->query($sql);
        echo "<p>تم التحديث بنجاح!</p>";
    }
}

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    die("غير مصرح بالدخول");
}

$sql = "SELECT content FROM pages WHERE page_name='Dark_H!k!r'";
$result = $conn->query($sql);
$content = $result->fetch_assoc()['content'];
?>

<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة الإدارة</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container admin-panel">
        <h1>لوحة الإدارة</h1>
        <form method="post">
            <label>محتوى الصفحة:</label>
            <textarea name="content" rows="8" cols="50"><?php echo htmlspecialchars($content); ?></textarea>
            <button type="submit">تحديث المحتوى</button>
        </form>
        <p>يمكنك تحديث النصوص يوميًا بسهولة.</p>
    </div>
</body>
</html>

<?php $conn->close(); ?>