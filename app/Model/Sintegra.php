<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sintegra extends Model {
    protected $table = 'sintegra';

    protected $fillable = ['idusuario', 'cnpj', 'resultado_json'];
}