@extends('front.layouts.app')

@section('content')

    <!-- ======= Blog Section ======= -->
    <section id="doctors" class="doctors">
        <div class="container">

            <div class="section-title">
                <h2>@lang('site.blogs')</h2>
            </div>

            <div class="row">
                @if(isset($row))
                    <div class="col-lg-12" >
                        <div class="member d-flex align-items-start" >
                            <div class=""><img src="{{$row->image_path}}" width="75px" height="75px" class=" rounded-circle" alt=""></div>
                            <div class="member-info">
                                <h4>{{$row->user_name}}</h4>
                                <span>{{$row->title}}</span>
                                <p>{{strip_tags($row->description)}}</p>
                            </div>
                        </div>
                    </div>
                @endif

            </div>

        </div>
    </section>
    <!-- End Blogs Section -->



@endsection
