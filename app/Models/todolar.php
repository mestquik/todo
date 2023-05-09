<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class todolar extends Model
{
    use HasFactory;

    protected $table='todolar';
    protected $fillable=['user_id','mission','comment','priorty','active','created_at','updated_at'];

    public  function user(){

        return $this->belongsTo(User::class);
    }

}
