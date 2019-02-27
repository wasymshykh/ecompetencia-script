
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
                        <h5>Main Campus <a href="#">Direction</a></h5>
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

    <div id="modal1" class="modal">
        <div class="modal-content">
            <h5 style="font-weight:300"><span style="font-weight:700;">Team Member Registration Forms</span> Are Now  <span style="font-weight:700;color:#85ab30">Live</span></h5>
        </div>
        <div class="modal-footer">
            <a href="http://ecompetencia19.com/inductions/team.php" class="waves-effect btn" style="background:#85ab30">Become a Member</a>
            <a class="modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>
    <div id="modal3" class="modal">
        <div class="modal-content">
            <h5 style="font-weight:300"><span style="font-weight:700;">Ambassador Forms</span> Are Now  <span style="font-weight:700;color:#85ab30">Live</span></h5>
        </div>
        <div class="modal-footer">
            <a href="http://ecompetencia19.com/inductions/ambassador.php" class="waves-effect btn" style="background:#85ab30">Become a Ambassador</a>
            <a class="modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <h5 style="font-weight:300"><span style="font-weight:700;">This portion will be</span> <span style="font-weight:700;color:#85ab30">Available soon</span></h5>
        </div>
        <div class="modal-footer">
            <a href="https://www.facebook.com/IUEcompetencia/" target="blank" class="waves-effect btn" style="background:#85ab30"><i class="fab fa-facebook-f" style="font-size:0.9em;margin-right: 1em;"></i> Follow Us</a>
            <a class="modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>
    <div id="modal4" class="modal">
        <div class="modal-content">
            <h5 style="font-weight:300"><span style="font-weight:700;">Gallery</span></h5>
            <a class="modal-close waves-effect waves-green btn-flat" style="float:right;">Close</a>
            <br />
            <div class="row">
                <div class="col s6 m6">
                <div class="card">
                    <div class="card-image">
                        <img src="http://ecompetencia19.com/assets/img/g-img-1.jpg" style="width:100%;height:300px;">
                    </div>
                </div>
                </div>
                    <div class="col s6 m6">
                <div class="card">
                    <div class="card-image">
                        <img src="http://ecompetencia19.com/assets/img/g-img-3.jpg" style="width:100%;height:300px;">
                    </div>
                </div>
                </div>
                <div class="col s6 m6">
                <div class="card">
                    <div class="card-image">
                        <img src="http://ecompetencia19.com/assets/img/g-img-4.jpg" style="width:100%;height:300px;">
                    </div>
                </div>
                </div>
                    <div class="col s6 m6">
                    <div class="card">
                        <div class="card-image">
                            <img src="http://ecompetencia19.com/assets/img/g-img-5.jpg" style="width:100%;height:300px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>
    <div id="modal5" class="modal">
        <div class="modal-content">
            <h5 style="font-weight:300"><span style="font-weight:700;">Contact Us</span></h5>
        </div>
        <div class="modal-footer">
            <a href="https://www.facebook.com/IUEcompetencia/" target="blank" class="waves-effect btn" style="background:#85ab30"><i class="fab fa-facebook-f" style="font-size:0.9em;margin-right: 1em;"></i> Follow Us</a>
            <a class="modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>

    <script>
        document.querySelector('.nav-btn').addEventListener('click',(e)=>{
            document.querySelector('.nav-ul').classList.add('n-active');
        })

        /*document.querySelector('.nav-btn').addEventListener('click',(e)=>{
            document.querySelector('.nav-ul').classList.add('n-active')
            let eleam2 = document.querySelector('#modal2');
            var instance2 = M.Modal.getInstance(eleam2);
            instance2.open();
        })

        document.querySelectorAll('.nav-ul ul li a').forEach(navul => {
            navul.addEventListener('click',(e)=>{
                e.preventDefault();
                let eleam2 = document.querySelector('#modal2');
                var instance2 = M.Modal.getInstance(eleam2);
                instance2.open();
            })
        })*/

        document.querySelector('#galleryy').addEventListener('click',(e)=>{
            document.querySelector('.#galleryy').classList.add('n-active')
            let eleam2 = document.querySelector('#modal4');
            var instance2 = M.Modal.getInstance(eleam2);
            instance2.open();
        })

        document.querySelectorAll('#galleryy').forEach(navul => {
            navul.addEventListener('click',(e)=>{
                e.preventDefault();
                let eleam2 = document.querySelector('#modal4');
                var instance2 = M.Modal.getInstance(eleam2);
                instance2.open();
            })
        })
        
        document.querySelector('#gal').addEventListener('click',(e)=>{
            document.querySelector('.#gal').classList.add('n-active')
            let eleam2 = document.querySelector('#modal4');
            var instance2 = M.Modal.getInstance(eleam2);
            instance2.open();
        })

        document.querySelectorAll('#gal').forEach(navul => {
            navul.addEventListener('click',(e)=>{
                e.preventDefault();
                let eleam2 = document.querySelector('#modal4');
                var instance2 = M.Modal.getInstance(eleam2);
                instance2.open();
            })
        })

        document.querySelector('.cont').addEventListener('click',(e)=>{
            document.querySelector('..cont').classList.add('n-active')
            let eleam2 = document.querySelector('#modal5');
            var instance2 = M.Modal.getInstance(eleam2);
            instance2.open();
        })

        document.querySelectorAll('.cont').forEach(navul => {
            navul.addEventListener('click',(e)=>{
                e.preventDefault();
                let eleam2 = document.querySelector('#modal5');
                var instance2 = M.Modal.getInstance(eleam2);
                instance2.open();
            })
        })
        // document.querySelector('#r3').addEventListener('click',(e)=>{
        //     document.querySelector('.#r1').classList.add('n-active')
        //     let eleam2 = document.querySelector('#modal2');
        //     var instance2 = M.Modal.getInstance(eleam2);
        //     instance2.open();
        // })

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
        
        /*document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
            let eleam = document.querySelector('#modal1');
            var instance = M.Modal.getInstance(eleam);
            instance.open();
        });*/
        
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
            
            //let eleam = document.querySelector('#modal3');
            //var instance = M.Modal.getInstance(eleam);
            //instance.open();
            
        });
    </script>
<?php endif; ?>

    </body>
</html>