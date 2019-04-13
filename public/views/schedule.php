<style>
#display {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
}

.participant_box {
    display: flex;
    flex-direction: column;
    border: 1px solid #e0e0e0;
    box-shadow: 0 0 10px rgba(0,0,0,0.05);
    padding: 1em 0;
    margin: 1em;
    position: relative;
}

.participant_box::before {
    content: "";
    width: 40px;
    height: 40px;
    position: absolute;
    left: -2px;
    top: -2px;
    border-left: 4px solid #85ab30;
    border-top: 4px solid #85ab30;
}
.participant_box::after {
    content: "";
    width: 40px;
    height: 40px;
    position: absolute;
    bottom: -2px;
    right: -2px;
    border-right: 4px solid #0080c4;
    border-bottom: 4px solid #0080c4;
}

.participant_name {
    width: 100%;
    display: block;
}

.participant_name p {
    margin-bottom: -10px;
    font-size: 1.2em;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-align: center;
    color: #0b1921;
    opacity: 0.2;
}

.participant_name h1 {
    font-size: 1.6em;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-align: center;
    color: #0b1921;
    padding: 0 0.5em;
}

.participant_name h3 {
    font-size: 1em;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #0b1921;
    display: flex;
    justify-content: space-between;
    margin: 1em 0;
}
.participant_name h3 span:first-child {
    background-color: #0b1921;
    color: #fff;
    font-weight: 400;
}
.participant_name h3 span {
    padding: 0.4em 1em;
}

.participant_university {
    max-width: 140px;
    margin: 0 auto;
}

.participant_university p {
    margin-bottom: -10px;
    font-size: 1.2em;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-align: center;
    color: #0b1921;
    opacity: 0.2;
}
.participant_university h3 {
    font-size: 1em;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-align: center;
    color: #0b1921;
}



.form-loader {
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    left: 0;
    top: 0;
    background-color: #ffffff;
    z-index: 10;
    animation: loaderColorChange 2s infinite;
    transition: 0.2s all;
}

.form-loader.active {
    opacity: 1;
    visibility: visible;
    pointer-events: all;
}


</style>

<div id="content">
    <div class="content-inner">
    
        <div class="content-title">
            <h1>Participants</h1>
            <h3>Ecompetencia 2019</h3>
        </div>

        <div class="content-body" style="position: relative">

            <div class="content-select">
                <div class="form-row">
                    <div class="form-row-box">
                        <label for="persons">Select a Competition</label>
                        <p style="padding-top: 0">Check your name by selecting competition</p>
                    </div>
                    <div class="form-row-box" style="flex-direction:row; align-items:center;">
                        <select name="persons" id="persons">
                            <option value="">Select Competition</option>
                            <?php foreach($competitions as $comp): ?>
                            <option value="<?=$comp['competition_ID']?>"><?=$comp['competition_name']?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div id="display">
                    
                </div>

                <div class="form-loader">
                    <i class="fas fa-spinner fa-spin"></i>
                </div>


            </div>

        </div>

    </div>
</div>


<script>


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
            let competition_id = -1;
            
            let selectionMain = selected.parentElement.parentElement.parentElement.previousElementSibling.children;
            
            let attrselected = document.createAttribute('selected');
            attrselected.value = 'true';

            for(let i = 0; i < selectionMain.length; i++) {
                if(selectionMain[i].textContent === selectedItem) {
                   selectionMain[i].attributes.setNamedItem(attrselected);

                   competition_id = selectionMain[i].value;
                   
                } else {
                    if(selectionMain[i].attributes.getNamedItem('selected') != null){
                        selectionMain[i].attributes.removeNamedItem('selected');
                    }
                }
            }
            selected.parentElement.parentElement.previousElementSibling.firstElementChild.textContent = selectedItem;

            

            if(selectedItem != ""){
                
                // GET ALL AJAX PARTICIPANTS

                lodr = document.querySelector('.form-loader');
                lodr.classList.add('active');

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        const res = JSON.parse(this.responseText);
                        if(res.success != undefined && res.success === true){
                            
                            display_div = document.querySelector('#display');
                            let tbl = `<table class="striped table-responsive">
                                    <thead>
                                        <tr>
                                        <th>Name</th>
                                        <th>Team Name</th>
                                        <th>Members</th>
                                        <th>University</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                            data = res.data;

                            for(let i = 0; i < data.length; i++) {
                                tbl += `<tr>
                                        <td>${data[i].first_name} ${data[i].last_name}</td>
                                        <td>${data[i].team_name}</td>
                                        <td>
                                            <b>${data[i].members.length}</b>`;
                                    for(let j = 0; j < data[i].members.length; j++){
                                        tbl += `
                                            <span style="padding: 0.15em 0.5em;margin:0.1em;text-transform: uppercase;display:inline-block;font-size: 0.8em; letter-spacing: 1px; color: #333;background-color:rgba(0,0,0,0.1);">${data[i].members[j]}</span>
                                        `;
                                    }
                                tbl += `</td>
                                        <td>${data[i].university}</td>
                                    </tr>`;
                            }
                            
                            tbl += `</tbody>
                                </table>`;
                                
                            display_div.innerHTML = "";
                            display_div.innerHTML = tbl;

                            lodr.classList.remove('active');
                            

                        } else {
                xhttp.open("GET", "<?=URL?>/public/requests/participants.php?comp="+competition_id, true);
                xhttp.send(); 
                xhttp.open("GET", "<?=URL?>/public/requests/participants.php?comp="+competition_id, true);
                xhttp.send(); 
                            
                            lodr.classList.remove('active');

                        }
                    }
                };
                xhttp.open("GET", "<?=URL?>/public/requests/participants.php?comp="+competition_id, true);
                xhttp.send(); 

                
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