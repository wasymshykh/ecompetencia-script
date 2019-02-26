<div class="d-container">

    <div class="d-row">

        <div class="d-title">
            <h1>Select <b>Competition</b></h1>
            <p>You are about to start participation process.</p>
        </div>

        <div class="d-form">
            <form action="" method="POST">
            <div class="form-row-checks">
                <div class="form-row-checks-all">
                    <?php foreach($competitions as $competition):
                        if($competition['competition_status'] == 'E'): ?>
                    <div class="form-row-check">
                        <input type="radio" name="competition" id="comp-<?=$competition['competition_ID']?>" value="<?=$competition['competition_ID']?>">
                        <label for="comp-<?=$competition['competition_ID']?>">
                            <div class="comp-abs-check">
                                <i class="fas fa-check"></i>
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
                            <div class="comp-price">
                                <div class="comp-price-text"><?=$competition['competition_e_fee']?> <span>PKR</span></div>
                                <div class="comp-price-about">Per Person</div>
                            </div>
                        </label>
                    </div>
                    <?php endif; endforeach; ?>
                </div>
            </div>
    
            <div class="form-submit">
                <button id="next">Continue <i class="fas fa-arrow-right"></i></button>
            </div>
            </form>
        </div>

        <div class="d-form">
            <div class="d-form-top">
                <div class="d-form-t-box">
                    <span>Selected Competition</span> Speed Programming
                </div>
                <div class="d-form-t-box">
                    <span>Team Leader</span> Muhammad Waseem
                </div>
            </div>
            <div class="d-form-body">
                
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
                            <?php for($i = 1; $i < 6; $i++): ?>
                                <option value="<?=$i?>"><?=$i?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="form-row-box" id="memberFields">
                    </div>
                </div>

            </div>
        </div>


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