{{ csrf_field() }}


<div class="col-md-12">
    <div class="form-group">
        <label for="exampleFormControlSelect1">@lang('site.ar_question')</label>
        <input type="text" class="form-control @error('ar_question') is-invalid @enderror"  name="ar_question"   value="{{ isset($row) ? $row->ar_question : old('ar_question') }}">
        @error('ar_question')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="exampleFormControlSelect1">@lang('site.ar_answer')</label>
        <textarea  class="form-control ckeditor @error('ar_answer') is-invalid @enderror"  name="ar_answer"  cols="30" rows="10"   value="">
            {{ isset($row) ? $row->ar_answer : old('ar_answer') }}
        </textarea>
        @error('ar_answer')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="exampleFormControlSelect1">@lang('site.en_question')</label>
        <input type="text" class="form-control @error('en_question') is-invalid @enderror"  name="en_question"   value="{{ isset($row) ? $row->en_question : old('en_question') }}">
        @error('en_question')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="exampleFormControlSelect1">@lang('site.en_answer')</label>
        <textarea  class="form-control ckeditor @error('en_answer') is-invalid @enderror"  name="en_answer"  cols="30" rows="10"   value="">
            {{ isset($row) ? $row->en_answer : old('en_answer') }}
        </textarea>
        @error('en_answer')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>

