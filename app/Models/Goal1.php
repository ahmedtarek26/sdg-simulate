<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal1 extends Model
{
    use HasFactory;
    protected $Fillable = [
        'year',
        'goal',
        'value'];
}
