@extends('layouts.boot')
@section('content')
        <div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="row">
                    <div class="col-12">
                        <h1 class="display-one">@lang('lang.sign_up')</h1>

       <form method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label for="nom">@lang('lang.name')</label> 
                    <input type="text" id="nom" value="{{old('nom')}}" class="form-control" name="nom" required> 
					@if ($errors->has('nom'))
					 <span class="text-danger">{{ $errors->first('nom') }}</span>
					 @endif
				</div>

            </div>
            <br>
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label for="adresse">@lang('lang.adresse')</label> 
                    <input type="text" id="adresse" value="{{old('adresse')}}" class="form-control" name="adresse" required> 
					@if ($errors->has('adresse'))
					 <span class="text-danger">{{ $errors->first('adresse') }}</span>
					 @endif
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label for="phone">@lang('lang.phone')</label> 
                    <input type="tel" id="phone" value="{{old('phone')}}" class="form-control" name="phone" required>
					@if ($errors->has('phone'))
					 <span class="text-danger">{{ $errors->first('phone') }}</span>
					 @endif					
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label for="email">@lang('lang.email')</label> 
                    <input type="email" id="email" value="{{old('email')}}" class="form-control" name="email" required> 
										@if ($errors->has('email'))
					 <span class="text-danger">{{ $errors->first('email') }}</span>
					 @endif
                </div>
            </div>
			<br>
			<div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label for="password">@lang('lang.password')</label> 
                    <input type="password" id="password"  class="form-control" name="password" required>
					@if ($errors->has('password'))
					 <span class="text-danger">{{ $errors->first('password') }}</span>
					 @endif					
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <label for="dateNaissance">@lang('lang.ddn')</label> 
                    <input type="date" id="dateNaissance" class="form-control" value="{{old('dateNaissance')}}"  name="dateNaissance" required> 
					@if ($errors->has('dateNaissance'))
					 <span class="text-danger">{{ $errors->first('dateNaissance') }}</span>
					 @endif
                </div> 
           </div>
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3"> 
                    <br>
                    <label for="ville_id">@lang('lang.city')</label>
                    
                    <select name="ville_id" class="form-control">
					@foreach($posts as $post)
						@php $id=$post->id @endphp
                        <option value="{{ $post->id }}" @if(old('ville_id')==$id) selected @endif>{{($post->nom)}}</option>
					@endforeach
                    </select>
					@if ($errors->has('ville_id'))
					 <span class="text-danger">{{ $errors->first('ville_id') }}</span>
					 @endif
                </div>
            <br>
            <div class="container mt-3" >
                <br>
                <a href="{{ route('index') }}" type="button" class="btn btn-warning">@lang('lang.back')</a>
                <input type="submit" class="btn btn-primary" value="@lang('lang.sign_up')">
            </div>  
        </form>             
    </div>
 </div>
  </div>
   </div>
    </div>
	 </div>
                    
@endsection