<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // public function user()
    // {
    //     $this->belongsTo(User::class);
    // }
}
