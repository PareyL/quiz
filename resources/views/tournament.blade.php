<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script src="js/jquery-3.3.1.min.js"></script>

    <script src="https://www.aropupu.fi/bracket/jquery-bracket/dist/jquery.bracket.min.js"></script>
    <link href="https://www.aropupu.fi/bracket/jquery-bracket/dist/jquery.bracket.min.css" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="antialiased">
<div style="margin: 25px; border: 1px solid lightgray; border-radius: 20px;">
    <div style="padding: 20px;height: 100%;">
        <div id="partOne">
            <div class="form-group">
                <label for="nbrParticipants">Nombre de participants</label>
                <input type="number" class="form-control" id="nbrParticipants" placeholder="0" value="0" min="0" style="width: 10%;">
            </div>
            <div class="form-group" id="usersEnter" style="height: 200px; overflow: auto;">
            </div>
            <input type="button" class="btn btn-primary" id="TaS" value="Tirage au sort">
        </div>
        <div id="partOneBis" style="display: none; width: 100%;">
            <div id="openTaS">
                <p style="margin: 0; font-weight: bold;">Afficher les paramètres</p>
                <i class="bi bi-chevron-compact-down"></i>
                </a>
            </div>
        </div>
    </div>

    <div id="tablesPoules" style="margin: 25px; border: 1px solid lightgray; border-radius: 20px; display: none">
        <div style="padding: 20px; height: 100%; display: flex;" id="poules">
        </div>
    </div>

    <div id="tablesMatchs" style="margin: 25px; border: 1px solid lightgray; border-radius: 20px; display: none">
        <div style="padding: 20px; height: 100%; display: flex;" id="matchs">
        </div>
        <div style="padding: 20px; display: flex;">
            <input type="button" class="btn btn-primary" onclick="setScore()" value="Mise à jour des scores" style="margin-left: auto;">
        </div>
    </div>

    <div id="tablesMatchsBis" style="display: none; width: 100%; padding: 20px;">
        <div id="openTablesMatchs">
            <p style="margin: 0; font-weight: bold;">Afficher les matchs de poules</p>
            <i class="bi bi-chevron-compact-down"></i>
            </a>
        </div>
    </div>
    <div id="brackets" style="display: none; margin: 20px;">
        <h3>Winner bracket</h3>
        <div class="demoTable1 m-4">
        </div>
        <h3 id="loserBracket">Loser bracket</h3>
        <div class="demoTable2 m-4">
        </div>
    </div>
</div>

