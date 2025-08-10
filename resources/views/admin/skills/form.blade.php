<div class="modal ">
    <div class="modal-content">
        <h2>{{ $formMode === 'edit' ? 'Edit Skill' : 'Create Skill' }}</h2>
        <span class="close-modal">×</span>
        <hr>
        <div>
            <p>Name</p>
            <input type="text" class="input" name="name" value="{{ isset($skill->name) ? $skill->name : '' }}" required/>

            <p>Proficiency</p>
            <input type="text" class="input" name="proficiency"
                value="{{ isset($skill->proficiency) ? $skill->proficiency : '' }}" required/>

            <p>Service</p>
            <select class="inputSelect" name="service_id">
                @foreach ($services as $service)
                    <option value="{{ $service->id }}"
                        {{ isset($skill->service_id) && $skill->service_id == $service->id ? 'selected' : '' }}>
                        {{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        <hr>
        <div class="modal-footer">
            <button class="close-modal">
                Cancel
            </button>
            <button class="secondary close-modal">
                <span><i class="fa fa-spinner fa-spin"></i></span>
                <h2>{{ $formMode === 'edit' ? 'Update' : 'Save' }}</h2>
            </button>
        </div>
    </div>
</div>
