@extends('layouts.boot')
@section('content')
        <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="row">
                    <div class="col-12">
                        <h1 class="display-one">@lang('lang.login')</h1>
@if(session('success'))
 <h6 class="text-danger">{{session('success')}}</h6>
@endif
       <form method="POST" action="{{route('login.try')}}">
            @csrf
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label for="email">@lang('lang.email')</label> 
                    <input type="email" id="email" class="form-control" name="email" required> 
                </div>
            </div>
			<br>
			<div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label for="password">@lang('lang.password')</label> 
                    <input type="password" id="password" class="form-control" name="password" required> 
                </div>
            </div>
            <br>
            <div class="row">

            <div class="container mt-3" >
                <br>
                <input type="submit" class="btn btn-primary" value="@lang('lang.login')">
            </div>  
        </form>             
    </div>
 </div>
  </div>
   </div>
    </div>
	 </div>
                    
@endsection