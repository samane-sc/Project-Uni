<?php

namespace App\Http\Controllers;

use App\Lottery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $lottery = new Lottery();
        $lottery->name = $request->name;
        $lottery->description = $request->description;
        $lottery->owner_id = Auth::user()->id;
        $lottery->type = $request->optradio;
        $lottery->state = 0;
        $lottery->ucount = $request->ucount;
        $lottery->wcount = $request->wcount;
        $lottery->reward = $request->reward;
        $lottery->ftime = $request->time;
        $lottery->mtime = $request->mtime;
        $lottery->save();
        return redirect()->back()->with('alert', 'create!');
    }
}
