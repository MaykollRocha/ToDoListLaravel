<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class afazer extends Model
{

    protected $fillable = [
        'id_user',
        'titulo',
        'descricao',
        'data_final',
        'concluido',
        'tipo',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
