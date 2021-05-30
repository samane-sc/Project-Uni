<?php

namespace App\Http\Controllers;

use App\Lottery;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (\Gate::allows('admin')) {
            $mydate=getdate(date("U"));
            $date=date_create("$mydate[year]/$mydate[mon]/$mydate[mday]");
            $date = $date->format("Y/m/d");
            $date = explode("/",$date);
            $year = intval($date[0]);
            $mounth = intval($date[1]);
            $day = intval($date[2]);
            $date = "$year/$mounth/$day";
            $lotterys = Lottery::where('state',0)->get();
            $dos = Lottery::where([
                ['state','=',1],
                ['mtime','=',$date]
            ])->get();
            $alerts = Lottery::where('state',1)->get();
            $notin = [];
            foreach ($alerts as $alert){
                $date1 = date_create($date);
                $date2 = date_create($alert->mtime);
                $diff = date_diff($date1,$date2)->format("%R%a");
                $diff = intval($diff);
                if ($diff != 1){
                    array_push($notin,$alert->id);
                }

            }
            $calerts = Lottery::where('state',1)->whereNotIn('id',$notin)->count();
            $alerts = Lottery::where('state',1)->whereNotIn('id',$notin)->get();
            $users = User::all();

            return view('admin',compact('lotterys','users','dos','calerts','alerts'));
        }
        else{
            $id = Auth::user()->id;
            $mylotterys = Lottery::where('owner_id',$id)->get();
            $recents = Lottery::where([
                ['state','=',1],
                ['type','=',0]
            ])->get();
            $lotterys = User::with('lotterys')->where('id',Auth::user()->id)->get();
            foreach ($lotterys as $lottery){
                $participates = $lottery->lotterys;
            }
            return view('home',compact('mylotterys','recents','participates'));
        }
    }
}
