@extends('layouts.boot')
@section('content')


   <div class="container">
       <div class="row">
           <div class="col-12 pt-2">
                <h1 class="display-one">{{ucfirst($post->title)}}</h1>
                <h2>{{ $post->content }}</h2>
                <p>{{ $post->etudiant_id }}</p>
                <br>
                <hr>
                <strong>Author: </strong> {{$post->forumHasUser->nom}}
                <hr>
                <a href="{{ route('forum') }}" class="btn btn-outline-primary btn-sm">Retourner</a>
                <hr>
                 <a href="{{ route('forum.edit', $post->id) }}" class="btn btn-outline-primary">Modifier l'article</a>
                <hr>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Supprimer l'article
                </button>
               
           </div>
       </div>

   </div>
  <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h5 class="modal-title" id="exampleModalLabel">Articles</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         Êtes-vous sûr de vouloir supprimer cet article ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <form method="post"> 
                     @csrf
                     @method('DELETE')
                     <button class="btn btn-danger">Oui</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection