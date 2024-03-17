<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoalOneMeta extends Model
{
    use HasFactory;
    protected $fillable = [
        'indicator','target','gaol','contact_persons'
        ];
}
