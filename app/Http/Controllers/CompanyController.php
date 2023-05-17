<?php

namespace App\Http\Controllers;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::orderBy('id')->paginate();
        // compact is used to convert given variable to array in which the key
        // of the array will be the name of the variable and the value of the
        // array will be the value of the variable
        return view('companies.index', compact('companies'));
    }

    /**
    * Show the form for creating a new resource.
    */
    public function create()
    {
        return view('companies.create');
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        
        Company::create($request->post());

        return redirect()->route('companies.index')->with('success','Company has been created successfully.');
    }


}