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
        $isAdmin = $user->admin;
        $score = $user->score;
        $oldQuestion = DB::table('questions')->where('id', '=',$_POST['numQuestion'])->first();
        DB::table('ready')->update(['next' => 1]);
        $pause = DB::table('ready')->first();
        $userScore = $_POST['userScore'];
        if (isset($_POST['Q'.$_POST['numQuestion']])) {
            $rep = $_POST['Q' . $_POST['numQuestion']];
            $goodRep = 'q' . $oldQuestion->reponse;
            if ($oldQuestion->q2 === ""){
                $goodRep = 'q' . $oldQuestion->reponse;
                $input = DB::table('users')->where('id', Auth::id())->first();
                $inputValue = DB::table('users')->select(['input'])->get()->toArray();
                $closest = $this->getClosest(intval($oldQuestion->$goodRep), json_decode(json_encode($inputValue), true));
                if ($input->input == $oldQuestion->$goodRep && $userScore == $user->score) {
                    $score = $score + 2;
                    $bonneRep = 1;
                    DB::table('users')->where('id', $input->id)->update(['score' => $user->score + 2]);
                } elseif ($input->input === $closest && $userScore == $user->score) {
                        DB::table('users')->where('id', $input->id)->update(['score' => $user->score + 1]);
                        $score++;
                        $bonneRep = 1;
                    } else {
                        $bonneRep = 0;
                    }
            } else
            if (strval($rep) === strval($oldQuestion->$goodRep) && $userScore == $user->score) {
                $score++;
                $bonneRep = 1;
                DB::table('users')->where('id', Auth::id())->update(['score' => $user->score + 1]);
            } else if($userScore !== $user->score)
                $bonneRep = 0;
            else
                $bonneRep = 2;
            $questions = DB::table('questions')->where('id', '=', $oldQuestion->id + 1)->first();
            if ($userScore == $user->score)
                DB::table('users')->where('id', Auth::id())->update(['etape' => $oldQuestion->id + 1]);
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
                                        'rep' => $rep,
                                        'rep2' => strval($oldQuestion->$goodRep),
                                        'nbrQuestions' => DB::table('questions')->count(),
                                        'ready' => $go,
                                        'isAdmin' => $isAdmin]);
        return view('questions', ['user'=> $user,
                                        'users' => $users,
                                        'questions'=>$questions,
                                        'rep' => $rep,
                                        'rep2' => strval($oldQuestion->$goodRep),
                                        'oldQuestions'=>$oldQuestion,
                                        'id' => $user->etape+1,
                                        'score' => $score,
                                        'bonneRep' => $bonneRep,
                                        'nbrQuestions' => DB::table('questions')->count(),
                                        'ready' => $go,
                                        'isAdmin' => $isAdmin]);
    }

    function getClosest($search, $arr) {
        $closest = null;
        foreach ($arr as $item) {
            if ($closest === null || abs($search - $closest) > abs($item['input'] - $search)) {
                $closest = $item['input'];
            }
        }
        return $closest;
    }

}
