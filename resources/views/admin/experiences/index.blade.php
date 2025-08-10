@extends('layouts.admin.base')
@section('content')
    <section class="experiences" id="experiences">
        <div class="titlebar">
            <h1>Experiences </h1>
            <button class="open-modal">New Experience</button>
        </div>
        @include('admin.experiences.create')
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
            <div class="table-search">
                <div>
                    <select class="search-select" name="" id="">
                        <option value="">Filter Experience</option>
                    </select>
                </div>
                <div class="relative">
                    <input class="search-input" type="text" name="search" placeholder="Search Experience...">
                </div>
            </div>
            <div class="experience_table-heading">
                <p>Company</p>
                <p>Period</p>
                <p>Position</p>
                <p>Actions</p>
            </div>
            <!-- item 1 -->
            @foreach ($experiences as $experience)
                <div class="experience_table-items">
                    <p>{{ $experience->company }}</p>
                    <p>{{ $experience->period }}</p>
                    <p>{{ $experience->position }}</p>
                    <div>
                        <button class="btn-icon success open-modal">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <form id="{{ $experience->id }}" method="POST"
                            action="{{ route('admin.experiences.destroy', $experience->id) }}" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn-icon danger" onclick="return confirm('Confirm delete?')">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @include('admin.experiences.edit')
            @endforeach

        </div>

        <!-------------- EXPERIENCE MODAL --------------->

    </section>
@endsection
