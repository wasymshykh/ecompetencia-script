<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=URL;?>">Home</a></li>
        <li class="breadcrumb-item active">Competitions</li>
        </ul>
    </div>
</div>

<section>
    <div class="container-fluid">

        <header>
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="h3 display">Competitions</h1>
                </div>
                <div class="col-lg-auto">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addComp">Add Competition</button>
                </div>
            </div>
        </header>

          <!-- Modal For Adding -->
        <div id="addComp" tabindex="-1" role="dialog" aria-labelledby="catModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 id="catModalLabel" class="modal-title">Add Competition</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <?php if(!empty($error)):?>
                    <div class="alert alert-danger">
                        <?=$error;?>
                    </div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="c_name">Name</label>
                                    <input type="text" name="c_name" id="c_name" class="form-control" placeholder="Competition Name" value="<?=isset($c_name)?$c_name:''?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="c_limit">Limit</label>
                                    <input type="number" name="c_limit" id="c_limit" class="form-control" placeholder="e.g. 50" value="<?=isset($c_limit)?$c_limit:''?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="c_cat">Category</label>
                            <select name="c_cat" id="c_cat" class="form-control">
                                <?php foreach($categories as $category): ?>
                                    <option value="<?=$category['category_ID']?>"><?=$category['category_name']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="c_min">Minimum Members</label>
                                <input type="number" name="c_min" id="c_min" class="form-control" placeholder="E.g. 1" value="<?=isset($c_min)?$c_min:''?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="c_max">Maximum Members</label>
                                <input type="number" name="c_max" id="c_max" class="form-control" placeholder="E.g. 5" value="<?=isset($c_max)?$c_max:''?>">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="c_fee_e">External Fee</label>
                                <input type="number" name="c_fee_e" id="c_fee_e" class="form-control" placeholder="E.g. 5000" value="<?=isset($c_fee_e)?$c_fee_e:''?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="c_fee_i">Internal Fee</label>
                                <input type="number" name="c_fee_i" id="c_fee_i" class="form-control" placeholder="E.g. 300" value="<?=isset($c_fee_i)?$c_fee_i:''?>">
                            </div>
                        </div>
                        <div class="form-group mt-4">       
                            <button class="btn btn-primary btn-block mx-auto" type="submit" name="add_comp">Add Competition</button>
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
                $('#addComp').modal('show');
            </script>
        <?php endif;?>

        <div class="row">
            <?php if($showEdit): ?>
            <div class="col-lg-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Competition</h4>
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
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="e_cname">Name</label>
                                        <input type="text" name="e_cname" id="e_cname" class="form-control" placeholder="Competition Name" value="<?=isset($e_cname)?$e_cname:$comp['competition_name']?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="e_c_limit">Limit</label>
                                        <input type="number" name="e_c_limit" id="c_limit" class="form-control" placeholder="e.g. 50" value="<?=isset($e_c_limit)?$e_c_limit:$comp['competition_limit']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="e_c_cat">Category</label>
                                <select name="e_c_cat" id="e_c_cat" class="form-control">
                                    <?php foreach($categories as $category): ?>
                                        <option value="<?=$category['category_ID']?>" <?=($comp['category_ID'] == $category['category_ID'])?'selected':''?>><?=$category['category_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="e_c_min">Minimum Members</label>
                                    <input type="number" name="e_c_min" id="e_c_min" class="form-control" placeholder="E.g. 1" value="<?=isset($e_c_min)?$e_c_min:$comp['competition_min']?>">
                                </div>
                                <div class="col-sm-6">
                                    <label for="e_c_max">Maximum Members</label>
                                    <input type="number" name="e_c_max" id="e_c_max" class="form-control" placeholder="E.g. 5" value="<?=isset($e_c_max)?$e_c_max:$comp['competition_max']?>">
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="e_c_fee_e">External Fee</label>
                                    <input type="number" name="e_c_fee_e" id="e_c_fee_e" class="form-control" placeholder="E.g. 5000" value="<?=isset($e_c_fee_e)?$e_c_fee_e:$comp['competition_e_fee']?>">
                                </div>
                                <div class="col-sm-6">
                                    <label for="e_c_fee_i">Internal Fee</label>
                                    <input type="number" name="e_c_fee_i" id="e_c_fee_i" class="form-control" placeholder="E.g. 300" value="<?=isset($e_c_fee_i)?$e_c_fee_i:$comp['competition_i_fee']?>">
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <input type="submit" value="Save" name="edit_comp" class="btn btn-primary">
                                <a href="<?=ADMIN_URL?>/competitions.php" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Existing Competitons</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Min.</th>
                                        <th>Max.</th>
                                        <th>External Fee</th>
                                        <th>Internal Fee</th>
                                        <th>Limit</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($competitions as $competition): ?>
                                    <tr>
                                        <td><?=$competition['competition_name']?></td>
                                        <td><?=getCategoryById($competition['category_ID'])['category_name']?></td>
                                        <td><?=$competition['competition_min']?></td>
                                        <td><?=$competition['competition_max']?></td>
                                        <td><?=$competition['competition_e_fee']?></td>
                                        <td><?=$competition['competition_i_fee']?></td>
                                        <td><?=$competition['competition_limit']?></td>
                                        <td align="right">
                                            <a href="<?=ADMIN_URL?>/competitions.php?edit=<?=$competition['competition_ID']?>" class="btn btn-primary btn-sm mr-3">
                                                <i class="fas fa-edit mr-2"></i> Edit
                                            </a>
                                            <?php if($competition['competition_status'] == 'D'): ?>
                                            <a href="<?=ADMIN_URL?>/competitions.php?toggle=<?=$competition['competition_ID']?>" class="btn btn-success btn-sm">
                                                <i class="fas fa-check-double mr-2"></i> Enable
                                            </a>
                                            <?php else: ?>
                                            <a href="<?=ADMIN_URL?>/competitions.php?toggle=<?=$competition['competition_ID']?>" class="btn btn-warning btn-sm">
                                                <i class="fas fa-ban mr-2"></i> Disable
                                            </a>
                                            <?php endif; ?>
                                            <a href="<?=ADMIN_URL?>/competitions.php?delete=<?=$competition['competition_ID']?>" class="btn btn-danger btn-sm mr-3">
                                                <i class="fas fa-trash-alt"></i>
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