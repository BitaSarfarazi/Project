<?php

namespace App\Http\Controllers;

use App\Models\Doc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class DocController extends Controller
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
        $posts = Doc::all();
		if(session()->has('locale') && session()->get('locale') == 'fr'){
			$lg = "_fr";
		}else{
			$lg = "_en";
		}
        return view('doc.index', compact('posts','lg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('doc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$request->validate([
			'title_fr' => 'required',
			'title_en' => 'required',
			'doc' => 'required',
		]);
		$path = Storage::disk('public')->put('docs', $request->file('doc'));
       $newPost = Doc::create([
           'title_fr' => $request->title_fr,
		   'title_en' => $request->title_en,
           'file' => $path,
           'user_id' => Auth::user()->id
       ]);
       return redirect('doc');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doc  $doc
     * @return \Illuminate\Http\Response
     */
    public function show(Doc $doc)
    {
        return view ('doc.show', ['post'=>$doc]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doc  $doc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$post = Doc::findOrFail($id);
        return view('doc.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doc  $doc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
		$request->validate([
			'title_fr' => 'required',
			'title_en' => 'required',
			'doc' => 'required',
		]);
		$doc = Doc::findOrFail($id);
		$oldFile = $doc->file;
		Storage::disk('public')->delete($oldFile);
		$path = Storage::disk('public')->put('docs', $request->file('doc'));
        $doc->update([
            'title_fr'=> $request->title_fr,
			'title_en'=> $request->title_en,
            'file'=> $path, 
        ]);
        
        return redirect('doc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doc $doc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doc = Doc::findOrFail($id);
		$doc->delete();
		$oldFile = $doc->file;
		Storage::disk('local')->delete('public/'.$oldFile);
        return redirect('doc');
    }

}
