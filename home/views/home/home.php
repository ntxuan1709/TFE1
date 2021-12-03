<!-- HOME -->
<div id="home" class="tokyo_tm_section active">
    <div class="container">
        <div class="tokyo_tm_home custom_size" style="min-height:5px;padding-top: 80px;">
            <form action="/search.php">
                <h4 class="custom_size"><?php echo constant("search_title"); ?></h4>
                <input type="text" style="width: 600px;" id="search" name="search">
                <input type="submit" value="<?php echo constant("search"); ?>">
            </form>
        </div>
        <div class="tokyo_tm_home" style="min-height: 70vh;width: 100%;">
            <div class="home_content">
                <div class="avatar">
                    <div class="image" data-img-url="home/assets/images/slider/elderly-technology.jpg"></div>
                </div>
                <div class="details">
                    <h4 class="name custom_size"><?php echo constant("home_name"); ?></h4>
                    <p class="job"><?php echo constant("technology_generation"); ?></p>
                    <div class="age custom_size">
                        <ul>
                            <li><a href="#">
                                    <p>50+</p>
                                </a></li>
                            <li><a href="#">
                                    <p>60+</p>
                                </a></li>
                            <li><a href="#">
                                    <p>70+</p>
                                </a></li>
                            <li><a href="#">
                                    <?php echo constant("another"); ?>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /HOME -->