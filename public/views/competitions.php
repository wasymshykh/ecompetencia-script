<div id="content">
    <div class="content-inner">
    
        <div class="content-title">
            <h1>Competitions</h1>
            <h3>Categories</h3>
        </div>

        <div class="content-body">
<?php foreach($categories as $category): ?>
            <div class="category-row">
                <div class="category-title" style="background:linear-gradient(rgba(11, 25, 33,0.85),rgba(11, 25, 33,1)), url('http://studiiooath.com/Projects/ecompetencia/assets/uploads/categories/<?=$category['category_img']?>') no-repeat; background-size: auto, cover;">
                    <h3>Category</h3>
                    <h1><?=$category['category_name']?></h1>
                </div>
                <div class="category-competitions">

                    <?php 
                        $competitions = getCompetitionsByCategoryId($category['category_ID']);
                        foreach($competitions as $competition): 
                    ?>
                    <div class="cat-comp-box" onclick="window.location.href='<?=URL?>/competition.php?comp=<?=$competition['competition_ID']?>'">
                        <div class="cat-comp-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="cat-comp-text">
                            <h1><?=$competition['competition_name']?></h1>
                            <a href="<?=URL?>/competition.php?comp=<?=$competition['competition_ID']?>">Details <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
<?php endforeach; ?>

        </div>

    </div>
</div>