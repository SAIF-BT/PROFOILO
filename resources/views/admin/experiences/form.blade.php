<div class="modal">
    <div class="modal-content">
        <h2>{{ $formMode === 'edit' ? 'Edit Experience' : 'Create Experience' }}</h2>
        <span class="close-modal">×</span>
        <hr>
        <div>
            <p>Company</p>
            <input type="text" name="company" value="{{ isset($experience->company) ? $experience->company : '' }}" required/>
            {!! $errors->first('company', '<p class="alert">:message</p>') !!}

            <p>Period</p>
            <input type="text" name="period" value="{{ isset($experience->period) ? $experience->period : '' }}" required/>
            {!! $errors->first('period', '<p class="alert">:message</p>') !!}

            <p>Position</p>
            <input type="text" name="position" value="{{ isset($experience->position) ? $experience->position : '' }}" />
            {!! $errors->first('position', '<p class="alert">:message</p>') !!}
        </div>
        <hr>
        <div class="modal-footer">
            <button class="close-modal">Cancel</button>
            <button class="secondary close-modal">
                <span><i class="fa fa-spinner fa-spin"></i></span>
                <h2>{{ $formMode === 'edit' ? 'Update' : 'Save' }}</h2>
            </button>
        </div>
    </div>
</div>
