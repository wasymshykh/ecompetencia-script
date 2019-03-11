
<section class="statistics">
    <div class="container-fluid">
        <div class="row d-flex">
            <div class="col-lg-6 my-4">
                <div class="card income text-center">
                    <div class="icon"><i class="icon-line-chart"></i></div>
                    <div class="number"><?=count(getUnconfirmedParticipants($ambassador['ambassador_ID']))?> </div><strong class="text-primary"> Participants</strong>
                    <p><b>unconfirmed</b> participants assigned to you</p>
                </div>
            </div>
            <div class="col-lg-6 my-4">
                <div class="card income text-center">
                    <div class="icon"><i class="icon-line-chart"></i></div>
                    <div class="number"><?=count(getUnconfirmedInstituteParticipants($ambassador['institute_ID']))?> </div><strong class="text-primary"> Participants</strong>
                    <p><b>unconfirmed</b> from your insitute</p>
                </div>
            </div>
            <div class="col-lg-6 my-4">
                <div class="card income text-center">
                    <div class="icon"><i class="icon-line-chart"></i></div>
                    <div class="number"><?=count(getConfirmedParticipants($ambassador['ambassador_ID']))?> </div><strong class="text-primary"> Participants</strong>
                    <p><b>confirmed</b> by you</p>
                </div>
            </div>
            <div class="col-lg-6 my-4">
                <div class="card income text-center">
                    <div class="icon"><i class="icon-line-chart"></i></div>
                    <div class="number">
                        <?php 
                            $amount = 0;
                            $confirmed = getUnconfirmedParticipants($ambassador['ambassador_ID']);
                            foreach ($confirmed as $c) {
                                $amount += $c['transaction_total'];
                            }
                            echo $amount;
                        ?>
                    </div>
                    <strong class="text-primary">PKR</strong>
                    <p><b>collected</b> by you</p>
                </div>
            </div>
        </div>
    </div>
</section>