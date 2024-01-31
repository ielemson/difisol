@if (count($members) > 0)

    <div class="instructors-area instructors-area-rs pt-100 pb-70 section-bg" 
    data-aos="fade-right"
    data-aos-offset="300"
    data-aos-easing="ease-in-sine">
        <div class="container">
            <div class="section-title mb-45">
                <h2>Meet Our Top Management Team</h2>
                        <p>
                            Headed by a skilled and passionate media and educationist entrepreneur,
                            our staff is made up of men and women of veteran capacities in the fields
                            of Education, media and Information and communication Technology,
                            with excellent records in business and corporate management. The
                            company has a numerical fourteen member permanent Staff and six
                            contract staff
                        </p>
            </div>
            <div class="instructors-slider owl-carousel owl-theme">
                @foreach ($members as $member)
                <div class="instructors-card">
                    <a href="{{ route('company.profile', $member->id) }}">
                        <img src="{{ asset('assets/images/members') }}/{{ $member->image }}" alt="{{$member->name}}">
                    </a> 
                    <div class="content">
                        
                        <h3>
                            <a href="{{ route('company.profile', $member->id) }}">{{$member->name}}</a>
                        </h3>
                        <span>{{$member->portfolio}}</span>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </div>
@endif