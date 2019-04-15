<style>

    .date-content {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-bottom: 1em;
    }
    .date-date h3,
    .date-day h1 {
        font-size: 1.6em;
        font-weight: 400;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #0b1921;
        position: relative;
    }
    .date-date h3::before,
    .date-day h1::before {
        content: "";
        position: absolute;
        width: 30px;
        height: 2px;
        background: #0b1921;
        top: 50%;
        left: 110%;
    }

    .date-date h3::before {
        right: 110%;
        left: auto;
    }
    .date-day span {
        font-weight: 700;
    }

    .row-round {
        width: 100%;
        display: flex;
        flex-direction: column;
        border: 1px solid #e0e0e0;
        padding: 10px 15px;
        margin: 2em 0;
    }

    .round-row {
        width: 100%;
        display: flex;
        align-items: center;
    }

    .round-team {
        padding: 5px 10px;
        background: #0b1921;
        flex: 1;
    }
    .round-team h3 {
        color: #ffffff;
        text-transform: uppercase;
        font-size: 1em;
        font-weight: 700;
        letter-spacing: 1px;
    }

    .round-span {
        padding: 5px 10px;
        background-color: rgba(0,0,0,0.1);
        color: #0b1921;
        margin: 0 1em;
        text-transform: uppercase;
        font-size: 1em;
        font-weight: 400;
        letter-spacing: 1px;
        position: relative;
    }
    .round-span::after,
    .round-span::before {
        content: "";
        width: 1em;
        height: 1px;
        position: absolute;
        background-color: #0b1921;
        top: 50%;
        left: -1em;
        transform: translateY(-50%);
    }
    .round-span::after {
        right: -1em;
        left: unset;
    }

    .round-result {
        flex: 2;
        text-align: center;
        position: relative;
        background-color: #f3f3f3
    }

    .round-result h1 {
        font-size: 1em;
        text-transform: uppercase;
        letter-spacing: 2px;
        font-weight: 700;
        background-color: #85ab30;
        color: #ffffff;
        display: table;
        padding: 0.2em 1em;
        margin: 0 auto;
        position: absolute;
        transform: rotate(-90deg);
        top: 2.8em;
        left: -3em;
    }

    .round-result h3 {
        font-weight: 400;
        color: #0b1921;
        letter-spacing: 1px;
        font-size: 1.2em;
        margin: 1em 0;
    }
    .round-result h3.winner b {
        font-weight: 700;
        color: #f26322;
        position: relative;
    }
    .round-result h3.winner b::before {
        content: "";
        width: 100%;
        height: 2px;
        background: #f26322;
        position: absolute;
        bottom: -2px;
        left: 0;
    }
    .round-result h3.winner i {
        font-size: 0.9em;
        width: 22px;
        height: 22px;
        color: #fff;
        line-height: 22px;
        border-radius: 50%;
        background-color: #f26322;
    }
    .round-result h3.loser {
        opacity: 0.5;
    }

    @media (max-width: 728px) {
        .event-row {
            flex-wrap: wrap;
        }
        .e-r-time {
            flex: 100% 0 1;
        }

        .round-row {
            flex-wrap: wrap;
        }
        .round-result {
            flex: 100% 1 2;
        }

    }
    
    @media (max-width: 500px) {
        .date-content {
            flex-direction: column;
        }
        .date-date h3, .date-day h1 {
            text-align: center;
        }
        .date-date h3 {
            font-size: 1.2em;
        }
        .date-date h3::before, .date-day h1::before {
            content: "";
            display: none;
        }
    }
</style>



<div id="content">
    <div class="content-inner">
    
        <div class="content-title">
            <h1>Chess</h1>
            <h3>Fixtures</h3>
        </div>

        <div class="content-body">
            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>One</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>09:00 AM - 09:15 AM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Dark Knight</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Dark Knight Here</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="fa fa-trophy"></i><b>Winner</b> Dark Knight <span>Points <b>5</b></span></h3>
                        <h3 class="loser"><b>Lost</b> Dark Knight Here <span>Points <b>-5</b></span></h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Two</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>09:00 AM - 09:15 AM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Dark Knight</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Dark Knight Here</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="fa fa-trophy"></i><b>Winner</b> Dark Knight <span>Points <b>5</b></span></h3>
                        <h3 class="loser"><b>Lost</b> Dark Knight Here <span>Points <b>-5</b></span></h3>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>