@extends('dashboard.layouts.app')

@section('title', __('site.'.$module_name_plural))


@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.'.$module_name_plural)</h1>

            <ol class="breadcrumb">
                <li> <a href="{{ route('dashboard.home') }}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a>
                </li>
                <li class="active"><i class="fa fa-book"></i> @lang('site.'.$module_name_plural)</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">
                    <h1 class="box-title"> @lang('site.'.$module_name_plural) <small>{{count($rows)}}</small></h1>

                    <form action="{{route('dashboard.'.$module_name_plural.'.index')}}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" value="{{request()->search}}" class="form-control"
                                       placeholder="@lang('site.search')">
                            </div>

                            <div class="col-md-4">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i>
                                    @lang('site.search')</button>
                                <a href="{{route('dashboard.'.$module_name_plural.'.create')}}" class="btn btn-primary"><i
                                        class="fa fa-plus"></i> @lang('site.add')</a>

                            </div>
                        </div>
                    </form>
                </div> {{--end of box header--}}

                <div class="box-body">

                    @if($rows->count() > 0)

                        <table class="table table-hover">

                            <thead class="thead-dark"  style="background-color: #ddd">
                            <tr>
                                <th>#</th>
                                <th>@lang('site.title')</th>
                                <th>@lang('site.description')</th>
                                <th>@lang('site.image')</th>
                                <th>@lang('site.action')</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($rows as $index=>$row)
                                <tr>
                                    <td>{{++$index}}</td>
                                    <td>{{ substr($row->title, 0, 25) }} @if(strlen($row->title) > 25 )...@endif</td>
                                    <td>{{ substr(strip_tags($row->description), 0, 25) }} @if(strlen($row->description) > 25 )...@endif</td>
                                    <td>
                                        <button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModalWatch{{ $row->id }}">  <img src="{{$row->image_path}}" width="50" height='50'> </button>
                                    </td>
                                    {{--                 START MODELE                   --}}
                                    <div class="container">
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModalWatch{{ $row->id }}" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">@lang('site.image')</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul class="list-group">
                                                            <img  class="" src="{{$row->image_path}}" width="570" height='325'>
                                                        </ul>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('site.close')</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    {{--                 END MODELE                     --}}
                                    <td>
                                        @if (auth()->user()->hasPermission('update-'.$module_name_plural))
                                            @include('dashboard.buttons.edit')
                                        @else
                                            <input type="submit" value="edit" disabled>
                                        @endif

                                        @if (auth()->user()->hasPermission('delete-'.$module_name_plural))
                                            @include('dashboard.buttons.delete')
                                        @else
                                            <input type="submit" value="delete" disabled>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table> {{--end of table--}}
                        {{$rows->appends(request()->query())->links()}}


                    @else
                        <tr>
                            <h4>@lang('site.no_records')</h4>
                        </tr>
                    @endif

                </div> {{--end of box body--}}

            </div> {{--  end of box--}}

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
