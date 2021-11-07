
<header class="header_tranparent">
    <nav class="navbar navbar-expand-lg black_menu" id="header">
        <div class="container-fluid custom_container"> <a class="navbar-brand" href="{{url("/")}}"><img src="{{assetPath($setting->image->path)}}" alt="logo" /></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto menu">

                    <li class="nav-item active"><a href="{{url("/")}}" class="nav-link">{{__("trans.home")}}</a></li>
                    <li class="nav-item"> <a href="{{url("/about")}}" class="nav-link">{{__("trans.about_us")}}</a> </li>



                    <li class="nav-item dropdown submenu"> <a href="#" class="nav-link"> {{__("trans.services")}} </a>
                        <ul class="dropdown-menu">
                            @if($mainServices)
                                @foreach($mainServices as $mainService)
                                    <li class="nav-item"> <a href="{{url("/service/$mainService->url")}}" class="nav-link">{{$mainService->lang->title}}</a> </li>
                                @endforeach
                            @endif

                        </ul>
                    </li>


                    <li class="nav-item dropdown submenu"> <a href="#" class="nav-link"> {{__("trans.projects")}} </a>
                        <ul class="dropdown-menu">
                            @if($projects)
                                @foreach($projects as $project)
                                    <li class="nav-item"> <a href="{{url("/project/$project->url")}}" class="nav-link">{{$project->lang->title}}</a> </li>
                                @endforeach
                            @endif

                        </ul>
                    </li>


                    <li class="nav-item"> <a class="nav-link" href="{{url("/gallery")}}">{{__("trans.gallery")}}</a> </li>


                    <li class="nav-item"> <a class="nav-link" href="{{url("/contact")}}">{{__("trans.contact")}}</a> </li>

                    <li  class="nav-item"><a class="nav-link" href="{{ currentLang() == 'en' ? url("/lang/ar") : url("/lang/en")}}">{{currentLang() == 'en' ? "Ar" : "En"}}</a></li>

                </ul>
            </div>
            <ul class="list-unstyled navbar-nav navright">


                <li> <a href="#" class="menu_btn"><i class="icon-bikini60s_menu"></i></a> </li>
            </ul>
        </div>
    </nav>
</header>
<!--================= mobile menu =================-->
<div class="mobile_menu d-flex flex-wrap align-items-end">
    <div class="close_btn">X</div>
    <img src="{{assetPath($setting->image->path)}}" alt="">
    <ul class="list-unstyled mb_menu wd_scroll">

        <li class="active"><a href="{{url("/")}}">{{__("trans.home")}}</a></li>
        <li><a href="{{url("/about")}}">{{__("trans.about_us")}}</a></li>



        <li class="menu-item-has-children"> <a href="#"> {{__("trans.projects")}} </a>
            <ul class="list-unstyled">

                @if($projects)
                    @foreach($projects as $project)
                        <li> <a href="{{url("/project/$project->url")}}">{{$project->lang->title}}</a> </li>
                    @endforeach
                @endif
            </ul>
        </li>
        <li class="menu-item-has-children"> <a href="#"> {{__("trans.services")}} </a>
            <ul class="list-unstyled">
                @if($mainServices)
                    @foreach($mainServices as $mainService)
                        <li> <a href="{{url("/service/$mainService->url")}}">{{$mainService->lang->title}}</a> </li>
                    @endforeach
                @endif

            </ul>
        </li>
        <li><a href="{{url("/gallery")}}">{{__("trans.gallery")}}</a></li>


        <li><a href="{{url("/contact")}}">{{__("trans.contact")}}</a></li>
        <li><a href="{{ currentLang() == 'en' ? url("/lang/ar") : url("/lang/en")}}">{{currentLang() == 'en' ? "Ar" : "En"}}</a></li>

    </ul>
    <ul class="list-unstyled social_links">
        @if($contact->facebook)
            <li><a href="{{$contact->facebook}}" title=""><i class="fab fa-facebook-f"></i></a></li>
        @endif
        @if($contact->twitter)
            <li><a href="{{$contact->twitter}}" title=""><i class="fab fa-twitter"></i></a></li>
        @endif
        @if($contact->instagram)
            <li><a href="{{$contact->instagram}}" title=""><i class="fab fa-instagram"></i></a></li>
        @endif
        @if($contact->dribbble)
            <li><a href="{{$contact->dribbble}}" title=""><i class="fab fa-dribbble"></i></a></li>
        @endif
    </ul>

</div>
<div class="body_capture"></div>
<!--================= mobile menu =================-->
