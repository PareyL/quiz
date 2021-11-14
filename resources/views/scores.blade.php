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
        </style>
    </head>
    <body>
    @if($isAdmin)
    <div class="p-3 mt-auto mb-auto w-100">
        <h1 style="text-align: center;">Félicitation <span style="font-size: xxx-large; font-weight: bold">{{$users[0]->name}}</span> tu es le grand gagnant avec <span style="font-size: xxx-large; font-weight: bold">{{$users[0]->score}} points !</span></h1>
        <image style="margin: auto; display: flex; height: 200px;" src="https://images.assetsdelivery.com/compings_v2/jabkitticha/jabkitticha1607/jabkitticha160700396.jpg"></image>
        <div style="display: flex;">
            <div style="display: flex; flex-direction: column; margin-right: auto;">
                <h3 style="text-align: center;">Félicitation <span style="font-size: xxx-large; font-weight: bold">{{$users[1]->name}}</span> tu es 2ème avec <span style="font-size: xxx-large; font-weight: bold">{{$users[1]->score}} points !</span></h3>
                <image style="margin: auto; display: flex; height: 200px;" src="https://images.assetsdelivery.com/compings_v2/cookamoto/cookamoto1904/cookamoto190400013.jpg"></image>
            </div>
            <div style="display: flex; flex-direction: column; margin-left: auto;">
                <h3 style="text-align: center;">Félicitation <span style="font-size: xxx-large; font-weight: bold">{{$users[2]->name}}</span> tu es 3ème avec <span style="font-size: xxx-large; font-weight: bold">{{$users[2]->score}} points !</span></h3>
                <image style="margin: auto; display: flex; height: 150px;" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS582ExGF6WVg-aLqv8BNkbL_j_3O_3qtckjQ&usqp=CAU"></image>
            </div>
        </div>
            <table class="mt-3 table">
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
    <canvas class="confetti" id="canvas"></canvas>
    @endif

    <script>
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
