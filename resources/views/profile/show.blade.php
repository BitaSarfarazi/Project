@extends('layouts.boot')
@section('content')
    
    <div class="container p-5 my-5 bg-dark text-white"> 
        <h1 class="display-one">{!! ucfirst($post->nom) !!}</h1>
                <p>{{ $post->adresse }} </p>
                <p>{{ $post->phone }} </p>
                <p>{{ $post->email }} </p>
                <p>{{ $post->dateNaissance }} </p>
                <p>{{ $post->ville_id }} </p>
                <hr>
            <div class="container mt-3">
                    <a href="{{ route('index') }}" type="button" class="btn btn-warning">Retourner</a>
                    <a href="{{ route('index.edit', $post->id) }}" type="button" class="btn btn-warning">Modifier</a>
                    <br><br>
                    <form method="post">
                    @csrf
                    @method('DELETE')
                    <button type="delete" class="btn btn-danger">Supprimer</button>
                    </form>
                    
            </div>
    </div>
              
@endsection