<div class="modal ">
    <div class="modal-content">
        <h2>{{ $formMode == 'edit' ? 'Edit User' : 'Create User' }}</h2>

        <span class="close-modal">×</span>
        <hr>
        <div>
            <label>Name</label>
            <input type="text" name="name" value="{{ isset($user->name) ? $user->name : '' }}" required/>

            <label>Email</label>
            <input type="text" name="email" value="{{ isset($user->email) ? $user->email : '' }}" required/>

            <label>Bio</label>
            <textarea cols="20" rows="3" name="bio" required>{{ isset($user->bio) ? $user->bio : '' }} </textarea>


            <label>Password (Leave empty if don't wanna change)</label>
            <input type="password" id="password" name="password">
        </div>
        <hr>
        <div class="modal-footer">
            <button class="close-modal">
                Cancel
            </button>
            <button class="secondary close-modal">
                <span><i class="fa fa-spinner fa-spin"></i></span>
            {{ $formMode == 'edit' ? 'Update' : 'Save' }}

            </button>
        </div>
    </div>
</div>
