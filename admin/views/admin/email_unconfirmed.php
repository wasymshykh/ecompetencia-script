<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Email Unconfirmed Participants</li>
        </ul>
    </div>
</div>

<section>
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Email</h4>
                    </div>
                    <div class="card-body">
                        <p>Send email to all unconfirmed participants</p>
                        <?php if($success_mail): ?>
                            <div class="alert alert-success">
                                <?=$success_mail;?>
                            </div>
                        <?php endif; ?>
                        <?php if($error_mail): ?>
                            <div class="alert alert-danger">
                                <?=$error_mail;?>
                            </div>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="npass">To</label>
                                        <input type="text" id="npass" class="form-control" placeholder="All Unconfirmed Participants" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="mail_title">Subject</label>
                                        <input type="text" name="mail_title" id="mail_title" class="form-control" placeholder="E.g. Notification from Ecompetencia'19" value="<?=isset($_POST['mail_title'])?$_POST['mail_title']:'';?>">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="mail_content">Body</label>
                                        <textarea name="mail_content" id="mail_content" class="form-control" cols="30" rows="10" placeholder="write your content here...">
                                            <?=isset($_POST['mail_content'])?$_POST['mail_content']:back($toPut);?>
                                        </textarea>
                                        <small id="passwordHelpBlock" class="form-text text-muted">
                                            Feel Free to use <b>&lt;p&gt;&lt;/p&gt;</b> for paragraph, <b>&lt;b&gt;&lt;/b&gt;</b> for bold, <b>&lt;i&gt;&lt;/i&gt;</b> for italic, <b>&lt;br&gt;</b> for line break.
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div class="line"></div>
                            <div class="form-group row">
                                <div class="col-sm-12 text-center">
                                    <button type="submit" name="send_mail" class="btn btn-primary">Send Email</button>
                                </div>
                            </div>
                       </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Preview</h4>
                    </div>
                    <div class="card-body">
                        <table width="100%" cellspacing="0" cellpadding="10" border="0" bgcolor="#f3f3f3">
                            <tr>
                            <td align="center" bgcolor="#f3f3f3" padding-top: 10px;>
                                <p><img src="http://ecompetencia19.com/logo.png" width="192" height="120"></p>
                                
                                <table style="max-width:550px;width:90%;margin: 10px 0 25px 0;" cellspacing="0" cellpadding="15" border="0">
                                
                                    <tr>
                                        <td style="font-family:Trebuchet MS,Arial,Helvetica,sans-serif;box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 10px;" bgcolor="#FFFFFF" align="left">
                                            <div id="writeHere"><?=isset($_POST['mail_content'])?$_POST['mail_content']:back($toPut);?></div>
                                            <p style="font-size:10px;">You are registered in <b>------</b> competition. <a href="http://ecompetencia19.com/login.php">Login</a> for more information</p>
                                        </td>
                                    </tr>
                                
                                </table>
                            </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    document.querySelector('#mail_content').addEventListener('keyup', (e)=>{
        document.querySelector('#writeHere').innerHTML = document.querySelector('#mail_content').value;
    })
    document.querySelector('#mail_title').addEventListener('keyup', (e)=>{
        document.querySelector('#writeTitle').innerHTML = document.querySelector('#mail_title').value;
    })
</script>
