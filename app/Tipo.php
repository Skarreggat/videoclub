<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;

class Tipo extends Model
{
	use ActivityLogger;

    protected $table = 'tipus';

}
