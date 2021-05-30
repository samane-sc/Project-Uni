<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Lottery extends Model
{
    protected $table = "lotterys";
    public function users(){
        return $this->belongsToMany(User::class)->withPivot('state');
    }
}
