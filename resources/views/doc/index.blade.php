@extends('layouts.boot')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="row">
                    <div class="col-10">
                        <h1 class="display-one">@lang('lang.documents')</h1>
                    </div>
                                      <div class="col-2">
                        <a href="{{ route('doc.create') }}" class="btn btn-primary btn-sm">@lang('lang.adddoc')</a>
					</div>  
                </div>

			<br>
			<div class="row">
			@forelse($posts as $post)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
			 <div class="row">
			 <div class="col-md-7">
			  @if($lg=='_en')
			  <h4 class="ml-2 mt-2">{{ ucfirst($post->title_en)}}</h4>
			@else
				<h4 class="ml-2 mt-2">{{ ucfirst($post->title_fr)}}</h4>
			@endif
			 </div>
			 <div class="col-md-5">
			<small class="text-muted ml-2 mt-2">{{ (new Carbon\Carbon($post->created_at))->diffForHumans()}}</small>
                 </div>
				  </div>
				<div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    
					<div class="btn-group">
					<a href="storage/{{ $post->file }}" class="btn btn-sm btn-outline-secondary mr-1">@lang('lang.download')</a>
					@if($post->user_id == Auth::user()->id)
					
                      <a href="{{ route('doc.edit', $post->id) }}" class="btn btn-sm btn-outline-secondary mr-1">@lang('lang.edit')</a>
					<form method="post" action="{{ route('doc.delete', $post->id) }}" onclick="return confirm('@lang('lang.sure')');">
                    @csrf
                    @method('DELETE')
                    <button type="delete" class="btn btn-sm btn-outline-secondary">@lang('lang.delete')</button>
                    </form>
					@endif
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
			@empty
              <li>@lang('lang.nodoc')</li>
			@endforelse
			</div>		
					
					
            </div>
        </div>
    </div>

@endsection