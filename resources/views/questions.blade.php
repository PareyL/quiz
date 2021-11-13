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
            }
        </style>
    </head>
    <body class="antialiased">
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
                    @if(isset($questions->q1))
                    <div class="ans ml-2">
                        <label class="p-2 w-100 radio @if($oldQuestions->reponse===1) alert-success @else alert-danger @endif">
                            <input type="radio" name="Q{{$oldQuestions->id}}" value="{{$oldQuestions->q1}}" @if($oldQuestions->reponse===1) checked="checked" @endif> <span>{{$oldQuestions->q1}}</span>
                        </label>
                    </div>
                    @endif
                    @if(isset($questions->q2))
                    <div class="ans ml-2">
                        <label class="p-2 w-100 radio @if($oldQuestions->reponse===2) alert-success @else alert-danger @endif">
                            <input type="radio" name="Q{{$oldQuestions->id}}" value="{{$oldQuestions->q2}}" @if($oldQuestions->reponse===2) checked="checked" @endif> <span>{{$oldQuestions->q2}}</span>
                        </label>
                    </div>
                    @endif
                    @if(isset($questions->q3))
                    <div class="ans ml-2">
                        <label class="p-2 w-100 radio @if($oldQuestions->reponse===3) alert-success @else alert-danger @endif">
                            <input type="radio" name="Q{{$oldQuestions->id}}" value="{{$oldQuestions->q3}}" @if($oldQuestions->reponse===3) checked="checked" @endif> <span>{{$oldQuestions->q3}}</span>
                        </label>
                    </div>
                    @endif
                    @if(isset($questions->q4))
                    <div class="ans ml-2">
                        <label class="p-2 w-100 radio @if($oldQuestions->reponse===4) alert-success @else alert-danger @endif">
                            <input type="radio" name="Q{{$oldQuestions->id}}" value="{{$oldQuestions->q4}}" @if($oldQuestions->reponse===4) checked="checked" @endif> <span>{{$oldQuestions->q4}}</span>
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
                <h1>Résultat...</h1>
                @if($bonneRep)
                    <div class="alert alert-success" role="alert">
                        <h2>Bonne réponse !</h2>
                        <h3>Félicitations pour ce point durement gagné.</h3>
                    </div>
                @else
                    <div class="alert alert-danger" role="alert">
                        <h2>Mauvaise Réponse.</h2>
                        <h3>La prochaine sera la bonne !</h3>
                    </div>
                @endif
            <h2 class="pt-3 text-justify">Au cas où tu aurais oublié ton score, le voici : </h2> <br/>
            <h1 style="z-index: 20; text-align: center; font-size: 92px;">{{$score}}</h1>
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
                        <button class="btn alert-success mt-5" id="go" >GO !</button>
                    </div>
                @else
                    <div class="col-md-10 col-lg-10 bg-white p-3">
                        <h2 class="border-bottom pb-3 text-justify">Hop Hop Hop pas trop vite tout le monde n'est pas prêt !</h2> <br/>
                        Tu peux commencer par lire les règles :<br/>
                        - Charier les autres peut être source de bonheur<br/>
                        - Gueuler auprès de l'organisateur ne résoudra pas ton problème<br/>
                        - Ce site est développé par MOI donc si tu veux pas perdre des points attention !<br/>
                        - Il y a plusieurs types de questions : Vrai/Faux, 4 réponses et une questions où il faut écrire la réponse. Pour ce dernier type il faudra écrire un nombre qui devra etre le plus proche possible de la réponse<br/>
                        - J'espère que tout le monde est prêt sinon c'est surement la faute à mamie...<br/>
                    </div>
                @endif
            @else
            <div style="margin-left: auto; margin-right: auto;">Il reste <span id="time">30</span> secondes !</div>
            @if(!$isAdmin)<div><h4>Joueur : {{$user->name}}</h4><h4>Score : {{isset($score)? $score : 0}}</h4></div>@endif
            <div class="col-md-10 col-lg-10">
                <div class="border">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row justify-content-between align-items-center mcq">
                            <h4>Noël Quiz</h4><span>({{$user->etape}} sur {{$nbrQuestions}})</span>
                        </div>
                    </div>
                    <form action="/answer" method="POST" id="question">
                        {{ csrf_field() }}
                        <input type="hidden" name="numQuestion" value="{{$questions->id}}">
                    <div class="question bg-white p-3 border-bottom">
                        <div class="d-flex flex-row align-items-center question-title">
                            <h5 class="mt-1 ml-2">{{$questions->question}}</h5>
                        </div>
                        <div class="ans ml-2" style="display: none;">
                            <label class="radio"> <input type="radio" name="Q{{$questions->id}}" value="0" checked="checked"> <span>0</span>
                            </label>
                        </div>
                        @if(isset($questions->q1))
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="Q{{$questions->id}}" value="{{$questions->q1}}"> <span>{{$questions->q1}}</span>
                            </label>
                        </div>
                        @endif
                        @if(isset($questions->q2))
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="Q{{$questions->id}}" value="{{$questions->q2}}"> <span>{{$questions->q2}}</span>
                            </label>
                        </div>
                        @endif
                        @if(isset($questions->q3))
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="Q{{$questions->id}}" value="{{$questions->q3}}"> <span>{{$questions->q3}}</span>
                            </label>
                        </div>
                        @endif
                        @if(isset($questions->q4))
                        <div class="ans ml-2">
                            <label class="radio"> <input type="radio" name="Q{{$questions->id}}" value="{{$questions->q4}}"> <span>{{$questions->q4}}</span>
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
        function startTimer(duration, display) {
            var start = Date.now(),
                diff,
                seconds;
            function timer() {
                // get the number of seconds that have elapsed since
                // startTimer() was called
                diff = duration - (((Date.now() - start) / 1000) | 0);

                // does the same job as parseInt truncates the float
                seconds = (diff % 60) | 0;

                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.textContent = seconds;

                if (diff === 0) {
                    $("#question").submit();
                }
            };
            // we don't want to wait a full second before the timer starts
            timer();
            setInterval(timer, 1000);
        }
        $(document).ready(function(){
            @if($ready->go === 0 || $ready->next === 1)
            console.log('0 et 1')
                @if($ready->go === 0)
                    setInterval(sendRequestReady, 500);
                @elseif($ready->next === 1)
                    setInterval(sendRequestNext, 500);
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
                var thirtySec = 20,
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
