<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;


    // Indicate that it's not necessary to look for the default timestamps columns
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
