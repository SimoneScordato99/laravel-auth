<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(){

        $progetti = Project::All();

        return view('user.index', compact('progetti'));
    }

    // public function show($id){

    //     $mario = Project::find($id);
    //     return view('user.show', compact('mario'));
    // }
}

