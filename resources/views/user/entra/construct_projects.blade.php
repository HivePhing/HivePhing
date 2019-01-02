@extends('layouts.dashboard')

@section('content')
<!-- BEGIN : LOGIN PAGE 5-1 -->
@section('title')
Construct Project
@endsection
@section('bg'){{asset('images/about_banner.jpg')}}@endsection
@if(\Illuminate\Support\Facades\Session::has('no_auth'))
    <div class="modal fade in" id="myModal" role="dialog"
         style="display: block; padding-left: 17px;background-color: #f1eaea96;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" onclick="tohide()" class="close" data-dismiss="modal">×</button>
                    <h4 style="font-weight:bolder;color:#32c5d2;font-size:27px;">Need to register or login</h4>
                </div>
                <div class="modal-body" style="font-size: 19px !important;
    color: #4c4949cf;
    font-weight: bolder;">
                    You need to register or login to see projects details
                </div>
                <div class="modal-footer" style="">
                    <button type="button" class="btn btn-default" onclick="tohide()" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        function tohide() {
            document.getElementById("myModal").style.display = 'none';
        }
    </script>
    <?php
    \Illuminate\Support\Facades\Session::forget('no_auth');
    ?>
@endif
<<<<<<< HEAD
@if(\Illuminate\Support\Facades\Session::has('ex'))
    <div class="modal fade in" id="myModal" role="dialog"
         style="display: block; padding-left: 17px;background-color: #f1eaea96;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" onclick="tohide()" class="close" data-dismiss="modal">×</button>
                    <h4 style="font-weight:bolder;color:#32c5d2;font-size:27px;">Need to register or login</h4>
                </div>
                <div class="modal-body" style="font-size: 19px !important;
    color: #4c4949cf;
    font-weight: bolder;">
                    This Project expired
                </div>
                <div class="modal-footer" style="">
                    <button type="button" class="btn btn-default" onclick="tohide()" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        function tohide() {
            document.getElementById("myModal").style.display = 'none';
        }
    </script>
    <?php
    \Illuminate\Support\Facades\Session::forget('no_auth');
    ?>
