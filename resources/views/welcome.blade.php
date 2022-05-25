@extends('layouts.boot')
@section('content') 

    <div class="container"> 
        <div class="row"> 
            <div class="col-12 text-center pt-5"> 
                <h1 class="display-one mt-5">@lang('lang.portal')</h1> 
                <h3 class="display-one mt-5">@lang('lang.welcome')</h3>
                <br>
				@if (Auth::guest())
                <p>@lang('lang.messagehome')</p> 
                <br> <a href="{{ route('index.create') }}" class="btn btn-info">@lang('lang.sign_up')</a> 
				@else
                <p>@lang('lang.messagehome2')</p> 
                <br> <a href="{{ route('forum') }}" class="btn btn-info">@lang('lang.forum')</a> 					
				@endif
            </div> 
        </div> 
    </div>

    

@endsection