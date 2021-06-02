<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    protected $table = 'credit_card';

    protected $primaryKey = 'CCODE';
    
    public $timestamps = false;

	protected $fillable = [
        'CCODE',
        'EXPIRATION_DATE',
        'ONAME',
        'BNAME',
        'BRANCHNAME',
        'CID'
	];

	protected $guarded = [];
}
