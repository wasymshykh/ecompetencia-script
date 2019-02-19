<section class="section-padding">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Recieved Applications</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Picture</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Program [semester]</th>
                                        <th style="width: 200px">Skills</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach($applicants as $applicant): ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td><div style="width: 30px;height: 30px;overflow:hidden;border-radius:50%;">
                                            <img src="http://ecompetencia19.com/inductions/applicants/member/<?=$applicant['avatar']?>" style="width: 100%;height:auto;display:block">
                                            </div>
                                        </td>
                                        <td><?=$applicant['fname']?> <?=$applicant['lname']?></td>
                                        <td><?=$applicant['email']?></td>
                                        <td><?=$applicant['program']?> [<?=$applicant['semester']?>]</td>
                                        <td><?=getSkillBadges($applicant['skill'])?></td>
                                        <td>
                                            <a href="?view=<?=$applicant['id']?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>