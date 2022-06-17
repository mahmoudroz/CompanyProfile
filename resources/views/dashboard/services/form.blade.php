{{ csrf_field() }}


@foreach (config('translatable.locales') as $index => $locale)
    <div class="col-md-12">
        <div class="form-group">
            <label>@lang('site.' . $locale . '.title')</label>
            <input type="text" class="form-control @error($locale . ' .title') is-invalid
        @enderror " name=" {{ $locale }}[title]"
                   value="{{ isset($row) ? $row->translate($locale)->title : old($locale . '.title') }}">

            @error($locale . '.title')
            <small class=" text text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <label>@lang('site.' . $locale . '.description')</label>
            <textarea  class="form-control ckeditor  @error($locale . ' .description') is-invalid  @enderror " name=" {{ $locale }}[description]" cols="30" rows="10">{{ isset($row) ? $row->translate($locale)->description : old($locale . '.description') }}</textarea>
            @error($locale .'.description')
            <small class=" text text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </small>
            @enderror
        </div>
    </div>

@endforeach

<div class="col-md-12">
    <div class="form-group">
        <label for="exampleFormControlSelect1">@lang('site.icon')</label>
        <input type="text" class="form-control @error('icon') is-invalid @enderror"  name="icon"   value="{{ isset($row) ? $row->icon : old('icon') }}">
        @error('icon')
        <small class=" text text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </small>
        @enderror
    </div>
</div>



