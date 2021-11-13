<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function setPseudo()
    {
        $users = DB::table('users')->get();
        foreach ($users as $u)
            if ($u->name === $_POST['name']) {
                Auth::loginUsingId($u->id);
                return redirect('questions/1');
            }
        DB::table('users')->insert(['name' => $_POST['name'], 'admin' => 0]);
        $user = DB::table('users')->where(['name' => $_POST['name']])->first();
        Auth::loginUsingId($user->id);
        return redirect('questions/1');
    }
    public function answer()
    {
        if(!Auth::user() || !Auth::check())
            return redirect('welcome');
        $bonneRep = 0;
        $users = DB::table('users')->where('admin', 0)->orderBy('score', 'DESC')->get();
        $user = DB::table('users')->where('id', Auth::id())->first();
        $score = $user->score;
        $oldQuestion = DB::table('questions')->where('id', '=',$_POST['numQuestion'])->first();
        DB::table('ready')->update(['next' => 1]);
        $isAdmin = $user->admin;
        $pause = DB::table('ready')->first();
        if (isset($_POST['Q'.$_POST['numQuestion']])) {
            $rep = $_POST['Q' . $_POST['numQuestion']];
            $goodRep = 'q' . $oldQuestion->reponse;
            if (strval($rep) === strval($oldQuestion->$goodRep)) {
                $score++;
                $bonneRep = 1;
                DB::table('users')->where('id', Auth::id())->update(['score' => $user->score + 1]);
            }
            $questions = DB::table('questions')->where('id', '=', $user->etape + 1)->first();
            DB::table('users')->update(['etape' => $user->etape + 1]);
        } else {
            $questions = DB::table('questions')->where('id', '=', $user->etape)->first();
        }
        $go = DB::table('ready')->first();
        if ($user->etape+1 > DB::table('questions')->count()+1)
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
    }
}
