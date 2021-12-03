<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Quiz Culture G</title>

        <!-- Fonts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>


        <!-- Styles -->

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            .confetti{
                display: block;
                position: absolute;
                top: 0;
                margin: 0 auto;
                user-select: none;
                z-index: -1;
            }
            .table td, .table th {
                background-color: #FFFFFF;
                text-align: center;
            }
            .table thead th {
                background-color: rgb(2 117 216);
                border-bottom: none;
                color: #FFFFFF;
            }
            @font-face {
                font-family: DaggerSquare;
            }

            #podium-box {
                margin: 0 auto;
                display: flex;
            }

            .podium-number {
                font-family: DaggerSquare;
                font-weight: bold;
                font-size: 4em;
                color: white;
            }

            .step-container {
                flex: 1;
                display: flex;
                flex-direction: column;
            }

            .step-container>div:first-child {
                margin-top: auto;
                text-align: center;
            }

            .step {
                text-align: center;
            }

            .bg-blue {
                background-color: #063b65;
            }

            #first-step {
                height: 75%;
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
                z-index: 3;
                box-shadow: 5px 0 30px 0 rgb(0 0 0 / 40%), -5px 0 30px 0px rgb(0 0 0 / 40%)
            }

            #second-step {
                height: 55%;
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
                z-index: 2;
            }

            #third-step {
                height: 45%;
                border-top-left-radius: 5px;
                border-top-right-radius: 5px;
                z-index: 1;
            }

            .quiz-medal {
                margin: 30px 0 0 30px;
            }

            .quiz-medal {
                position: relative;
                margin-bottom: 16px;
                margin-left: auto;
                margin-right: auto;
                justify-content: center;
                display: flex;
            }

            .quiz-medal__circle {
                font-family: "Roboto", sans-serif;
                font-size: 50px;
                font-weight: 700;
                width: 120px;
                height: 120px;
                border-radius: 100%;
                color: white;
                text-align: center;
                line-height: 100px;
                vertical-align: middle;
                position: relative;
                border-width: 0.2em;
                border-style: solid;
                z-index: 1;
                box-shadow: inset 0 0 0 #a7b2b8, 2px 2px 0 rgba(0, 0, 0, 0.08);
                border-color: #edeff1;
                text-shadow: 2px 2px 0 #98a6ad;
                background: linear-gradient(to bottom right, #d1d7da 50%, #c3cbcf 50%);
            }
            .quiz-medal__circle.quiz-medal__circle--gold {
                box-shadow: inset 0 0 0 #b67d05, 2px 2px 0 rgba(0, 0, 0, 0.08);
                border-color: #fadd40;
                text-shadow: 0 0 4px #9d6c04;
                background: linear-gradient(to bottom right, #f9ad0e 50%, #e89f06 50%);
            }
            .quiz-medal__circle.quiz-medal__circle--silver {
                box-shadow: inset 0 0 0 #a7b2b8, 2px 2px 0 rgba(0, 0, 0, 0.08);
                border-color: #edeff1;
                text-shadow: 0px 0px 4px #98a6ad;
                background: linear-gradient(to bottom right, #939393 50%, #6d6d6d 50%);
            }
            .quiz-medal__circle.quiz-medal__circle--bronze {
                box-shadow: inset 0 0 0 #955405, 2px 2px 0 rgba(0, 0, 0, 0.08);
                border-color: #f7bb23;
                text-shadow: 0 0 4px #7d4604;
                background: linear-gradient(to bottom right, #df7e08 50%, #c67007 50%);
            }

            .quiz-medal__ribbon {
                content: "";
                display: block;
                position: absolute;
                border-style: solid;
                border-width: 6px 10px;
                width: 0;
                height: 30px;
                top: 115px;
            }

            .quiz-medal__ribbon--left {
                border-color: #FC402D #FC402D transparent #FC402D;
                margin-left: -20px;
                transform: rotate(20deg) translateZ(-32px);
            }

            .quiz-medal__ribbon--right {
                margin-left: 20px;
                border-color: #f31903 #f31903 transparent #f31903;
                transform: rotate(-20deg) translateZ(-48px);
            }
        </style>
    </head>
    <body>
    @if($isAdmin)
    <div class="p-3 mt-auto mb-auto w-100">
        <div id="podium-box" class="row" style="height: 800px; margin-top: 5%;">
            <div class="col-md-4 step-container m-0 p-0">
                <div style="padding: 5px; margin-right: 5%; margin-left: 5%; margin-bottom: 1%;">
                    <h3 id="second" style="text-align: center; display: none;"><span style="font-size: xxx-large; font-weight: bold">{{$users[1]->name}}</span></h3>
                </div>
                <div id="second-step" class="bg-blue step centerBoth podium-number">
                    <div class="quiz-medal">
                        <div class="quiz-medal__circle quiz-medal__circle--silver">
                            <span>
                              2
                            </span>
                        </div>
                        <div class="quiz-medal__ribbon quiz-medal__ribbon--left"></div>
                        <div class="quiz-medal__ribbon quiz-medal__ribbon--right"></div>
                    </div>
                    <p style="font-size: 0.5em; margin-top: 100px;">{{$users[1]->score}} points</p>
                </div>

            </div>
            <div class="col-md-4 step-container m-0 p-0">
                <div style="padding: 5px; margin-right: 5%; margin-left: 5%; margin-bottom: 1%;">
                    <h1 id="winner" style="text-align: center; display: none;"><span style="font-size: xxx-large; font-weight: bold">{{$users[0]->name}}</span></h1>
                </div>
                <div id="first-step" class="bg-blue step centerBoth podium-number">
                    <div class="quiz-medal">
                        <div class="quiz-medal__circle quiz-medal__circle--gold">
                            <span>
                              1
                            </span>
                        </div>
                        <div class="quiz-medal__ribbon quiz-medal__ribbon--left"></div>
                        <div class="quiz-medal__ribbon quiz-medal__ribbon--right"></div>
                    </div>
                    <p style="font-size: 0.5em; margin-top: 100px;">{{$users[0]->score}} points</p>
                </div>
            </div>
            <div class="col-md-4 step-container m-0 p-0">
                <div style="padding: 5px; margin-right: 5%; margin-left: 5%; margin-bottom: 1%;">
                    <h3 id="third" style="text-align: center; display: none;"><span style="font-size: xxx-large; font-weight: bold">{{$users[2]->name}}</span></h3>
                </div>
                <div id="third-step" class="bg-blue step centerBoth podium-number">
                    <div class="quiz-medal">
                        <div class="quiz-medal__circle quiz-medal__circle--bronze">
                            <span>
                              3
                            </span>
                        </div>
                        <div class="quiz-medal__ribbon quiz-medal__ribbon--left"></div>
                        <div class="quiz-medal__ribbon quiz-medal__ribbon--right"></div>
                    </div>
                    <p style="font-size: 0.5em; margin-top: 100px;">{{$users[2]->score}} points</p>
                </div>
            </div>
        </div>

            <table class="mt-3 table" id="others" style="display: none;">
            <thead>
            <tr>
                <th scope="col">Position</th>
                <th scope="col">Pseudos</th>
                <th scope="col">Scores</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $key=>$u)
                @if($key > 2)
                    <tr>
                        <td>{{$key}}</td>
                        <td>{{$u->name}}</td>
                        <td>{{$u->score}}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div style="display: flex; margin-top: 50%; padding: 15px;">
        <div class="p-3 mt-auto mb-auto w-100">
            <h2 style="z-index: 20; text-align: center;">Félicitation {{$user->name}} ton score est de...</h2>
            <h1 style="z-index: 20; text-align: center; font-size: 92px;">{{$score}}</h1>
        </div>
    </div>
    @endif
    <canvas class="confetti" id="canvas" @if($isAdmin) style="display: none;" @endif></canvas>

    <script>
        let i = 0;
        $(window).click(function() {
            i++;
            $('#canvas').css('display', 'block');
            switch (i) {
                case 1:
                    $('#third').css('display', 'block');
                    break;
                case 2:
                    $('#second').css('display', 'block');
                    break;
                case 3:
                    $('#winner').css('display', 'block');
                    break;
                case 4:
                    $('#others').css('display', 'table');
                    break;
            }
        });

        //-----------Var Inits--------------
        canvas = document.getElementById("canvas");
        ctx = canvas.getContext("2d");
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        cx = ctx.canvas.width / 2;
        cy = ctx.canvas.height / 2;

        let confetti = [];
        const confettiCount = 300;
        const gravity = 0.5;
        const terminalVelocity = 5;
        const drag = 0.075;
        const colors = [
            { front: 'red', back: 'darkred' },
            { front: 'green', back: 'darkgreen' },
            { front: 'blue', back: 'darkblue' },
            { front: 'yellow', back: 'darkyellow' },
            { front: 'orange', back: 'darkorange' },
            { front: 'pink', back: 'darkpink' },
            { front: 'purple', back: 'darkpurple' },
            { front: 'turquoise', back: 'darkturquoise' }];


        //-----------Functions--------------
        resizeCanvas = () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            cx = ctx.canvas.width / 2;
            cy = ctx.canvas.height / 2;
        };

        randomRange = (min, max) => Math.random() * (max - min) + min;

        initConfetti = () => {
            for (let i = 0; i < confettiCount; i++) {
                confetti.push({
                    color: colors[Math.floor(randomRange(0, colors.length))],
                    dimensions: {
                        x: randomRange(10, 20),
                        y: randomRange(10, 30) },

                    position: {
                        x: randomRange(0, canvas.width),
                        y: canvas.height - 1 },

                    rotation: randomRange(0, 2 * Math.PI),
                    scale: {
                        x: 1,
                        y: 1 },

                    velocity: {
                        x: randomRange(-25, 25),
                        y: randomRange(0, -50) } });
            }
        };

        //---------Render-----------
        render = () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            confetti.forEach((confetto, index) => {
                let width = confetto.dimensions.x * confetto.scale.x;
                let height = confetto.dimensions.y * confetto.scale.y;

                // Move canvas to position and rotate
                ctx.translate(confetto.position.x, confetto.position.y);
                ctx.rotate(confetto.rotation);

                // Apply forces to velocity
                confetto.velocity.x -= confetto.velocity.x * drag;
                confetto.velocity.y = Math.min(confetto.velocity.y + gravity, terminalVelocity);
                confetto.velocity.x += Math.random() > 0.5 ? Math.random() : -Math.random();

                // Set position
                confetto.position.x += confetto.velocity.x;
                confetto.position.y += confetto.velocity.y;

                // Delete confetti when out of frame
                if (confetto.position.y >= canvas.height) confetti.splice(index, 1);

                // Loop confetto x position
                if (confetto.position.x > canvas.width) confetto.position.x = 0;
                if (confetto.position.x < 0) confetto.position.x = canvas.width;

                // Spin confetto by scaling y
                confetto.scale.y = Math.cos(confetto.position.y * 0.1);
                ctx.fillStyle = confetto.scale.y > 0 ? confetto.color.front : confetto.color.back;

                // Draw confetti
                ctx.fillRect(-width / 2, -height / 2, width, height);

                // Reset transform matrix
                ctx.setTransform(1, 0, 0, 1, 0, 0);
            });

            // Fire off another round of confetti
            //if (confetti.length <= 10) initConfetti();

            window.requestAnimationFrame(render);
        };

        //---------Execution--------
        initConfetti();
        render();

        //----------Resize----------
        window.addEventListener('resize', function () {
            resizeCanvas();
        });

        //------------Click------------
        window.addEventListener('click', function () {
            initConfetti();
        });
    </script>

    </body>
</html>
