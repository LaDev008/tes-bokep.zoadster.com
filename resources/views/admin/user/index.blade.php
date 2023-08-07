@extends('layouts.adminlayout')
@section('title', 'User List')
@section('content')
    <div class="col-12 ">
        <div class="col-12 position-relative">
            <h1 class="text-center">USER LIST</h1>

            <livewire:admin.new-button routeName="users.create">
        </div>

        <table class="table table-hover table-striped table-dark table-bordered align-middle text-center">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->role->name }}</td>
                        <td><a href="{{ route('users.edit', $user->id) }}"><button class="btn btn-warning">EDIT</button></a>
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="post">@csrf @method('delete')
                                <button class="btn btn-danger"
                                    onclick="return confirm('Yakin Ingin Hapus ?')">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
