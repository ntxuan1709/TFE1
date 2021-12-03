<div class="tokyo_tm_section active">
    <div class="container">
        <?php foreach ($listIntroduce as $introduce) { ?>
            <div class="tokyo_tm_about">
                <div class="description">
                    <h3 class="name custom_size" id="description_name" style="text-align: center;"><?php echo $introduce['title'] ?></h3>
                    <div class="description_inner">
                        <div>
                            <div style="float: left;">
                                <img src="<?php echo $introduce['url'] ?>" style="margin-right: 50px;" width="200px" height="200px" alt="">
                            </div>
                            <p><?php echo $introduce['description'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
    </div>
</div>