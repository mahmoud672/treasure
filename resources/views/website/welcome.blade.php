@extends('website.layouts.layouts')
@section('title', __('trans.home'))

@section('open-graph')
        <meta name="description" content="{{$og->description}}">
        <meta name="keywords" content="{{$og->key_words}}">
        <!-- open graph meta-->
        <meta property="og:title" content="{{$og->open_graph->og_title}}"/>
        <meta property="og:type" content="{{$og->open_graph->og_type}}"/>
        <meta property="og:url" content="{{url('/')}}"/>
        <meta property="og:image" content="{{$og->open_graph->image_url ? $og->open_graph->image_url : asset($og->open_graph->open_graph_image->path)}}"/>
        <meta property="og:description" content="{{$og->open_graph->og_description}}"/>
        <meta property="og:site_name" content="{{$og->open_graph->og_site_name}}"/>
@endsection

@section('header-code')
    {!! $headerCode->header_code ? $headerCode->header_code : '' !!}
@endsection

@section('canonical')
    <link rel="canonical" href="{{url($og->url)}}"/>
@endsection

@section('customizedStyle')

@endsection

@section('customizedScript')
    <script>
        var currentLocation = location.href;
        $("#came_from").val(currentLocation);
    </script>
@endsection


@section('content')

    <!-- slider area -->
    <section class="main_slider_area main_slider_area_six">
        <div class="slider-progress">
            <div class="slider_progress_bar"></div>
        </div>
        <div class="main_slider">
            @if($slides)
                @foreach($slides as $slide)
                    <div class="slider_item pt-0 d-flex align-items-center" style="background-image: url('{{assetPath($slide->image->path)}}');">
                        <div class="overlay_bg"></div>
                        <div class="container">
                            <div class="slider_text">
                                <h5 data-animation="fadeInLeft">{{$slide->lang->title}}</h5>
                                <h2 data-animation="fadeInLeft" data-delay="0.1s"> {{$slide->lang->sub_title}} </h2>
                                <p data-animation="fadeInLeft" data-delay="0.3s"> {!! $slide->lang->description !!} </p>
                                <a href="#" class="theme_btn theme_btn_three hover_style1 yellow_btn" data-animation="fadeInLeft" data-delay="0.5s">{{$slide->lang->button}}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
        <div class="slider_nav"> <i class="fas fa-angle-left slider_left_arrow"></i> <i class="fas fa-angle-right slider_right_arrow"></i> </div>
    </section> <!-- slider area -->

    <!-- slider area -->

    <!-- cons_about_area six -->
    <section class="cons_about_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="service_img wow fadeInLeft"> <img src="{{assetPath($about->aboutImage->path)}}" alt=""> </div>
                </div>
                <div class="col-lg-6">
                    <div class="cons_about_content pl_100 wow fadeInRight" data-wow-delay="0.2s">
                        <h6 class="title_top">{{__("trans.about_us")}}</h6>

                       {{-- <h2 class="title_head">We are the leader in the construction sector </h2>
                        <p>We do not strive to provide the best professionals to make your project a masterpiece of construction, something unique and incomparable. </p>--}}
                        {!! $about->lang->description !!}

                        <div class="expreence_info">
                            <div class="expreence_item">
                                <div class="odometer_content">
                                    <h3 class="odometer" data-odometer-final=" 8"></h3>
                                </div>
                                <h5>Years of experience</h5>
                            </div>
                            <div class="expreence_item">
                                <div class="odometer_content">
                                    <h3 class="odometer" data-odometer-final=" 300"></h3>
                                </div>
                                <h5>Completed projects</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- cons_about_area six -->
    <!-- cons_work_process_area -->
    <section class="cons_work_process_area">
        <div class="container">
            <div class="section_title_one text-center wow fadeInDown">
                <h6 class="title_top">Process</h6>
                <h2 class="title_head">Our work process</h2>
            </div>
            <div class="row">
                @if($features)
                    @foreach($features as $feature)
                        <div class="col-lg-3 col-sm-6">
                            <div class="work_process_item text-center wow fadeInDown">
                                <div class="arrow"><i class="fas fa-long-arrow-alt-right"></i></div> <i class="{{$feature->lang->slug}}"></i> <a href="#">
                                    <h3>{{$feature->lang->title}}</h3>
                                </a>
                                <p>{!! $feature->lang->description !!} </p>
                            </div>
                        </div>
                    @endforeach
                @endif
           {{--     <div class="col-lg-3 col-sm-6">
                    <div class="work_process_item text-center wow fadeInDown">
                        <div class="arrow"><i class="fas fa-long-arrow-alt-right"></i></div> <i class="icon-blueprint1"></i> <a href="#">
                            <h3>Planing</h3>
                        </a>
                        <p>first we create an efficient plan of how to work. </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="work_process_item text-center wow fadeInDown" data-wow-delay="0.2s">
                        <div class="arrow"><i class="fas fa-long-arrow-alt-right"></i></div> <i class="icon-engineer"></i> <a href="#">
                            <h3>Supervision</h3>
                        </a>
                        <p>We supervise the place where we are going to build and do studies. </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="work_process_item text-center wow fadeInDown" data-wow-delay="0.3s">
                        <div class="arrow"><i class="fas fa-long-arrow-alt-right"></i></div> <i class="icon-schedule"></i> <a href="#">
                            <h3>Planning and budget</h3>
                        </a>
                        <p>We agree on a financing plan and project delivery times. </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="work_process_item text-center wow fadeInDown" data-wow-delay="0.4s">
                        <div class="arrow last"><i class="fas fa-long-arrow-alt-right"></i></div> <i class="icon-cone1"></i> <a href="#">
                            <h3>Building</h3>
                        </a>
                        <p>We start to build your ideas meeting the highest standards. </p>
                    </div>
                </div>--}}
            </div>
        </div>
    </section> <!-- cons_work_process_area -->
    <!-- cons_projects_area -->
    <section class="cons_projects_area_five">
        <div class="container">
            <div class="row align-items-center mb_100">
                <div class="col-md-8">
                    <div class="section_title_one mb-0 wow fadeInDown" data-wow-delay="0.1s">

                        <h2 class="title_head">{{__("trans.projects")}}</h2>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="custom_arrow text-right">
                        <div class="prev custom_prev"><i class="fas fa-caret-left"></i></div>
                        <div class="next custom_next"><i class="fas fa-caret-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="cons_project_info">
                <div class="row cons_project_slider">
                    @if($projects)
                        @foreach($projects as $project)
                            <div class="col-lg-12">
                                <div class="pr_slider_item"> <img src="{{assetPath($project->image->path)}}" alt="">
                                    <div class="hover-content">
                                        <h6>{{$project->lang->title}}</h6>
                                        <h4>
                                            {{--Apartment building in the<br> residential district--}}
                                            {{$project->lang->slug}}
                                        </h4>
                                        <a href="{{url("/project/$project->url")}}" class="text_btn" data-text="{{__("trans.read_more")}}">
                                            {{__("trans.read_more")}}
                                            <i class="fas fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section> <!-- cons_projects_area -->


    <!-- cons_offer service area -->
    <section class="cons_offer_service_area">
        <div class="container">
            <div class="section_title_one wow fadeInDown">
                <h6 class="title_top">How we offer you</h6>
                <h2 class="title_head">{{__("trans.services")}}</h2>
            </div>
            <div class="row">
                @if($mainServices)
                    @foreach($mainServices as $service)
                        <div class="col-lg-4 col-sm-6">
                            <div class="offer_service_item pr_slider_item wow fadeInDown" data-wow-delay="0.1s">
                                <img src="{{assetPath($service->image->path)}}" alt="">
                                <div class="hover-content"> <i class="icon-metre icon"></i>
                                    <a href="{{url("/service/$service->url")}}">
                                        <h4>{{$service->lang->title}}</h4>
                                    </a>
                                    <a href="#" class="text_btn" data-text="See service">
                                        {{__("trans.read_more")}}
                                        <i class="fas fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section> <!-- cons_offer service area -->


    <!-- cons clients logo area -->
    <section class="cons_clients_logo_area">
        <div class="container">
            <div class="clients_logo_inner">
                @if($clients)
                    @foreach($clients as $client)
                        <a href="#" class="clients_logo wow fadeInDown">
                            <img src="{{assetPath($client->image->path)}}" alt="">
                            <img src="{{assetPath($client->image->path)}}" alt=""> </a>
                    @endforeach
                @endif
                {{--<a href="#" class="clients_logo wow fadeInDown">
                    <img src="img/clients/clients_log1.png" alt="">
                    <img src="img/clients/clients_log1.png" alt=""> </a>
                <a href="#" class="clients_logo wow fadeInDown" data-wow-delay="0.2s">
                    <img src="img/clients/clients_log2.png" alt="">
                    <img src="img/clients/clients_log2.png" alt=""> </a>
                <a href="#" class="clients_logo wow fadeInDown" data-wow-delay="0.3s">
                    <img src="img/clients/clients_log3.png" alt="">
                    <img src="img/clients/clients_log3.png" alt=""> </a>
                <a href="#" class="clients_logo wow fadeInDown" data-wow-delay="0.4s">
                    <img src="img/clients/clients_log4.png" alt="">
                    <img src="img/clients/clients_log4.png" alt=""> </a>
                <a href="#" class="clients_logo wow fadeInDown" data-wow-delay="0.5s">
                    <img src="img/clients/clients_log5.png" alt="">
                    <img src="img/clients/clients_log5.png" alt=""> </a> --}}
            </div>
        </div>
    </section> <!-- cons clients logo area -->

@endsection
