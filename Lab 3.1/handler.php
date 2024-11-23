<!DOCTYPE html>
<html>
<head>
    <title>Handler Page</title>
</head>
<body>
    <h1>Form Data</h1>
    <?php
    foreach ($_POST as $key => $value) {
        if (is_array($value)) {
            echo "<p>$key: " . implode(', ', $value) . "</p>";
        } else {
            echo "<p>$key: " . htmlspecialchars($value) . "</p>";
        }
    }
    ?>
</body>
</html>
