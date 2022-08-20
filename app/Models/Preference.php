<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preference extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function detail_projects()
    {
        return $this->belongsTo(DetailProject::class, 'detail_project_id');
    }
}
