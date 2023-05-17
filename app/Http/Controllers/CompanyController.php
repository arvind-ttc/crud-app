<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('id')->paginate();
        // compact is used to convert given variable to array in which the key
        // of the array will be the name of the variable and the value of the
        // array will be the value of the variable
        return view('companies.index', compact('companies'));
    }
}