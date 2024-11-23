<h1>Blood Group Input</h1>

<form action="handler.php" method="post">
    <label for="blood_group">Blood Group (Handler Page): </label>
    <select name="blood_group" id="blood_group">
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
    </select>
    <button type="submit">Submit</button>
</form>

<?php
$blood_group = isset($_POST['blood_group_current']) ? $_POST['blood_group_current'] : '';
?>
<form action="" method="post">
    <label for="blood_group_current">Blood Group (Current Page): </label>
    <select name="blood_group_current" id="blood_group_current">
        <option value="A+"<?php echo $blood_group == 'A+' ? 'selected' : ''; ?>>A+</option>
        <option value="A-"<?php echo $blood_group == 'A-' ? 'selected' : ''; ?>>A-</option>
        <option value="B+"<?php echo $blood_group == 'B+' ? 'selected' : ''; ?>>B+</option>
        <option value="B-"<?php echo $blood_group == 'B-' ? 'selected' : ''; ?>>B-</option>
        <option value="O+"<?php echo $blood_group == 'O+' ? 'selected' : ''; ?>>O+</option>
        <option value="O-"<?php echo $blood_group == 'O-' ? 'selected' : ''; ?>>O-</option>
        <option value="AB+"<?php echo $blood_group == 'AB+' ? 'selected' : ''; ?>>AB+</option>
        <option value="AB-"<?php echo $blood_group == 'AB-' ? 'selected' : ''; ?>>AB-</option>
    </select>
    <button type="submit">Submit</button>
</form>
<?php if ($blood_group): ?>
    <p>Blood Group: <?php echo htmlspecialchars($blood_group); ?></p>
<?php endif; ?>
