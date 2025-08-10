@extends('layouts.admin.base')
@section('content')
    <section class="users" id="users">
        <div class="titlebar">
            <h1>Users </h1>
            <button class="open-modal">New User</button>
        </div>
        @include('admin.users.create')
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
            

            <div class="user_table-heading">
                <p>Photo</p>
                <p>Name</p>
                <p>Email</p>
                <p>Bio</p>
                <p>Actions</p>
            </div>
            <!-- item 1 -->
            @foreach ($users as $user)
            <div class="user_table-items">
                <p>
                    @if ($user->image)
                    <img src="{{ asset('images/'.$users->image) }}" alt="" class="user_img-list">
                    @else
                        <img src="{{ asset('template/assets/img/avatar.jpg') }}" alt="" class="user_img-list">
                    @endif
                </p>
                <p>{{ $user->name }}</p>
                <p>{{ $user->email }}</p>
                <p>{{ $user->bio }}</p>
                <div>
                    <button class="btn success open-modal">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    
                    <form  action="{{ route('admin.users.destroy', $user->id) }}"
                        method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn-icon danger" onclick="return confirm('Confirm delete?')">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
            @include('admin.users.edit')

            @endforeach

        </div>
    </section>
    <!-------------- USER MODAL --------------->
    
@endsection
