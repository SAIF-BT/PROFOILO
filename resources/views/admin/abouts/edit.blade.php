@extends('layouts.admin.base')
@section('content')
<section class="setting" id="setting">
    <div class="setting-wrapper">
        <div class="settin_nav" style="max-width: 100px"></div>
        <div class="setting_content">
            <section class="about" id="about">
                <form method="POST" action="{{ route('abouts.update', $about->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @include('admin.abouts.form',['formMode' => 'edit'])
                </form>
                
                
            </section>
        </div>
    </div>
</section>
@endsection