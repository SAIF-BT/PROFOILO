<form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
    @csrf
    @include('admin.users.form', ['formMode' => 'create'])
</form>