@extends('layouts.adminlayout')
@section('title', 'Edit User {{ $user->name }}')
@section('content')
    <div class="col-12 d-flex h-100 justify-content-center align-items-center">
        <form action="{{ route('users.update', $user->id) }}" class="col-8 mx-auto rounded-lg d-flex flex-column gap-3"
            method="post">
            @csrf
            @method('put')
            <h1 class="text-center">Edit User {{ $user->name }}</h1>

            <div class="input-group">
                <label for="name" class="input-group-text">Nama User</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>

            <div class="input-group">
                <label for="username" class="input-group-text">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ $user->username }}">
            </div>

            <div class="input-group">
                <label for="password" class="input-group-text">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="input-group">
                <label for="role_id" class="input-group-text">Role</label>
                <select name="role_id" id="role_id" class="form-select">
                    <option hidden>--- Silahkan Pilih Role User ---</option>

                    @foreach ($roles as $role)
                        @if ($role->id == $user->role_id)
                            <option value="{{ $role->id }}" selected>{{ $role->name }}</option>
                        @else
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col-12 d-flex gap-3 justify-content-center">
                <button class="col-3 btn btn-primary">Change</button>
                <a href="{{ route('users.index') }}" class="col-3"><button class="btn btn-danger col-12"
                        type="button">Cancel</button></a>
            </div>
        </form>
    </div>
@endsection
