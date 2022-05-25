@extends('layouts.boot')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 pt-2">
                <div class="row">
                    <div class="col-10">
                        <h1 class="display-one">@lang('lang.forum')</h1>
                    </div>
                                      <div class="col-2">
                        <a href="{{ route('forum.create') }}" class="btn btn-primary btn-sm">@lang('lang.addpost')</a>
					</div>  
                </div>

			<br>
			<div class="row">
			@forelse($posts as $post)
            <div class="col-md-4">
              <div class="card mb-4 box-shadow">
			  @if($lg=='_en')
			  <h4 class="ml-2 mt-2">{{ ucfirst($post->title_en)}}</h4>
				@else
				<h4 class="ml-2 mt-2">{{ ucfirst($post->title_fr)}}</h4>	
				@endif
                <div class="card-body">
				 @if($lg=='_en')
                  <p class="card-text">{{ ucfirst($post->content_en)}}</p>
					@else
				   <p class="card-text">{{ ucfirst($post->content_fr)}}</p>
						@endif
                  <div class="d-flex justify-content-between align-items-center">
                    
					<div class="btn-group">
					@if($post->etudiant_id == Auth::user()->id)
                      <a href="{{ route('forum.edit', $post->id) }}" class="btn btn-sm btn-outline-secondary mr-1">@lang('lang.edit')</a>
					<form method="post" action="{{ route('forum.delete', $post->id) }}" onclick="return confirm('Are you sure you want to delete this item?');">
                    @csrf
                    @method('DELETE')
                    <button type="delete" class="btn btn-sm btn-outline-secondary">@lang('lang.delete')</button>
                    </form>
					@endif
                    </div>
                    <small class="text-muted">{{ (new Carbon\Carbon($post->created_at))->diffForHumans()}}</small>
                  </div>
                </div>
              </div>
            </div>
			@empty
              <li>@lang('lang.nopost')</li>
			@endforelse
			</div>		
					
					
            </div>
        </div>
    </div>

@endsection