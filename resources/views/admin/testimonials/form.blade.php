<section class="about">
        <div class="titlebar">
        <h2>{{ $formMode === 'edit' ? 'Edit Testimonial' : 'Create Testimonial' }}</h2>
        </div>
        <div class="card-wrapper">
            <div class="wrapper_left">
                <div class="card">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ isset($testimonial->name) ? $testimonial->name : '' }}" required/>

                    <label>Function</label>
                    <input type="text" name="function" value="{{ isset($testimonial->function) ? $testimonial->function : '' }}" required/>
                    
                    <label>Testimony</label>
                    <textarea cols="10" rows="5" name="testimony">{{ isset($testimonial->testimony) ? $testimonial->testimony : '' }}</textarea>
                    <label>Rating</label>
                    <input type="text" name="rating" name="rating" value="{{ isset($testimonial->rating) ? $testimonial->rating : '' }}" required/>
                </div>
            </div>

            <div class="wrapper_right">
                <div class="card">
                    <img src="{{ !empty($testimonial->image) ? $testimonial->image  : asset('template/assets/img/no-image.png') }}" loading="lazy"  alt="" class="project_img" id="file-preview-image">
                    <input type="file" name="image" accept="image/*" onchange="showImageFile(event)">
                </div>
            </div>

        </div>
        <div class="titlebar">
            <h1></h1>
            <button>{{ $formMode === 'edit' ? 'Update' : 'Save' }}</button>
        </div>
    </section>
    <script>
        function showImageFile(event){
            var input = event.target;
            var reader = new FileReader;
            reader.onload = function() {
                var dataURL = reader.result;
                var output = document.getElementById('file-preview-image');
                output.src = dataURL;
            };
            reader.readAsDataURL(input.files[0])
        }
    </script>