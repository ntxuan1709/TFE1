<?php
$new = $listCategoryNew;
$new = current($new);
?>
<div id="facebook_new" class="tokyo_tm_section active">
    <div class="box_inner">
        <div class="description_wrap">
            <div class="image">
                <img src="<?php echo $new['url'] ?>" alt="">
            </div>
            <div class="details">
                <div class="extra">
                    <div class="short custom_size">
                        <p class="date">By <a href="#"><?php echo $new['author'] ?></a> <span><?php echo $new['update_date'] ?></span></p>
                    </div>
                    <div class="my_like custom_size">
                        <a href="#"><img class="svg" src="home/assets/images/svg/eye.svg" alt=""><span><?php echo $new['view'] ?></span></a>
                    </div>
                </div>
                <h3 class="title custom_size"><strong><?php echo $new['title'] ?></strong></h3>
            </div>
            <div class="main_content">
                <div class="descriptions">
                    <p style="text-align: justify;"><?php echo $new['description'] ?> </p>
                </div>
            </div>
            <div class="news_share custom_size">
                <span>Share:</span>
                <ul>
                    <li><a href="#"><img class="svg" src="home/assets/images/svg/social/facebook.svg" alt=""></a></li>
                    <li><a href="#"><img class="svg" src="home/assets/images/svg/social/twitter.svg" alt=""></a></li>
                    <li><a href="#"><img class="svg" src="home/assets/images/svg/social/instagram.svg" alt=""></a></li>
                    <li><a href="#"><img class="svg" src="home/assets/images/svg/social/dribbble.svg" alt=""></a></li>
                    <li><a href="#"><img class="svg" src="home/assets/images/svg/social/tik-tok.svg" alt=""></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>