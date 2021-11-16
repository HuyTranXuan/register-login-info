<?php 
$errors = $_SESSION['errors'];
?>

<?php if (!empty($errors)): ?>
    <div class="badge danger">
        <?php foreach($errors as $error): ?>
            <h5><?php echo $error; ?></h5>
        <?php endforeach?>
    </div>
<?php endif?>