@endif
=======
>>>>>>> e708884ab284d96bf16c1132040e4097f4b6f86e
<div class="col-xs-12" style="background-color:#ddedf2;padding-bottom:22px;">
    <div class="col-xs-12" style="text-align: center;font-size:22px;font-weight:bolder;margin-top:12px;">Construct
        Projects
    </div>
    <div class="col-xs-12">
        @if(\Carbon\Carbon::parse(Auth::user()->created_at)->addDays(30) > \Carbon\Carbon::now())
            @if(DB::table('user_get_free_plan')->where('user_id',Auth::user()->id)->count() != 0)

                <div class="col-sm-4">
                    <div class="dashboard-stat2" style="padding-bottom:12px;padding: 0px 22px 8px;">
                        <div class="display">
                            <div class="number">
                                <div>
                                    <h4 class="font-red-haze">
                                        <span pdata-counter="counterup" pdata-value="Your free-trial period">Your free-trial period</span>

                                        <small>Remaining Days
                                            :{{\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse(Auth::user()->created_at)->addDays(30))}}</small>
                                    </h4>

                                    <small>
                                        <?php
                                        $remain_point = DB::table('user_get_free_plan')->where('user_id', Auth::user()->id)->first();
                                        ?>
                                        <span style="color:#36c6d3;">Remaining Points</span>
                                        :{{$remain_point->remaining_point}} Points

                                    </small>
                                    <br>

                                    <small>

                                        <span style="color:#36c6d3;">Start Date</span>
                                        :{{Auth::user()->created_at}}

                                    </small>
                                    &nbsp;&nbsp;&nbsp;
                                    <small>

                                        <span style="color:#36c6d3;">End Date</span>
                                        :{{\Carbon\Carbon::parse(Auth::user()->created_at)->addDays(30)}}

                                    </small>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            @endif
        @endif

        @if(DB::table('user_get_free_plan')->where('user_id',Auth::user()->id)->count() != 0 and \Carbon\Carbon::parse(DB::table('user_get_free_plan')->where('user_id',Auth::user()->id)->first()->end_date)->toDateTimeString() > \Carbon\Carbon::now()->toDateTimeString())

            <div class="col-sm-4">
                <div class="dashboard-stat2"
                     style="padding-bottom:12px;padding: 0px 22px 8px;background-color: #0b6875;">
                    <div class="display">
                        <div class="number">
                            <div>
                                <h4 class="font-red-haze">
                                    <span pdata-counter="counterup" pdata-value="Your free-trial period">Your Bonus period</span>

                                    <small>Remaining Days
                                        :{{\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse(Auth::user()->created_at)->addDays(30))}}</small>
                                </h4>

                                <small>
                                    <?php
                                    $remain_point = DB::table('user_get_free_plan')->where('user_id', Auth::user()->id)->first();
                                    ?>
                                    <span style="color:#36c6d3;">Bonus Points</span>
                                    :
                                    <?php
                                    $bp = $remain_point->increase_point;
                                    ?>
                                    {{$bp}}

                                </small>
                                <br>

                                <small>

                                    <span style="color:#36c6d3;">Start Date</span>
                                    :{{Auth::user()->created_at}}

                                </small>
                                &nbsp;&nbsp;&nbsp;
                                <small>

                                    <span style="color:#36c6d3;">End Date</span>
                                    :{{\Carbon\Carbon::parse(Auth::user()->created_at)->addDays(30)}}

                                </small>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        @endif
        @if(\Illuminate\Support\Facades\Session::has('expire') == 'yes')
            <div class="col-sm-4">
                <div class="dashboard-stat2" style="padding-bottom:12px;padding: 0px 22px 8px;">
                    <div class="display">
                        <div class="number">
                            <div>
                                <h4 class="font-red-haze">
                                    <span pdata-counter="counterup" pdata-value="Your free-trial period">Free Plan Expired</span>
                                </h4>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>
    <!-- paid plan -->
    <div class="col-xs-12">

        <?php
        $com_id = DB::table('company')->where('user_id', Auth::user()->id)->first();
        $count_com = DB::table('company_with_plan')->where('com_id', $com_id->id);
        ?>

        @if($count_com->count() > 0 )
            <?php
            $plan = \Illuminate\Support\Facades\DB::table('construct_plan')->where('id', $count_com->first()->plan_id)->first();
            ?>
            <div class="col-sm-4">
                <div class="dashboard-stat2"
                     style="padding-bottom:12px;padding: 0px 22px 8px;background-color: #0b6875;">
                    <div class="display">
                        <div class="number">
                            <div>
                                <h4 class="font-red-haze">
                                    <span pdata-counter="counterup"
                                          pdata-value="Your free-trial period">Your Plans</span>
                                    @if($plan->type == 'C')
                                        <small>Remaining Days
                                            :{{\Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse($plan->expire_date))}}</small>
                                    @endif
                                </h4>

                                <small>

                                    <span style="color:#36c6d3;">Points</span>
                                    :
<<<<<<< HEAD
                                    <?php
                                    $rppoint = \Illuminate\Support\Facades\DB::table('company_with_plan')->where('com_id', $com_id->id)->first();
                                    ?>
                                    {{$rppoint->remaining_point}}
=======
                                    {{$plan->point}}
