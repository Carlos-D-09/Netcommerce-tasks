<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    // Disable automatic timestamps since they aren't useful for the test.
    // You can check the migrations to see the code.
    public $timestamp = false;

    //Declare the backref with users table
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    //Declare the backref with companies table
    public function company(): BelongsTo{
        return $this->belongsTo(Company::class);
    }
}
