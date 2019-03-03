
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
                    <div class="number"><?=count(getParticipantsDetails()) - count(getUnconfirmedParticipantsDetails())?> </div><strong class="text-primary"> Paid Participants</strong>
                    <p>registered in <b>competitions</b></p>
                </div>
            </div>
        </div>
    </div>
</section>