@extends('layouts.boot')
@section('content')
    
<div class="wrapper rounded bg-white" >
    <div class="h3" style="margin: 58px; padding: 10px ; ">Modification Form </div>
        <p style="margin: 58px; padding: 10px ;"> Modifier et soumettre ce formulaire pour mettre a jour les etudiant</p>
        <form method="POST" style="margin: 58px; padding: 10px ; background: lightgray;">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label for="nom">Nom</label> 
                    <input type="text" id="nom" class="form-control" name="nom" required> 
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label for="adresse">Adresse</label> 
                    <input type="text" id="adresse" class="form-control" name="adresse" required> 
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label for="phone">Phone</label> 
                    <input type="tel" id="phone" class="form-control" name="phone"  required> 
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label for="email">Email</label> 
                    <input type="email" id="email" class="form-control" name="email"  required> 
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label for="dateNaissance">DateNaissance</label> 
                    <input type="date" id="dateNaissance" class="form-control" name="dateNaissance"  required>
                </div> 
            </div>
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <br>
                    <label for="ville_id">Ville_id</label>
                    @forelse($posts as $post) 
                    <select name="" class="form-control">
                        <option value="{{ $post->ville_id }}">{{($post->nom)}}</option>
                            @empty
                                <li>Aucune Ville</li>
                            @endforelse
                    </select>
                </div>
            <br>
            <div class="container mt-3" >
                    <br>
                <a href="{{ route('index') }}" type="button" class="btn btn-warning">Retourner</a>
                <input type="submit" class="btn btn-primary" value="Mettre a jour">
            </div> 
        </form>            
    </div>
</div>
                 
             
    
@endsection