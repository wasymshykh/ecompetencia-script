<style>
    .content-link {
        display: flex;
        justify-content: center;
        text-align: center;
        margin-top: 15px;
    }
    .content-link a {
        font-size: 1.2em;
        font-weight: 400;
        border: 1px solid #e0e0e0;
        color: #0b1921;
        text-transform: uppercase;
        margin: 0 1em;
        padding: 0.4em 1em;
        display: block;
    }
    .content-link a.active {
        background: rgba(0,0,0,0.1);
    }

    .date-content {
        display: flex;
        justify-content: space-between;
        width: 100%;
        margin-bottom: 2em;
    }
    .date-date h3,
    .date-day h1 {
        font-size: 2em;
        font-weight: 400;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #0b1921;
        position: relative;
    }
    .date-date h3::before,
    .date-day h1::before {
        content: "";
        position: absolute;
        width: 50px;
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

    .event-row {
        display: flex;
        margin-bottom: 10px;
    }

    .e-r-time {
        flex: 2;
        display: flex;
    }
    .e-r-from {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: #f26322;
        padding: 2px 5px;
        text-align: center;
    }
    .e-r-to {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        background-color: #85ab30;
        padding: 2px 5px;
        text-align: center;
    }
    .e-r-from h3,
    .e-r-to h3 {
        font-size: 1.4em;
        font-weight: 700;
        letter-spacing: 2px;
        color: #ffffff;
        text-transform: uppercase;
    }
    .e-r-from p,
    .e-r-to p {
        font-size: 1em;
        font-weight: 400;
        letter-spacing: 2px;
        color: #ffffff;
        text-transform: uppercase;
    }
    .e-r-name {
        flex: 3;
        background-color: rgba(0,0,0,0.05);
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 10px 15px;
    }
    .e-r-name h3 {
        font-size: 1.2em;
        font-weight: 700;
        color: #0b1921;
        letter-spacing: 2px;
        text-transform: uppercase;
    }
    .e-r-name p,
    .e-r-location p {
        font-size: 1em;
        font-weight: 400;
        letter-spacing: 2px;
        color: #0b1921;
        text-transform: uppercase;
    }
    .e-r-location {
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 5px 15px;
        background-color: rgba(0,0,0,0.09);
    }
    .e-r-location h3 {
        font-size: 1.2em;
        font-weight: 700;
        color: #0b1921;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    @media (max-width: 728px) {
        .event-row {
            flex-wrap: wrap;
        }
        .e-r-time {
            flex: 100% 0 1;
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
            <h1>Schedule</h1>
            <h3>Ecompetencia 2019</h3>
            <div class="content-link">
                <a href="#" class="active">Day One</a>
                <a href="#">Day Two</a>
            </div>
        </div>

        <div class="content-body">
            <div class="date-content">
                <div class="date-day">
                    <h1>Day <span>Two</span></h1>
                </div>
                <div class="date-date">
                    <h3>17th April 2019</h3>
                </div>
            </div>

            <div class="event-row">
                <div class="e-r-time">
                    <div class="e-r-from">
                        <p>From</p>
                        <h3>10:00 AM</h3>
                    </div>
                    <div class="e-r-to">
                        <p>to</p>
                        <h3>12:00 PM</h3>
                    </div>
                </div>

                <div class="e-r-name">
                    <p>Event</p>
                    <h3>Web Development - Round 2</h3>
                </div>

                <div class="e-r-location">
                    <p>Location</p>
                    <h3>E-Lab 808, 809</h3>
                </div>
            </div>
            
            <div class="event-row">
                <div class="e-r-time">
                    <div class="e-r-from">
                        <p>From</p>
                        <h3>10:00 AM</h3>
                    </div>
                    <div class="e-r-to">
                        <p>to</p>
                        <h3>11:00 AM</h3>
                    </div>
                </div>

                <div class="e-r-name">
                    <p>Event</p>
                    <h3>Circuit Design - Round 2</h3>
                </div>

                <div class="e-r-location">
                    <p>Location</p>
                    <h3>E-Room 603, 607</h3>
                </div>
            </div>


            <div class="event-row">
                <div class="e-r-time">
                    <div class="e-r-from">
                        <p>From</p>
                        <h3>11:00 AM</h3>
                    </div>
                    <div class="e-r-to">
                        <p>to</p>
                        <h3>01:00 PM</h3>
                    </div>
                </div>

                <div class="e-r-name">
                    <p>Event</p>
                    <h3>Sketch Designing - Round 2</h3>
                </div>

                <div class="e-r-location">
                    <p>Location</p>
                    <h3>E-Room ---</h3>
                </div>
            </div>


            <div class="event-row">
                <div class="e-r-time">
                    <div class="e-r-from">
                        <p>From</p>
                        <h3>12:30 PM</h3>
                    </div>
                    <div class="e-r-to">
                        <p>to</p>
                        <h3>01:30 PM</h3>
                    </div>
                </div>

                <div class="e-r-name">
                    <p>Event</p>
                    <h3>Speed Programming - Round 2</h3>
                </div>

                <div class="e-r-location">
                    <p>Location</p>
                    <h3>E-Lab 808, 809, 509</h3>
                </div>
            </div>


            <div class="event-row">
                <div class="e-r-time">
                    <div class="e-r-from">
                        <p>From</p>
                        <h3>02:45 PM</h3>
                    </div>
                    <div class="e-r-to">
                        <p>to</p>
                        <h3>03:45 PM</h3>
                    </div>
                </div>

                <div class="e-r-name">
                    <p>Event</p>
                    <h3>Creative Writing</h3>
                </div>

                <div class="e-r-location">
                    <p>Location</p>
                    <h3>E-Room ---</h3>
                </div>
            </div>

            <div class="event-row">
                <div class="e-r-time">
                    <div class="e-r-from">
                        <p>From</p>
                        <h3>05:00 PM</h3>
                    </div>
                    <div class="e-r-to">
                        <p>to</p>
                        <h3>07:00 PM</h3>
                    </div>
                </div>

                <div class="e-r-name">
                    <p>Event</p>
                    <h3>Closing Ceremony</h3>
                </div>

                <div class="e-r-location">
                    <p>Location</p>
                    <h3>Main Auditorium</h3>
                </div>
            </div>


        </div>

    </div>
</div>