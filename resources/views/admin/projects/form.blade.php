<section class="about" id="project">
        <div class="titlebar">
        <h2>{{ $formMode === 'edit' ? 'Edit Project' : 'Create Project' }}</h2>

        </div>
        <div class="card-wrapper">
            <div class="wrapper_left">
                <div class="card">
                    <label>Title</label>
                    {!! $errors->first('title', '<p class="alert">:message</p>') !!}
                    <input type="text" name="title" required value="{{ isset($project->title) ? $project->title : '' }}"/>

                    <label>Description</label>
                    {!! $errors->first('description', '<p class="alert">:message</p>') !!}
                    <textarea cols="10" rows="5" name="description" required> {{ isset($project->description) ? $project->description : '' }}</textarea>

                    <label>Link</label>
                    <input type="text" name="link" value="{{ isset($project->link) ? $project->link : '' }}"/>
                </div>
            </div>

            <div class="wrapper_right">
                <div class="card">
                    <img src="{{ !empty($project->image) ?$project->image  : asset('../../template/assets/img/no-image.png') }}" loading="lazy"  alt="" class="project_img" id="file-preview-image">
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