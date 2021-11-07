{{--
<!-- main-footer -->
<footer class="main-footer style-two" style="background-image: url({{assetPath("website/images/background/footer-1.jpg")}});">
    <div class="footer-top">
        <div class="auto-container">
            <div class="widget-section">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget logo-widget">
                            <div class="footer-logo">
                                <figure class="logo"><a href="{{url("/")}}"><img src="{{assetPath($setting->image_alt->path)}}" alt=""></a></figure>
                            </div>
                            <div class="text">
                                <p>
                                    {{$setting->lang->website_description}}
                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget links-widget ml-100">
                            <div class="widget-title">
                                <h3>{{__("trans.quick_links")}}</h3>
                                <div class="shape"></div>
                            </div>
                            <div class="widget-content">
                                <ul class="links clearfix">
                                    <li><a href="{{url("/")}}">{{__("trans.home")}}</a></li>
                                    <li><a href="{{url("/about")}}">{{__("trans.about_us")}}</a></li>
                                    <li><a href="{{url("/gallery")}}">{{__("trans.gallery")}}</a></li>
                                    <li><a href="{{url("/videos")}}">{{__("trans.videos")}}</a></li>
                                    <li><a href="{{url("/contact")}}">{{__("trans.contact")}}</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget links-widget ml-70">
                            <div class="widget-title">
                                <h3>{{__("trans.products")}}</h3>
                                <div class="shape"></div>
                            </div>
                            <div class="widget-content">
                                <ul class="links clearfix">
                                    @if($products)
                                        @foreach($products as $product)
                                            <li><a href="{{url("/product/$product->url")}}">{{$product->lang->title}}</a></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                        <div class="footer-widget newsletter-widget">
                            <div class="widget-title">
                                <h3>{{__("trans.contact")}}</h3>
                                <div class="shape"></div>
                            </div>
                            <ul class="contact-info">
                                <li><span class="icon fa fa-map-marker"></span>{{$contact->address()}}</li>
                                <li><span class="icon fa fa-phone"></span>{{$contact->phone}}</li>
                                <li><span class="icon fa fa-phone"></span>{{$contact->phone_alt}}</li>
                                <li><span class="icon fa fa-envelope-o"></span>{{$contact->email}}</li>
                            </ul>

                            <ul class="footer-social clearfix">
                                @if($contact->facebook)
                                    <li><a href="{{$contact->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                @endif

                                @if($contact->twitter)
                                    <li><a href="{{$contact->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                @endif

                                @if($contact->pinterest)
                                    <li><a href="{{$contact->pinterest}}"><i class="fab fa-pinterest-p"></i></a></li>
                                @endif

                                @if($contact->google)
                                    <li><a href="{{$contact->google}}"><i class="fab fa-google-plus-g"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="copyright centred">
                <p>Copyrights © 2021 All Rights Reserved by Be Group</p>
            </div>
        </div>
    </div>
</footer>
<!-- main-footer end -->


<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="far fa-long-arrow-alt-up"></span>
</button>
--}}

<footer class="footer_area">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="f_widget f_about_widget wow fadeInDown"> <a href="#" class="f_logo"> <img src="{{assetPath($setting->image->path)}}" alt=""> </a>
                        <p>{{$setting->lang->website_description}}</p>
                        <ul class="list-unstyled f_social">
                            @if($contact->facebook)
                                <li><a href="{{$contact->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                            @endif
                            @if($contact->twitter)
                                <li><a href="{{$contact->twitter}}"><i class="fab fa-twitter"></i></a></li>
                            @endif
                            @if($contact->instagram)
                                <li><a href="{{$contact->instagram}}"><i class="fab fa-instagram"></i></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-md-1 col-sm-5">
                    <div class="f_widget f_link_widget wow fadeInDown" data-wow-delay="0.2s">
                        <h3 class="f_title">Who we are</h3>
                        <ul class="list-unstyled f_link">
                            <li><a href="{{url("/")}}">{{__("trans.home")}}</a></li>

                            <li><a href="{{url("/about")}}">{{__("trans.about")}}</a></li>
                            <li><a href="{{url("/gallery")}}">{{__("trans.gallery")}}</a></li>
                            <li><a href="{{url("/contact")}}">{{__("trans.contact")}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="f_widget f_contact_info_widget wow fadeInDown" data-wow-delay="0.3s">
                        <h3 class="f_title">{{__("trans.contact_us")}}</h3>
                        <ul class="list-unstyled contact_info_link">
                            <li>Phone: <a href="tel:{{$contact->phone}}">{{$contact->phone}}</a></li>
                            <li>Email: <a href="mailto:{{$contact->email}}">{{$contact->email}}</a></li>
                            <li>Address: <span>{{$contact->address()}}</span> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom border_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-7">
                    <p class="copy_text">Copyrights © 2021 All Rights Reserved

                    </p>
                </div>
                <div class="col-sm-5 text-right"> <a href="#" class="go_top">go back up <i class="fas fa-angle-up"></i></a> </div>
            </div>
        </div>
    </div>
</footer>
