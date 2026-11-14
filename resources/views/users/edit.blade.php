@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit User</h1>

    <form action="{{ route('users.update', $user) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username"
                   class="form-control @error('username') is-invalid @enderror"
                   value="{{ old('username', $user->username) }}">
            @error('username')
                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" name="full_name" id="full_name"
                   class="form-control @error('full_name') is-invalid @enderror"
                   value="{{ old('full_name', $user->full_name) }}">
            @error('full_name')
                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="avatar" class="form-label">Profile Picture (Max 2MB)</label>
            <div style="margin-bottom: 0.5rem;">
                <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : 'data:image/svg+xml;utf8,<svg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2280%22 viewBox=%220 0 80 80%22><rect width=%2280%22 height=%2280%22 fill=%22%23cccccc%22/><text x=%2250%25%22 y=%2255%25%22 dominant-baseline=%22middle%22 text-anchor=%22middle%22 font-family=%22sans-serif%22 font-size=%2216%22 fill=%22%23555555%22>User</text></svg>' }}"
                     alt="Avatar" width="80" height="80"
                     style="border-radius: 50%; object-fit: cover;">
            </div>
            <input type="file" name="avatar" id="avatar" accept="image/*"
                   class="form-control @error('avatar') is-invalid @enderror">
            @error('avatar')
                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update User</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection