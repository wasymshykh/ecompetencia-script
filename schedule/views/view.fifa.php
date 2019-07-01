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
            <h1>FIFA</h1>
            <h3>Fixtures</h3>
        </div>

        <div class="content-body">
            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>One</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>10:30 AM - 10:50 AM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Syed Haider raza Naqvi</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Siraj Khatib</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Two</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>10:30 AM - 10:50 AM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Abdul Riaz</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Yogesh Hirani</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Three</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>10:30 AM - 10:50 AM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Usama Khalid</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Abdullah Khan</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Four</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>10:30 AM - 10:50 AM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Hammad Abid</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Asher</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Five</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>11:00 AM - 11:20 AM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Hamza Anis</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Zeeraq Mansoor</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Six</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>11:00 AM - 11:20 AM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Umar Zadjali</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Maaz Ahmed</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Seven</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>11:00 AM - 11:20 AM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Mustufa Hassan</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Hammad Nadeem</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Eight</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>11:00 AM - 11:20 AM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Hashim</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Muhammad Sarim</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>
            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Nine</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>11:30 AM - 11:50 AM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Aftab</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Umair Shah</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Ten</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>11:30 AM - 11:50 AM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Arsalan Bajwa</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Shadman Javaid</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>
            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Eleven</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>11:30 AM - 11:50 AM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Syed Ali</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Ali Haider</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Twelve</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>11:30 AM - 11:50 AM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Daniyal Usman</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Syed Muhammad Asad</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>


            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Thirteen</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>12:00 PM - 12:20 PM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Haziq Khatri</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Huzaifa</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>


            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Fourteen</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>12:00 PM - 12:20 PM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Syed Wasif Hussain</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Syed Kazim Hussain Rizvi</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>



            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Fifteen</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>12:00 PM - 12:20 PM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Usama Khan</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Kashif Siddique (Emkay)</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>


            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Sixteen</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>12:00 PM - 12:20 PM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Hunain</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Ahad Altaf</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Seventeen</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>12:30 PM - 12:50 PM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Arsalan Iftikhar</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Sumeet Hirani</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Eighteen</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>12:30 PM - 12:50 PM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Asim M.Khan</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Muhammad Umair</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Nineteen</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>12:30 PM - 12:50 PM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Ale Ahmed</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Akbar Abbas</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Twenty</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>12:30 PM - 12:50 PM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Owais</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Muhammad Sameer</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>



            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Twenty one</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>01:00 PM - 01:20 PM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Shabaz Younus</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Muhammad Musawar</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Twenty two</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>01:00 PM - 01:20 PM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Muhammad Hamza (Worser)</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Abdul Basit</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>


            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Twenty three</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>01:00 PM - 01:20 PM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Arbab Khan</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Umad Shbraz</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Twenty four</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>01:00 PM - 01:20 PM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Danish Mansoor Ali</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Shahmeer Shah</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Twenty five</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>01:30 PM - 01:50 PM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Usama Sarwar</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Ali Qureshi	</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Twenty six</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>01:30 PM - 01:50 PM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Syed Usama</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Kashif Siddique</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>

            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Twenty seven</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>01:30 PM - 01:50 PM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Syed Hassan</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Muhammad Hamza</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>


            <div class="row-round">
                <div class="date-content">
                    <div class="date-day">
                        <h1>Match <span>Twenty eight</span></h1>
                    </div>
                    <div class="date-date">
                        <h3>01:30 PM - 01:50 PM</h3>
                    </div>
                </div>
                <div class="round-row">
                    <div class="round-team">
                        <h3>Muhammad Ali Vakil</h3>
                    </div>
                    <div class="round-span">VS</div>
                    <div class="round-team">
                        <h3>Arbaz Khan</h3>
                    </div>
                    <div class="round-result">
                        <h1>Result</h1>
                        <h3 class="winner"><i class="clock"></i> TBA</h3>
                        <h3 class="loser"><b>TBA</b> to be conducted</h3>
                    </div>
                </div>
            </div>



        </div>

    </div>
</div>