@extends('website.layouts.layouts')
@section('title', __('trans.gallery'))

@section('open-graph')
    <meta name="description" content="{{$og->description ? $og->description : $mainOpenGraph->description}}">
    <meta name="keywords" content="{{$og->key_words ? $og->key_words : $mainOpenGraph->key_words}}">
    <!-- open graph meta-->
    <meta property="og:title" content="{{$og->open_graph->og_title ? $og->open_graph->og_title : $mainOpenGraph->open_graph->og_title}}"/>
    <meta property="og:type" content="{{$og->open_graph->og_type ? $og->open_graph->og_type : $mainOpenGraph->open_graph->og_type}}"/>
    {{--<meta property="og:url" content="{{url('/album/' . $album->id)}}"/>--}}
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
    <meta property="og:description" content="{{$og->open_graph->og_description ? $og->open_graph->og_description : $mainOpenGraph->open_graph->og_description}}"/>
    <meta property="og:site_name" content="{{$og->open_graph->og_site_name ? $og->open_graph->og_site_name : $mainOpenGraph->open_graph->og_site_name}}"/>
@endsection

@section('canonical')
    {{--<link rel="canonical" href="{{url('album/' . $album->id)}}"/>--}}
@endsection

@section('header-code')
    {!! $headerCode->header_code ? $headerCode->header_code : '' !!}
@endsection

@section('customizedScript')
    <script>
        var currentLocation = location.href;
        $("#came_from").val(currentLocation);
    </script>
@endsection

@section('content')


<!--================Breadcrumb Area =================-->
<section class="breadcrumb_area">
    <div class="container">
        <div class="d-flex justify-content-between">
            <div class="left">
                <h4>{{__("trans.gallery")}}</h4>
            </div>
            <div class="right">
                <ul class="nav">
                    <li><a href="{{url("/")}}">{{__("trans.home")}}</a></li>
                    <li><a href="{{url("/gallery")}}">{{__("trans.gallery")}}</a></li>

                </ul>
            </div>
        </div>
    </div>
</section>
<!--================End Breadcrumb Area =================-->

<!-- Gallery Part Start -->
<section class="gallery_parts pt-2 pb-2 d-xl-block">
    <div class="container">


        <div class="row align-items-center">
            @if($images)
                @foreach($images as $image)
                    <div class="col-lg-4 col-md-6 col-sm-12 pr-1">
                        <div class="gg_single_part">
                            <a href="{{assetPath($image->image->path)}}" class="mfp-gallery">
                                <img src="{{assetPath($image->image->path)}}" class="img-fluid mx-auto" alt="" />
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</section>
<!-- Gallery Part End -->

@endsection
