<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;


class EditController extends Controller
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $index)
    {
        $posts = Ville::all();
        return view('profile.edit', ['etudiant' => $index , 'posts'=>$posts]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $index)
    {
        $index->update([
            'nom' =>$request->nom,
            'adresse'=>$request->adresse, 
            'phone'=>$request->phone,
            'email'=>$request->email,
            'dateNaissance'=>$request->dateNaissance,
            'ville_id'=>831,
        ]);

        return redirect('show/'.$index->id);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //stocker la donne
    {
        //return $request;

        $newPost = Etudiant::create([
           'nom' => $request->nom,
           'adresse' => $request->adresse,
           'phone' => $request->phone,
           'email' => $request->email,
           'dateNaissance' => $request->dateNaissance,
           'ville_id' => 831



        ]);

        return redirect('show/'.$newPost->id);
    }

      /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $show
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $show)
    {
        return view ('profile.show', ['post'=>$show]);
    }



}