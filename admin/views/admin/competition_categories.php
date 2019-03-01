<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=ADMIN_URL;?>">Home</a></li>
        <li class="breadcrumb-item active">Competition Categories</li>
        </ul>
    </div>
</div>

<section>
    <div class="container-fluid">

        <header>
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="h3 display">Categories</h1>
                </div>
                <div class="col-lg-auto">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addCat">Add Category</button>
                </div>
            </div>
        </header>

          <!-- Modal For Adding -->
        <div id="addCat" tabindex="-1" role="dialog" aria-labelledby="catModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 id="catModalLabel" class="modal-title">Add Competition Category</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <?php if(!empty($error)):?>
                    <div class="alert alert-danger">
                        <?=$error;?>
                    </div>
                    <?php endif; ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="c_name">Name</label>
                            <input type="text" name="category_name" id="c_name" class="form-control" placeholder="Category Name" value="<?=isset($c_name)?$c_name:''?>">
                        </div>
                        <div class="form-group">       
                            <label for="c_cat_img">Category Image</label>
                            <input type="file" name="category_img" id="c_cat_img" class="form-control">
                        </div>
                        <div class="form-group mt-4">       
                            <button class="btn btn-primary btn-block mx-auto" type="submit" name="add_cat">Add Category</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                </div>
                </div>
            </div>
        </div>
        <!-- Modal For Adding Ends -->

        <?php if($showNewModal): ?>
            <script>
                $('#addCat').modal('show');
            </script>
        <?php endif;?>

        <div class="row">
            <?php if($showEdit): ?>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Category</h4>
                    </div>
                    <div class="card-body">
                        <?php if(!empty($cat_error)):?>
                        <div class="alert alert-danger">
                            <?=$cat_error;?>
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($cat_success)):?>
                        <div class="alert alert-success">
                            <?=$cat_success;?>
                        </div>
                        <?php endif; ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="c_name">Name</label>
                                <input type="text" name="cat_name" id="c_name" class="form-control" placeholder="Category Name" value="<?=isset($cat_name)?$cat_name:$cat['category_name']?>">
                            </div>
                            <div class="form-group">
                                <img src="<?=URL?>/assets/uploads/categories/<?=$cat['category_img']?>" 
                                            style="width:40px;height:40px;border-radius:50%;border:1px solid #e0e0e0;box-shadow:0 0 10px rgba(0,0,0,0.1)">
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseUpload" aria-expanded="false" aria-controls="collapseUpload">
                                Update image
                            </button>
                            </div>
                            <div class="form-group collapse" id="collapseUpload">       
                                <label for="c_cat_img">Category Image [optional]</label>
                                <input type="file" name="cat_img" id="c_cat_img" class="form-control">
                            </div>
                            <div class="form-group mt-4">
                                <input type="submit" value="Save" name="edit_cat" class="btn btn-primary">
                                <a href="<?=ADMIN_URL?>/competition_categories.php" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>


            <div class="col-lg-<?=$showEdit?'8':'12'?>">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Existing Categories</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Category Name</th>
                                        <th>Competitions</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($categories as $category): if($category['is_deleted'] == 'N'): ?>
                                    <tr>
                                        <td>
                                            <img src="<?=URL?>/assets/uploads/categories/<?=$category['category_img']?>" 
                                            style="width:40px;height:40px;border-radius:50%;border:1px solid #e0e0e0;box-shadow:0 0 10px rgba(0,0,0,0.1)">
                                        </td>
                                        <td><?=$category['category_name']?></td>
                                        <td><?=count(getCompetitionsByCategoryId($category['category_ID']))?></td>
                                        <td>
                                            <a href="<?=ADMIN_URL?>/competition_categories.php?edit=<?=$category['category_ID']?>" class="btn btn-primary btn-sm mr-3">
                                                <i class="fas fa-edit mr-2"></i> Edit
                                            </a>
                                            <a href="<?=ADMIN_URL?>/competition_categories.php?delete=<?=$category['category_ID']?>" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt mr-2"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endif; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    
    </div>
</section>