@extends('admin.adminHome')
@section('content')
<form action="/process-acc" method="post">
    <div class="form-group">
        <label for="username">Username </label>
        <input type="text" name="username" id="username">
    </div>
    <div class="form-group">
        <label for="password">Password </label>
        <input type="text" name="password" id="password">
    </div>
    <div class="form-group">
        <label for="role">Role </label>
        <input type="text" name="role" id="role">
    </div>
    <div class="form-group">
        
        <input type="submit" name="btn_submit" id="btn_submit">
    </div>
</form>
@endsection