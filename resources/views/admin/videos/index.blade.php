@extends('layouts.adminlayout')
@section('title', 'Daftar Video')
@section('content')
    <div class="col-12 px-2">
        @if (session()->has('message'))
            <livewire:flash-message status="{{ session('status') }}" message="{{ session('message') }}" />
        @endif
        <div class="py-4">
            <h1 class="text-center">Daftar Video</h1>
            <livewire:admin.new-button routeName="videos.create" />
        </div>

        <table class="table table-hover table-stripted table-dark text-center align-middle table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th class="w-50">Judul</th>
                    <th>Kategori</th>
                    <th>Negara</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videos as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ $item->link }}" class="text-decoration-none "
                                style="color: lime">{{ $item->title }}</a></td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->country->name }}</td>
                        <td>
                            <livewire:admin.edit-button routeName="videos.edit" routeId="{{ $item->id }}" />
                        </td>
                        <td>
                            <form action="{{ route('videos.destroy', $item->id) }}" method="post">@csrf
                                @method('delete') <button class="btn btn-danger"
                                    onclick="return confirm('YAKIN INGIN HAPUS VIDEO INI ?')">HAPUS</button></form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
