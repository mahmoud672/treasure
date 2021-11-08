@extends('website.layouts.layouts')
@section('title',  __('trans.contact'))

@section('open-graph')
    <meta name="description" content="{{$og->description ? $og->description : $mainOpenGraph->description}}">
    <meta name="keywords" content="{{$og->key_words ? $og->key_words : $mainOpenGraph->key_words}}">
    <!-- open graph meta-->
    <meta property="og:title"
          content="{{$og->open_graph->og_title ? $og->open_graph->og_title : $mainOpenGraph->open_graph->og_title}}"/>
    <meta property="og:type"
          content="{{$og->open_graph->og_type ? $og->open_graph->og_type : $mainOpenGraph->open_graph->og_type}}"/>
    <meta property="og:url" content="{{url('contact')}}"/>
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
    <link rel="canonical" href="{{url('contact')}}"/>
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
                <h4>{{__("trans.contact")}}</h4>
            </div>
            <div class="right">
                <ul class="nav">
                    <li><a href="{{url("/")}}">{{__("trans.home")}}</a></li>
                    <li><a href="{{url("/contact")}}">{{__("trans.contact_us")}}</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--================End Breadcrumb Area =================-->
<div class="map">
    <iframe src="{{$contact->location}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

<!-- cons_contact_area_two -->
<section class="cons_contact_area_two map_area">
    <img class="map img-fluid" src="{{assetPath("website/assets/img/home-six/map.png")}}" alt="">
    <div class="container">
        <div class="row cons_contact_info_two">


            <div class="col-lg-6">
                <div class="cons_about_content pr_100">
                    <h6 class="title_top">{{__("trans.main_office")}}</h6>
                    <h2 class="title_head">{{$contact->address()}}</h2>
                    <p>{{__("trans.contact_title")}} </p>
                    <a href="#" class="text_btn" data-text="Make a call">{{__("trans.make_call")}}</a>
                </div>
            </div>
            <div class="col-lg-6">
                @include("website.layouts.messages")
                <form action="{{url("/contact")}}" method="post" class="contact_form wow fadeInRight">
                    @csrf
                    <input type="hidden" name="came_from" value="" id="came_from">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" required placeholder="{{__("trans.form_name")}}" value="{{old("name")}}">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" required placeholder="{{__("trans.email")}}" value="{{old("email")}}">
                    </div>
                    <div class="form-group">
                        <input type="phone" name="phone" class="form-control" required placeholder="{{__("trans.phone")}}" value="{{old("phone")}}">
                    </div>
                    <div class="form-group">
                                        <textarea class="form-control" name="message"  id="message" cols="30" rows="10" required placeholder="{{__("trans.message")}}">
                                            {{old("message")}}
                                        </textarea>
                    </div>
                    <div class="form-group"> <button type="submit" class="theme_btn theme_btn_three hover_style1">
                            {{__("trans.send")}}</button> </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- cons_contact_area_two -->
<!--================End Map Area =================-->

@endsection
