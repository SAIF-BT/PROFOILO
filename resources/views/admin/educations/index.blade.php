@extends('layouts.admin.base')
@section('content')
    <section class="educations" id="educations">
        <div class="titlebar">
            <h1>Educations </h1>
            <button class="open-modal">New Education</button>
        </div>
        @include('admin.educations.create')
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
                        <option value="">Filter Education</option>
                    </select>
                </div>
                <div class="relative">
                    <input class="search-input" type="text" name="search" placeholder="Search Education...">
                </div>
            </div>

            <div class="education_table-heading">
                <p> <strong> Institution </strong></p>
                <p> <strong> Period </strong></p>
                <p> <strong> Degree </strong></p>
                <p> <strong> Department </strong></p>
                <p> <strong> Actions </strong></p>
            </div>
            <!-- item 1 -->
            @foreach ($educations as $education)
                <div class="education_table-items">
                    <p>{{ $education->institution }}</p>
                    <p>{{ $education->period }}</p>
                    <p>{{ $education->degree }}</p>
                    <p>{{ $education->department }}</p>
                    <div>
                        <button class="btn-icon success open-modal">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        
                        <form id="{{ $education->id }}" method="POST" action="{{ route('admin.educations.destroy', $education->id) }}" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn-icon danger" onclick="return confirm('Confirm delete?')" >
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
                @include('admin.educations.edit')
            @endforeach

        </div>
        <!-------------- EDUCATION MODAL --------------->

    </section>
@endsection
