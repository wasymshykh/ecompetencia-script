<style>
    .institute-members {
        width: 90%;
        display: flex;
        flex-direction: column;
        margin: 0 auto;
    }
    .institute-msg {
        display: block;
        margin: 2em 0;
    }

    .institute-msg p {
        font-size: 1.4em;
        color: #c33000;
        text-align: center;
        line-height: 1.4;
        margin: 0.5em 0;
    }
    .institute-msg p.yo1 {
        font-weight: 900;
    }
    .institute-msg p.yo2 {
        font-weight: 400;
        color: #555;
    }
    .form-error {
        margin-top: 1em;
    }
    .form-success {
        margin-top: 0;
        margin-bottom: 2em;
    }
    .form-about {
        width: 100%;
        display: flex;
        align-items: center;
    }

    .form-about h1 {
        background: #0080c4;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 1px;
        padding: 10px;
        font-size: 2em;
        font-weight: 400;
    }
    .form-about h1 span {
        font-weight: 700;
    }
    .form-about p {
        background: #85ab30;
        color: #fff;
        font-weight: 400;
        font-size: 1.4em;
        padding: 5px 10px;
    }
    .form-submit {
        margin-bottom: 4em;
        padding-bottom: 2em;
        border-bottom: 1px solid #e0e0e0;
    }
</style>



<div class="institute-members">
    <div class="institute-msg">
        <p class="yo1">Unfortunately we haven't collected your members data. Please fill out the fields to confirm your participation.</p>
        <p class="yo2">Remember to enter correct data, CNIC/B-form and university card will be checked before the start competition.</p>
    </div>

    <?php if(!empty($m_success[0]) && $m_success[0]): ?>
    <div class="form-success">
        <div class="form-success-text">
            <p><b>Success!</b> <?=$m_success[1];?></p>
        </div>
    </div>
    <?php endif; ?>

    <div class="institute-form">
    <?php
        foreach($participations as $participation):
            // checking members institute
            $members = getMembersOfParticipant($participation['participant_ID']);
            foreach ($members as $member):
                if($member["institute_ID"] == NULL):
    ?>
            <div class="d-form-body">
                <form action="" method="POST">
                    <input type="hidden" name="p_id" value="<?=$member['participant_ID']?>">
                    <input type="hidden" name="m_id" value="<?=$member['member_ID']?>">

                    <div class="form-about">
                        <h1><span><?=$member['member_name']?>'s</span> Data</h1>
                        <p><?=$member['member_name']?> is your team member in <b><?=$participation['competition_name']?></b> competition</p>
                    </div>
                    <?php if(isset($member_id) && $member_id==$member['member_ID']):
                        if(!empty($m_error[0]) && $m_error[0]): ?>
                    <div class="form-error">
                        <div class="form-error-text">
                            <p><b>Error!</b> <?=$m_error[1];?></p>
                        </div>
                    </div>
                    <?php endif;
                    endif; ?>
                    <div class="form-row">
                        <div class="form-row-box">
                            <label for="member_cnic">Member CNIC</label>
                            <input type="text" name="cnic" id="member_cnic" placeholder="e.g. 42501-7000000-1" value="<?=(isset($member_id) && $member_id==$member['member_ID'] && isset($cnic))?$cnic:''?>">
                            <div class="activate"></div>
                        </div>
                        <div class="form-row-box">
                            <label for="institute">Institute</label>
                            <select name="institute" id="institute">
                                <option value="">Select Institute</option>
                                <?php foreach($institutes as $ins):?>
                                    <option value="<?=$ins['institute_ID']?>" <?=(isset($member_id) && $member_id==$member['member_ID'] && isset($institute) && $ins['institute_ID'] == $institute)?'selected="true"':''?>><?=$ins['institute_name']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-submit">
                        <button id="next" type="submit" name="update_member">Update <i class="fas fa-check"></i></button>
                    </div>
                </form>
            </div>

    <?php
                endif;
            endforeach;
        endforeach;
    ?>

    </div>
</div>


<script>


    // Select option styles

    document.querySelectorAll('select').forEach(select =>{
        let options = select.children;
        let select_box = document.createElement('div');
        select_box.classList.add('select-box');
        let select_selected = document.createElement('div');
        select_selected.classList.add('select-selected');
        let span_tochng = document.createElement('span');
        span_tochng.classList.add('tochng');
        span_tochng.innerText = options[0].innerText;
        let select_selected_i = document.createElement('i');
        select_selected_i.classList.add('fa');
        select_selected_i.classList.add('fa-caret-down');
        select_selected.appendChild(span_tochng);
        select_selected.appendChild(select_selected_i);
        select_box.append(select_selected);
        let select_drop = document.createElement('div');
        select_drop.classList.add('select-drop');
        let select_drop_ul = document.createElement('ul');

        for(let i = 1; i < options.length; i++){
            let elem_li = document.createElement('li');
            elem_li.innerText = options[i].innerText;
            select_drop_ul.appendChild(elem_li);
        }
        select_drop.appendChild(select_drop_ul);
        select_box.appendChild(select_drop);
        select.parentElement.appendChild(select_box);
    });


    document.querySelectorAll('.select-selected').forEach(selected=>{
        selected.addEventListener('click', (e)=>{
            if(selected.nextElementSibling.classList.contains('select-open')){
                selected.nextElementSibling.classList.remove('select-open');
            } else {
                selected.nextElementSibling.classList.add('select-open');
            }
        })
    })

    document.querySelectorAll('.select-drop ul li').forEach(selected=>{
        selected.addEventListener('click', (e)=>{
            if(selected.parentElement.parentElement.classList.contains('select-open')){
                selected.parentElement.parentElement.classList.remove('select-open');
            } else {
                selected.parentElement.parentElement.classList.add('select-open');
            }
            let selectedItem = e.target.textContent;
            
            let selectionMain = selected.parentElement.parentElement.parentElement.previousElementSibling.children;
            
            let attrselected = document.createAttribute('selected');
            attrselected.value = 'true';

            for(let i = 0; i < selectionMain.length; i++) {
                if(selectionMain[i].textContent === selectedItem) {
                   selectionMain[i].attributes.setNamedItem(attrselected);
                } else {
                    if(selectionMain[i].attributes.getNamedItem('selected') != null){
                        selectionMain[i].attributes.removeNamedItem('selected');
                    }
                }
            }
            selected.parentElement.parentElement.previousElementSibling.firstElementChild.textContent = selectedItem;
            

        })
    })

    document.body.addEventListener('click', e=>{
        if(!e.target.classList.contains('select-selected')){
            document.querySelectorAll('.select-drop').forEach(sd=>{
                sd.classList.remove('select-open');
            })
        }
    })

    window.addEventListener('load',()=>{
        document.querySelectorAll('select').forEach(sl=>{
            sl.nextElementSibling.firstElementChild.firstElementChild.textContent = sl.selectedOptions[0].textContent;
        })
    })
</script>