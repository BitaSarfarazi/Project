@extends('layouts.boot')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="row">
                    <div class="col-8">
                        <h1 class="display-one">Liste des Étudiants!</h1>
                        <!--<p>Liste des Étudiants</p>-->
						<table class="table">
  <thead>
  @if(count($posts)>0)
    <tr class="bg-primary">
      <th scope="col">#</th>
      <th scope="col">Nom</th>
	   <th scope="col">Action</th>
    </tr>
	@endif
  </thead>
  <tbody>
  @forelse($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td><a href="./show/{{ $post->id }}">{{$post->nom}}</a></td>
	  <td>
	    <div class="row">
                    <div class="col-3">
		<a href="{{ route('index.edit', $post->id) }}" type="button" class="btn btn-warning">Modifier</a>
		 </div>  <div class="col-3">
                    <form method="post" action="{{ route('user.delete', $post->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="delete" class="btn btn-danger">Supprimer</button>
                    </form> </div>
	  </td>
    </tr>
	@empty
    <li>Aucun article</li>
	@endforelse
  </tbody>
</table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection