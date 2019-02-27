<div class="d-container">

    <div class="d-row">

    <?php if(isset($step_1) && $step_1): ?>
        <div class="d-title">
            <h1>Select <b>Competition</b></h1>
            <p>You are about to start participation process.</p>
        </div>

        <div class="d-form">
            <form action="" method="POST">
            <?php if(!empty($error)):?>
            <div class="form-error" style="margin-top: 2em;">
                <div class="form-error-text">
                    <h3>Error!</h3>
                    <p><?=$error;?></p>
                </div>
            </div>
            <?php endif; ?>
            <div class="form-row-checks">
                <div class="form-row-checks-all">
                    <?php foreach($competitions as $competition):
                        if($competition['competition_status'] == 'E'): ?>
                    <div class="form-row-check">
                        <input type="radio" name="competition" id="comp-<?=$competition['competition_ID']?>" value="<?=$competition['competition_ID']?>">
                        <label for="comp-<?=$competition['competition_ID']?>">
                            <div class="comp-abs-check">
                                <i class="Ahmed Muneebfas fa-check"></i>
                            </div>
                            <div class="comp-head-cat">
                                <?=$competition['category_name']?>
                            </div>
                            <div class="comp-title">
                                <?=$competition['competition_name']?>
                            </div>
                            <div class="comp-members">
                                <div class="comp-mem-box">Min <span><?=$competition['competition_min']?></span> person</div>
                                <div class="comp-mem-box">Max <span><?=$competition['competition_max']?></span> person</div>
                            </div>
                            <div class="coAhmed Muneebmp-price">
                                <div class="comp-price-text"><?=$competition['competition_e_fee']?> <span>PKR</span></div>
                                <div class="comp-price-about">Per Person</div>
                            </div>
                        </label>
                    </div>
                    <?php endif; endforeach; ?>
                </div>
            </div>
    
            <div class="form-submit">
                <button id="next" name="step_1" type="submit">Continue <i class="fas fa-arrow-right"></i></button>
            </div>
            </form>
        </div>
        <?php endif; ?>

        <?php if(isset($step_2) && $step_2): ?>
        <div class="d-form">
            <div class="d-form-top">
                <div class="d-form-t-box">
                    <span>Selected Competition</span> <?=$_SESSION['process_competition_name']?>
                </div>
                <div class="d-form-t-box">
                    <span>Team Leader</span> <?=$user['user_fname'].' '.$user['user_lname']?>
                </div>
            </div>
            <?php if(!empty($error)):?>
            <div class="form-error" style="margin-top: 2em;">
                <div class="form-error-text">
                    <h3>Error!</h3>
                    <p><?=$error;?></p>
                </div>
            </div>
            <?php endif; ?>
            <div class="d-form-body">
                <form action="" method="POST">
                <div class="form-row">
                    <div class="form-row-box">
                        <label for="team_name">Team Name</label>
                        <p>Choose a fance team name</p>
                        <input type="text" name="team_name" id="team_name" placeholder="e.g. Beatlines" value="<?=isset($team_name)?$team_name:''?>">
                        <div class="activate"></div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-row-box">
                        <label for="persons">Team Members</label>
                        <p>Make sure to select number of members in defined limits.</p>
                        <select name="persons" id="persons">
                            <option value="">Number of Persons</option>
                            <?php if($_SESSION['process_competition_min'] === $_SESSION['process_competition_max']): ?>
                                <option value="<?=$_SESSION['process_competition_min'] - 1?>" <?=(isset($persons) && ($_SESSION['process_competition_min']-1)==$persons)?'selected=true':'';?>><?=$_SESSION['process_competition_min'] - 1;?></option>
                            <?php else: ?>
                                <?php for($i = $_SESSION['process_competition_min']-1; $i < $_SESSION['process_competition_max']; $i++): ?>
                                    <option value="<?=$i?>" <?=(isset($persons) && $i==$persons)?'selected=true':'';?>><?=$i?></option>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-row-box" id="memberFields">
                        <?php if(isset($persons) && $persons > 0):?>
                            <?php for($i = 1; $i <= $persons; $i++):?>
                            <div class="alotFields">
                                <label for="member-<?=$i?>">Member <?=$i?></label>
                                <input name="member[]" type="text" placeholder="e.g. Ahmed" id="member-<?=$i?>" value="<?=isset($members[$i-1])?$members[$i-1]:''?>">
                                <div class="activate"></div>
                            </div>
                            <?php endfor;?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-submit">
                    <button id="next" type="submit" name="step_2">Continue <i class="fas fa-arrow-right"></i></button>
                </div>
                </form>
            </div>
        </div>
        <?php endif; ?>

        <?php if(isset($step_3) && $step_3): ?>
        <div class="d-title">
            <h1><b>Confirm</b> Your Details</h1>
            <p>Here's the summary of your provided details.</p>
        </div>
        <div class="d-confirm-row">
            <div class="d-confirm-detail">
                <span>Competition</span> <?=$_SESSION['process_competition_name']?>
            </div>
            <div class="d-confirm-detail">
                <span>Team Member</span> <?=$_SESSION['process_team_members']?>
                    <?php foreach($_SESSION['process_team_member_names'] as $member_name): ?>
                    <span class="d-c-team"><?=$member_name?></span>
                    <?php endforeach;?>
            </div>
            <div class="d-confirm-detail">
                <span>Team Name</span> <?=$_SESSION['process_team_name']?>
            </div>
            <div class="d-confirm-detail">
                <span>Team Leader</span> <?=$user['user_fname'].' '.$user['user_lname']?>
            </div>
            <div class="d-confirm-cost">
                <div class="d-confirm-cost-box">
                    <h1><span id="totalamm"><?=$_SESSION['process_total_amount']?></span> PKR</h1>
                    <p>Amount Due</p>
                </div>
                <div class="d-confirm-discount-box">
                    <h1><span id="totaldiscount"><?=isset($_SESSION['process_discount'])?$_SESSION['process_discount']:'0';?></span> PKR</h1>
                    <p>Discount Applied</p>
                </div>
                <div class="d-confirm-discount">
                    <div class="form-row-box">
                        <label for="promo_code">Promo Code</label>
                        <p>Must click on <b>apply code</b> before confirm</p>
                        <input type="text" name="promo_code" id="promo_code" placeholder="write here" value="">
                        <div class="activate"></div>
                    </div>
                    <div class="form-submit">
                        <button id="check">Apply <i class="fas fa-check"></i></button>
                    </div>
                    <div class="form-msg-box"></div>
                </div>
            </div>

            <div class="form-submit">
                <button id="next">Confirm Participation</button>
            </div>

        </div>
        <?php endif; ?>



    </div>
