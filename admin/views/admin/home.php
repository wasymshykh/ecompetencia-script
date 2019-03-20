
<section class="statistics">
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-lg-4 my-4">
                <div class="card income text-center">
                    <div class="icon"><i class="icon-line-chart"></i></div>
                    <div class="number"><?=count(getCategories())?> </div><strong class="text-primary"> Categories</strong>
                    <p>of different <b>competitions</b></p>
                </div>
            </div>
            <div class="col-lg-4 my-4">
                <div class="card income text-center">
                    <div class="icon"><i class="icon-line-chart"></i></div>
                    <div class="number"><?=count(getCompetitions())?> </div><strong class="text-primary"> Competitions</strong>
                    <p>in different <b>categories</b></p>
                </div>
            </div>
            <div class="col-lg-4 my-4">
                <div class="card income text-center">
                    <div class="icon"><i class="icon-line-chart"></i></div>
                    <div class="number"><?=count(getUsersDetails())?> </div><strong class="text-primary"> Users</strong>
                    <p>registered on <b>website</b></p>
                </div>
            </div>
            <div class="col-lg-4 my-4">
                <div class="card income text-center">
                    <div class="icon"><i class="icon-line-chart"></i></div>
                    <div class="number"><?=count(getParticipantsDetails())?> </div><strong class="text-primary"> Total Participants</strong>
                    <p>registered in <b>competitions</b></p>
                </div>
            </div>
            <div class="col-lg-4 my-4">
                <div class="card income text-center">
                    <div class="icon"><i class="icon-line-chart"></i></div>
                    <div class="number"><?=count(getUnconfirmedParticipantsDetails())?> </div><strong class="text-primary"> Unconfirmed Participants</strong>
                    <p>registered in <b>competitions</b></p>
                </div>
            </div>
            <div class="col-lg-4 my-4">
                <div class="card income text-center">
                    <div class="icon"><i class="icon-line-chart"></i></div>
                    <div class="number"><?=count(getConfirmedParticipantsDetails())?> </div><strong class="text-primary"> Paid Participants</strong>
                    <p>registered in <b>competitions</b></p>
                </div>
            </div>

            <?php if($_SESSION['management']['management_type'] === 'A'): ?>
            <?php
                $parts = getConfirmedParticipantsDetails();
                $unparts = getUnconfirmedParticipantsDetails();
                $paidamount = 0;
                $discountamount = 0;
                $unpaidamount = 0;
                foreach ($parts as $part) {
                    $paidamount += $part['transaction_total'];
                    $discountamount += $part['transaction_discount'];
                }
                foreach ($unparts as $part) {
                    $unpaidamount += $part['transaction_total'];
                }
                $paidamount = $paidamount .' <small><small><small>PKR</small></small></small>';
                $discountamount = $discountamount .' <small><small><small>PKR</small></small></small>';
                $unpaidamount = $unpaidamount .' <small><small><small>PKR</small></small></small>';
            ?>

            <div class="col-lg-4 my-4">
                <div class="card income text-center">
                    <div class="icon"><i class="icon-line-chart"></i></div>
                    <div class="number">
                        <?=$paidamount?>
                    </div>
                    <strong class="text-primary"> Cash Collected</strong>
                    <p>registered in <b>competitions</b></p>
                </div>
            </div>

            <div class="col-lg-4 my-4">
                <div class="card income text-center">
                    <div class="icon"><i class="icon-line-chart"></i></div>
                    <div class="number">
                        <?=$discountamount?>
                    </div>
                    <strong class="text-primary"> Discount Offered</strong>
                    <p>registered in <b>competitions</b></p>
                </div>
            </div>

            <div class="col-lg-4 my-4">
                <div class="card income text-center">
                    <div class="icon"><i class="icon-line-chart"></i></div>
                    <div class="number">
                        <?=$unpaidamount?>
                    </div>
                    <strong class="text-primary"> Unpaid Cash</strong>
                    <p>registered in <b>competitions</b></p>
                </div>
            </div>
            <?php endif; ?>

            <div class="col-lg-6">
              <div class="card pie-chart-example">
                <div class="card-header d-flex align-items-center">
                  <h4>Visualized Unconfirmed</h4>
                </div>
                <div class="card-body">
                  <div class="chart-container">
                    <canvas id="pieUnConfirmed" width="200" height="200"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card pie-chart-example">
                <div class="card-header d-flex align-items-center">
                  <h4>Visualized Confirmed</h4>
                </div>
                <div class="card-body">
                  <div class="chart-container">
                    <canvas id="pieConfirmed"  width="200" height="200"></canvas>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 my-4">
                <div class="card">
                    <strong class="text-primary text-center">Unconfirmed Participants</strong>
                    <hr>
                    <?php
                        $comps = getCompetitions();
                        foreach ($comps as $comp):
                    ?>
                    <div class="d-flex justify-content-between">
                        <div><p><b><?=$comp['competition_name']?></b></p></div>
                        <div><span class="badge badge-primary"><?=count(getUnconfirmedPartDetailsByComp($comp['competition_ID']))?></span></div>
                    </div>
                    <hr>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="col-lg-6 my-4">
                <div class="card">
                    <strong class="text-primary text-center">Confirmed Participants</strong>
                    <hr>
                    <?php
                        $comps = getCompetitions();
                        foreach ($comps as $comp):
                    ?>
                    <div class="d-flex justify-content-between">
                        <div><p><b><?=$comp['competition_name']?></b></p></div>
                        <div><span class="badge badge-primary"><?=count(getConfirmedPartDetailsByComp($comp['competition_ID']))?></span></div>
                    </div>
                    <hr>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    $(document).ready(function () {
        'use strict';

        var CONFIRMEDPIE    = $('#pieConfirmed');
        var UNCONFIRMEDPIE    = $('#pieUnConfirmed');

        var pieChartConfirmed = new Chart(CONFIRMEDPIE, {
            type: 'doughnut',
            data: {
                labels: [
                    <?php foreach ($comps as $comp): ?>
                        "<?=$comp['competition_name']?>",
                    <?php endforeach; ?>
                ],
                datasets: [
                    {
                        data: [
                            <?php foreach ($comps as $comp): ?>
                                <?=count(getConfirmedPartDetailsByComp($comp['competition_ID']))?>,
                            <?php endforeach; ?>
                        ],
                        borderWidth: [
                            <?php foreach ($comps as $comp): ?>
                                1,
                            <?php endforeach; ?>
                        ],
                        backgroundColor: [
                            <?php $colors = []; 
                                $i = 0;
                                foreach ($comps as $comp): 
                                    $colors[] = "rgba(".rand(0,255).", ".rand(0,255).", ".rand(0,255);
                            ?>
                                "<?=$colors[$i]?>,0.8)",
                            <?php $i++; endforeach; ?>
                        ],
                        hoverBackgroundColor: [
                            <?php
                                $i = 0;
                                foreach ($comps as $comp):
                            ?>
                                "<?=$colors[$i]?>,0.95)",
                            <?php $i++; endforeach; ?>
                        ]
                    }]
                }
        });

        var pieChartConfirmed = {
            responsive: true
        };

        var pieChartUnConfirmed = new Chart(UNCONFIRMEDPIE, {
            type: 'doughnut',
            data: {
                labels: [
                    <?php foreach ($comps as $comp): ?>
                        "<?=$comp['competition_name']?>",
                    <?php endforeach; ?>
                ],
                datasets: [
                    {
                        data: [
                            <?php foreach ($comps as $comp): ?>
                                <?=count(getUnConfirmedPartDetailsByComp($comp['competition_ID']))?>,
                            <?php endforeach; ?>
                        ],
                        borderWidth: [
                            <?php foreach ($comps as $comp): ?>
                                1,
                            <?php endforeach; ?>
                        ],
                        backgroundColor: [
                            <?php $colors = []; 
                                $i = 0;
                                foreach ($comps as $comp): 
                                    $colors[] = "rgba(".rand(0,255).", ".rand(0,255).", ".rand(0,255);
                            ?>
                                "<?=$colors[$i]?>,0.8)",
                            <?php $i++; endforeach; ?>
                        ],
                        hoverBackgroundColor: [
                            <?php
                                $i = 0;
                                foreach ($comps as $comp):
                            ?>
                                "<?=$colors[$i]?>,0.95)",
                            <?php $i++; endforeach; ?>
                        ]
                    }]
                }
        });

        var pieChartUnConfirmed = {
            responsive: true
        };


    });

</script>