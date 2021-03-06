<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=ADMIN_URL;?>">Home</a></li>
        <li class="breadcrumb-item active">Inside Participants</li>
        </ul>
    </div>
</div>

<section>
    <div class="container-fluid">

        <header>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="h3 display">Participants</h1>
                </div>
            </div>
        </header>

        <div class="row">
            <?php if($showConfirm): ?>
            <div class="col-lg-8 offset-2 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Confirmation</h4>
                    </div>
                    <div class="card-body">
                        <?php if(!empty($user_error)):?>
                        <div class="alert alert-danger">
                            <?=$user_error;?>
                        </div>
                        <?php endif; ?>
                        <?php if(!empty($user_success)):?>
                        <div class="alert alert-success">
                            <?=$user_success;?>
                        </div>
                        <?php else: ?>
                        <form action="" method="POST">
                            <div class="row statistics">
                                <div class="col-lg-6 text-center">
                                    <p>Name</p>
                                    <h5><?=$part['user_fname'].' '.$part['user_lname']?></h5>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <p>Competition</p>
                                    <h5><?=$part['competition_name']?></h5>
                                </div>
                                <div class="col-lg-12">
                                    <div class="income text-center">
                                        <div class="icon"><i class="icon-bill"></i></div>
                                        <div class="number"><?=$part['transaction_total']?> PKR</div><strong class="text-primary">Collect It</strong>
                                        <p>You must collect that cash from participant before proceeding.</p>
                                    </div>
                                </div>
                            </div
                            <hr>
                            <div class="form-group mt-4 text-center">
                                <input type="submit" value="Yes, I've Recieved" name="confirm_participant" class="btn btn-primary">
                                <a href="<?=AM_URL?>/institute_participants.php" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Institute Unconfirmed Participants</h4>
                        <p>List of participants that are from your institute.</p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover display nowrap" style="width:100%" id="dtb">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Team Name</th>
                                        <th>Competition</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Due</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($participants as $participant): ?>
                                    <tr>
                                        <td><?=$participant['user_fname'].' '.$participant['user_lname']?></td>
                                        <td><?=$participant['participant_team']?><span class="badge badge-info"><?=count(getMembersOfParticipant($participant['participant_ID']))?> Members</span></td>
                                        <td><?=$participant['competition_name']?></td>
                                        <td><?=$participant['user_email']?></td>
                                        <td><?=$participant['user_phone']?></td>
                                        <td><?=$participant['transaction_total'].' PKR'?></td>
                                        <td style="text-align:center" class="no-sort">
                                            <a href="<?=AM_URL?>/institute_participants.php?confirm=<?=$participant['participant_ID']?>" class="btn btn-primary btn-sm m-1">
                                                <i class="fas fa-check mr-2"></i> Confirm
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Team Name</th>
                                        <th>Competition</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Due</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    
    </div>
</section>

<script>
$(document).ready(function() {
    $('#dtb tfoot th').each( function () {
        var title = $('#dtb thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search '+title+'" />' );
    });
    
    var table = $('#dtb').DataTable({
        "scrollX": true,
        "columnDefs": [{
          "targets": 'no-sort',
          "orderable": false,
        }]
    });
    
    table.columns().every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function() {
            that.search(this.value).draw();
        });
    });
});
</script>