<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/welcome', function () {
        return view('welcome');
    });

    Route::get('/questions/{id}', function ($id) {
        if(!Auth::user())
            return view('welcome');
        $users = DB::table('users')->where('admin', 0)->get();
        $user = DB::table('users')->where('id', Auth::id())->first();
        $questions = DB::table('questions')->where('id', '=', $user->etape)->first();
        $go = DB::table('ready')->first();
        $isAdmin = $user->admin;
        $pause = 0;
        return view('questions', ['user' => $user,
                                        'users' => $users,
                                        'questions' => $questions,
                                        'ready' => $go,
                                        'isAdmin' => $isAdmin,
                                        'pause' => $pause,
                                        'nbrQuestions' => DB::table('questions')->count()]);
    });
    Route::post('/setPseudo', [UsersController::class, 'setPseudo']);
    Route::post('/answer', [UsersController::class, 'answer']);

    Route::get('/ready', function () {
        $go = DB::table('ready')->first();
        return $go->go;
    });
    Route::get('/pause', function () {
        $pause = DB::table('ready')->first();
        return $pause->pause;
    });
    Route::get('/next', function () {
        $next = DB::table('ready')->first();
        return $next->next;
    });

    Route::post('/setNext', function () {
        DB::table('ready')->update(['next' => 0]);
    });
    Route::post('/setGo', function () {
        DB::table('ready')->update(['go' => 1]);
    });
    Route::post('/deleteUser', function () {
        DB::table('users')->delete($_POST['userID']);
        return back();
    });

Route::get('/nextQuestion', function () {
    if(!Auth::user() || !Auth::check())
        return redirect('welcome');
    $bonneRep = 0;
    $users = DB::table('users')->where('admin', 0)->orderBy('score', 'DESC')->get();
    $user = DB::table('users')->where('id', Auth::id())->first();
    $score = $user->score;
    $oldQuestion = DB::table('questions')->where('id', '=',$user->etape)->first();
    $isAdmin = $user->admin;
    $pause = DB::table('ready')->first();
    if (isset($_POST['Q'.$user->etape])) {
        $rep = $_POST['Q' . $user->etape];
        $goodRep = 'q' . $oldQuestion->reponse;
        $questions = DB::table('questions')->where('id', '=', $user->etape + 1)->first();
    } else {
        $questions = DB::table('questions')->where('id', '=', $user->etape)->first();
    }
    $go = DB::table('ready')->first();
    if ($user->etape+1 > DB::table('questions')->count())
        return view('scores', ['user'=> $user,
            'users' => $users,
            'questions'=>$oldQuestion,
            'id' => $user->etape,
            'score' => $score,
            'bonneRep' => $bonneRep,
            'nbrQuestions' => DB::table('questions')->count(),
            'ready' => $go,
            'isAdmin' => $isAdmin]);
    return view('questions', ['user'=> $user,
        'users' => $users,
        'questions'=>$questions,
        'oldQuestions'=>$oldQuestion,
        'id' => $user->etape+1,
        'score' => $score,
        'bonneRep' => $bonneRep,
        'nbrQuestions' => DB::table('questions')->count(),
        'ready' => $go,
        'isAdmin' => $isAdmin]);
});
