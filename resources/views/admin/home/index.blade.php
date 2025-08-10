@extends('layouts.admin.base')
@section('content')
    <!-- Overview Page -->
    <section class="overview" id="overview">
        <div class="overview_left">
            <div class="titlebar">
                <h1 style="padding-left: 10px;">Overview Dashboard</h1>
            </div>

            <!-- TOP CARDS -->
            <div class="overview_cards ">
                <div class="overview_cards-item card">
                    <div class="overview_data">
                        <p>Skills</p>
                        @if ($skillCount > 0)
                            <span>{{ $skillCount }}</span>
                        @else
                            <span>0</span>
                        @endif
                    </div>
                    <div class="overview_link">
                        <span></span>
                        <a href="{{ route('admin.skills.index') }}">View Skills</a>
                    </div>
                </div>
                <div class="overview_cards-item card">
                    <div class="overview_data">
                        <p>Educations</p>
                        @if ($educationCount > 0)
                            <span>{{ $educationCount }}</span>
                        @else
                            <span>0</span>
                        @endif
                    </div>
                    <div class="overview_link">
                        <span></span>
                        <a href="{{ route('admin.educations.index') }}">View Educations</a>
                    </div>
                </div>
                <div class="overview_cards-item card">
                    <div class="overview_data">
                        <p>Experience</p>
                        @if ($experienceCount > 0)
                            <span>{{ $experienceCount }}</span>
                        @else
                            <span>0</span>
                        @endif
                    </div>
                    <div class="overview_link">
                        <span></span>
                        <a href="{{ route('admin.experiences.index') }}">View Experience</a>
                    </div>
                </div>
                <div class="overview_cards-item card">
                    <div class="overview_data">
                        <p>Service</p>
                        @if ($serviceCount > 0)
                            <span>{{ $serviceCount }}</span>
                        @else
                            <span>0</span>
                        @endif
                    </div>
                    <div class="overview_link">
                        <span></span>
                        <a href="{{ route('admin.services.index') }}">View Services</a>
                    </div>
                </div>
                <div class="overview_cards-item card">
                    <div class="overview_data">
                        <p>Project</p>
                        @if ($projectsCount > 0)
                            <span>{{ $projectsCount }}</span>
                        @else
                            <span>0</span>
                        @endif
                    </div>
                    <div class="overview_link">
                        <span></span>
                        <a href="{{ route('admin.projects.index') }}">View Projects</a>
                    </div>
                </div>
                <div class="overview_cards-item card">
                    <div class="overview_data">
                        <p>Testimonial</p>
                        @if ($testimonialCount > 0)
                            <span>{{ $testimonialCount }}</span>
                        @else
                            <span>0</span>
                        @endif
                    </div>
                    <div class="overview_link">
                        <span></span>
                        <a href="{{ route('admin.testimonials.index') }}">View Testimonials</a>
                    </div>
                </div>
                <div class="overview_cards-item card">
                    <div class="overview_data">
                        <p>Messages</p>
                        @if ($messagesCount > 0)
                            <span>{{ $messagesCount }}</span>
                        @else
                            <span>0</span>
                        @endif
                    </div>
                    <div class="overview_link">
                        <span></span>
                        <a href="{{ route('admin.messages.index') }}">View Messages</a>
                    </div>
                </div>
                <div class="overview_cards-item card">
                    <div class="overview_data">
                        <p>Users</p>
                        @if ($usersCount > 0)
                            <span>{{ $usersCount }}</span>
                        @else
                            <span>0</span>
                        @endif
                    </div>
                    <div class="overview_link">
                        <span></span>
                        <a href="{{ route('admin.users.index') }}">View Users</a>
                    </div>
                </div>




            </div>
            <!-- MEDIUM CARDS -->
            <div class="overview_table ">
                <div>
                    <div class="titlebar">
                        <h1>Latest Projects</h1>
                    </div>
                    <div class="table ui-card">
                        <div class="overview_table-header">
                            <p>Image</p>
                            <p>Project</p>
                        </div>
                        @foreach ($projects as $project)
                        <div class="overview_table-items">
                            <img src="{{ $project->image ?  $project->image : asset('template/assets/img/no-image.png') }}" alt="project Image" />

                            <a href="{{ $project->link }}">{{ $project->title }}</a>
                        </div>
                            
                        @endforeach
                        
                    </div>
                </div>
                <div>
                    <div class="titlebar">
                        <h1>Latest Testimonials</h1>
                    </div>
                    <div class="table">
                        <div class="overview_table-header">
                            <p>Image</p>
                            <p>Name</p>
                            <p>Testimony</p>
                        </div>
                        @foreach ($testimonials as $testimonial)
                            <div class="overview_table-items">
                                @if (!empty($testimonial->image))
                                <img src="{{  $testimonial->image }}" style="height:60px;width:60px;" class="avatar-item"/>
                                @else
                                <img src="{{ asset("template/assets/img/avatar.jpg") }}" style="height:60px;width:60px;" class="avatar-item"/>
                                @endif
                                <a>{{ $testimonial->name }}</a>
                                <a>{{ Str::limit($testimonial->testimony, 40) }}</a>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>


        </div>
        <div class="overview_right">
            <div class="overview_analyse ui-card">
                <canvas id="myChart"></canvas>
            </div>
            <div class="titlebar">
                <h1>Skills</h1>
            </div>
            @foreach ($services as $service)
            <div class="overview_skills">
                <div class="overview_skills-title">
                    <h2>{{ $service->name }}</h2>
                </div>
                @foreach ($service->skills as $skill)
                <div class="skills_data">
                    <div class="skills_titles">
                        <h3 class="skills_name">{{ $skill->name }}</h3>
                        <span class="skills_number">{{ $skill->proficiency }}%</span>
                    </div>
                    <div class="skills_bar">
                        <span class="skills_percentage " style="width: {{ $skill->proficiency }}%"></span>
                    </div>
                </div>
                
                    
                @endforeach
            </div>
                
            @endforeach
            
           
        </div>

    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        function dynamicColors() {
            var r = Math.floor(Math.random() * 255)
            var g = Math.floor(Math.random() * 255)
            var b = Math.floor(Math.random() * 255)
            return "rgba(" + r + "," + g + "," + b + ",0.5)";

        }

        function poolColors(a) {
            var pool = [];
            for (i = 0; i < a; i++) {
                pool.push(dynamicColors())
            }
            return pool;
        }
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                @foreach ($skills as $skill)
                    "{{ $skill->name }}",
                @endforeach
            ],
                datasets: [{
                    label: '# of Skills(%)',
                    backgroundColor: poolColors({{ $skillCount }}),
                    data: [
                        @foreach ($skills as $skill)
                            "{{ $skill->proficiency }}",
                        @endforeach
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
