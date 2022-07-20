<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTeam extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function detail_project()
    {
        return $this->belongsTo(DetailProject::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
