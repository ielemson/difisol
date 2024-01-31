<div class="testimonials-area ptb-100">
    <div class="container" 
    data-aos="zoom-in"  
    data-aos-offset="300"
    data-aos-easing="ease-in-sine">
        <div class="section-title mb-45">
            <h2>
              
                The FutureMap Media Concepts Limited
            </h2>
            <p>
                The significance prospect of the establishment of The Futuremap Media Concepts Limited lies in its multifaceted approach to harnessing talents, utilizing media platforms, and leveraging information technology for marketing and commerce. Here are the key elements of its value points:
            </p>
        </div>
        <div class="row">

           @foreach ($features as $feature)
           <div class="col-lg-4 col-md-6">
            <div class="blog-card">
                <a href="#">
                    <img src="{{asset('assets/images/features')}}/{{$feature->image}}" alt="{{$feature->title}}">
                </a>
                <div class="content">
                   
                    <h3>
                        <a href="{{route('company.feature',$feature->id)}}">{{$feature->title}}</a>
                    </h3>
                    <p>
                        {!! substr($feature->content, 0,  150) !!}
                        {{-- {!! Illuminate\Support\Str::limit($feature->content, 150) !!} --}}
                    </p>
                    <a href="{{route('company.feature',$feature->id)}}" class="read-btn">Read More</a>
                </div>
            </div>
        </div>
           @endforeach
            
        </div>
        <div class="section-title mb-45">
        
            <p>
                Overall, The Futuremap Media Concepts Limited's value point lies in its holistic approach to talent development, media exposure, and leveraging technology for marketing and commerce. By combining these elements, the company aims to empower individuals, promote creativity, and drive business growth in the ever-evolving media landscape
            </p>
        </div>
    </div>
</div>