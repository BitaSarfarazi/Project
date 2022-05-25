<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use App\Models\Ville;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class CreateController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Ville::all();
        return view('profile.create', ['posts'=>$posts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) //stocker les donnees
    {
        $request->validate([
			'nom' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:6',
			'phone' => 'required|numeric|digits:10',
			'dateNaissance' => 'required|date',
			'ville_id' => 'required',
			'adresse' => 'required'
		]);
		$user = User::create([
            'name' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
		$user_id = $user->id;
		$newPost = Etudiant::create([
           'nom' => $request->nom,
           'adresse' => $request->adresse,
           'phone' => $request->phone,
           'email' => $request->email,
           'dateNaissance' => $request->dateNaissance,
           'ville_id' => $request->ville_id,
		   'user_id' => $user_id
        ]);
        return redirect('login');
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