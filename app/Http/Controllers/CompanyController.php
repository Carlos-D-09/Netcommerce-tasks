<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //Return all the companies register and the tasks associated with each company
    public function index(){
        // Return the JSON serialized collection of companies with their tasks
        return response()->json((new Company())->getCompaniesTask());
    }
}
