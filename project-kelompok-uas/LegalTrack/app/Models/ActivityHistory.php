<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ActivityHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_id',
        'action',
        'description',
    ];

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}