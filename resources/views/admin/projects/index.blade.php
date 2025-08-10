@extends('layouts.admin.base')
@section('content')
    <section class="projects" id="projects">
        <div class="titlebar">
            <h1>Projects </h1>
            <a href="{{ route('admin.projects.create') }}">
                <button class="btn__open--modal">New Project</button></a>
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
            

            <div class="project_table-heading">
                <p>Image</p>
                <p>Title</p>
                <p>Description</p>
                <p>Link</p>
                <p>Actions</p>
            </div>
            <!-- item 1 -->
            @foreach ($projects as $project)
                <div class="project_table-items">
                    <p>
                        @if ($project->image)
                            <img src="{{  $project->image }}" alt="" class="project_img-list">
                        @else
                            <img src="{{ asset('template/assets/img/no-image.png') }}" alt=""
                                class="project_img-list">
                        @endif
                    </p>
                    <p>{{ $project->title }}</p>
                    <p>{{ $project->description }}</p>
                    <p>{{ $project->link }}</p>
                    <div>
                        <a href="{{ route('admin.projects.edit', $project->id) }}" style="text-decoration: none">
                            <button class="btn success">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </a>
                        <form id={{ $project->id }} action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline">
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
