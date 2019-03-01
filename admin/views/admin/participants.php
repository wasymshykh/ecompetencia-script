<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?=ADMIN_URL;?>">Home</a></li>
        <li class="breadcrumb-item active">Manage Participants</li>
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
            <?php if($showEdit): ?>
            <div class="col-lg-12 mb-5">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Participation</h4>
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
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="e_teamname">Team Name</label>
                                <input type="text" name="e_teamname" id="e_teamname" class="form-control" placeholder="e.g. Sulpher" value="<?=isset($e_teamname)?$e_teamname:$part['participant_team']?>">
                            </div>

                            <div class="alert alert-warning" id="warn_edit" style="display: none;">
                                Warning! competition is about to be changed. Transaction will be updated. Action will truncate incase of double participation.
                            </div>
                            
                            <div class="form-group">
                                <label for="e_comp">Competition</label>
                                <select name="e_comp" id="e_comp" class="form-control">
                                    <?php foreach($competitions as $competition): ?>
                                        <option value="<?=$competition['competition_ID']?>" <?=($competition['competition_ID'] == $part['competition_ID'])?'selected':''?>><?=$competition['competition_name'].' [MIN-'.$competition['competition_min'].'] [MAX-'.$competition['competition_max'].']'?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="row" id="emembers"></div>
                            <hr>
                            <div class="form-group mt-4">
                                <input type="submit" value="Save" name="edit_participant" class="btn btn-primary">
                                <a href="<?=ADMIN_URL?>/participants.php" class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>


            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Existing Participants</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Team Name</th>
                                        <th>Competition</th>
                                        <th>Registered On</th>
                                        <th>Is Paid</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($participants as $participant): ?>
                                    <tr>
                                        <td><?=$participant['user_fname'].' '.$participant['user_lname']?></td>
                                        <td><?=$participant['participant_team']?><span class="badge badge-info"><?=count(getMembersOfParticipant($participant['participant_ID']))?> Members</span></td>
                                        <td><?=$participant['competition_name']?></td>
                                        <td><?=$participant['participant_time']?></td>
                                        <td><?=$participant['transaction_status']=='P'?$participant['transaction_total'].'PKR <span class="badge badge-success">PAID</span>':$participant['transaction_total'].'PKR <span class="badge badge-warning">NOT PAID</span>'?></td>
                                        <td style="text-align:center">
                                            <a href="<?=ADMIN_URL?>/participants.php?edit=<?=$participant['participant_ID']?>" class="btn btn-primary btn-sm m-1">
                                                <i class="fas fa-edit mr-2"></i> Edit
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


<script>

document.querySelector('#e_comp').addEventListener('change',(e)=>{
    
    let notEqual = "<?=$part['competition_ID']?>"

    for(let i = 0; i<e.target.children.length;i++){
        if(e.target.children[i].selected){
            val = e.target.children[i].value;
            str = e.target.children[i].innerText;
        }
    }

    if(notEqual != val){
        let min_ptn = /MIN-(\d)?/
        let max_ptn = /MAX-(\d)?/
        let min_member = Number(min_ptn.exec(str)[1]);
        let max_member = Number(max_ptn.exec(str)[1]);

        document.querySelector('#emembers').innerHTML = "";
        warn_edit.style.display = 'block';

        for(let i = 0; i < max_member-1; i++){
            let col = document.createElement('div');
            col.setAttribute('class','col');

            let collbl = document.createElement('label');
            collbl.innerText = "Member "+(i+1);
            collbl.setAttribute('for','e_member-'+(i+1));

            let colinput = document.createElement('input');
            colinput.setAttribute('type','text');
            colinput.setAttribute('name','e_members[]');
            colinput.setAttribute('id','e_member-'+(i+1));
            colinput.setAttribute('class','form-control');

            col.appendChild(collbl);
            col.appendChild(colinput);
            document.querySelector('#emembers').appendChild(col);
        }
    } else {
        document.querySelector('#emembers').innerHTML = "";
        warn_edit.style.display = 'none';
    }


})


</script>