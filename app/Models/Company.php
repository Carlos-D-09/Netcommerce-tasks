<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    // Disable automatic timestamps since they aren't useful for the test.
    // You can check the migrations to see the code.
    public $timestamp = false;

    //Declare the relationship with tasks
    public function tasks(): HasMany{
        return $this->hasMany(Task::class);
    }
}
