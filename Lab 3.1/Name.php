<!DOCTYPE html>
<html>
<head>
    <title>Form Handling</title>
</head>
<body>
    <h1>Name Input</h1>
   
    <form action="handler.php" method="post">
        <label for="name">Name (Handler Page): </label>
        <input type="text" name="name" id="name">
        <button type="submit">Submit</button>
    </form>

    <?php
    $name = isset($_POST['name_current']) ? $_POST['name_current'] : '';
    ?>
    <form action="" method="post">
        <label for="name_current">Name (Current Page): </label>
        <input type="text" name="name_current" id="name_current" value="<?php echo htmlspecialchars($name); ?>">
        <button type="submit">Submit</button>
    </form>
    <?php if ($name): ?>
        <p>Name: <?php echo htmlspecialchars($name); ?></p>
    <?php endif; ?>
</body>
</html>
