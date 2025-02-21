<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="your-css-file.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Euphoria+Script&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cuprum&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Round|Material+Icons+Sharp|Material+Icons+Two+Tone" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Rochester&display=swap" rel="stylesheet">
    <title>Reservations Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            width: 100%;
            align-items: center;
            background-color: rgba(0, 0, 0, 0.897);
            padding: 10px 0;
            height: 70px;
        }

        .navbar h1 {
            font-size: 50px;
            font-family: Lilita One;
            font-weight: 900;
            font-weight: bold;
            padding-left: 20px;
            position: relative;
        }

        .navbar h1::before,
        .navbar h1::after {
            content: "FOODILITE";
            position: absolute;
            top: 0;
            left: 20px;
            animation: glitter 2s infinite linear;
            color: transparent;
        }

        .navbar h1::before {
            color: rgb(255, 217, 0);
        }

        @keyframes glitter {
            0% {
                transform: translateX(-1px) translateY(-1px);
            }

            25% {
                transform: translateX(1px) translateY(1px);
            }

            50% {
                transform: translateX(-1px) translateY(-1px);
            }

            75% {
                transform: translateX(1px) translateY(1px);
            }

            100% {
                transform: translateX(0) translateY(0);
            }
        }

        .nav-links {
            list-style: none;
            display: flex;
            margin-left: 35px;
        }

        .nav-links li {
            margin-right: 25px;
            font-size: 20px;
            font-family: Cuprum;
        }

        .nav-links a {
            text-decoration: none;
            color: #FFF;
            font-weight: bold;
        }

        .nav-links a:hover {
            color: #FF0000;
        }

        .arrow-down {
            text-align: center;
            margin-top: 100px;
        }

        .arrow-down a {
            font-size: 30px;
            color: #e4d5d5;
            text-decoration: none;
        }

        .background-image {
            background-image: url('images/606468a965e398.64640103.png');
            background-size: cover;
            background-position: center;
            height: 88vh;
            position: relative;
        }

        .background-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(40, 40, 40, 0.45);
        }

        .section h2 {
            font-size: 24px;
            color: #333;
        }

        .text-container {
            position: absolute;
            font-family: Euphoria Script;
            top: 90px;
            left: 0;
            width: 100%;
            text-align: center;
        }

        .text-container h2 {
            font-size: 120px;
            color: #FFF;
        }

        .scroll-indicator {
            position: absolute;
            bottom: 45px;
            left: 50%;
            transform: translateX(-50%) rotate(180deg);
            text-align: center;
            animation: bounce 1.5s infinite alternate;
        }

        .scroll-indicator .circle {
            width: 60px;
            height: 60px;
            border: 2px solid #fff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .scroll-indicator .circle::after {
            content: "\2B9F";
            color: #fff;
            font-size: 36px;
        }

        @keyframes bounce {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(30px);
            }
        }

        .options-section {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url('images/download.jpg');
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .background-image-options {
            width: 22%;
            height: 100%;
            position: relative;
        }

        .background-overlay-options {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(40, 40, 40, 0.5);
        }

        .text-container-options {
            position: absolute;
            font-family: Euphoria Script;
            top: 40px;
            color: whitesmoke;
            left: 0;
            width: 100%;
            text-align: center;
            font-size: 40px;
            z-index: 1;
        }

        .options-form {
            background-color: rgb(238, 238, 0.9);
            background-color: rgb(255, 252, 252);
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            width: 450px;
            height: 300px;
            margin-top: 30px;
        }

        .center {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(to right,
                    rgb(162, 216, 162),
                    rgb(102, 194, 102));
        }

        .tickets {
            width: 550px;
            height: fit-content;
            border: 0.4mm solid rgba(0, 0, 0, 0.08);
            border-radius: 3mm;
            box-sizing: border-box;
            padding: 10px;
            font-family: poppins;
            max-height: 96vh;
            overflow: auto;
            background: white;
            box-shadow: 0px 25px 50px -12px rgba(0, 0, 0, 0.25);
        }

        .ticket-selector {
            background: rgb(243, 243, 243);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-direction: column;
            box-sizing: border-box;
            padding: 20px;
        }

        .head {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 30px;
        }

        .title {
            font-size: 30px;
            font-weight: 900;
            font-family: Rochester;
        }

        .seats {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            min-height: 150px;
            position: relative;
        }

        .status {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
        }

        .seats::before {
            content: "";
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translate(-50%, 0);
            width: 220px;
            height: 7px;
            background: rgb(141, 198, 255);
            border-radius: 0 0 3mm 3mm;
            border-top: 0.3mm solid rgb(180, 180, 180);
        }

        .item {
            font-size: 12px;
            position: relative;
        }

        .item::before {
            content: "";
            position: absolute;
            top: 50%;
            left: -12px;
            transform: translate(0, -50%);
            width: 10px;
            height: 10px;
            background: rgb(255, 255, 255);
            outline: 0.2mm solid rgb(120, 120, 120);
            border-radius: 0.3mm;
        }

        .item:nth-child(2)::before {
            background: rgb(180, 180, 180);
            outline: none;
        }

        .item:nth-child(3)::before {
            background: purple;
            outline: none;
        }

        .all-seats {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            /* 5 columns */
            grid-gap: 20px;
            /* Gap between grid items */
            margin: 60px 0;
            margin-top: 20px;
            position: relative;
        }



        .seat {
            width: 30px;
            height: 30px;
            background: white;
            border-radius: 0.5mm;
            outline: 0.3mm solid rgb(180, 180, 180);
            cursor: pointer;
        }

        .all-seats input:checked+label {
            background: purple;
            outline: none;
        }

        .seat.booked {
            background: rgb(180, 180, 180);
            outline: none;
        }

        input {
            display: none;
        }

        .timings {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 30px;
        }

        .dates {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .dates-item {
            width: 50px;
            height: 40px;
            background: rgb(233, 233, 233);
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            padding: 10px 0;
            border-radius: 2mm;
            cursor: pointer;
        }

        .day {
            font-size: 12px;
        }

        .times {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;
        }

        .time {
            font-size: 14px;
            width: fit-content;
            padding: 7px 14px;
            background: rgb(233, 233, 233);
            border-radius: 2mm;
            cursor: pointer;
        }

        .timings input:checked+label {
            background: purple;
            color: white;
        }

        .price {
            width: 100%;
            box-sizing: border-box;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .total {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            font-size: 16px;
            font-weight: 500;
        }

        .total span {
            font-size: 11px;
            font-weight: 400;
        }

        .price button {
            background: rgb(60, 60, 60);
            color: white;
            font-family: poppins;
            font-size: 14px;
            padding: 7px 14px;
            border-radius: 2mm;
            outline: none;
            border: none;
            cursor: pointer;
        }

        .seat {
            transition: background-color 0.3s ease;
        }

        /* Animation for success message */
        .success-message {
            opacity: 0;
            transition: opacity 0.5s ease;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h1>FOODILITE</h1>
        <ul class="nav-links">
            <li><a href="home.html">HOME</a></li>
            <!-- <li><a href="#menu">MENU</a></li> -->
            <li><a href="#reservation">RESERVATION</a></li>
            <!-- <li><a href="#name">MY CART</a></li> -->
            <li><a href="#logout">LOGOUT</a></li>
        </ul>
    </div>

    <div class="background-image">
        <div class="background-overlay"></div>
        <div class="text-container">
            <h2>Make Reservations</h2>
        </div>
    </div>

    <div class="scroll-indicator">
        <div class="circle">
        </div>
    </div>
    </div>

    <div class="options-section" id="reservation">
        <form>
            <div class="center">
                <div class="tickets">
                    <div class="ticket-selector">
                        <div class="head">
                            <div class="title" id="success-message">Book Seat</div>
                        </div>
                        <div class="seats">
                            <div class="status">
                                <div class="item">Available</div>
                                <div class="item">Booked</div>
                                <div class="item">Selected</div>
                            </div>
                            <div class="all-seats">
                                <input type="checkbox" name="tickets" id="s1" />
                                <label for="s1" class="seat booked"></label>
                            </div>
                        </div>
                        <div class="timings">
                            <div class="dates">
                                <input type="radio" name="date" id="d1" checked />
                                <label for="d1" class="dates-item">
                                    <div class="day">Sun</div>
                                    <div class="date">11</div>
                                </label>
                                <input type="radio" id="d2" name="date" />
                                <label class="dates-item" for="d2">
                                    <div class="day">Mon</div>
                                    <div class="date">12</div>
                                </label>
                                <input type="radio" id="d3" name="date" />
                                <label class="dates-item" for="d3">
                                    <div class="day">Tue</div>
                                    <div class="date">13</div>
                                </label>
                                <input type="radio" id="d4" name="date" />
                                <label class="dates-item" for="d4">
                                    <div class="day">Wed</div>
                                    <div class="date">14</div>
                                </label>
                                <input type="radio" id="d5" name="date" />
                                <label class="dates-item" for="d5">
                                    <div class="day">Thu</div>
                                    <div class="date">15</div>
                                </label>
                                <input type="radio" id="d6" name="date" />
                                <label class="dates-item" for="d6">
                                    <div class="day">Fri</div>
                                    <div class="date">16</div>
                                </label>
                                <input type="radio" id="d7" name="date" />
                                <label class="dates-item" for="d7">
                                    <div class="day">Sat</div>
                                    <div class="date">17</div>
                                </label>
                            </div>
                            <div class="times">
                                <input type="radio" name="time" id="t1" checked />
                                <label for="t1" class="time">11:00</label>
                                <input type="radio" id="t2" name="time" />
                                <label for="t2" class="time"> 14:30 </label>
                                <input type="radio" id="t3" name="time" />
                                <label for="t3" class="time"> 18:00 </label>
                                <input type="radio" id="t4" name="time" />
                                <label for="t4" class="time"> 21:30 </label>
                            </div>
                        </div>
                    </div>
                    <div class="price">
                        <div class="total">
                            <span> <span class="count">0</span> Seats </span>
                            <div class="amount">0</div>
                        </div>
                        <button id="bookButton" type="button">Book</button>

                        <div class="success-message" id="successMessage"></div>

                    </div>

                </div>
            </div>
    </div>
    </form>

    <script>
        let seats = document.querySelector(".all-seats");
        for (var i = 0; i < 19; i++) {
            let randint = Math.floor(Math.random() * 2);
            let booked = randint === 1 ? "booked" : "";
            seats.insertAdjacentHTML(
                "beforeend",
                '<input type="checkbox" name="tickets" id="s' +
                (i + 2) +
                '" /><label for="s' +
                (i + 2) +
                '" class="seat ' +
                booked +
                '"></label>'
            );
        }

        let tickets = seats.querySelectorAll("input");
        tickets.forEach((ticket) => {
            ticket.addEventListener("change", () => {
                let amount = document.querySelector(".amount").innerHTML;
                let count = document.querySelector(".count").innerHTML;
                amount = Number(amount);
                count = Number(count);

                if (ticket.checked) {
                    count += 1;
                    amount += 200;
                } else {
                    count -= 1;
                    amount -= 200;
                }
                document.querySelector(".amount").innerHTML = amount;
                document.querySelector(".count").innerHTML = count;
            });
        });

        let bookButton = document.querySelector("button[type='button']");
        bookButton.addEventListener("click", () => {
            let count = parseInt(document.querySelector(".count").innerHTML);


            if (count > 4) {
                message = "Welcome with your family and enjoy dinner!";
            } else {
                message = "Successfully booked!";
            }

            document.querySelector("#success-message").innerHTML = message;
        });
    </script>

</body>

</html>