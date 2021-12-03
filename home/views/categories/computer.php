<div id="technology" class="tokyo_tm_section active">
    <div class="container">
        <div class="tokyo_tm_news">
            <div class="tokyo_tm_title">
                <div class="title_flex">
                    <div class="left">
                        <span><?php echo constant($categoryName); ?></span>
                        <h3>Latest News</h3>
                    </div>
                </div>
            </div>
            <ul>
                <?php $computer = $listCategory;
                $value = 6;
                if (count($listCategory) > $value) {
                    $value = 6;
                } else {
                    $value = count($listCategory);
                }
                $i = 0;
                for ($i; $i < $value; $i++) {
                    $computer = current($computer);
                    // current($computer);
                    // echo var_dump(current($computer));
                ?>
                    <li>
                        <div class="list_inner">
                            <div class="image">
                                <img src="home/assets/images/thumbs/4-3.jpg" alt="" />
                                <div class="main" data-img-url="<?php echo $computer["url"] ?>"></div>
                                <a class="tokyo_tm_full_link" href="?controller=category&act=category_new&id=<?php echo $computer["new_id"]; ?><?php echo '&lang=' . $_SESSION['lang'] ?>"></a>
                            </div>
                            <div class="details showMenu">
                                <div class="extra">
                                    <div class="short">
                                        <p class="date">By <a href="#"><?php echo $computer["author"] ?></a>
                                            <span><?php
                                                    $date = explode(' ', $computer["update_date"]);
                                                    echo $date[0];
                                                    ?></span>
                                        </p>
                                    </div>
                                    <div class="my_like">
                                        <a href="#"><img class="svg" src="home/assets/images/svg/eye.svg" alt="" /><span><?php echo $computer["view"] ?></span></a>
                                    </div>
                                </div>
                                <h3 class="title"><a href="?controller=category&act=category_new&id=<?php echo $computer["new_id"]; ?><?php echo '&lang=' . $_SESSION['lang'] ?>"><?php echo $computer["title"] ?></a></h3>
                                <?php 
                                $listCategoryName = $category->getCategoryName($computer["new_id"]);
                                foreach ($listCategoryName as $categoryName) {
                                ?>
                                    <a href="?controller=<?php echo $categoryName['name'] ?>&act=showAll<?php echo '&lang=' . $_SESSION['lang'] ?>">
                                        <?php echo constant($categoryName["name"]); ?>
                                    </a>&ensp;
                                <?php
                                } ?>
                                <div class="tokyo_tm_read_more showMenu">
                                    <a href="#social_network_new"><span>Read More</span></a>
                                </div>
                            </div>
                        </div>

                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</div>