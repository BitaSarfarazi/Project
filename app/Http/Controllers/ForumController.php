<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\User;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
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
        $posts = Forum::all();
		if(session()->has('locale') && session()->get('locale') == 'fr'){
			$lg = "_fr";
		}else{
			$lg = "_en";
		}
        return view('profile.forum', compact('posts','lg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('profile.forumCreate');
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
			'content_fr' => 'required',
			'title_en' => 'required',
			'content_en' => 'required',
		]);
       $newPost = Forum::create([
           'title_fr' => $request->title_fr,
           'content_fr' => $request->content_fr,
           'title_en' => $request->title_en,
           'content_en' => $request->content_en,
           'etudiant_id' => Auth::user()->id
       ]);
       return redirect('forum');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        return view ('profile.forumShow', ['post'=>$forum]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$post = Forum::findOrFail($id);
        return view('profile.forumEdit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
		$request->validate([
			'title_fr' => 'required',
			'content_fr' => 'required',
			'title_en' => 'required',
			'content_en' => 'required',
		]);
		
        Forum::findOrFail($id)->update([
           'title_fr' => $request->title_fr,
           'content_fr' => $request->content_fr,
           'title_en' => $request->title_en,
           'content_en' => $request->content_en
        ]);
        
        return redirect('forum');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Forum::findOrFail($id)->delete();
        return redirect('forum');
    }

    public function queries(){
       
    $forum = Forum::find(1);
    $user = Etudiant::all();

        return view('profile.forum-query', ['forum' => $forum, 'etudiants' => $user]);
    }
}
