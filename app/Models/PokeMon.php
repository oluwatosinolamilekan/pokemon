<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokeMon extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
      'name',
      'type_one',
      'type_one',
      'type_two',
      'total',
      'hp',
      'attack',
      'defense',
      'sp_atk',
      'sp_def',
      'speed',
      'generation',
      'legendary',
    ];
}
