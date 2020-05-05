<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CriminalCases extends Model
{
    public $timestamps = false;
    
    public function suspect(){
        return $this->hasMany(Suspect::class);
    }
}