</div>



<script>

    totalAmount = <?=$_SESSION['process_total_amount']?>;

    document.querySelector("#check").addEventListener('click',(e)=>{
        e.preventDefault();

        promocode = (document.querySelector('#promo_code').value).trim();
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if(res.success != undefined && res.success === true){
                    console.log(res);
                    if(res.type == 'P'){
                        amm = totalAmount * (Number(res.discount)/100);
                    } else {
                        amm = totalAmount - Number(res.discount);
                    }
                    document.querySelector('#totalamm').innerText = totalAmount - amm;
                    document.querySelector('#totaldiscount').innerText = amm;

                    document.querySelector('.form-msg-box').innerText = 'Discount of '+amm+'PKR is applied.';
                    document.querySelector('.form-msg-box').classList.add('success-msg');
                } else {
                    document.querySelector('.form-msg-box').innerText = res.error;
                    document.querySelector('.form-msg-box').classList.add('error-msg');
                }
            }
        };
        xhttp.open("GET", "<?=URL?>/public/requests/promocode.php?promo="+promocode, true);
        xhttp.send(); 

        
        
        

    })

    
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

            if(selectedItem == '1' || selectedItem == '2' || selectedItem == '3' || selectedItem == '4' || selectedItem == '5'){
                document.querySelector('#memberFields').innerHTML = "";

                let toGenerate = Number(selectedItem);

                for(let i = 1; i <= toGenerate; i++){
                    let div_main = document.createElement('div');
                    div_main.setAttribute('class','alotFields');

                    let lbl_gen = document.createElement('label');
                    lbl_gen.setAttribute('for', 'member-'+i);
                    lbl_gen.innerText = "Member "+i;

                    let txt_gen = document.createElement('input');
                    txt_gen.setAttribute('name', 'member[]');
                    txt_gen.setAttribute('type', 'text');
                    txt_gen.setAttribute('placeholder', 'e.g. Ahmed')
                    txt_gen.setAttribute('id', 'member-'+i);

                    let div_gen = document.createElement('div');
                    div_gen.setAttribute('class', 'activate');

                    div_main.appendChild(lbl_gen);
                    div_main.appendChild(txt_gen);
                    div_main.appendChild(div_gen);
                    document.querySelector('#memberFields').appendChild(div_main);
                }

            }
            
            

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