<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $table = 'publisher';

    protected $primaryKey = 'PNAME';
    
    public $timestamps = false;

	protected $fillable = [
        'PNAME',
        'ADDRESS',
        'PHONE'
	];

	protected $guarded = [];
}
