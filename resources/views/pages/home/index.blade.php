@extends('layouts.pages.base')
@section('content')
    <!--==================== HOME ====================-->
    <section class="home section" id="home">
        <div class="home_container container grid">
            @foreach ($abouts as $about)
                <div class="home_img">
                    @if ($about->home_image)
                        <img src="{{ $about->home_image }}" loading="lazy"  alt="">
                    @else
                        <img src="{{ asset('template/assets/img/home.png') }}" alt="">
                    @endif
                </div>

                <div class="home_data">
                    <h1 class="home_title">Hi, I'am {{ $about->name }}</h1>
                    <h3 class="home_subtitle">{{ $about->tagline }}</h3>
                    <p class="home_description">
                        {{ $about->summary }}
                    </p>
                    <a href="#contact" class="button button--flex">
                        Contact Me <i class="uil uil-message button__icon"></i>
                    </a>
                    
                    <div class="home_social">
                        <span class="home_social-follow">Follow Me</span>
                        <div class="home_social-links">
                            @foreach ($mediasHome as $media)
                                <a href="{{ $media->link }}" target="_blank" class="home_social-icon">
                                    <i class="{{ $media->icon }}"></i>
                                </a>
                            @endforeach


                        </div>
                    </div>

                    <div class="home_scroll_social">
                        
                        <div class="home_social1">
                            <div class="home_social-link">
                                @foreach ($mediasHome as $media)
                                    <a href="{{ $media->link }}" target="_blank" class="home_social-icon">
                                        <i class="{{ $media->icon }}"></i>
                                    </a>
                                @endforeach


                            </div>
                        </div>
                    </div>


                </div>
            @endforeach

        </div>
    </section>

    <!--==================== ABOUT ====================-->
    <section class="about section" id="about">
        <h2 class="section__title">About Me</h2>
        <span class="section__subtitle">My introduction</span>

        <div class="about_container container">
           

            <div class="about_data">
                <p class="about_description">
                    {{ $about->summary }}
                </p>
                <div class="about_info">
                    <div>
                        <span class="about_info-title">08+</span>
                        <span class="about_info-name">Years <br>experience</span>
                    </div>
                    <div>
                        <span class="about_info-title">{{ $projectsCount }}+</span>
                        <span class="about_info-name">Completed <br>project</span>
                    </div>
                    <div>
                        <span class="about_info-title">{{ $experienceCount }}+</span>
                        <span class="about_info-name">Companies <br>worked</span>
                    </div>
                </div>
                <div class="about_buttons">
                    @foreach ($abouts as $about)
                        @if ($about->cv)
                            <a href="{{ asset('pdf/' . $about->cv) }}" class="button button--flex">
                                Download CV <i class="uil uil-download-alt button_icon"></i>
                            </a>
                        @else
                            <a href="#" class="button button--flex">
                                (CV not available)
                                <i class="uil uil-download-alt button_icon"></i>
                            </a>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </section>

    <!--==================== SKILLS ====================-->
    <section class="skills section" id="skills">
        <h2 class="section__title">Skills</h2>
        <span class="section__subtitle">My technical lever</span>

        <div class="skills_container container grid">
            @foreach ($services as $service)
                <div>
                    <!--=========== SKILL 1 ============-->
                    <div class="skills_content skills_open">
                        <div class="skills_header">
                            <i class="uil uil-brackets-curly skills_icon"></i>

                            <div>
                                <h1 class="skills_title">{{ $service->name }}</h1>
                            </div>

                            <i class="uil uil-angle-down skills_arrow"></i>
                        </div>
                        <div class="skills_list grid">
                            @foreach ($service->skills as $skill)
                                <div class="skills_data">
                                    <div class="skills_titles">
                                        <h3 class="skills_name">{{ $skill->name }}</h3>
                                        <span class="skills_number">{{ $skill->proficiency }}%</span>
                                    </div>
                                    <div class="skills_bar">
                                        <span class="skills_percentage" style="width: {{ $skill->proficiency }}%"></span>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>

                </div>
            @endforeach


        </div>
    </section>

    <!--==================== QUALIFICATION ====================-->
    <section class="qualification section">
        <h2 class="section__title">Qualification</h2>
        <span class="section__subtitle">My personal journel</span>

        <div class="qualification_container container">
            <div class="qualification_tabs">
                <div class="qualificaction_button button--flex qualification_active" data-target="#education">
                    <i class="uil uil-graduation-cap qualification_icon"></i>
                    Education
                </div>
                <div class="qualificaction_button button--flex" data-target="#work">
                    <i class="uil uil-briefcase-alt qualification-icon"></i>
                    Work
                </div>
            </div>

            <div class="qualification_sections">
                <div class="qualification_content qualification_active" data-content id="education">
                    @foreach ($educations as $education)
                        @if ($loop->iteration % 2)
                            <div class="qualification_data">
                                <div>
                                    <h3 class="qualification_title">{{ $education->degree }}</h3>
                                    <span class="qualification_subtitle">{{ $education->institution }}</span>
                                    <div class="qualificaation_calender">
                                        <i class="uil uil-calender-alt"></i>
                                        {{ $education->period }}
                                    </div>
                                </div>
                                <div>
                                    <span class="qualification_rounder"></span>
                                    @unless ($loop->last)
                                        <span class="qualification_line"></span>
                                    @endunless
                                </div>
                            </div>
                        @else
                            <!--============= QUALIFICATION 2 ===========-->
                            <div class="qualification_data">
                                <div></div>

                                <div>
                                    <span class="qualification_rounder"></span>
                                    @unless ($loop->last)
                                        <span class="qualification_line"></span>
                                    @endunless
                                </div>

                                <div>
                                    <h3 class="qualification_title">{{ $education->degree }}</h3>
                                    <span class="qualification_subtitle">{{ $education->institution }}</span>
                                    <div class="qualificaation_calender">
                                        <i class="uil uil-calender-alt"></i>
                                        {{ $education->period }}
                                    </div>
                                </div>

                            </div>
                        @endif
                    @endforeach
                </div>
                <!--========== Experience CONTENT 2 ==========-->
                <div class="qualification_content" data-content id="work">
                    @foreach ($experiences as $experience)
                        @if ($loop->iteration % 2)
                            <div class="qualification_data">
                                <div>
                                    <h3 class="qualification_title">{{ $experience->position }}</h3>
                                    <span class="qualification_subtitle">{{ $experience->company }}</span>
                                    <div class="qualificaation_calender">
                                        <i class="uil uil-calender-alt"></i>
                                        {{ $experience->period }}
                                    </div>
                                </div>
                                <div>
                                    <span class="qualification_rounder"></span>
                                    @unless ($loop->last)
                                        <span class="qualification_line"></span>
                                    @endunless
                                </div>
                            </div>
                        @else
                            <div class="qualification_data">
                                <div></div>

                                <div>
                                    <span class="qualification_rounder"></span>
                                    @unless ($loop->last)
                                        <span class="qualification_line"></span>
                                    @endunless
                                </div>

                                <div>
                                    <h3 class="qualification_title">{{ $experience->position }}</h3>
                                    <span class="qualification_subtitle">{{ $experience->company }}</span>
                                    <div class="qualificaation_calender">
                                        <i class="uil uil-calender-alt"></i>
                                        {{ $experience->period }}
                                    </div>
                                </div>

                            </div>
                        @endif
                    @endforeach
                    <!--============= QUALIFICATION 2 ===========-->
                </div>
            </div>
        </div>
    </section>
    <!--==================== SERVICES ====================-->
    <section class="services section" id="services">
        <h2 class="section__title">Services</h2>
        <span class="section__subtitle">What is offer</span>

        <div class="services_container container grid">
            @foreach ($services as $service)
                <div class="services_content">
                    <div>
                        <i class="{{ $service->icon }} services_icon"></i>
                        <h3 class="services_title">{{ $service->name }}</h3>
                    </div>
                    <span class="button button--flex button--small button--link services_button">
                        View More
                        <i class="uil uil-arrow-right button_icon"></i>
                    </span>

                    <div class="services_modal ">
                        <div class="services_modal-content">
                            <h4 class="services_modal-title">{{ $service->name }}</h4>
                            <i class="uil uil-times services_modal-close"></i>

                            <ul class="services_modal-services grid">
                                <li class="services_modal-service">
                                    <i class="uil uil-check-circle services_modal-icon"></i>
                                    <p>{{ $service->description }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
            <!--============== SERVICES 1 =============-->


        </div>
    </section>

    <!--==================== PORTFOLIO ====================-->
    <section class="portfolio section" id="portfolio">
        <h2 class="section__title">Portfolio</h2>
        <span class="section__subtitle">Most recent work</span>

        <div class="portfolio_container container swiper-container">
            <div class="swiper-wrapper">
                @foreach ($projects as $project)
                    <!--============ PORTFOLIO 1 ==============-->
                    <div class="portfolio_content grid swiper-slide" style="height:320px;width:320px;">
                        <div class="image">
                            @if ($project->image)
                                <img src="{{ $project->image }}" loading="lazy"  alt="" class="portfolio_img">
                            @else
                                <img src="{{ asset('template/assets/img/portfolio1.jpeg') }}" alt=""
                                    class="portfolio_img">
                            @endif
                        </div>

                        <div class="portfolio_data">
                            <h3 class="portfolio_title">{{ $project->title }}</h3>
                            <p class="portfolio_description">
                                {{ $project->description }}
                            </p>
                            <a href="{{ $project->link }}" class="button button--flex button--small portfolio_button">
                                Demo
                                <i class="uil uil-arrow-right button__icon"></i>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

            <!--Add Arrow-->
            <div class="swiper-button-next">
                <i class="uil uil-angle-right-b swiper-portfolio-icon"></i>
            </div>
            <div class="swiper-button-prev">
                <i class="uil uil-angle-left-b swiper-portfolio-icon"></i>
            </div>
            <!--Add Pagination-->
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <!--==================== TESTIMONIAL ====================-->
    <section class="testimonial section">
        <h2 class="section__title">Testimonial</h2>
        <span class="section__subtitle">My client saying</span>

        <div class="testimonial_container container swiper-container">
            <div class="swiper-wrapper">
                @foreach ($testimonials as $testimonial)
                    <!--========= TESTIMONIAL 1 ==========-->
                    <div class="testimonial_content swiper-slide">
                        <div class="testimonial_data">
                            <div class="testimonial_header">
                                @if (!empty($testimonial->image))
                                    <img src="{{ $testimonial->image }}" loading="lazy"  alt="" class="testimonial_img">
                                @else
                                    <img src="{{ asset('template/assets/img/avatar.png') }}" alt="">
                                @endif
                                <div>
                                    <h3 class="testimonial_name">{{ $testimonial->name }}</h3>
                                    <span class="testimonial_client">{{ $testimonial->function }}</span>
                                </div>
                            </div>

                            <div>
                                {!! str_repeat('<i class="uil uil-star testimonial_icon-star"></i>', (int) $testimonial->rating) !!}

                            </div>
                        </div>
                        <p class="testimonial_description">
                            {{ $testimonial->testimony }}
                        </p>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination swiper-pagination-testimonial"></div>
        </div>
    </section>

    <!--==================== CONTACT ME ====================-->
    <section class="contact section" id="contact">
        <h2 class="section__title">Contact Me</h2>
        <span class="section__subtitle">Get in touch</span>

        <div class="contact_container container grid">
            <div>
                <div class="contact_information">
                    <i class="uil uil-phone contact_icon"></i>

                    <div>
                        <h3 class="contact_title">Call Me</h3>
                        <span class="contact_subtitle">{{ $about->phone }}</span>
                    </div>
                </div>
                <div class="contact_information">
                    <i class="uil uil-envelope contact_icon"></i>

                    <div>
                        <h3 class="contact_title">Email</h3>
                        <span class="contact_subtitle">{{ $about->email }}</span>
                    </div>
                </div>
                <div class="contact_information">
                    <i class="uil uil-map-marker contact_icon"></i>

                    <div>
                        <h3 class="contact_title">Location</h3>
                        <span class="contact_subtitle">{{ $about->address }}</span>
                    </div>
                </div>
            </div>

            

            <form action="{{ route('contact.store') }}" method="POST" class="contact_form grid">
                @if (session('success'))
                    <div style="color: green;">{{ session('success') }}</div>
                @endif
                @csrf
                <div class="contact_inputs grid">
                    <div class="contact_content">
                        <input type="text" name="name" class="contact_input" value="{{ old('name') }}" placeholder="Name"
                            required>
                    </div>
                    <div class="contact_content">
                        <input type="email" name="email" class="contact_input" value="{{ old('email') }}" placeholder="Email"
                            required>
                    </div>
                    <div class="contact_content">
                        <input type="tel" name="phone" class="contact_input" value="{{ old('phone') }}" placeholder="Phone Number" required>

                    </div>
                </div>
                <div class="contact_content">
                    <input type="text" name="subject" class="contact_input" value="{{ old('subject') }}" placeholder="Subject" required> 
                </div>
                <div class="contact_content">
                    <textarea name="description" rows="7" class="contact_input" required placeholder="Description">{{ old('description') }}</textarea>
                </div>
                <div>
                    <button type="submit" class="button button--flex">
                        Send Message
                        <i class="uil uil-message button_icon"></i>
                    </button>
                </div>
            </form>

            


        </div>
    </section>
@endsection
