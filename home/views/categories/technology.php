<div id="technology" class="tokyo_tm_section active">
    <div class="container">
        <div class="tokyo_tm_news">
            <div class="tokyo_tm_title">
                <div class="title_flex">
                    <div class="left">
                        <span><?php echo constant($categoryName); ?></span>
                        <h3>Thông tin về bài viết</h3>
                    </div>
                </div>
            </div>
            <ul>
                <?php
                $technology = $listCategory;
                $value = 6;
                if (count($listCategory) > $value) {
                    $value = 6;
                } else {
                    $value = count($listCategory);
                }
                for ($i = 0; $i < $value; $i++) {
                    $technology = current($technology);
                ?>
                    <li>
                        <div class="list_inner">
                            <div class="image">
                                <img src="home/assets/images/thumbs/smartphone.png" alt="" />
                                <div class="main" data-img-url="<?php echo $technology["url"] ?>"></div>
                                <a class="tokyo_tm_full_link" href="?controller=category&act=category_new&id=<?php echo $technology["new_id"]; ?><?php echo '&lang=' . $_SESSION['lang'] ?>"></a>
                            </div>
                            <div class="details showMenu">
                                <div class="extra">
                                    <div class="short">
                                        <p class="date">By <a href="#"><?php echo $technology["author"] ?></a>
                                            <span><?php
                                                    $date = explode(' ', $technology["update_date"]);
                                                    echo $date[0];
                                                    ?></span>
                                        </p>
                                    </div>
                                    <div class="my_like">
                                        <a href="#"><img class="svg" src="home/assets/images/svg/eye.svg" alt="" /><span><?php echo $technology["view"] ?></span></a>
                                    </div>
                                </div>
                                <h3 class="title"><a href="?controller=category&act=category_new&id=<?php echo $technology["new_id"]; ?><?php echo '&lang=' . $_SESSION['lang'] ?>"><?php echo $technology["title"] ?></a></h3>
                                <?php
                                $listCategoryName = $category->getCategoryName($technology["new_id"]);
                                foreach ($listCategoryName as $categoryName) {
                                ?>
                                    <a href="?controller=category&act=showAll<?php echo '&lang=' . $_SESSION['lang'] ?>">
                                        <?php echo constant($categoryName["name"]); ?>
                                    </a>&ensp;
                                <?php
                                } ?>
                                <div class="tokyo_tm_read_more showMenu">
                                    <a href="#social_network_new"><span>Đọc bài</span></a>
                                </div>
                            </div>
                        </div>

                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>