<header class="top-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-8">
                <div class="header-left">
                    <ul>
                        <li>
                            <i class="ri-phone-fill"></i>
                            <a href="#">{!!$setting->phone!!}</a>
                        </li>
                        <li>
                            <i class="ri-mail-fill"></i>
                            <a href="#">
                                <span class="__cf_email__">{{$setting->email}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="header-right">
                    <div class="header-language dropdown language-option">
                        <button class="dropdown-toggle" type="button" id="language1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="lang-name"></span>
                        </button>
                        <div class="dropdown-menu language-dropdown-menu" aria-labelledby="language1">
                            <a class="dropdown-item" href="#">
                                English
                            </a>
                           
                           
                        </div>
                    </div>
                    <ul class="social-list">
                        <li>
                            <a href="{{$setting->facebook}}" target="_blank">
                                <i class="ri-facebook-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{$setting->twitter}}" target="_blank">
                                <i class="ri-twitter-fill"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{$setting->instagram}}" target="_blank">
                                <i class="ri-instagram-line"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>