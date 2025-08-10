<div class="titlebar">
        <h1>About Me</h1>
        <button class="secondary">
            {{ $formMode === "edit" ? "Update Changes" : '' }}
        </button>
    </div>
    @include('includes.flash_messages')
    <div class="card-wrapper">
        <div class="wrapper_left">
            <div class="card" >
                <label>Full Name</label>
                <input type="text" value="{{old('name',$about->name?? '') }}" name="name">
                {!! $errors->first('name','<p class="alert">:message</p>') !!}
                <label>Email</label>
                <input type="email" name="email" value="{{old('email',$about->email?? '') }}">
                {!! $errors->first('email','<p class="alert">:message</p>') !!}

                <label>Phone</label>
                <input type="text" name="phone" value="{{old('phone',$about->phone?? '')}}">
                {!! $errors->first('phone','<p class="alert">:message</p>') !!}

                <label>Address</label>
                <input type="text" name="address" value="{{old('address',$about->address?? '') }}">
                <label>Contact Section Tagline</label>
                <textarea cols="10" rows="3" name="description"  >{{old('description',$about->description?? '') }}</textarea>
                <label>Summary</label>
                <textarea cols="10" rows="2" name="summary"  >{{old('summary',$about->summary?? '')}}</textarea>
            </div>
            <div class="card">
                <label>Tagline</label>
                <input type="text" name="tagline" value="{{old('tagline',$about->tagline?? '') }}">
            </div>
            
        </div>
        <div class="wrapper_right">
            <div class="card">
                {{ \Log::info($about->home_image) }}
                <img src="{{ $about->home_image ? $about->home_image :asset("template/assets/img/avatar.jpg")}}" loading="lazy"  class="avatar_img" id="homeImage-preview" >
                <input accept="image/*" name="home_image" type="file"  onchange="showHomeImageFile(event)">  
            </div>
            <div class="card">
                <img  src="{{ ($about->banner_image) ? $about->banner_image :asset("template/assets/img/avatar.jpg")}}" loading="lazy"  class="avatar_img" id="bannerImage-preview">
                <input accept="image/*" name="banner_image" type="file"  onchange="showBannerImageFile(event)">  
            </div>
            <div class="card">
                <p>CV</p>
                <input type="text" value="{{old('cv',$about->cv?? '') }}" name="cv" placeholder="CV link">
            </div>     
        </div>
    </div>
    <script>
        function showHomeImageFile(event) {
            var input = event.target;
            var reader = new FileReader;
            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('homeImage-preview');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0])
        }
        function showBannerImageFile(event) {
            var input = event.target;
            var reader = new FileReader;
            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('bannerImage-preview');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0])
        }
    </script>