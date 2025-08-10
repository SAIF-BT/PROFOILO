@extends('layouts.admin.base')

@section('content')
<section class="about">
    <form method="POST" action="{{ route('admin.messages.update_status', $message->id) }}">
        @csrf
        @method('PATCH')

        <div class="titlebar">
            <h1>Edit Message</h1>
        </div>

        <div class="card-wrapper">
            <div class="wrapper_left">
                <div class="card">
                    <label>Title :</label>
                    <p>{{ $message->name }}</p>
                    <br>

                    <label>Email :</label>
                    <p>{{ $message->email }}</p>
                    <br>

                    <label>Phone Number :</label>
                    <p>{{ $message->phone }}</p>
                    <br>

                    <label>Subject :</label>
                    <p>{{ $message->subject }}</p>
                    <br>

                    <label>Description :</label>
                    <p>{{ $message->description }}</p>
                    <br>

                    <div>
                        <label>Status :</label>
                        <div style="display:inline-block; margin-right: 10px;">
                            <label>
                                <input type="radio" name="status" value="1" 
                                    {{ isset($message) && $message->status == 1 ? 'checked' : '' }}>
                                <span>Read</span>
                            </label>
                        </div>
                        <div style="display:inline-block;">
                            <label>
                                <input type="radio" name="status" value="0" 
                                    {{ isset($message) && $message->status == 0 ? 'checked' : '' }}>
                                <span>Unread</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="titlebar">
            <button type="submit">Update Message</button>
        </div>
    </form>
</section>
@endsection
