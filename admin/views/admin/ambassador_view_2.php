<section class="section-padding">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-10">
                                <h4><?=$applicant['ambassador_fname']?> <?=$applicant['ambassador_lname']?> <span style="font-weight:normal">- Application<span></h4>
                            </div>

                            <div class="col-md-2 text-right">
                                <a href="ambassadors.php" class="btn btn-dark btn-sm"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp; Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        

                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?=URL?>/assets/img/ambassador/<?=$applicant['ambassador_avatar']?>" style="width: 100%;height:auto;display:block">
                            </div>
                            <div class="col-md-8">
                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <th>First Name</th>
                                            <td><?=$applicant['ambassador_fname']?></td>
                                            <th style="border-left:1px solid #e0e0e0;">Last Name</th>
                                            <td><?=$applicant['ambassador_lname']?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td colspan="3"><?=$applicant['ambassador_email']?></td>
                                        </tr>
                                        <tr>
                                            <th>Phone</th>
                                            <td colspan="3"><?=$applicant['ambassador_phoneno']?></td>
                                        </tr>
                                        <tr>
                                            <th>Insitute</th>
                                            <td colspan="3"><?=getInstituteById($applicant['institute_ID'])['institute_name']?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>