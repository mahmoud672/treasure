@extends('website.layouts.layouts')
@section('title', __('trans.about_us'))

@section('open-graph')
    <meta name="description" content="{{$og->description ? $og->description : $mainOpenGraph->description}}">
    <meta name="keywords" content="{{$og->key_words ? $og->key_words : $mainOpenGraph->key_words}}">
    <!-- open graph meta-->
    <meta property="og:title"
          content="{{$og->open_graph->og_title ? $og->open_graph->og_title : $mainOpenGraph->open_graph->og_title}}"/>
    <meta property="og:type"
          content="{{$og->open_graph->og_type ? $og->open_graph->og_type : $mainOpenGraph->open_graph->og_type}}"/>
    <meta property="og:url" content="{{url('/about')}}"/>
    <meta property="og:image" content="
    @if($og->open_graph->image_url)
    {{$og->open_graph->image_url}}
    @elseif($og->open_graph->open_graph_image)
    {{asset($og->open_graph->open_graph_image->path)}}
    @else
    {{$mainOpenGraph->open_graph->image_url}}
    @endif
    {{--{{$object->open_graph->image_url ? $object->open_graph->image_url : asset($object->open_graph->open_graph_image->path)}}--}}"
    />
    <meta property="og:description"
          content="{{$og->open_graph->og_description ? $og->open_graph->og_description : $mainOpenGraph->open_graph->og_description}}"/>
    <meta property="og:site_name"
          content="{{$og->open_graph->og_site_name ? $og->open_graph->og_site_name : $mainOpenGraph->open_graph->og_site_name}}"/>
@endsection

@section('canonical')
    <link rel="canonical" href="{{url($og->url)}}"/>
@endsection

@section('header-code')
    {!! $headerCode->header_code ? $headerCode->header_code : '' !!}
@endsection

@section('customizedScript')
    <script>
        var currentLocation = location.href;
        $("#came_from").val(currentLocation);


        $(".main-section-ul ul").addClass("about-dropped")
    </script>
@endsection

@section('content')

<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="left">
                <h4>{{__("trans.about_us")}}</h4>
            </div>
            <div class="right">
                <ul class="nav">
                    <li><a href="{{url("/")}}">{{__("trans.home")}}</a></li>
                    <li><a href="{{url("/about")}}">{{__("trans.about_us")}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--================End Breadcrumb Area =================-->
<!--================About Us Area =================-->
<section class="about_main_area">
    <div class="container">
        <div class="about_inner">
            <h6 class="title_top">{{__("trans.values")}}</h6>
           {{-- <h2 class="title_head">Our proposal was always to change the whole world of construction </h2>
            <p>We have known how to proceed, innovate and create projects that reflect a vision of the future our vision, porttitor nullam integer porta vivamus proin venenatis consec-tetur, potenti ultrices elementum arcu est. </p>
            <p>Fringilla phasellus, placerat auctor litora consectetur praesent netus aptent ut ornare netus dictum vivamus et volutpat, nunc lorem enim urna pellentesque egestas aenean tincidunt, torquent felis orci nibh aliquam et praesent placerat eleifend sagit-tis ut magna consequat nibh turpis, vitae donec turpis platea class cras iaculis vitae, imperdiet aenean adipiscing facilisis aptent vivamus placerat morbi ultrices libero consectetur fermentum taciti nec taciti conubia. </p>--}}
            {!! $about->lang->value !!}
        </div>
        <div class="about_img"> <img class="img-fluid" src="{{assetPath($about->valuesImage->path)}}" alt=""> </div>
    </div>
</section>
<!--================End About Us Area =================-->
<!-- cons thinking area -->
<section class="cons_vision_area pad_btm">
    <div class="container">
        <div class="section_title_one">
            <h6 class="title_top">Our way of thinking</h6>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="vision_item">
                    <a href="#" class="img_shadow">
                        <img src="{{assetPath($about->visionImage->path)}}" alt="">
                    </a>
                    <div class="content pr_100">
                        <h3 class="page_head">{{__("trans.vision")}}</h3>
                        {{--<p>
                            The vision of becoming the best quality construction company on the market and the most recognized in the country.
                        </p>--}}
                        {!! $about->lang->vision !!}

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="vision_item">
                    <a href="#" class="img_shadow">
                        <img src="{{assetPath($about->missionImage->path)}}" alt="">
                    </a>
                    <div class="content">
                        <h3 class="page_head">{{__("trans.mission")}}</h3>
                        {{--<p>
                            Each construction idea goes with the proposal to make a high quality project, to exceed the highest standards.
                        </p>--}}
                        {!! $about->lang->mission !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!-- cons thinking area -->
<!-- cons service area -->

<!-- cons fact area -->
<section class="cons_fact_area_two">
    <div class="container">
        <div class="row">
            @if($why_us)
                @foreach($why_us as $feature)
                    <div class="col-lg-3 col-sm-6">
                        <div class="fact_item">
                            <div class="odometer_content">
                                <h3 class="odometer" data-odometer-final="{{$feature->counter}}"></h3>
                            </div>
                            <p>{{$feature->lang->title}}</p>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</section> <!-- cons_team_area two -->


@endsection
