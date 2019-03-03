<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=ADMIN_URL;?>">Home</a></li>
        <li class="breadcrumb-item active">Coupons</li>
        </ul>
    </div>
</div>

<section>
    <div class="container-fluid">

        <header>
            <div class="row">
                <div class="col-lg-10">
                    <h1 class="h3 display">Coupons</h1>
                </div>
                <div class="col-lg-auto">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addCoup">Add Coupon</button>
                </div>
            </div>
        </header>

          <!-- Modal For Adding -->
        <div id="addCoup" tabindex="-1" role="dialog" aria-labelledby="catModalLabel" aria-hidden="true" class="modal fade text-left">
            <div role="document" class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 id="catModalLabel" class="modal-title">Add Coupon</h5>
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
                                    <label for="coupon_name">Name</label>
                                    <input type="text" name="coupon_name" id="coupon_name" class="form-control" placeholder="Coupon Name" value="<?=isset($name)?$name:''?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="c_limit">Use Limit</label>
                                    <input type="number" name="coupon_limit" id="c_limit" class="form-control" placeholder="Max use limit" value="<?=isset($limit)?$limit:''?>">
                                    <small class="form-text text-muted">the number of times coupons can be redeemed</small>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="discount_type">Discount Type</label>
                                <select name="coupon_type" id="discount_type" class="form-control">
                                    <option value="P" <?=(isset($type) && $type=="P")?"selected":''?>>Percentage</option>
                                    <option value="F" <?=(isset($type) && $type=="F")?"selected":''?>>Fixed</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label for="discount_am">Discount Amount <i class="small">(in % or Decimal)</i></label>
                                <input type="number" name="coupon_discount" id="discount_am" class="form-control" placeholder="e.g. 15, 50, 250" value="<?=isset($discount)?$discount:''?>">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group mt-4">       
                            <button class="btn btn-primary btn-block mx-auto" type="submit" name="add_coupon">Add Coupon</button>
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

        <?php if($show): ?>
            <script>
                $('#addCoup').modal('show');
            </script>
        <?php endif;?>

        <div class="row">

            <?php if($showEdit): ?>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Coupon</h4>
                    </div>
                    <div class="card-body">
                        <?php if(!empty($coup_error)):?>
                        <div class="alert alert-danger">
                            <?=$coup_error;?>
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($coup_success)):?>
                        <div class="alert alert-success">
                            <?=$coup_success;?>
                        </div>
                        <?php endif; ?>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="co_name">Name</label>
                                <input type="text" name="coup_name" id="co_name" class="form-control" placeholder="Coupon Name" value="<?=isset($u_name)?$u_name:$coupon['coupon_name']?>">
                            </div>
                            <div class="form-group">
                                <label for="dis_type">Discount Type</label>
                                <select name="coup_type" id="dis_type" class="form-control">
                                    <option value="P" <?=($coupon['coupon_type']=='P')?"selected":''?>>Percentage</option>
                                    <option value="F" <?=($coupon['coupon_type']=='F')?"selected":''?>>Fixed</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="discount_amount">Discount Amount <i class="small">(in % or Decimal)</i></label>
                                <input type="number" name="coup_discount" id="discount_amount" class="form-control" placeholder="e.g. 15, 50, 250" value="<?=isset($u_discount)?$u_discount:$coupon['coupon_discount']?>">
                            </div>
                            <div class="form-group mt-4">
                                <input type="submit" value="Save" name="edit_coupon" class="btn btn-primary">
                                <a href="<?=ADMIN_URL?>/coupons.php" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="col-lg-<?=$showEdit?'8':'12'?>">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Existing Coupons</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Discount</th>
                                        <th>Times Used</th>
                                        <th>Use Limit</th>
                                        <th></th>
                                    </tr>
                                </thead>
    
                                <tbody>
                                    <?php 
                                        $coupons = getCoupons();
                                        foreach ($coupons as $coupon):
                                    ?>
                                    <tr>
                                        <td><?=$coupon['coupon_name']?></td>
                                        <td><?=$coupon['coupon_discount']. ''.(($coupon['coupon_type']=='P')?'%':'PKR') .''?></td>
                                        <td><?=numberTimeCouponUsed($coupon['coupon_ID'])?></td>
                                        <td><?=$coupon['coupon_limit']?></td>
                                        <td style="max-width: 100px">
                                            <a href="<?=ADMIN_URL?>/coupons.php?edit=<?=$coupon['coupon_ID']?>" class="btn btn-primary btn-sm mr-3">
                                                <i class="fas fa-edit mr-2"></i> Edit
                                            </a>
                                            <?php if($_SESSION['management']['management_type'] === 'A'):?>
                                                <?php if($coupon['coupon_status']=='E'): ?>
                                                <a href="coupons.php?toggle=<?=$coupon['coupon_ID']?>" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-times mr-2"></i> Disable
                                                </a>
                                                <?php else: ?>
                                                <a href="coupons.php?toggle=<?=$coupon['coupon_ID']?>" class="btn btn-success btn-sm">
                                                    <i class="fas fa-check mr-2"></i> Enable
                                                </a>
                                                <?php endif; ?>
                                            <?php endif;?>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>