</body>
<script>
    let users = [];
    let TaSPush = 0;
    let mP1F = []; let mP2F = [];
    let teams1 = []; let teams2 = [];
    let results1 = []; let results2 = [];
    let p1 = []; let p2 = [];
    $( document ).ready(function() {
        let data = sessionStorage.getItem('nbrUser');
        $("#nbrParticipants").val(data)
        let formUsers = "";
        for (let i = 1; i <= data; i++){
            formUsers +='<div style="margin-top: 10px;" id="user'+i+'">' +
                '<label style="margin-bottom: 0px;" for="inputUser'+i+'">Utilisateur n°'+i+'</label>' +
                '<input type="text" class="form-control" id="inputUser'+i+'" value="';
            if (sessionStorage.getItem('inputUser'+i)!=null)
                formUsers +=sessionStorage.getItem('inputUser'+i);
            formUsers +='" oninput="enregistreUser(this)">' +
                '</div>';
        }
        $("#usersEnter").html(formUsers);
    });

    $("#nbrParticipants").bind('keyup mouseup', function () {
        let formUsers = "";
        for (let i = 1; i <= this.value; i++){
            formUsers +='<div style="margin-top: 10px;" id="user'+i+'">' +
                '<label style="margin-bottom: 0px;" for="inputUser'+i+'">Utilisateur n°'+i+'</label>' +
                '<input type="text" class="form-control" id="inputUser'+i+'" value="';
            if (sessionStorage.getItem('inputUser'+i)!=null)
                formUsers +=sessionStorage.getItem('inputUser'+i);
            formUsers +='" oninput="enregistreUser(this)">' +
                '</div>';
        }
        $("#usersEnter").html(formUsers);
        sessionStorage.setItem('nbrUser', this.value);
    });

    function shuffle(a) {
        for (let i = a.length - 1; i > 0; i--) {
            const j = Math.floor(Math.random() * (i + 1));
            [a[i], a[j]] = [a[j], a[i]];
        }
        return a;
    }
    $("#TaS").on('click', function () {
        TaSPush = 1;
        $("#partOne").css('display', 'none')
        $("#partOneBis").css('display', 'block')
        $("#tablesPoules").css('display', 'block')
        $("#tablesMatchs").css('display', 'block')
        let poule1 = "";
        let poule2 = "";
        let matches1 = "";
        let matches2 = "";
        let users = [];
        let nbrUsers = sessionStorage.getItem('nbrUser');
        for (let i = 1; i <= nbrUsers; i++)
            users.push($("#inputUser"+i).val())
        console.log(users)
        console.log(users.indexOf(""))
        if (users.indexOf(null)!==-1 || users.indexOf("")!==-1)
            alert("Des utilisateurs n'ont pas de noms !");
        else{
            if (users.length >= 6){
                $("#loserBracket").css('display', 'block')
                let shuffleUsers = shuffle(users)
                console.log(shuffleUsers)
                p1 = shuffleUsers.splice(0,shuffleUsers.length/2);
                p2 = shuffleUsers;
                console.log("p1: "+p1)
                console.log("p2: "+p2)
            } else {
                $("#tablesPoules").css('display', 'none')
                $("#tablesMatchs").css('display', 'none')
                $("#loserBracket").css('display', 'none')
                users = shuffle(users);
                for (let i = 0; i < users.length; i=i+2) {
                    console.log(users[i])
                    if (users[i+1] !== undefined) {
                        teams1.push([users[i], users[i+1]])
                        results1.push([null, null])
                    }
                    else {
                        teams1.push([users[i], null])
                        results1.push([null, null])
                    }
                }
                if (teams1.length % 2 === 1)
                    teams1.push([null, null])
                console.log(teams1)
                console.log(results1)
                $("#brackets").css('display', 'table')
                $(updateResizeDemoInf8)
            }
        }
        poule1 += '<table style="width: 45%;" class="table"><thead><tr><th scope="col">#</th><th scope="col">Utilisateurs</th><th scope="col">Score</th></tr></thead><tbody>';
        for(let i = 1; i <= p1.length; i++){
            poule1 += '<tr><th scope="row">'+i+'</th><td>'+p1[i-1]+'</td><td><input type="number" id="userScore'+p1[i-1]+'" value="0" style="text-align: center; width: 50px;"></td></tr>'
        }
        poule1 += '</tbody></table>'
        poule2 += '<table style="width: 45%; margin-left: 5%;" class="table"><thead><tr><th scope="col">#</th><th scope="col">Utilisateurs</th><th scope="col">Score</th></tr></thead><tbody>';
        for(let i = 1; i <= p2.length; i++){
            poule2 += '<tr><th scope="row">'+i+'</th><td>'+p2[i-1]+'</td><td><input type="number" id="userScore'+p2[i-1]+'" value="0" style="text-align: center; width: 50px;"></td></tr>'
        }
        poule2 += '</tbody></table>'
        $("#poules").html(poule1+poule2);
        mP1F = makeRoundRobinPairings(p1)
        mP2F = makeRoundRobinPairings(p2)

        matches1 += '<table style="width: 45%;" class="table"><caption style="caption-side: top;">Poule 1</captio><thead><tr><th scope="col">Utilisateur</th><th scope="col">Score</th><th scope="col">-</th><th scope="col">Score</th><th scope="col">Utilisateur</th></tr></thead><tbody>';
        for (let i = 0; i < mP1F.length; i++)
            for (let j = 0; j < mP1F[i].length; j=j+2)
                if (mP1F[i][j] !== null && mP1F[i][j+1] !== null)
                    matches1 += '<tr><td id="userP1U'+ i + j +'">'+mP1F[i][j]+'</td><td><input type="number" id="inputScoreP1U'+ i + j +'" style="text-align: center; width: 50px;" value="0"></td><td>-</td><td><input type="number" id="inputScoreP1U'+ i + (j+1) +'" style="text-align: center; width: 50px;" value="0"></td><td id="userP1U'+ i + (j + 1) +'">'+mP1F[i][j+1]+'</td></tr>'
        matches1 += '</tbody></table>'
        matches2 += '<table style="width: 45%; margin-left: 5%;" class="table"><caption style="caption-side: top;">Poule 2</caption><thead><tr><th scope="col">Utilisateur</th><th scope="col">Score</th><th scope="col">-</th><th scope="col">Score</th><th scope="col">Utilisateur</th></tr></thead><tbody>';
        for (let i = 0; i < mP2F.length; i++)
            for (let j = 0; j < mP2F[i].length; j=j+2)
                if (mP2F[i][j] !== null && mP2F[i][j+1] !== null)
                    matches2 += '<tr><td id="userP2U'+ i + j +'">'+mP2F[i][j]+'</td><td><input type="number" id="inputScoreP2U'+ i+ j +'" style="text-align: center; width: 50px;" value="0"></td><td>-</td><td><input type="number" id="inputScoreP2U'+ i + (j+1) +'" style="text-align: center; width: 50px;" value="0"></td><td id="userP2U'+ i + (j + 1) +'">'+mP2F[i][j+1]+'</td></tr>'
        matches2 += '</tbody></table>'
        $("#matchs").html(matches1+matches2);
        setColorScore()
    });

    $("#openTaS").on('click', function () {
        $("#partOne").css('display', 'block')
        $("#partOneBis").css('display', 'none')
    })
    $("#openTablesMatchs").on('click', function () {
        $("#tablesMatchs").css('display', 'block')
        $("#tablesMatchsBis").css('display', 'none')
    })

    function enregistreUser(t){
        sessionStorage.setItem(t.id, t.value);
    }

    Array.prototype.associate = function (keys) {
        var result = {};

        this.forEach(function (el, i) {
            result[keys[i]] = el;
        });

        return result;
    };

    function setColorScore() {
        let a1 = 0; let a2 = 0;
        if (TaSPush && mP1F !== [] && mP2F !== []) {
            for (let i = 0; i < mP1F.length; i++) {
                for (let j = 0; j < mP1F[i].length; j++) {
                    $("#inputScoreP1U" + i + "" + j).bind('keyup mouseup', function () {
                        if (j%2===0) {
                            if ($("#inputScoreP1U" + i + "" + j).val() > $("#inputScoreP1U" + i + "" + (j + 1)).val()) {
                                $("#userP1U" + i + "" + j).css('background-color', 'green');
                                $("#userP1U" + i + "" + (j + 1)).css('background-color', 'red');
                            } else if ($("#inputScoreP1U" + i + "" + j).val() < $("#inputScoreP1U" + i + "" + (j + 1)).val()) {
                                $("#userP1U" + i + "" + j).css('background-color', 'red');
                                $("#userP1U" + i + "" + (j + 1)).css('background-color', 'green');
                            }

                        }else {
                            if ($("#inputScoreP1U" + i + "" + j).val() > $("#inputScoreP1U" + i + "" + (j - 1)).val()) {
                                $("#userP1U" + i + "" + j).css('background-color', 'green');
                                $("#userP1U" + i + "" + (j - 1)).css('background-color', 'red');
                            } else if ($("#inputScoreP1U" + i + "" + j).val() < $("#inputScoreP1U" + i + "" + (j - 1)).val()) {
                                $("#userP1U" + i + "" + j).css('background-color', 'red');
                                $("#userP1U" + i + "" + (j - 1)).css('background-color', 'green');
                            }
                        }
                    })
                }
            }
            for (let i = 0; i < mP2F.length; i++) {
                for (let j = 0; j < mP2F[i].length; j++)
                    $("#inputScoreP2U" + i + "" + j).bind('keyup mouseup', function () {
                        if (j%2===0) {
                            if ($("#inputScoreP2U" + i + "" + j).val() > $("#inputScoreP2U" + i + "" + (j + 1)).val()) {
                                $("#userP2U" + i + "" + j).css('background-color', 'green');
                                $("#userP2U" + i + "" + (j + 1)).css('background-color', 'red');
                            } else if ($("#inputScoreP2U" + i + "" + j).val() < $("#inputScoreP2U" + i + "" + (j + 1)).val()) {
                                $("#userP2U" + i + "" + j).css('background-color', 'red');
                                $("#userP2U" + i + "" + (j + 1)).css('background-color', 'green');
                            }

                        } else {
                            if ($("#inputScoreP2U" + i + "" + j).val() > $("#inputScoreP2U" + i + "" + (j - 1)).val()) {
                                $("#userP2U" + i + "" + j).css('background-color', 'green');
                                $("#userP2U" + i + "" + (j - 1)).css('background-color', 'red');
                            } else if ($("#inputScoreP2U" + i + "" + j).val() < $("#inputScoreP2U" + i + "" + (j - 1)).val()) {
                                $("#userP2U" + i + "" + j).css('background-color', 'red');
                                $("#userP2U" + i + "" + (j - 1)).css('background-color', 'green');
                            }
                        }
                    })
            }
        }
    }

    function setScore() {
        let goNext = 1;
        let scoreP1 = []; let scoreP2 = [];
        for (let i = 0; i < mP1F.length; i++) {
            for (let j = 0; j < mP1F[i].length; j++) {
                $("#userScore" + $("#userP1U" + i + "" + j).text()).val(0)
                $("#userScore" + $("#userP1U" + i + "" + (j + 1)).text()).val(0)
            }
        }
        for (let i = 0; i < mP2F.length; i++) {
            for (let j = 0; j < mP2F[i].length; j++) {
                $("#userScore" + $("#userP2U" + i + "" + j).text()).val(0)
                $("#userScore" + $("#userP2U" + i + "" + (j + 1)).text()).val(0)
            }
        }
        for (let i = 0; i < mP1F.length; i++) {
            for (let j = 0; j < mP1F[i].length; j++) {
                if (j%2===0) {
                    if ($("#userP1U" + i + "" + j).css('background-color') === 'rgb(0, 128, 0)') {
                        $("#userScore" + $("#userP1U" + i + "" + j).text()).val(parseInt($("#userScore" + $("#userP1U" + i + "" + j).text()).val()) + 1)
                    } else if($("#userP1U" + i + "" + (j + 1)).css('background-color') === 'rgb(0, 128, 0)') {
                        $("#userScore" + $("#userP1U" + i + "" + (j + 1)).text()).val(parseInt($("#userScore" + $("#userP1U" + i + "" + (j + 1)).text()).val()) + 1)
                    }
                }
                if ($("#userP1U" + i + "" + j).css('background-color') === 'rgba(0, 0, 0, 0)' || $("#userP1U" + i + "" + (j + 1)).css('background-color') === 'rgba(0, 0, 0, 0)') {
                    goNext = 0;
                }
            }
        }
        for (let i = 0; i < mP2F.length; i++) {
            for (let j = 0; j < mP2F[i].length; j++) {
                if (j%2===0) {
                    if ($("#userP2U" + i + "" + j).css('background-color') === 'rgb(0, 128, 0)') {
                        $("#userScore" + $("#userP2U" + i + "" + j).text()).val(parseInt($("#userScore" + $("#userP2U" + i + "" + j).text()).val()) + 1)
                    } else if($("#userP2U" + i + "" + (j + 1)).css('background-color') === 'rgb(0, 128, 0)') {
                        $("#userScore" + $("#userP2U" + i + "" + (j + 1)).text()).val(parseInt($("#userScore" + $("#userP2U" + i + "" + (j + 1)).text()).val()) + 1)
                    }
                }
                if ($("#userP2U" + i + "" + j).css('background-color') === 'rgba(0, 0, 0, 0)' || $("#userP2U" + i + "" + (j + 1)).css('background-color') === 'rgba(0, 0, 0, 0)') {
                    goNext = 0;
                }
            }
        }
        if (goNext === 1) {
            $("#tablesMatchs").css('display', 'none')
            $("#tablesMatchsBis").css('display', 'block')
            p1 = p1.filter(function (e) {return e != null;});
            p2 = p2.filter(function (e) {return e != null;});
            console.log(p2)
            for (let i = 0; i < p1.length; i++) {
                scoreP1.push({user: p1[i], value: $("#userScore" + p1[i]).val()})
            }
            for (let i = 0; i < p2.length; i++)
                scoreP2.push({user: p2[i], value: $("#userScore" + p2[i]).val()})
            console.log(scoreP1)
            console.log(scoreP2)
            let p1F = scoreP1.sort(function(a, b){return b.value-a.value});
            let p2F = scoreP2.sort(function(a, b){return b.value-a.value});
            console.log(p1F.length)
            console.log(p2F.length)
            console.log(p2F)
            let i = 0;
            for (i; i < Math.floor((p2F.length)/2); i++) {
                console.log(Math.floor(((p2F.length)/2))-1-i)
                if (p1F[i] !== undefined) {
                    teams1.push([p1F[i].user, p2F[Math.floor(((p2F.length)/2))-1-i].user])
                    results1.push([null,null])
                }
                else {
                    teams1.push([null, p2F[Math.floor((p2F.length)/2)-1-i].user])
                    results1.push([null, null])
                }
            }
            console.log(i)
            console.log(p2F)
            let k = 0;
            for (i; i < p2F.length; i++) {
                console.log(p2F.length-1-k)
                if (p1F[i] !== undefined) {
                    teams2.push([p1F[i].user, p2F[p2F.length-1-k].user])
                    results2.push([null, null])
                }
                else {
                    teams2.push([null, p2F[p2F.length-1-k].user])
                    results2.push([null, null])
                }
                k++;
            }
            if (teams1.length % 2 === 1 && teams1.length > 2)
                teams1.push([null, null])
            if (teams2.length % 2 === 1 && teams2.length > 2)
                teams2.push([null, null])
            console.log(teams1)
            console.log(teams2)
            console.log(results1)
            console.log(results2)
            $("#brackets").css('display', 'table')
            $(updateResizeDemo)
        }
    }

    function makeRoundRobinPairings(players) {
        if (players.length % 2 === 1) {
            players.push(null);
        }

        const playerCount = players.length;
        const rounds = playerCount - 1;
        const half = playerCount / 2;

        const tournamentPairings = [];

        const playerIndexes = players.map((_, i) => i).slice(1);

        for (let round = 0; round < rounds; round++) {
            const roundPairings = [];

            const newPlayerIndexes = [0].concat(playerIndexes);

            const firstHalf = newPlayerIndexes.slice(0, half);
            const secondHalf = newPlayerIndexes.slice(half, playerCount).reverse();

            for (let i = 0; i < firstHalf.length; i++) {
                roundPairings.push(
                    players[firstHalf[i]]
                );
                roundPairings.push(
                    players[secondHalf[i]]
                );
            }

            // rotating the array
            playerIndexes.push(playerIndexes.shift());
            tournamentPairings.push(roundPairings);
        }

        return tournamentPairings;
    }

    function saveFn(data, userData) {
        var json = JSON.stringify(data)
        console.log(json)
        $('#saveOutput').text('POST '+userData+' '+json)
    }


    var firstTable = {
        teams : teams1,
        results : results1
    }

    // These are modified by the sliders
    var resizeParametersT1 = {
        teamWidth: 60,
        scoreWidth: 20,
        matchMargin: 10,
        roundMargin: 50,
        save: saveFn,
        init: firstTable
    };
    var secondTable = {
        teams : teams2,
        results : results2
    }

    // These are modified by the sliders
    var resizeParametersT2 = {
        teamWidth: 60,
        scoreWidth: 20,
        matchMargin: 10,
        roundMargin: 50,
        save: saveFn,
        init: secondTable
    };

    function updateResizeDemo() {
        $('.demoTable1').bracket(resizeParametersT1);
        $('.demoTable2').bracket(resizeParametersT2);
    }
    function updateResizeDemoInf8() {
        $('.demoTable1').bracket(resizeParametersT1);
    }
</script>
</html>
