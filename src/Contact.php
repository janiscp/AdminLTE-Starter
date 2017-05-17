<?php

namespace Janiscp\AdminlteStarter;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //protected $table ='contacts';
    public $fillable = ['first_name','last_name','middle_name','address','contact_nos','gender','civil_status','invited_by','consolidated_by','birthdate','attended_at'];

}
