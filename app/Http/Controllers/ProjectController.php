<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progetti = Project::All();

        return view('admin.index', compact('progetti'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|max:255',
                'description' => 'required|min:10',
                'thumb'=>'nullable',
                'type'=>'required'
     
            ],
            [
                'title.required' => 'è richiesto di compilare il campo title',
                'title.max' => 'il titolo deve contenere al massimo 255 caratteri',
                'title.unique' => 'Il titolo è gia stato utilizzato',
                'description.required' => 'è richiesto di compilare il campo title',
                'description.min' => 'il testo troppo corto per essere inserito',

            ],
        );
        $form_data = $request->all();


        $newPost = new Project();
        $newPost->fill($form_data);
        $newPost->save();

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $progetti = Project::find($id);

        return view('admin.show', compact('progetti'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $progetto = Project::find($id);
        return view('admin.edit', compact('progetto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'title' => 'required|max:255',
                'description' => 'required|min:10',
                'thumb'=>'nullable',
                'type'=>'required'
     
            ],
            [
                'title.required' => 'è richiesto di compilare il campo title',
                'title.max' => 'il titolo deve contenere al massimo 255 caratteri',
                'title.unique' => 'Il titolo è gia stato utilizzato',
                'description.required' => 'è richiesto di compilare il campo title',
                'description.min' => 'il testo troppo corto per essere inserito',

            ],
        );

        $form_data = $request->all();
        $progetto = Project::find($id);
        $progetto->update($form_data);

        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $progetto = Project::find($id);
        $progetto->delete();
        return redirect()->route('admin.index');
    }
}
