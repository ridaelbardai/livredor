<?php include(VIEWS . 'inc' . DS . 'header.php'); ?>

<h1 class="text-center  my-5 py-3">Testimonials </h1>

<div class="container">
    <div class="row">
        <div class="col-10 mx-auto  shadow-lg mb-5">
            <?php if (isset($success)) : ?>
                <h3 class="alert alert-success text-center"><?php echo $success; ?></h3>
            <?php endif; ?>
            <?php if (isset($error)) : ?>
                <h3 class="alert alert-danger text-center"><?php echo $error; ?></h3>
            <?php endif; ?>
            <table class="table table-striped table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col"></th>

                        <th scope="col">titre</th>

                        <th scope="col">date</th>
                        <th scope="col">etat</th>
                        <th scope="col"></th>
                        <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>

                    <?php $i = 1; ?>
                    <?php foreach ($testimonials as $row) :  ?>
                        <tr>
                            <td> <?php echo $i;
                                    $i++; ?></td>
                            <td> <img src="<?php echo BURL . 'uploads/' . $row['photo']; ?>" width="30px" height="30px" class="rounded-circle"> </td>
                            <td><?php echo $row['titre']; ?></td>

                            <td><?php echo $row['date']; ?></td>
                            <td ><?php afficherEtat($row['etat']); ?></td>
                            <td>
                                <a href="<?php url('testimonial/lire/' . $row['id']) ?>" class="fa fa-eye"></a>
                            </td>
                            <td>
                                <a style="color:red" href="<?php url('testimonial/delete/' . $row['id']) ?>" class="fa fa-trash"></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>
</div>
<?php include(VIEWS . 'inc' . DS . 'footer.php'); ?>