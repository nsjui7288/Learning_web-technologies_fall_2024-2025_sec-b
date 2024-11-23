<h1>Degree Input</h1>

<form action="handler.php" method="post">
    <p>Degrees (Handler Page): </p>
    <label><input type="checkbox" name="degrees[]" value="BSc"> BSc</label>
    <label><input type="checkbox" name="degrees[]" value="MSc"> MSc</label>
    <button type="submit">Submit</button>
</form>

<?php
$degrees = isset($_POST['degrees_current']) ? $_POST['degrees_current'] : [];
?>
<form action="" method="post">
    <p>Degrees (Current Page): </p>
    <label><input type="checkbox" name="degrees_current[]" value="BSc" <?php echo in_array('BSc', $degrees) ? 'checked' : ''; ?>> BSc</label>
    <label><input type="checkbox" name="degrees_current[]" value="MSc" <?php echo in_array('MSc', $degrees) ? 'checked' : ''; ?>> MSc</label>
    <button type="submit">Submit</button>
</form>
<?php if ($degrees): ?>
    <p>Degrees: <?php echo implode(', ', $degrees); ?></p>
<?php endif; ?>
