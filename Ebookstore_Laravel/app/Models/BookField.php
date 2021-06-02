<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookField extends Model
{
    protected $table = 'book_field';

    public $timestamps = false;

	protected $fillable = [
        'ISBN',
        'BFIELD'
	];

	protected $guarded = [];
}