>>>>>>> e708884ab284d96bf16c1132040e4097f4b6f86e

                                </small>
                                <br>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        @endif
        @if(\Illuminate\Support\Facades\Session::has('expire') == 'yes')
            <div class="col-sm-4">
                <div class="dashboard-stat2" style="padding-bottom:12px;padding: 0px 22px 8px;">
                    <div class="display">
                        <div class="number">
                            <div>
                                <h4 class="font-red-haze">
                                    <span pdata-counter="counterup" pdata-value="Your free-trial period">Free Plan Expired</span>
                                </h4>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="col-xs-12">
        &nbsp;&nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-xs-12">
        @foreach($data as $d)
            <div class="col-md-6 ">
                <!-- BEGIN Portlet PORTLET-->
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">

                        <div class="caption">
                            <i class="fa fa-gift"></i>
                        </div>
                        <?php
                        $see_project = DB::table('see_projects_with_plan')->where([['project_id', '=', $d->id], ['user_id', '=', Auth::user()->id]])->count();
                        ?>
                        @if($see_project != 0)
                            <div class="actions">

                                        <span class="label label-success"
                                              style="border-radius:10px !important;"> Seen </span>
                            </div>
                        @endif
                        @if($d->close == 1)
                            <div class="actions">
                                <a class="btn btn-danger btn-sm" disabled> <i class="fa fa-cross"></i> Expired
                                </a>
                            </div>
                        @else
                            <?php
                            $limit_q = DB::table('user_saw_this_plan')->where('project_id', $d->id)->count();

                            if($limit_q >= $d->quotation)
                            {
                            $user_saw_this = DB::table('user_saw_this_plan')->where([['project_id', '=', $d->id], ['user_id', Auth::user()->id]])->count();

                            if($user_saw_this > 0)
                            {
                            ?>
                            <div class="actions">
                                <a href="{{url('entra/construct_project_detail/'.$d->id)}}"
                                   class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View More
                                </a>
                            </div>
                            <?php
                            }else{
                            ?>
                            <div class="actions">
                                <a class="btn btn-danger btn-sm" disabled> <i class="fa fa-cross"></i> Expired
                                </a>
                            </div>
                            <?php

                            }


                            }
                            else
                            {
                            ?>

                            @if($see_project->count() > 0)
                                @if($see_project->first()->status == 'rq')

                                    <div class="actions">
                                        <a href="{{url('entra/construct_project_detail_one/'.$d->id)}}"
                                           class="btn btn-default btn-sm"> <i class="fa fa-search"></i> Requested
                                        </a>
                                    </div>

                                @elseif($see_project->first()->status == 'con')
                                    <div class="actions">
                                        <a href="{{url('entra/construct_project_detail_one/'.$d->id)}}"
                                           class="btn btn-default btn-sm"> <i class="fa fa-search"></i> Confirmed
                                        </a>
                                    </div>

                                @endif
                            @else
                                <?php
                                $fp = DB::table('user_get_free_plan')->where('user_id', Auth::user()->id);
                                if ($fp->count() > 0) {
                                    $fp_point = 1;
                                }
                                $pp = DB::table('company_with_plan')->where('com_id', $com_id->id);
                                if ($pp->count() > 0) {
                                    $pp_point = 1;
                                }
                                ?>

                                @if(($fp_point > 0) or ($pp_point > 0))
                                    <div class="actions">
                                        <a href="{{url('entra/construct_project_detail_one/'.$d->id)}}"
                                           class="btn btn-default btn-sm"> <i class="fa fa-search"></i> Request
                                        </a>
                                    </div>
                                @endif




                            @endif
                            <div class="actions">
                                <a href="{{url('entra/detail_project_without_request/'.$d->id)}}"
                                   class="btn btn-default btn-sm"> <i class="fa fa-search"></i> See
                                </a>
                            </div>
                            {{--conflit--}}
{{--=======--}}
                            {{--<div class="actions">--}}
                                {{--<a href="{{url('entra/construct_project_detail/'.$d->id)}}"--}}
                                   {{--class="btn btn-default btn-sm"> <i class="fa fa-search"></i> View More--}}
                                {{--</a>--}}
                            {{--</div>--}}

                            {{--<?php--}}

                            {{--}--}}
                            {{--?>--}}

                        {{--@endif--}}
                        {{--<div class="actions">--}}
                            {{--<a href="{{url('entra/detail_project_without_request/'.$d->id)}}"--}}
                               {{--class="btn btn-default btn-sm"> <i class="fa fa-search"></i> See--}}
                            {{--</a>--}}
                        {{--</div>--}}
{{-->>>>>>> e708884ab284d96bf16c1132040e4097f4b6f86e--}}
                    </div>
                    <div class="portlet-body">
                        <div class="scroller" style="height:200px" data-rail-visible="1"
                             data-rail-color="yellow"
                             data-handle-color="#a1b2bd">
                            <br>
                            <strong> Points:{{$d->project_define_point}}
                            </strong>
                            <br/>
                            {{ strip_tags(str_limit($d->description,140)) }}
                        </div>
                        <strong style="color:#67809f;">Competitors</strong> &nbsp;&nbsp; &nbsp;&nbsp;

                        <strong style="color:#67809f;">Post Date : {{$d->created_at}}</strong>

                    </div>
                </div>
                <!-- END Portlet PORTLET-->
            </div>
        @endforeach

    </div>
    <div class="col-xs-12">
        <div class="col-md-12 pull-right">
            {{$data->links()}}
        </div>
    </div>

</div>
@endsection