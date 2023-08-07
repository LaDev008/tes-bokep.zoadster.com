@extends('layouts.adminlayout')
@section('title', 'Tambah User Baru')
@section('content')
    <div class="col-12 d-flex h-100 justify-content-center align-items-center">
        <form action="{{ route('users.store') }}" class="col-8 mx-auto rounded-lg d-flex flex-column gap-3" method="post">
            @csrf
            <h1 class="text-center">Tambah User Baru</h1>

            <div class="input-group">
                <label for="name" class="input-group-text">Nama User</label>
                <input type="text" class="form-control" id="name" name="name" required autofocus>
            </div>

            <div class="input-group">
                <label for="username" class="input-group-text">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>

            <div class="input-group">
                <label for="password" class="input-group-text">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="input-group">
                <label for="role_id" class="input-group-text">Role</label>
                <select name="role_id" id="role_id" class="form-select">
                    <option hidden>--- Silahkan Pilih Role User ---</option>

                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 d-flex gap-3">
                <button class="col-3 btn btn-primary">Create</button>
                <a href="{{ route('users.index') }}" class="col-3"><button class="btn btn-danger"
                        type="button">Cancel</button></a>
            </div>
        </form>
    </div>
@endsection
