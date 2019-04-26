<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = ['nome', 'idade','birth_year', 'description', 'votes', 'amount'];
}
