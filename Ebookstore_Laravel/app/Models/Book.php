<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'book';

    protected $primaryKey = 'ISBN';
    
    public $timestamps = false;

	protected $fillable = [
        'ISBN',
        'TITLE',
        'PRICE',
        'PUBLISHER_NAME',
        'IMAGE'
	];

	protected $guarded = [];
}
