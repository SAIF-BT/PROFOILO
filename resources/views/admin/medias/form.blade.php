<form method="POST" action="{{ route('medias.store') }}">
    @csrf
<div class="social_table-heading">
    <p>Link</p>
    <span style="color:#006fbb;">(Find your icon class: Font Awesome)</span>
    <p></p>
</div>
<p></p>
<div class="social_table-items">
    
    {!! $errors->first('link','<p class="alert">:message</p>') !!}
    <input type="text" name="link" required>
    {!! $errors->first('icon','<p class="alert">:message</p>') !!}
    <input type="text" name="icon" required>
    <button>
        Add Media
    </button>
</div>
</form>