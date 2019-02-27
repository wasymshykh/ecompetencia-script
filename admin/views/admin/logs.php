<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
        <li class="breadcrumb-item active">Website Logs</li>
        </ul>
    </div>
</div>

<section>
    <div class="container-fluid">

        <div class="row mt-4">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Logs</h4>
                    </div>
                    <div class="card-body">
                        <p>All important activities over the site will be shown here.</p>
                        <ul class="list-group">
                        <?php foreach($logs as $log): ?>
                            <li class="list-group-item d-flex align-items-center">
                                <span class="badge badge-primary badge-pill mr-2"><?=$log['logger_time']?></span>
                                <?=$log['logger_text']?>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>