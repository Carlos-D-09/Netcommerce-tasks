<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $request){
        // Validate the inputs on the request
        $validator = Validator::make($request->all(),[
            'name' => 'required|string',
            'description' => 'required|string',
            'start_at' => 'nullable|date|after_or_equal:'.now(),
            'expired_at' => 'nullable|date|after:start_at|after:'.now(),
            'user_id' => 'required|integer|exists:users,id',
            'company_id' => 'required|integer|exists:companies,id',
        ])->stopOnFirstFailure();

        //Return the error if exists
        if($validator->fails()){
            return response()->json(['error'=>$validator->errors()->first()], 422);
        }

        $validated = $validator->validate();

        // Evaluate the number of active tasks (is_completed=False) for the desired user
        if (Task::where(['user_id'=>$validated['user_id'],'is_completed'=>0])->count() >= 5){
            return response()->json(['error'=>'The user already has 5 active tasks, you cannot add more'],422);
        }

        // Create and save a new instance of Task
        // The attribute is_completed has a default value of false in the database table structure.
        // It's the desired behavior and that's why it's not assigned here
        $task = new Task();
        $task->name = $validated['name'];
        $task->description = $validated['description'];
        $task->start_at = !empty($validated['start_at']) ? $validated['start_at'] : null;
        $task->expired_at = !empty($validated['expired_at']) ? $validated['expired_at'] : null;
        $task->user_id = $validated['user_id'];
        $task->company_id = $validated['company_id'];
        $task->save();

        //Return the created task with the required data
        return response()->json([
            'id' => $task->id,
            'name' => $task->name,
            'description' => $task->description,
            'user' => $task->user->name,
            'company' => [
                'id' => $task->company_id,
                'name' => $task->company->name
            ],
        ]);
    }
}
