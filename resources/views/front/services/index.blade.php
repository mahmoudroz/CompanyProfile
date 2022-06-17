@extends('front.layouts.app')

@section('content')

    <div style="margin-top: 100px">
    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>@lang('site.services')</h2>
            </div>

            <div class="row">
                @isset($rows)
                @foreach($rows as $index=>$row)
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <a href="{{route('front.services.getServiceById',$row->id)}}" style="width: 100%">
                            <div class="icon-box m-2" style=" {width: 265px;height: 275px} ">
                            <div class="icon"><i class="fas fa-heartbeat"></i></div>
                            <h4>
                                    {{ substr($row->title, 0, 15) }} @if(strlen($row->title) > 15 )...@endif
                            </h4>
                            <p>
                           {{ strip_tags(substr($row->description, 0, 25) ) }} @if(strlen(strip_tags($row->description)) > 25 )...@endif
                            </p>
                        </div>
                        </a>

                    </div>
                @endforeach
                @endisset

            </div>

        </div>
    </section>
    <!-- End Services Section -->
    </div>

@endsection
