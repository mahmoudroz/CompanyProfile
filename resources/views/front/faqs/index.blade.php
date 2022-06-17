@extends('front.layouts.app')

@section('content')

   <div style="margin-top: 150px">

       @if(isset( $_GET['status']) == true )
           <div class="alert alert-success" role="alert">
               @lang('site.you subscribed!')
           </div>
       @endif
       <!-- ======= Frequently Asked Questions Section ======= -->
       <section id="faq" class="faq section-bg">
           <div class="container">
               <div class="section-title">
                   <h2>@lang('site.faqs')</h2>
               </div>

               <div class="faq-list">
                   <ul>
                       @isset($rows)
                       @foreach($rows as $index => $row)
                           <li data-aos="fade-up" data-aos-delay="100">
                               <i class="bx bx-help-circle icon-help"></i>
                               <a data-bs-toggle="collapse" data-bs-target="#faq-list-2{{$index}}" class="collapsed">
                                   @if(app()->getLocale() == 'en' && $row->en_question !== null){{$row->en_question}}
                                   @elseif(app()->getLocale() == 'en' && $row->en_question === null){{$row->ar_question}}
                                   @elseif(app()->getLocale() == 'ar' && $row->ar_question !== null){{$row->ar_question}}
                                   @elseif(app()->getLocale() == 'ar' && $row->ar_question === null){{$row->en_question}}
                                   @endif

                                   <i class="bx bx-chevron-down icon-show"></i>
                                   <i class="bx bx-chevron-up icon-close"></i>
                               </a>
                               <div id="faq-list-2{{$index}}" class="collapse" data-bs-parent=".faq-list">
                                   <p>
                                       @if(app()->getLocale() == 'en' && $row->en_answer !== null){{strip_tags($row->en_answer)}}
                                       @elseif(app()->getLocale() == 'en' && $row->en_answer === null){{strip_tags($row->ar_answer)}}
                                       @elseif(app()->getLocale() == 'ar' && $row->ar_answer !== null){{strip_tags($row->ar_answer)}}
                                       @elseif(app()->getLocale() == 'ar' && $row->ar_answer === null){{strip_tags($row->en_answer)}}
                                       @endif
                                       {{strip_tags($row->answer)}}
                                   </p>
                               </div>
                           </li>
                       @endforeach
                       @endisset


                   </ul>
               </div>

           </div>
       </section>
       <!-- End Frequently Asked Questions Section -->

   </div>

@endsection
