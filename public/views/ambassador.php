<div id="content">
    <div class="content-inner">
    
        <div class="content-title">
            <h1>Ambassadors</h1>
            <h3>Ecompetencia 2019</h3>
        </div>

<style>
    
.content-department {
    width: 100%;
    display: flex;
    flex-direction: column;
    margin-bottom : 2em;
    border-bottom: 1px solid #f4f4f4;
}

.content-d-heading {
    width: 100%;
    margin-bottom: 2em;
    position: relative;
    display: block;
}
.content-d-heading::before {
    content: "";
    width: 40px;
    height: 3px;
    background-color: #85ab30;
    bottom: -1em;
    left: 0;
    position: absolute;
}

.content-d-heading h1 {
    font-size: 2em;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-weight: 900;
    color: #0b1921;
}

.content-d-team {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-items: flex-start;
}

.content-d-teambox {
    flex: 22%;
    max-width: 22%;
    margin: 2em 1%;
    padding: 2em 0;
    border: 1px solid #e0e0e0;
}

.content-d-teambox img {
    width: 80%;
    height: auto;
    display: block;
    margin: 0 auto;
}

.content-d-teambox-text {
    margin: 10px 0 5px 0;
}

.content-d-teambox-text h3 {
    font-size: 1.4em;
    font-weight: 700;
    color: #0b1921;
    text-transform: uppercase;
    text-align: center;
}

.content-d-teambox-text p {
    font-size: 1em;
    font-weight: 700;
    color: #ffffff;
    text-transform: uppercase;
    text-align: center;
    background-color: #85ab30;
}

.content-d-teammember {
    width: 48%;
    display: flex;
    flex-wrap: wrap;
    align-items: baseline;
    margin: 2em 1%;
}
.content-3d-team .content-d-teammember {
    width: 23%;
}
.content-d-teammembermore {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    align-items: baseline;
    margin: 0 0 2em 0;
}
.content-d-teammember-box {
    width: 46%;
    margin: 1em 2%;
    padding: 1em 0;
    border: 1px solid #e0e0e0;
}
.content-d-teammembermore .content-d-teammember-box {
    width: 23%;
    margin: 1em 1%;
}
.content-3d-team .content-d-teammember-box {
    width: 100%;
    margin: 1em 0;
}

.content-d-teammember-box h3 {
    font-size: 1.2em;
    font-weight: 700;
    color: #0b1921;
    text-transform: uppercase;
    text-align: center;
    margin-bottom: 0.5em;
}

.content-d-teammember-box p {
    font-size: 0.8em;
    font-weight: 700;
    color: #ffffff;
    text-transform: uppercase;
    text-align: center;
    background-color: #f26322;
}

@media screen and (max-width: 980px) {

    .content-d-teambox {
        flex: 29%;
        max-width: 29%;
        margin: 2em 2%;
        padding: 2em 0;
    }

}
@media screen and (max-width: 668px) {

    .content-d-teambox {
        flex: 48%;
        max-width: 46%;
        margin: 1em 2%;
        padding: 1em 0;
    }

    .content-d-heading h1 {
        font-size: 1.6em;
    }

}
    
</style>

        <div class="content-body">
            
        <?php 
        foreach ($institutes as $institute):
            $ambassadors = getInstituteActiveAmbassadors($institute['institute_ID']);
            if(!empty($ambassadors) && count($ambassadors) > 0):
            ?>
            <div class="content-department">
                <div class="content-d-heading">
                    <h1><?=$institute['institute_name']?></h1>
                </div>
                <div class="content-d-team">
                    <?php foreach ($ambassadors as $ambassador): ?>
                    <div class="content-d-teambox">
                        <img src="<?=URL?>/assets/img/ambassador/<?=$ambassador['ambassador_avatar']?>">
                        <div class="content-d-teambox-text">
                            <h3><?=$ambassador['ambassador_fname'].' '.$ambassador['ambassador_lname']?></h3>
                            <?php if($ambassador['ambassador_show'] == 'P'): ?>
                                <p><?=$ambassador['ambassador_phoneno']?></p>
                            <?php endif; ?>
                            <?php if($ambassador['ambassador_show'] == 'E'): ?>
                                <p><?=$ambassador['ambassador_email']?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php 
            endif; 
        endforeach;
        ?>
            
            
        </div>
    
    </div>
</div>