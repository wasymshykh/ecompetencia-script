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
    
    .round-container {
        width: 100%;
        padding: 1em;
        border: 1px solid #e0e0e0;
        position: relative;
        margin: 0 0 4em 0;
    }
    .round-container::before {
        content: "";
        position: absolute;
        left: -1px;
        top: -1px;
        width: 50px;
        height: 50px;
        border-left: 3px solid #85ab30;
        border-top: 3px solid #85ab30;
    }
    .round-heading {
        background-color: #85ab30;
        width: 100%;
        text-align: center;
    }
    .round-heading h1 {
        font-size: 2.2em;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #fff;
        padding: 0.2em 1em;
    }
    .round-heading h2 {
        font-size: 1.6em;
        font-weight: 400;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #fff;
        padding: 0.2em 1em;
    }
</style>


<div id="content">
    <div class="content-inner">
    
        <div class="content-title">
            <h1>Result</h1>
            <h3>Check Below</h3>
        </div>

        <div class="content-body">
            

            <div class="round-container">
                <div class="round-heading">
                    <h1>Web Development</h1>
                    <h2>Round <b>Two</b> Day <b>Two</b></h2>
                </div>
                
                <div class="round-table">
                    <table>
                        <thead>
                            <th>Team ID</th>
                            <th>Team Name</th>
                        </thead>
                        <tbody>
                            <tr><td>team_wd24</td><td>Khilari</td></tr>
                            <tr><td>team_wd33</td><td>Error 404</td></tr>
                            <tr><td>team_wd35</td><td>Avengers</td></tr>
                            <tr><td>team_wd5</td><td>IT Avenger</td></tr>
                            <tr><td>team_wd4</td><td>Web Strikers</td></tr>
                            <tr><td>team_wd12</td><td>Team Kamran</td></tr>
                            <tr><td>team_wd11</td><td>Code Page Sign In</td></tr>
                            <tr><td>team_wd8</td><td>Web Dev</td></tr>
                            <tr><td>team_wd28</td><td>Qalb</td></tr>
                            <tr><td>team_wd23</td><td>Team Mudassir</td></tr>
                            <tr><td>team_wd17</td><td>sudo_marry_me</td></tr>
                            <tr><td>team_wd31</td><td>freelancer</td></tr>
                            <tr><td>team_wd30</td><td>e coder</td></tr>
                        </tbody>
                    </table>
                </div>
            
            </div>

            <div class="round-container">
                <div class="round-heading">
                    <h1>Speed Programming</h1>
                    <h2>Round <b>Two</b> Day <b>Two</b></h2>
                </div>
                
                <div class="round-table">
                    <table>
                        <thead>
                            <th>Team ID</th>
                        </thead>
                        <tbody>
                            <tr><td>team_sp38</td></tr>
                            <tr><td>team_sp48</td></tr>
                            <tr><td>team_sp22</td></tr>
                            <tr><td>team_sp35</td></tr>
                            <tr><td>team_sp12</td></tr>
                            <tr><td>team_sp28</td></tr>
                            <tr><td>team_sp25</td></tr>
                            <tr><td>team_sp46</td></tr>
                            <tr><td>team_sp8</td></tr>
                        </tbody>
                    </table>
                </div>
            
            </div>
            
            
            <div class="round-container">
                <div class="round-heading">
                    <h1>Database Design</h1>
                    <h2>Round <b>Two</b> Day <b>Two</b></h2>
                </div>
                
                <div class="round-table">
                    <table>
                        <thead>
                            <th>Team ID</th>
                        </thead>
                        <tbody>
                            <tr><td>team_dd41</td></tr>
                            <tr><td>team_dd45</td></tr>
                            <tr><td>team_dd40</td></tr>
                            <tr><td>team_dd30</td></tr>
                            <tr><td>team_dd63</td></tr>
                            <tr><td>team_dd39</td></tr>
                            <tr><td>team_dd64</td></tr>
                            <tr><td>team_dd35</td></tr>
                            <tr><td>team_dd42</td></tr>
                            <tr><td>team_dd27</td></tr>
                            <tr><td>team_dd20</td></tr>
                            <tr><td>team_dd44</td></tr>
                        </tbody>
                    </table>
                </div>
            
            </div>

            
        </div>
    </div>
</div>