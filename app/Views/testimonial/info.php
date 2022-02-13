<?php include(VIEWS . 'inc' . DS . 'header.php'); ?>

<h1 class="text-center  my-5 py-3">Infos </h1>


<div class="d-flex justify-content-center">
    <div class="col-8 shadow-lg">

        <div class="card text-center">

            <?php foreach ($testimonial as $key) : ?>
                <div class="card-header">
                    <img width="200" height="200" src="<?php echo BURL . 'uploads/'.$key['photo']; ?>" class="rounded-circle" alt="<?php echo BURL . 'uploads/'.$key['photo']; ?>">
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $key['titre'] ?></h5>
                    <p class="card-text"><?php echo $key['message'] ?></p>
                    <a href="<?php url('testimonial/approuver/' . $key['id']) ?>" class="btn btn-primary">Approuver</a>
                </div>
                <div class="card-footer text-muted">
                    <?php echo $key['date'] ?>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>


<?php include(VIEWS . 'inc' . DS . 'footer.php'); ?>