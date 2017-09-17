<?php include VIEW_PATH.'layouts/header.php'; ?>

<div class="row">
    <div class="col-12">
        <h1><?php echo $detailsArr['title'] ?></h1>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <h2><?php echo $detailsArr['author'] ?></h2>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <p><?php echo $detailsArr['description'] ?></p>
    </div>
</div>

<?php include VIEW_PATH.'layouts/footer.php'; ?>