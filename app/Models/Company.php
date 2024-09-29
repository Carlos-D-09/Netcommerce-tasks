<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    // Indicate that it's not necessary to look for the default timestamps columns
    public $timestamp = false;

    //Declare the relationship with tasks
    public function tasks(): HasMany{
        return $this->hasMany(Task::class);
    }


    //Return all the companies register and the tasks associated with each company
    public function getCompaniesTask(){
        $companies = Company::with(['tasks.user'])->get();

        //Use map method to iterate through each instance of the companies collection
        //and return an associative array with the needed info
        return $companies->map(function ($companyAux){
            return [
                'id' => $companyAux->id,
                'name' => $companyAux->name,
                'tasks' => $companyAux->tasks->map(function ($taskAux) {
                    return [
                        'id' => $taskAux->id,
                        'name' => $taskAux->name,
                        'description' => $taskAux->description,
                        'user' => $taskAux->user->name,
                        'is_completed' => $taskAux->is_completed,
                        'start_at' => $taskAux->start_at,
                        'expired_at' => $taskAux->expired_at,
                    ];
                }),
            ];
        });
    }
}
