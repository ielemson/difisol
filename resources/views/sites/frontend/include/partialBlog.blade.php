  <div class="blog-area pt-100 pb-70">
            <div class="container">
                <div class="row align-items-center mb-45">
                    <div class="col-lg-8">
                        <div class="section-title mt-rs-20">
                            <span>{{__('Latest News')}}</span>
                            <h2>{{__('Latest News')}}</h2>
                        </div>
                    </div>
                    <div class="col-lg-4 text-end">
                        <a href="{{route('front.news.list')}}" class="default-btn border-radius-50">View all news</a>
                    </div>
                </div>
                <div class="row">
                    {{-- <div class="col-lg-4 col-md-6">
                        <div class="blog-card">
                            <a href="single-blog-1.html">
                                <img src="assets/images/blog/blog-img4.jpg" alt="Blog">
                            </a>
                            <div class="content">
                                <ul>
                                    <li>
                                        <i class="ri-calendar-todo-fill"></i>
                                        Jan 12,2022
                                    </li>
                                    <li>
                                        <i class="ri-price-tag-3-fill"></i>
                                        <a href="tags.html">Education</a>
                                    </li>
                                </ul>
                                <h3>
                                    <a href="single-blog-1.html">All that is wrong with codding in the field of apprentices</a>
                                </h3>
                                <p>Lorem ipsum dolor sit amet, constetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                                <a href="single-blog-1.html" class="read-btn">Read More</a>
                            </div>
                        </div>
                    </div> --}}


                    @foreach ($news as $latest)
                <div class="col-lg-4 col-md-4">
                <div class="blog-card">
                    <a href="{{route('front.single.news',$latest->slug)}}">
                        <img src="{{asset('assets/images/news')}}/{{$latest->image}}" alt="{{$latest->title}}">
                    </a>
                    <div class="content">
                        <ul>
                            <li>
                                <i class="ri-calendar-todo-fill"></i>
                                {{-- Jan 12,2022 --}}
                                {{ Carbon\Carbon::parse($latest->created_at)->isoFormat('MMM DD YY') }}
                                {{-- {{ Carbon\Carbon::parse($latest->created_at)->diffForHumans() }} --}}

                            </li>
                            <li>
                                <i class="ri-price-tag-3-fill"></i>
                                <a href="{{route('front.single.news',$latest->slug)}}">{{$latest->category->name}}</a>
                            </li>
                        </ul>
                        <h3>
                            <a href="{{route('front.single.news',$latest->slug)}}">
                                {{$latest->title}}
                            </a>
                        </h3>
                        
                        <p>{!! Illuminate\Support\Str::limit($latest->details, 150) !!}</p>
                        <a href="{{route('front.single.news',$latest->slug)}}" class="read-btn">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
                    
                </div>
            </div>
        </div>