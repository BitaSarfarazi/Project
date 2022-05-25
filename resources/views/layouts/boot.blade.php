<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name')}}</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        body{ 
            font-family: 'Nunito'
        } 

    </style>
    </head>
    <body>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <h5 class="my-0 mr-md-auto font-weight-normal">@lang('lang.portal')</h5>
      <nav class="my-2 my-md-0 mr-md-3">
	  
        <a class="p-2 text-dark"  href="{{ route('home') }}">@lang('lang.home')</a>

        <!-- <a  class="p-2 text-dark" href="{{ route('index') }}">@lang('lang.student')</a> -->

        <a class="p-2 text-dark"  href="{{ route('forum') }}">@lang('lang.forum')</a>
		<a class="p-2 text-dark"  href="{{ route('documents') }}">@lang('lang.documents')</a>

      </nav>
	  @if (Auth::guest())
      <a class="btn btn-outline-primary float-right mr-1" href="{{ route('login') }}">@lang('lang.login')</a>
	  <a class="btn btn-outline-info float-right" href="{{ route('index.create') }}">@lang('lang.sign_up')</a>
	  @else
	  <a class="btn btn-outline-danger float-right" href="{{ route('logout') }}">@lang('lang.logout')</a>
		@endif
		
@php $locale = session()->get('locale'); @endphp
<div class="dropdown">
  <button class="btn btn-outline-warning dropdown-toggle ml-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    @if($locale=='en') <img src="{{asset('images/flag/us.png')}}" > English @else <img src="{{asset('images/flag/fr.png')}}" > Français @endif
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item @if($locale=='en') bg-warning @endif" href="{{ route('lang','en') }}"><img src="{{asset('images/flag/us.png')}}" > English</a>
    <a class="dropdown-item @if($locale=='fr') bg-warning @endif" href="{{ route('lang','fr') }}"><img src="{{asset('images/flag/fr.png')}}" > Français</a>
  </div>
</div>
 </div>
<br>
    @yield('content')
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>