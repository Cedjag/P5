<?php ob_start(); ?>
    <div class="container">
        <div class="about">
            <div class="row">
                <div class="col-md-8">
                        <p><?php echo $info_['about'] ?></p>
                </div>
                <div class="col-md-4" id="redcarpet">
                    <img class=img-fluid src="public/assets/img/popcorn.png" alt="popcorn">
                    <img class=img-fluid src="public/assets/img/redcarpet.png" alt="red carpet">
                </div>
            </div>
        </div>
    </div>
<?php $contenu = ob_get_clean(); ?>
<?php require 'admin/gabarit.php'; ?>