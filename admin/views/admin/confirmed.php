<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=ADMIN_URL;?>">Home</a></li>
        <li class="breadcrumb-item active">Confirmed Participants</li>
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

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Existing Confirmed Participants</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-sm dt-responsive display nowrap " id="dtb" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Team Name</th>
                                        <th>Competition</th>
                                        <th>Registered On</th>
                                        <th>Paid</th>
                                        <th>Paid On</th>
                                        <th>Recieved By</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($participants as $participant): ?>
                                    <tr>
                                        <td><?=$participant['user_fname'].' '.$participant['user_lname']?></td>
                                        <td><?=$participant['participant_team']?> <span class="badge badge-info"><?=count(getMembersOfParticipant($participant['participant_ID']))?> Members</span></td>
                                        <td><?=$participant['competition_name']?></td>
                                        <td><?=$participant['participant_time']?></td>
                                        <td><?=$participant['transaction_total'].' PKR'?></td>
                                        <td><?=$participant['details_date']?></td>
                                        <td>
                                            <?php if($participant['paid_to']=='A'):
                                                $ambassador = getAmbassadorApproved($participant['details_receiver_ID']);
                                                ?>
                                                <?=$ambassador['ambassador_fname'].' '.$ambassador['ambassador_lname']?>
                                                <br>
                                                <span class="badge badge-success">Ambassador</span>
                                            <?php else: 
                                                $management = getManagementDetailsById($participant['details_receiver_ID']);
                                                ?>
                                                <?=$management['management_fname'].' '.$management['management_lname']?>
                                                <br>
                                                <span class="badge badge-secondary">Management</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
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