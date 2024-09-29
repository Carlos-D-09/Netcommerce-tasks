<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;


    // Indicate that it's not necessary to look for the default timestamps columns
    public $timestamp = false;

    //Declare the relationship with task
    public function tasks(): HasMany{
        return $this->hasMany(Task::class);
    }
}
