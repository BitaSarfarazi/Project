<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class ShowController extends Controller
{
	public function __construct(){
		
		$this->middleware('auth'); 
	}
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
     * @param  \App\Models\Etudiant  $show
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $show)
    {
        return view ('profile.show', ['post'=>$show]);
    }

}