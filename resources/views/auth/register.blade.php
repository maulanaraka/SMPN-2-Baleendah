@extends('layouts.app')
@section('content')
<form action="{{ route('register') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
    <select name="role" required>
        <option value="user">User</option>
        <option value="admin">Admin</option>
        <option value="editor">Editor</option>
    </select>
    <button type="submit">Register</button>
</form>
@endsection