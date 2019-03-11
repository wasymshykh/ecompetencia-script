<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=ADMIN_URL;?>">Home</a></li>
        <li class="breadcrumb-item active">Outside Participants</li>
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
                    <div class="card-header">
                        <h4>Participants you confirmed</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover display nowrap" style="width:100%" id="dtb">
                                <thead>
                                    <tr>
                                        <th>Leader</th>
                                        <th>Team Name</th>
                                        <th>Competition</th>
                                        <th>Institute</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Collected</th>
                                        <th>Collected On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($participants as $participant): ?>
                                    <tr>
                                        <td><?=$participant['user_fname'].' '.$participant['user_lname']?></td>
                                        <td><?=$participant['participant_team']?><span class="badge badge-info"><?=count(getMembersOfParticipant($participant['participant_ID']))?> Members</span></td>
                                        <td><?=$participant['competition_name']?></td>
                                        <td><?=getInstituteById($participant['institute_ID'])['institute_name']?></td>
                                        <td><?=$participant['user_email']?></td>
                                        <td><?=$participant['user_phone']?></td>
                                        <td><?=$participant['transaction_total'].' PKR'?></td>
                                        <td><?=$participant['details_date']?></td>
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

<script>
$(document).ready(function() {
    $('#dtb').DataTable({
        "scrollX": true
    });
});
</script>