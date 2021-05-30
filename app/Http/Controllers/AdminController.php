<?php

namespace App\Http\Controllers;

use App\Lottery;
use App\User;
use Illuminate\Mail\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function allow($id)
    {
        if (\Gate::allows('admin')) {
            $owner_id = Lottery::where('id', $id)->get()[0]['owner_id'];
            $id = Lottery::where('id', $id)->get()[0]['id'];
            $create_time = Lottery::where('id', $id)->get()[0]['created_at'];
            $create_time = str_replace(" ","%","$create_time");
            $user_email = User::where('id', $owner_id)->get()[0]['email'];
            Lottery::where('id', $id)->update(['state' => 1]);
            $data = ['email' => $user_email,'id'=> $id, 'create_time' => $create_time];
            Mail::send(['html' => 'emails.allow'], $data, function (Message $message) use ($user_email) {
                $message
                    ->to($user_email)
                    ->from('sc.lott.project@gmail.com', 'LOTTERY')
                    ->subject('lottery');
            });
            return redirect()->back()->with('alert', 'create!');
        }
        else{
            abort(403,"sorry . you cant do this action");
        }
    }

    public function deny($id)
    {
        if (\Gate::allows('admin')) {
            $owner_id = Lottery::where('id', $id)->get()[0]['owner_id'];
            $user_email = User::where('id', $owner_id)->get()[0]['email'];
            Lottery::where('id', $id)->update(['state' => -1]);
            $data = ['email' => $user_email];
            Mail::send(['html' => 'emails.deny'], $data, function (Message $message) use ($user_email) {
                $message
                    ->to("$user_email")
                    ->from('sc.lott.project@gmail.com', 'LOTTERY')
                    ->subject('lottery');
            });
            return redirect()->back()->with('deny', 'deny!');
        }
        else{
            abort(403,"sorry . you cant do this action");
        }
    }

    public function link($id, $time)
    {
        $lottery = Lottery::where([
            ['id','=',$id],
            ['created_at','=',$time],
        ])->get()[0];
        $owner_id = $lottery->owner_id;
        $user_id = Auth::user()->id;
        $ucount = $lottery->ucount;
        $capacity = $lottery->users->count();
        $exist  = $lottery->users->where('id',$user_id)->count();
        if ($user_id == $owner_id){
            return redirect()->back()->with('deny','deny');
        }
        elseif ($ucount <= $capacity){
            return redirect()->back()->with('capacity','capacity');
        }
        elseif ($exist != 0){
            return redirect()->back()->with('already','already');
        }
        else {
            $lottery->users()->attach($user_id);
            return redirect()->back()->with('success','success');
        }
    }

    public function done($id)
    {
        if (\Gate::allows('admin')) {
            $lottery = Lottery::find($id);
            $wcount = $lottery->wcount;
            $lname = $lottery->name;
            $users = $lottery->users;
            foreach ($users as $user) {
                $lottery->users()->updateExistingPivot($user->id, ['state' => 1]);
            }
            $users_id = [];
            foreach ($users as $user){
                array_push($users_id,$user->id);
            }
            $x = 0;
            $length = count($users_id);
            while ($x<$wcount and $length > 0) {
                $rand = rand(0, $length-1);
                $user_email = User::where('id', $users_id[$rand])->get()[0]['email'];
                $lottery->users()->updateExistingPivot($users_id[$rand], ['state' => 2]);
                $data = ['email' => $user_email , 'name' =>$lname];
                Mail::send(['html' => 'emails.win'], $data, function (Message $message) use ($user_email) {
                    $message
                        ->to("$user_email")
                        ->from('sc.lott.project@gmail.com', 'LOTTERY')
                        ->subject('You Win');
                });
                array_splice($users_id,$rand,1);
                $length = count($users_id);
                $x++;
            }
            Lottery::where('id', $id)->update(['state' => -2]);
            return redirect()->back()->with('win','win');
        }
        else{
            abort(403,"sorry . you cant do this action");
        }
    }

    public function alert($id)
    {
        if (\Gate::allows('admin')) {
            $owner_id = Lottery::where('id', $id)->get()[0]['owner_id'];
            $name = Lottery::where('id', $id)->get()[0]['name'];
            $user_email = User::where('id', $owner_id)->get()[0]['email'];
            Lottery::where('id', $id)->update(['state' => -1]);
            $data = ['email' => $user_email,'name' => $name];
            Mail::send(['html' => 'emails.alert'], $data, function (Message $message) use ($user_email) {
                $message
                    ->to("$user_email")
                    ->from('sc.lott.project@gmail.com', 'LOTTERY')
                    ->subject('lottery');
            });
            return redirect()->back()->with('alert', 'alert!');
        }
        else{
            abort(403,"sorry . you cant do this action");
        }
    }



}
