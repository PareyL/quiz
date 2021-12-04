<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Quiz Culture G</title>
        <!-- Fonts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-color: #A5D0CF;
                background-size: cover;
            }
            .answers {
                border: 1px solid lightgray;
                padding: 15px;
                margin-bottom: 10px;
                border-radius: 5px;
                width: 100%;
                box-shadow: inset 0 0 0 0.09px #fff;
                -webkit-transition: all ease 0.8s;
                -moz-transition: all ease 0.8s;
                transition: all ease 0.8s;
            }
            #l1, #l2, #l3, #l4, #l5 {
                opacity: 0;
            }
            #snow {
                animation: snow 10s linear infinite;
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background: none;
                background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/49306/snow.png');
                z-index: -1;
            }
            @keyframes snow {
                0% {background-position: 0px 0px, 0px 0px, 0px 0px;}
                50% {background-position: 500px 500px, 100px 200px, -100px 150px;}
                100% {background-position: 500px 1000px, 200px 400px, -100px 300px;}
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
        </style>
    </head>
    <body class="antialiased">
    <div id="snow"></div>
    <div class="container mt-5">
        @if($ready->next === 1)
            @if($isAdmin)
                <div class="question bg-white p-3">
                    <h1>Le résultat était</h1>
                    <div class="d-flex flex-row align-items-center question-title">
                        <h5 class="mt-1 ml-2">{{$oldQuestions->question}}</h5>
                    </div>
                    <div class="ans ml-2" style="display: none;">
                        <label class="radio"> <input type="radio" name="Q{{$oldQuestions->id}}" value="0" checked="checked"> <span>0</span>
                        </label>
                    </div>
                    @if(isset($oldQuestions->q2) && $oldQuestions->q2 !== "")
                        @if(isset($oldQuestions->q1) && $oldQuestions->q1 !== "")
                        <div class="ans ml-2">
                            <label class="p-2 w-100 radio @if($oldQuestions->reponse===1) alert-success @else alert-danger @endif">
                                <input type="radio" name="Q{{$oldQuestions->id}}" value="{{$oldQuestions->q1}}" @if($oldQuestions->reponse===1) checked="checked" @endif> <span>{{$oldQuestions->q1}}</span>
                            </label>
                        </div>
                        @endif
                        @if(isset($oldQuestions->q2) && $oldQuestions->q2 !== "")
                        <div class="ans ml-2">
                            <label class="p-2 w-100 radio @if($oldQuestions->reponse===2) alert-success @else alert-danger @endif">
                                <input type="radio" name="Q{{$oldQuestions->id}}" value="{{$oldQuestions->q2}}" @if($oldQuestions->reponse===2) checked="checked" @endif> <span>{{$oldQuestions->q2}}</span>
                            </label>
                        </div>
                        @endif
                        @if(isset($oldQuestions->q3) && $oldQuestions->q3 !== "")
                        <div class="ans ml-2">
                            <label class="p-2 w-100 radio @if($oldQuestions->reponse===3) alert-success @else alert-danger @endif">
                                <input type="radio" name="Q{{$oldQuestions->id}}" value="{{$oldQuestions->q3}}" @if($oldQuestions->reponse===3) checked="checked" @endif> <span>{{$oldQuestions->q3}}</span>
                            </label>
                        </div>
                        @endif
                        @if(isset($oldQuestions->q4) && $oldQuestions->q4 !== "")
                        <div class="ans ml-2">
                            <label class="p-2 w-100 radio @if($oldQuestions->reponse===4) alert-success @else alert-danger @endif">
                                <input type="radio" name="Q{{$oldQuestions->id}}" value="{{$oldQuestions->q4}}" @if($oldQuestions->reponse===4) checked="checked" @endif> <span>{{$oldQuestions->q4}}</span>
                            </label>
                        </div>
                        @endif
                    @else
                    <div class="ans ml-2">
                        <label class="p-2 w-100 radio alert-success">
                            <span style="font-size: 18px; font-weight: bold; padding-left: 20px;">{{$oldQuestions->q1}}</span>
                        </label>
                    </div>
                    @endif
                </div>
                <table class="mt-3 table">
                    <thead>
                    <tr>
                        <th scope="col">Pseudos</th>
                        <th scope="col">Scores</th>
                    </tr>
                    </thead>
                        <tbody>
                        @foreach($users as $u)
                            <tr>
                                <td>{{$u->name}}</td>
                                <td>{{$u->score}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn alert-success mt-5" id="next">Prochaine question</button>
            @else
        <div>
                @if($bonneRep == 1)
                    <div class="alert alert-success mt-3" role="alert">
                        <h1>Bonne réponse</h1>
                @elseif($bonneRep == 0)
                    <div class="alert alert-danger mt-3" role="alert">
                        <h1 style="text-align: center">Mauvaise Réponse</h1>
                @else
                    <div class="alert alert-warning mt-3" role="alert">
                        <h2>Tu as rafraichi la page ben bravo...</h2>
                @endif
                        <h3 class="mt-4">Tu as répondu <br/> <span style="font-size: 20px; font-weight: bold; font-family: 'Courier New'!important;">@if($rep !== "0") {{$rep}} @else Tu n'as pas répondu @endif</span></h3>
                        <h3 class="mt-2 mb-3">La bonne réponse était <br/> <span style="font-size: 20px; font-weight: bold; font-family: 'Courier New'!important;">{{$rep2}}</span></h3>
                    </div>
                    <h1 class="pt-3" style="text-align: center;">Score</h1>
                    <h2 style="z-index: 20; font-size: 92px; text-align: center;">{{$score}}</h2>

            @endif
        @else
        <div class="d-flex justify-content-center" style="flex-direction: column">
            @if($ready->go === 0)
                @if($isAdmin)
                    <div class="p-3 mt-auto mb-auto w-100">
                        <image style="display: flex; margin: auto;" src="{{ asset('frame.png') }}"/>
                        <table class="mt-3 table">
                            <thead>
                            <tr>
                                <th scope="col">Pseudos</th>
                                <th scope="col">Scores</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $u)
                            <tr>
                                <td>{{$u->name}}</td>
                                <td>{{$u->score}}</td>
                                <td>
                                    <form action="/deleteUser" method="post">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="userID" value="{{$u->id}}">
                                        <button class="btn btn-danger" type="submit">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <button class="btn alert-success mt-5" id="go" >GO !</button>
                    </div>
                @else
                    <div class="col-md-10 col-lg-10 bg-white p-3">
                        <h2 class="border-bottom pb-3 text-justify text-danger">Hop Hop Hop pas trop vite {{$user->name}}, tout le monde n'est pas prêt !</h2> <br/>
                        Tu peux commencer par lire les règles :
                        <ul>
                            <li id="l1">Charier les autres peut être source de bonheur</li>
                            <li id="l2">Gueuler auprès de l'organisateur ne résoudra pas ton problème</li>
                            <li id="l3">Ce site est développé par MOI donc si tu veux pas perdre des points attention !</li>
                            <li id="l4">Il y a plusieurs types de questions : Vrai/Faux, 4 réponses et une questions où il faut écrire la réponse. Pour ce dernier type il faudra écrire un nombre qui devra etre le plus proche possible de la réponse</li>
                            <li id="l5">J'espère que tout le monde est prêt sinon c'est surement la faute à mamie...</li>
                        </ul>
                    </div>
                @endif
            @else
            @if(!$isAdmin)<p><span style="font-weight: bold">Joueur</span> : {{$user->name}}</p>@endif
            <div style="text-align-last: center;" class="col-md-10 col-lg-10"><span id="time" style="font-size: 38px; margin-left: auto; margin-right: auto; width: auto;">30</span></div>
            <div>
                <div class="">
                    <div class="question p-3 border-bottom rounded-top" style="background-color: rgb(2 117 216);">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            @if(!$isAdmin)<div><p style="margin-bottom: 0px; font-size: 24px; color: white;"><span style="font-weight: bold">Score</span> : {{isset($score)? $score : 0}}</p></div>@else<h4 style="color: white;">Quiz de Noël</h4>@endif
                            <span style="color: white;">({{$user->etape}} sur {{$nbrQuestions}})</span>
                        </div>
                    </div>
                    <form action="/answer" method="POST" id="question">
                        {{ csrf_field() }}
                        <input type="hidden" name="numQuestion" value="{{$questions->id}}">
                        <input type="hidden" name="userScore" value="{{$user->score}}">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <h5 class="mt-1 ml-2">{{$questions->question}}</h5>
                        </div>
                        <div class="ans ml-2" style="display: none;">
                            <label class="radio">
                                <input type="radio" name="Q{{$questions->id}}" value="0" checked="checked">
                                <span>0</span>
                            </label>
                        </div>
                        @if(isset($questions->q2) && $questions->q2 !== "")
                            @if(isset($questions->q1) && $questions->q1 !== "")
                            <div class="ans ml-2">
                                <label class="radio mb-auto mt-1 answers" id="questionDiv1" for="question1">
                                    <input type="radio" id="question1" name="Q{{$questions->id}}" value="{{$questions->q1}}" onchange="onClickRadio(1)">
                                    <span>{{$questions->q1}}</span>
                                </label>
                            </div>
                            @endif
                            @if(isset($questions->q2) && $questions->q2 !== "")
                            <div class="ans ml-2">
                                <label class="radio mb-auto mt-1 answers" id="questionDiv2" for="question2">
                                    <input type="radio" id="question2" name="Q{{$questions->id}}" value="{{$questions->q2}}" onchange="onClickRadio(2)">
                                    <span>{{$questions->q2}}</span>
                                </label>
                            </div>
                            @endif
                            @if(isset($questions->q3) && $questions->q3 !== "")
                            <div class="ans ml-2">
                                <label class="radio mb-auto mt-1 answers" id="questionDiv3" for="question3">
                                    <input type="radio" id="question3" name="Q{{$questions->id}}" value="{{$questions->q3}}" onchange="onClickRadio(3)">
                                    <span>{{$questions->q3}}</span>
                                </label>
                            </div>
                            @endif
                            @if(isset($questions->q4) && $questions->q4 !== "")
                            <div class="ans ml-2">
                                <label class="radio mb-auto mt-1 answers" id="questionDiv4" for="question4">
                                    <input type="radio" id="question4" name="Q{{$questions->id}}" value="{{$questions->q4}}" onchange="onClickRadio(4)">
                                    <span>{{$questions->q4}}</span>
                                </label>
                            </div>
                            @endif
                        @else
                        <div class="ans ml-2">
                            <label class="radio mb-auto mt-1" id="questionDiv1" for="question1">
                                <input type="text" id="question1" name="Q{{$questions->id}}" value="0">
                                <span></span>
                            </label>
                        </div>
                        @endif
                    </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
        @endif
    </div>

    <script>
        let finish = 0;
        let receive = 0;
        let send = 0;
        function my_onkeydown_handler( event ) {
            switch (event.keyCode) {
                case 116 : // 'F5'
                    event.preventDefault();
                    event.keyCode = 0;
                    window.status = "F5 disabled";
                    break;
            }
        }
        $('#question1').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                e.preventDefault();
                return false;
            }
        });
        document.addEventListener("keydown", my_onkeydown_handler);
        function onClickRadio(id){
            var q = 0;
            @if(isset($questions->q1) && $questions->q1 !== "")
                q++;
            @endif
            @if(isset($questions->q2) && $questions->q2 !== "")
                q++;
            @endif
            @if(isset($questions->q3) && $questions->q3 !== "")
                q++;
            @endif
            @if(isset($questions->q4) && $questions->q4 !== "")
                q++;
            @endif
            for (i = 1; i <= q; i++)
                if (i !== id) {
                    document.getElementById("questionDiv"+i).style.boxShadow = "inset 0 0 0 0.09px #fff"
                    document.getElementById("questionDiv"+i).style.color = "#000"
                    document.getElementById("questionDiv"+i).style.fontWeight = "normal"
                }
            let w = document.getElementById("questionDiv" + id).offsetWidth;
            console.log(w)
            document.getElementById("questionDiv"+id).style.boxShadow = "inset "+w+"px 0 0 0.09px #0275d8"
            document.getElementById("questionDiv"+id).style.color = "#fff"
            document.getElementById("questionDiv"+id).style.fontWeight = "bold"
        }
        @if($ready->next === 0)
        function sendRequestRepondu(){
            console.log(receive)
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/getRepondu",
                success:
                    async function (data) {
                        console.log(data)
                        if (data === "1") {
                        @if($isAdmin)
                            await new Promise(r => setTimeout(r, 2000));
                        @endif
                            $("#question").submit();
                            receive = 1;
                        }
                    }
            });
        }
            @if($isAdmin)
                setInterval(sendRequestRepondu, 1000);
            @endif
        @endif
        function startTimer(duration, display) {
            var start = Date.now(),
                diff,
                seconds;
            function timer() {
                // get the number of seconds that have elapsed since
                // startTimer() was called
                if (finish)
                    diff = 0
                else
                    diff = duration - (((Date.now() - start) / 1000) | 0);

                // does the same job as parseInt truncates the float
                seconds = (diff % 60) | 0;

                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = seconds;

                if (diff === 0 && send === 0) {
                    @if(!$isAdmin)
                    console.log(send)
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        method: "POST",
                        url: "/setRepondu",
                        data: {"rep":$("#question1").val(), "nbrQ": {{$user->etape}}},
                        success:
                            function(){
                                    send = 1;
                                    if (receive === 0)
                                        setInterval(sendRequestRepondu, 1000);
                            }
                    });
                    diff = 1;
                    @endif
                finish = 1;
                }
            };
            // we don't want to wait a full second before the timer starts
            timer();
            setInterval(timer, 1000);
        }
        $(document).ready(function(){
            for (let i = 1; i <= 5; i++)
                if (i===1)
                    $("#l"+i).delay(500).animate({"opacity": "1"}, 700);
                else
                    $("#l"+i).delay(2000*i-1).animate({"opacity": "1"}, 700);

            @if($ready->go === 0 || $ready->next === 1)
            console.log('0 et 1')
                @if($ready->go === 0)
                    setInterval(sendRequestReady, 1000);
                @elseif($ready->next === 1)
                    setInterval(sendRequestNext, 1000);
                @endif
            function sendRequestReady(){
                $.ajax({
                    url: "/ready",
                    success:
                        function(data){
                            console.log(data)
                            if (data === "1") {
                                console.log("go !!!")
                                location.reload();
                            }
                        }
                });
            }
            function sendRequestNext(){
                $.ajax({
                    url: "/next",
                    success:
                        function(data){
                            console.log(data)
                            if (data === "0") {
                                console.log("go !!!")
                                location.replace("{{ URL::to('/nextQuestion') }}");
                            }
                        }
                });
            }
            @else
                console.log('1 et 0')
                var thirtySec = 10,
                    display = document.querySelector('#time');
                @if($isAdmin)
                    setTimeout(function() {
                        startTimer(thirtySec, display);
                    }, 1000);
                @else
                    startTimer(thirtySec, display);
                @endif
            @endif
        });
        $("#next").click(function(){
            console.log('next')
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'POST',
                url: "/setNext"
            });
        });
        $("#go").click(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method: 'POST',
                url: "/setGo"
            });
        });
    </script>

    </body>
</html>
