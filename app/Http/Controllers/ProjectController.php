<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modals\Project;

class ProjectController extends Controller
{
    public function index(){

        $progetti = Project::All();

        return view('index', compact('progetti'));
    }

    public function show($id){

        $progetti = Project::find($id);
        return view('show', compact('progetti'));
    }
}

