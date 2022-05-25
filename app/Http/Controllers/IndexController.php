<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $posts = Etudiant::all();
        return view('profile.index', ['posts'=>$posts]); //tableau avec json
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $index
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $index)
    {
        //return $index;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $index
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $index)
    {
        //
    }

    
}
