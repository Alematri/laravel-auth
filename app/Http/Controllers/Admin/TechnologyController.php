<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use Illuminate\Support\Str;
use App\Functions\Helper;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();
        return view ('admin.technologies.index', compact ('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exists = technology::where('name', $request->name)->first();
        if($exists){
            return redirect()->route('admin.technologies.index')->with('error', 'Tecnologia già presente');
        }else{
            $new_technology = new Technology();
            $new_technology->name = $request->name;
            $new_technology->slug = Str::slug($request->name, '-');
            $new_technology->save();
            return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia creata con successo');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $techology)
    {
        //validazione
        $val_data = $request->validate([
            'name' => 'required|min:2|max:20',
        ],[
            'name.required' => 'devi inserire il nome nella tecnologia',
            'name.min' => 'il nome deve avere almeno 2 caratteri',
            'name.max' => 'il nome deve avere max 20 caratteri',
        ]);

        //controllo univocità
        $exist = Technology::where('name', $request->name)->first();
        if ($exist){
            return redirect()->route('admin.technologies.index')->with('error', 'Tecnologia già presente');
        }

        //generazione slug
        $val_data['slug']= Helper::generateSlug($request->name, Technology::class);

        //update
        $techology->update($val_data);

        //reindirizzo alla index
        return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia aggiornata');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $techology)
    {
        $techology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Tecnologia eliminata');
    }
}
