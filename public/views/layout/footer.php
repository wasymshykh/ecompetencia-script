
    <footer>
        <div id="footer">
            <div class="footer-inner">
                
                <div class="footer-l">
                    <div class="footer-logo">
                        <img src="<?=URL?>/assets/img/logo_white.png" alt="Ecompetencia">
                    </div>
                    <div class="footer-about">
                        <h3>Happening on</h3>
                        <div class="f-e-date">
                            <div class="f-e-days">
                                <div class="f-e-days-top">16-17</div>
                                <div class="f-e-days-bottom">April</div>
                            </div>
                            <div class="f-e-year">2019</div>
                        </div>
                        <h3>At</h3>
                        <h2>Iqra University</h2>
                        <h5>Main Campus <a href="https://goo.gl/maps/tj1N2tN6swH2" target="_blank">Direction</a></h5>
                    </div>
                </div>

                <div class="footer-contact">
                    <p>Got a question?</p>
                    <div class="f-contact-btn">
                        <a  class="cont">Contact Us</a>
                    </div>
                    <div class="f-updates">
                        <div class="f-u-text">
                            Updates at
                        </div>
                        <div class="f-u-social">
                            <div class="social-box">
                                <a href="https://www.facebook.com/IUEcompetencia/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </div>
                            <div class="social-box">
                                <a href="https://www.instagram.com/iuacm/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div id="footer-bottom">
            <p>designed & Developed by IT-DEVELOPMENT IUACM</p>
        </div>
    </footer>

<?php if(isset($showMaterialize)): ?>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <h5 style="font-weight:300"><span style="font-weight:700;">This portion will be</span> <span style="font-weight:700;color:#85ab30">Available soon</span></h5>
        </div>
        <div class="modal-footer">
            <a href="https://www.facebook.com/IUEcompetencia/" target="blank" class="waves-effect btn" style="background:#85ab30"><i class="fab fa-facebook-f" style="font-size:0.9em;margin-right: 1em;"></i> Follow Us</a>
            <a class="modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>



    <div id="modal5" class="modal">
        <div class="modal-content">
            <h5 style="font-weight:300"><span style="font-weight:700;">Contact Us</span></h5>
            <br /><br />
            <table>
                <tr>
                    <th>Name</th>
                     <th>Department</th> 
                     <th>Mobile</th>
                    </tr>
                          <tr>
                    <th>Jawwad</th>
                     <th>Registration</th> 
                     <th>0321-2134503 </th>
                    </tr>
                               <tr>
                    <th>Abdul Rauf</th>
                     <th>Registration</th> 
                     <th>0343-2611737</th>
                    </tr>
                             <tr>
                    <th>Anum Shakeel</th>
                     <th>Registration</th>
                     <th>0300-2751551</th> 

                    </tr>
                    <tr>
                    <th>Sanaullah Asghar</th>
                     <th>Registration</th> 
                     <th>0304-3869953</th>
                    </tr>
                  <tr>
                    <th>Aman Khan</th>
                     <th>Marketing & Promotion</th> 
                     <th>0311-2764682</th>
                    </tr>
          
            </table>
        </div>
        <div class="modal-footer">
            <a href="https://www.facebook.com/IUEcompetencia/" target="blank" class="waves-effect btn" style="background:#85ab30"><i class="fab fa-facebook-f" style="font-size:0.9em;margin-right: 1em;"></i> Follow Us</a>
            <a class="modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>

    <script>

        document.querySelectorAll('.cont').forEach(navul => {
            navul.addEventListener('click',(e)=>{
                e.preventDefault();
                let eleam2 = document.querySelector('#modal5');
                var instance2 = M.Modal.getInstance(eleam2);
                instance2.open();
            })
        })

        document.querySelectorAll('#r3').forEach(navul => {
            navul.addEventListener('click',(e)=>{
                e.preventDefault();
                let eleam2 = document.querySelector('#modal2');
                var instance2 = M.Modal.getInstance(eleam2);
                instance2.open();
            })
        })
        window.onscroll = function(){
            var currentScrollPos = window.pageYOffset;
            if (window.pageYOffset >= 140) {
                document.getElementById("navigation").classList.add('sticky')
            } else {
                document.getElementById("navigation").classList.remove('sticky')
            }
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
    </script>
<?php endif; ?>

<script>
    function aboutScroll() {
        let a = document.querySelector('#about-heading');
        
        if(a !== null){
            const topToScroll = document.querySelector('#about-heading').offsetTop - 110;
            window.scroll({
                top: topToScroll, 
                left: 0, 
                behavior: 'smooth' 
            });
        } else {
            window.location.href = "<?=URL?>";
        }
    }

    document.querySelector('#aboutNav').addEventListener('click', (e)=>{
        aboutScroll();
    })

    document.querySelector('.nav-btn').addEventListener('click',(e)=>{
        document.querySelector('.nav-ul').classList.add('n-active');
    })
</script>


    </body>
</html>