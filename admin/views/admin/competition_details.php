<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=ADMIN_URL;?>">Home</a></li>
        <li class="breadcrumb-item active">Competitions</li>
        </ul>
    </div>
</div>

<section>
    <div class="container-fluid">

        <header>
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="h3 display">Competition Details</h1>
                </div>
            </div>
        </header>

        <div class="row">
            <?php if($showEdit): ?>
            <div class="col-lg-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Competition Details - <?=$comp['competition_name'];?></h4>
                    </div>
                    <div class="card-body">
                        <?php if(!empty($comp_error)):?>
                        <div class="alert alert-danger">
                            <?=$comp_error;?>
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($comp_success)):?>
                        <div class="alert alert-success">
                            <?=$comp_success;?>
                        </div>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="e_desc">Details [Competition Details]</label>
                                <p>Please use simple text without any html attribute</p>
                                <textarea name="e_desc" id="e_desc" cols="30" rows="5" class="form-control"><?=isset($e_desc)?$e_desc:$comp['details_description'];?></textarea>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="e_winning">Winning Criteria</label>
                                <p>Please use only 'li' elements</p>
                                <textarea name="e_winning" id="e_winning" cols="30" rows="5" class="form-control"><?=isset($e_winning)?$e_winning:$comp['details_winning'];?></textarea>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label for="e_rules">Rules</label>
                                <p>Please use only 'li' elements</p>
                                <textarea name="e_rules" id="e_rules" cols="30" rows="5" class="form-control"><?=isset($e_rules)?$e_rules:$comp['details_rules'];?></textarea>
                            </div>

                            <div class="form-group mt-4">
                                <input type="submit" value="Save" name="edit_comp" class="btn btn-primary">
                                <a href="<?=ADMIN_URL?>/competition_details.php" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Existing Competiton Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($competitions as $competition): ?>
                                    <tr>
                                        <td><?=$competition['competition_name']?></td>
                                        <td><?=getCategoryById($competition['category_ID'])['category_name']?></td>
                                        <td align="right">
                                            <a href="<?=ADMIN_URL?>/competition_details.php?edit=<?=$competition['competition_ID']?>" class="btn btn-primary btn-sm mr-3">
                                                <i class="fas fa-edit mr-2"></i> Edit Details
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    
    </div>
</section>