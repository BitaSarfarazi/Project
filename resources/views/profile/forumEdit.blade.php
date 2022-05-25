@extends('layouts.boot')
@section('content')

   <div class="container">
       <div class="row">
           <div class="col-12 pt-2">
		                  <a href="{{ route('forum') }}" class="btn btn-outline-primary btn-sm">@lang('lang.back')</a>
                   <h1 class="display-4">@lang('lang.editpost')</h1>

				   
               <div class="border rounded p-4">

                   <form method="POST" action="{{ route('forum.update', $post->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="control-group col-6">
                                <label for="title_fr">@lang('lang.titlepostinfr')</label>
                                <input type="text" id="title_fr" class="form-control" name="title_fr"
                                       placeholder="@lang('lang.titlepostinfr')" value="{{ $post->title_fr }}" required>
							@if ($errors->has('title_fr'))
							 <span class="text-danger">{{ $errors->first('title_fr') }}</span>
							 @endif
                            </div>
							 <div class="control-group col-6">
                                <label for="title_en">@lang('lang.titlepostinen')</label>
                                <input type="text" id="title_en" class="form-control" name="title_en"
                                       placeholder="@lang('lang.titlepostinen')" value="{{ $post->title_en }}" required>
							@if ($errors->has('title_en'))
							 <span class="text-danger">{{ $errors->first('title_en') }}</span>
							 @endif
                            </div>
                            <div class="control-group col-6 mt-2">
                                <label for="body">@lang('lang.contentpostinfr')</label>
                                <textarea id="body" class="form-control" name="content_fr" placeholder="@lang('lang.contentpostinfr')"
                                          rows="" required>{{ $post->content_fr }}</textarea>
                            @if ($errors->has('content_fr'))
							 <span class="text-danger">{{ $errors->first('content_fr') }}</span>
							 @endif
							</div>
                            <div class="control-group col-6 mt-2">
                                <label for="body">@lang('lang.contentpostinen')</label>
                                <textarea id="body" class="form-control" name="content_en" placeholder="@lang('lang.contentpostinen')"
                                          rows="" required>{{ $post->content_en }}</textarea>
                            @if ($errors->has('content_en'))
							 <span class="text-danger">{{ $errors->first('content_en') }}</span>
							 @endif
							</div>
                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-right">
                                <button id="btn-submit" class="btn btn-primary">
                                    @lang('lang.editpost')
                                </button>
                            </div>
                        </div>
                    </form>
                  
               </div>
           </div>
       </div>

   </div>
@endsection