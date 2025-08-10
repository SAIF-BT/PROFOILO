@extends('layouts.admin.base')
@section('content')
    <section class="testimonials" id="projects">
        <div class="titlebar">
            <h1>Testimonials </h1>
            <a href="{{ route('admin.testimonials.create') }}">
                <button class="btn__open--modal">New Testimonial</button>
            </a>
        </div>
        @include('includes.flash_messages')
        <div class="table">

            <div class="table-filter">
                <div>
                    <ul class="table-filter-list">
                        <li>
                            <p class="table-filter-link link-active">All</p>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="testimonial_table-heading">
                <p>Photo</p>
                <p>name</p>
                <p>Function</p>
                <p>Testimony</p>
                <p>Rating</p>
                <p>Actions</p>
            </div>
            <!-- item 1 -->
            @foreach ($testimonials as $testimonial)
                <div class="testimonial_table-items">
                    @if ($testimonial->image)
                        <p>
                            <img src="{{ $testimonial->image }}" alt=""
                                class="testimonial_img-list">
                        </p>
                    @else
                        <img src="{{ asset('template/assets/img/avatar.jpg') }}" alt="">
                    @endif

                    <p>{{ $testimonial->name }}</p>
                    <p>{{ $testimonial->function }}</p>
                    <p>{{ $testimonial->testimony }}</p>
                    <p>{{ $testimonial->rating }}</p>
                    <div>
                        <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}">
                            <button class="btn success">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </a>
                        <form id={{ $testimonial->id }} action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
                            method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn-icon danger" onclick="return confirm('Confirm delete?')">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>

                    </div>
                </div>
            @endforeach

        </div>
    </section>
@endsection
