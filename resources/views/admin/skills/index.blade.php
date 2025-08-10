@extends('layouts.admin.base')
@section('content')
    <section class="skills" id="skills">
        <div class="titlebar">
            <h1>Skills </h1>
            <button class="open-modal">New Skill</button>
        </div>
        @include('admin.skills.create')

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
            <form method="DEt" action="{{ route('admin.skills.index') }}">
                <div class="table-search">
                    <div>
                        <select class="search-select" name="" id="">
                            <option value="">Filter Skills</option>
                        </select>
                    </div>
                    <div class="relative">
                        <input class="search-input" type="text" name="search" placeholder="Search Skill..."
                            value={{ request('search') }}>
                    </div>
                </div>
            </form>
            <div class="skill_table-heading">
                <p>Name</p>
                <p>Proficiency</p>
                <p>Service</p>
                <p>Actions</p>
            </div>
            <!-- item 1 -->
            @foreach ($skills as $skill)
            <div class="skill_table-items">
                    <p>{{ $skill->name }}</p>
                    <div class="table_skills-bar">
                        <span class="table_skills-percentage" style="width: {{ $skill->proficiency }}%;"></span>
                        <strong>{{ $skill->proficiency }}%</strong>
                    </div>
                    @if ($skill->service)
                        <p>{{ $skill->service->name }}</p>
                    @else
                        <p></p>
                    @endif
                    <div>
                        <button class="btn-icon success open-modal" data-target="#edit-skill-{{ $skill->id }}">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <form id="{{ $skill->id }}" method="POST" action="{{ route('admin.skills.destroy', $skill->id) }}" style="display: inline">
                            @csrf
                            @method('DELETE')
                        <button class="btn-icon danger" onclick="return confirm('Confirm Delete')">
                            <i class="far fa-trash-alt"></i>
                        </button>
                        </form>
                    </div>

                    {{-- EDIT MODAL for this skill --}}
                    
                </div>
                @include('admin.skills.edit')
            @endforeach

            <div class="table-paginate">
                {{ $skills->links('includes.pagination') }}
            </div>
        </div>


        <!-------------- SKILLS MODAL --------------->
    </section>
@endsection
