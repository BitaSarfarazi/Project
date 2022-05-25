@extends('layouts.boot')
@section('content')

   <div class="container">
       <div class="row">
           <div class="col-12 pt-2">
		                  <a href="{{ route('documents') }}" class="btn btn-outline-primary btn-sm">@lang('lang.back')</a>
				<h3 class="display-4 p-2">@lang('lang.adddoc')</h3>
               <div class="border rounded  p-4">
                   
                   <form method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="control-group col-6">
                                <label for="title_fr">@lang('lang.titledocinfr')</label>
                                <input type="text" id="title_fr" class="form-control" name="title_fr"
                                       placeholder="@lang('lang.titledocinfr')" value="{{old('title_fr')}}" required>
							@if ($errors->has('title_fr'))
							 <span class="text-danger">{{ $errors->first('title_fr') }}</span>
							 @endif
                            </div>
                            <div class="control-group col-6">
                                <label for="title_en">@lang('lang.titledocinen')</label>
                                <input type="text" id="title_en" class="form-control" name="title_en"
                                       placeholder="@lang('lang.titledocinen')" value="{{old('title_en')}}" required>
							@if ($errors->has('title_en'))
							 <span class="text-danger">{{ $errors->first('title_en') }}</span>
							 @endif
                            </div>
                            <div class="control-group col-12 mt-2">
                                <label for="body">@lang('lang.file')</label>
                                <input type="file" id="doc" class="form-control" name="doc" required>
                            @if ($errors->has('doc'))
							 <span class="text-danger">{{ $errors->first('doc') }}</span>
							 @endif
							</div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-10">
							</div>
							<div class="col-2">
                                <button id="btn-submit" class="btn btn-primary">
                                   @lang('lang.adddoc')
                                </button>
                            </div>
                        </div>
						
                    </form>
                  
               </div>
               
           </div>
       </div>

   </div>
@endsection