@extends('layouts.adminlayout')
@section('title', 'Daftar Kategori Negara')
@section('content')
    <div class="col-12 px-2">
        @if (session()->has('message'))
            <livewire:flash-message status="{{ session('status') }}" message="{{ session('message') }}" />
        @endif
        <div class="py-4">
            <h1 class="text-center">Daftar Kategori Negara</h1>
            <livewire:admin.new-button routeName="countries.create" />
        </div>

        <table class="table table-hover table-stripted table-dark text-center align-middle table-bordered">
            <thead>
                <tr>
                    <th>No.</th>
                    <th class="w-75">Nama Negara</th>
                    <th>Click Count</th>
                    <th>Click Count (Bulan Ini)</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->popularity }}</td>
                        <td>{{ $item->clicked_today }}</td>
                        <td>
                            <livewire:admin.edit-button routeName="countries.edit" routeId="{{ $item->id }}" />
                        </td>
                        <td>
                            <form action="{{ route('countries.destroy', $item->id) }}" method="post">@csrf
                                @method('delete') <button class="btn btn-danger"
                                    onclick="return confirm('YAKIN INGIN HAPUS NEGARA INI ?')">HAPUS</button></form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
