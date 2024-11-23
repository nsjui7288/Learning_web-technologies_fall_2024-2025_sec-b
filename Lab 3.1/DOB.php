<h1>Date of Birth Input</h1>

<form action="handler.php" method="post">
    <label for="dob">Date of Birth (Handler Page): </label>
    <input type="date" name="dob" id="dob">
    <button type="submit">Submit</button>
</form>

<?php
$dob = isset($_POST['dob_current']) ? $_POST['dob_current'] : '';
?>
<form action="" method="post">
    <label for="dob_current">Date of Birth (Current Page): </label>
    <input type="date" name="dob_current" id="dob_current" value="<?php echo htmlspecialchars($dob); ?>">
    <button type="submit">Submit</button>
</form>
<?php if ($dob): ?>
    <p>Date of Birth: <?php echo htmlspecialchars($dob); ?></p>
<?php endif; ?>
