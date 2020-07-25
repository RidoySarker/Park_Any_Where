<?php

namespace App;
Use Auth;
use Illuminate\Database\Eloquent\Model;

class ParkingSpace extends Model
{
    protected $table = "parking_space";
    protected $primaryKey='parking_space_id';
    protected $fillable=['parking_name','parking_space','created_by','updated_by'];

}
