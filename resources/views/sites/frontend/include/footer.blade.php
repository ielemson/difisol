<footer class="footer-area">
    <div class="whats-float">
    <a href="https://api.whatsapp.com/send?phone=+2348035082149&text=Welcome%20to%20FutureMap%20Media%20Concepts.%0AWe%20are%20a%20click%20away%20to%20serve%20you.">
        <i class="fab fa-whatsapp">
        </i><span>WhatsApp<br><small>08035082149</small>
        </span>
    </a>
</div>
</a>
    <div class="container pt-100 pb-70">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <div class="footer-logo">
                        <a href="{{url('/')}}">
                            <img src="{{asset('assets/images/logos/logo.png')}}" alt="FutureMap logo" width="100">
                        </a>
                    </div>
                    <p>
                        The FutureMap Media Concepts Limited is a world-class media organization based in Nigeria. It was registered in October 2021 by Corporate Affairs Commission, Nigeria.
                    </p>
                    <ul class="social-link">
                        <li class="social-title">Follow Us:</li>
                        <li>
                            <a href="{{$setting->facebook}}" target="_blank">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{$setting->instagram}}" target="_blank">
                                <i class="ri-instagram-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{$setting->twitter}}" target="_blank">
                                <i class="ri-twitter-line"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget ps-5">
                    <h3>About us</h3>
                    <ul class="footer-list">
                        <li>
                            <a href="{{route('about.us')}}">
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="{{route('company.profiles')}}">
                               Team
                            </a>
                        </li>
                        <li>
                            <a href="{{route('company.projects')}}">
                                Project
                            </a>
                        </li>
                        <li>
                            <a href="{{route('contact.us')}}">
                                Contact Us
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget ps-5">
                    <h3>Resources</h3>
                    <ul class="footer-list">
                        <li>
                            <a href="{{url('/')}}">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{route('magazine.list')}}">
                                Magazine
                            </a>
                        </li>
                        <li>
                            <a href="{{route('front.news.list')}}">
                                News
                            </a>
                        </li>
                       
                        <li>
                            <a href="{{route('login')}}">
                               Account
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget ps-5">
                    <h3>Official Info</h3>
                    <ul class="footer-contact">
                        <li>
                            <i class="ri-map-pin-2-fill"></i>
                            <div class="content">
                                <h4>Location:</h4>
                                <span>
                                   {!!$setting->address!!}
                                </span>
                            </div>
                        </li>
                        <li>
                            <i class="ri-mail-fill"></i>
                            <div class="content">
                                <h4>Email:</h4>
                                <span><a
                                        href="#"><span
                                            class="__cf_email__"
                                           >{!!$setting->email!!}</span></a></span>
                            </div>
                        </li>
                        <li>
                            <i class="ri-phone-fill"></i>
                            <div class="content">
                                <h4>Phone:</h4>
                                <span><a href="#">{!!$setting->phone!!}
                                </a></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <div class="copy-right-text text-center">
                <p>
                    Copyright @
                        <script>
                        document.write(new Date().getFullYear())
                    </script> All Rights Reserved
                    <a href="#">FutureMap</a>
                </p>
            </div>
        </div>
    </div>
</footer>