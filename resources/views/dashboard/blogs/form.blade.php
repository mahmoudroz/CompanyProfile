{{ csrf_field() }}
<div class="col-md-12">
    <div class="form-group">
        <label for="exampleFormControlSelect1">@lang('site.title')</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror"  name="title"   value="{{ isset($row) ? $row->title : old('title') }}">
        @error('title')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <label for="exampleFormControlSelect1">@lang('site.description')</label>
        <textarea  class="form-control ckeditor @error('description') is-invalid @enderror"  name="description"  cols="30" rows="10"   value="">
            {{ isset($row) ? $row->description : old('description') }}
        </textarea>
        @error('description')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>

<div class="col-md-6">

        <label>@lang('site.image')</label>
        <input type="file" name="image" class="form-control image
        @error('image') is-invalid @enderror">
        @error('image')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
</div>

<div class="form-group col-md-6">
    <img src="{{ isset($row) ? $row->image_path : asset('uploads/blogs_images/default.jpg') }}" style="width: 115px;height: 80px;position: relative;
                top: 14px;" class="img-thumbnail image-preview">
</div>







