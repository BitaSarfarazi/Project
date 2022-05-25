<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Ville;

class DestroyController extends Controller
{

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $index)
    {
		$index->delete();
		User::findOrFail($index->user_id)->delete();
        return redirect('index');
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





















}