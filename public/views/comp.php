<div id="c_head">
    <div class="c_head-inner">

        <h3><?=$competition['category_name']?></h3>
        <h1><?=$competition['competition_name']?></h1>

    </div>
</div>


<div id="c_content">
    <div class="c_content-inner">

        <div class="c_content-details">
            <div class="cc-details-text">
                <h1>Details</h1>
                <?php if(!empty(back($competition['details_description']))):?>
                <p>
                    <?=back($competition['details_description'])?>
                </p>
                <?php else: ?>
                <div class="infonotice">
                    Will be available soon. Stay Tuned!
                </div>
                <?php endif; ?>
            </div>

            <div class="cc-winning-text">
                <h1>Winning Criteria</h1>
                <?php if(!empty(back($competition['details_winning']))):?>
                <ul>
                    <?=back($competition['details_winning'])?>
                </ul>
                <?php else: ?>
                <div class="infonotice">
                    Will be available soon. Stay Tuned!
                </div>
                <?php endif; ?>
            </div>

            <div class="cc-rules-text">
                <h1>Rules</h1>
                <?php if(!empty(back($competition['details_rules']))):?>
                <ul>
                    <?=back($competition['details_rules'])?>
                </ul>
                <?php else: ?>
                <div class="infonotice">
                    Will be available soon. Stay Tuned!
                </div>
                <?php endif; ?>
            </div>

        </div>

        <div class="c_content-right">
            <div class="cc-r-body">
                <a href="<?=URL?>/register.php">Register Team</a>
                <div class="cc-r-row">
                    <span><?=$competition['competition_min']?></span> Minimum Member(s)
                </div>
                <div class="cc-r-row">
                    <span><?=$competition['competition_max']?></span> Maximum Member(s)
                </div>
                <h3>Fees <span>[Per Member]</span></h3>
                <div class="cc-r-row">
                    <span><?=$competition['competition_i_fee']?> PKR</span> for IU Students
                </div>
                <div class="cc-r-row">
                    <span><?=$competition['competition_e_fee']?> PKR</span> for Outsiders
                </div>

            </div>
        </div>

    </div>
</div>