@extends('front.layouts.app')

@section('content')

    <!-- ======= Blog Section ======= -->
    <section id="doctors" class="doctors">
        <div class="container">

            <div class="section-title">
                <h2>@lang('site.blogs')</h2>
            </div>

            <div class="row">
                @isset($rows)
                @foreach($rows as $index=>$row)
                    <div class="col-lg-6 mt-4" >
                        <a href="{{route('front.blogs.getBlogById',$row->id)}}">
                        <div class="member d-flex align-items-start" >
                            <div class=""><img src="{{$row->image_path}}" width="75px" height="75px" class=" rounded-circle" alt=""></div>
                            <div class="member-info">
                                <h4>{{substr($row->user_name,0,25)}}@if(strlen(strip_tags($row->user_name)) > 25 )...@endif</h4>
                                <span>{{substr($row->title,0,25)}}@if(strlen(strip_tags($row->title)) > 25 )...@endif</span>
                                <p>{{substr(strip_tags($row->description),0,25)}} @if(strlen(strip_tags($row->description)) > 25 )...@endif</p>

                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
                @endisset

            </div>

        </div>
    </section>
    <!-- End Blogs Section -->



@endsection
