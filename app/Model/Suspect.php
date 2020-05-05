<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Suspect extends Model
{
    public $timestamps = false;
    
    public function criminalCases(){
        return $this->belongsTo(CriminalCases::class);
    }
}
