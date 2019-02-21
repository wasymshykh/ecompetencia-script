    </div>
</section>


<footer>
    <div id="copyright">
        <p>Designed & Developed by IU ACM - <b>Development & IT</b></p>
    </div>
</footer>


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
            
            if(selectedItem==="Yes"){
                document.querySelector('#tellus').classList.add('active');
            } else if (selectedItem==="No"){
                document.querySelector('#tellus').classList.remove('active');
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

            console.log(sl.selectedOptions[0].textContent);
            
            
            sl.nextElementSibling.firstElementChild.firstElementChild.textContent = sl.selectedOptions[0].textContent;

            
            

        })

        
    })
</script>

</body>
</html>