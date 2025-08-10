@extends('layouts.admin.base')
@section('content')
<section class="messages">
      <div class="messages_container">
        <div class="titlebar">
          <h1>Messages </h1>
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
          <div class="table-search">
            <div>
              <select class="search-select" name="" id="">
                <option value="">Filter Message</option>
              </select>
            </div>
            <div class="relative">
              <input class="search-input" type="text" name="search" placeholder="Search Message...">
            </div>
          </div>

          <div class="message_table-heading">
            <p>Name</p>
            <p>Email</p>
            <p>Subject</p>
            <p>Description</p>
            <p>Status</p>
            <p>Actions</p>
          </div>
          <!-- item 1 -->
          @foreach ($messages as $message)
             <div class="message_table-items">
            <p>
              <a href="{{ route('admin.messages.edit', $message->id) }}" style="text-decoration: underlined;color:blue">
                {{ $message->name }}
              </a>
            </p>
            <p>{{ $message->email }}</p>
            <p>{{ $message->subject }}</p>
            <p>{{ $message->description }}</p>
            <p class="{{ $message->status ? 'badge_read' : 'badge_unread' }}">{{ $message->status ? 'Read' : 'Unread' }}</p>
            
            <div>
              <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" id={{ $message->id }}>
                @csrf
                @method('DELETE')
                <button class="btn danger" onclick="return confirm('Confirm delete?')">
                  <i class="far fa-trash-alt"></i>
                </button>
              </form>
            </div>
          </div> 
          @endforeach
          

        </div>
      </div>
    </section>
@endsection