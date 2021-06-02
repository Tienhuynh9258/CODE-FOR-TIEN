<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $primaryKey = 'ID';
    
    public $timestamps = false;

	protected $fillable = [
        'ID',
        'USERNAME',
        'PWD',
        'PHONE',
        'EMAIL',
        'FNAME',
        'LNAME'
	];

	protected $guarded = [];
}
