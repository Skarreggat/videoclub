<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipus_Movie extends Model
{
	use HasCompositeKey;

    protected $table = 'tipus_movie';
    protected $primaryKey = ['id_movies', 'id_tipus'];
}
