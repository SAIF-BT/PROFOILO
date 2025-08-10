    <form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        @include('admin.users.form',  ['formMode'=>'edit'])
    </form>
