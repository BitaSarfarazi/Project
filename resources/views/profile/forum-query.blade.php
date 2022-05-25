{{ $forum->title }}

<br>
{{ $forum->forumHasUser->nom }}
<br>
<select name="" id="">
@foreach($etudiants as $user)
    <option value="">{{$user->nom}}</option>
@endforeach
</select>