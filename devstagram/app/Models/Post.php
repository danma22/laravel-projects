<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // nombre de la tabla
    protected $table = 'posts';

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    // Crea relación al post que pertenece a un usuario
    public function user(){
        return $this->belongsTo(User::class)->select(['name', 'username']);
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }
}
