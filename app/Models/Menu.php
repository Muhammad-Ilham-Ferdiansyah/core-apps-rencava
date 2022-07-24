<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public $table = "app_menu";
    /* Masalah itu terjadi karena tidak mendefinisikan tabel yang digunakan,
    karena secara default jika tidak didefinisikan atau ditulis tabel yang digunakan
     akan sama dengan nama model yang ditambahkan dengan mengubahnya menjadi plural.*/

    protected $guarded = ['id'];

    // public function role()
    // {
    //     return $this->belongsTo('model_has_roles');
    // }
}
