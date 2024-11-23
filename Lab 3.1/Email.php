<h1>Email Input</h1>

<form action="handler.php" method="post">
    <label for="email">Email (Handler Page): </label>
    <input type="email" name="email" id="email">
    <button type="submit">Submit</button>
</form>

<?php
$email = isset($_POST['email_current']) ? $_POST['email_current'] : '';
?>
<form action="" method="post">
    <label for="email_current">Email (Current Page): </label>
    <input type="email" name="email_current" id="email_current" value="<?php echo htmlspecialchars($email); ?>">
    <button type="submit">Submit</button>
</form>
<?php if ($email): ?>
    <p>Email: <?php echo htmlspecialchars($email); ?></p>
<?php endif; ?>
