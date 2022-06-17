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
                @if(isset($row))
                    <div class="col-lg-12 col-md-12  align-items-stretch">
                        <a href="">
                            <div class="icon-box m-2">
                            <div class="icon"><i class="fas fa-heartbeat"></i></div>
                            <h4>
                                    {{ $row->title }}
                            </h4>
                            <p>
                           {{ strip_tags($row->description) }}
                            </p>
                        </div>
                        </a>

                    </div>
                @endif

            </div>

        </div>
    </section>
    <!-- End Services Section -->
    </div>

@endsection
