<?php include(VIEWS . 'inc' . DS . 'header.php'); ?>
<style>
    /*===== GOOGLE FONTS =====*/
    @import url("https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500&display=swap");

    /*===== VARIABLES CSS =====*/
    :root {
        /*===== Colors =====*/
        --first-color: #272A3A;
        --first-color-light: #8A8EAA;
        --first-color-lighten: #F8F8FC;

        /*===== Font and typography =====*/
        --body-font: 'Ubuntu', sans-serif;
        --normal-font-size: 1rem;
        --smaller-font-size: .813rem;
    }

    /*===== BASE =====*/
    *,
    ::before,
    ::after {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: var(--body-font);
        /* background-color: var(--first-color-lighten); */
    }

    h1 {
        margin: 0;
    }

    a {
        text-decoration: none;
    }

    img {
        max-width: 100%;
        height: auto;
    }

    /*===== DRAG and DROP =====*/
    .drop,
    .drop__container {
        display: flex;
    }

    .drop {
        height: 50vh;
        align-items: center;
        justify-content: center;
    }

    .drop__container {
        row-gap: 1rem;
        padding: 2rem;
        box-shadow: 4px 4px 40px #FFF;
    }

    .drop__card {
        width: 260px;
        justify-content: space-between;
        padding: .75rem 1.25rem .75rem .75rem;
        margin: 1rem;
        background-color: var(--first-color-lighten);
        box-shadow: 4px 4px 16px #E1E1E1, -2px -2px 16px #E1E1E1;
        border-radius: 2.5rem;
    }

    .drop__name {
        font-size: var(--normal-font-size);
        color: var(--first-color);
        font-weight: 500;
        margin: 10;
    }

    .drop__profession {
        font-size: var(--smaller-font-size);
        color: var(--first-color-light);
    }



    /* Class name for the chosen item */
    .sortable-chosen {
        box-shadow: 8px 8px 32px #E1E1E1;
    }

    /* Class name for the dragging item */
    .sortable-drag {
        opacity: 0;
    }
</style>



<div class="">
    <div class="container ">
        <h1 class="text-center  my-5 pt-3 ">Add New Testimonial </h1>

        <div class="row pb-5">
            <div class="col-8 mx-auto  shadow-lg">


                <?php if (isset($success)) : ?>
                    <h3 class="alert alert-success text-center"><?php echo $success; ?></h3>
                <?php endif; ?>


                <form name="formulaire" id="formulaire" class="p-5  mb-2" enctype="multipart/form-data" method="POST" action="<?php url('testimonial/store'); ?>">
                    <div class="form-group input-field">
                        <label for="name">Titre : </label>
                        <input type="text" required name="titre" maxlength="60" class="form-control" id="titre">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Photo</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="photo" name="photo" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choisir image</label>
                        </div>
                    </div>

                    <div class="form-group input-field">
                        <label for="price">Message : </label>
                        <textarea type="text" required class="form-control" maxlength="300" rows="3" name="message" id="message"></textarea>
                    </div>
                    <div class="mx-auto" style="width: 100px;">
                        <button type="submit" name="submit" class=" btn btn-outline-success btn-lg">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<h1 class="text-center pt-3">Testimonials </h1>
<div class="drop">
    <div class="drop__container" id="drop-items">
        <?php foreach ($testimonials as $key) : ?>
            <div class="drop__card">
                <div class="drop__data">
                    <img src="<?php echo BURL . 'uploads/' . $key['photo']; ?>" class="rounded-circle" width="70" style="margin-bottom:10px;">
                    <div>
                        <h1 class="drop__name"><?php echo $key['titre'] ?></h1>
                        <span class="drop__profession"><?php echo $key['message'] ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!--===== SORTABLE JS =====-->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>

<!--===== MAIN JS =====-->
<script>
    /*===== DRAG and DROP =====*/
    const dropItems = document.getElementById('drop-items')

    new Sortable(dropItems, {
        animation: 350,
        chosenClass: "sortable-chosen",
        dragClass: "sortable-drag",
        direction: 'horizontal',
        store: {
            // We keep the order of the list
            set: (sortable) => {
                const order = sortable.toArray()
                localStorage.setItem(sortable.options.group.name, order.join('|'))
            },

            // We get the order of the list
            get: (sortable) => {
                const order = localStorage.getItem(sortable.options.group.name)
                return order ? order.split('|') : []
            }
        }

    });
</script>

<?php include(VIEWS . 'inc' . DS . 'footer.php'); ?>