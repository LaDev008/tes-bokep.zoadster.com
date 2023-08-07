@extends('layouts.adminlayout')
@section('title', 'Tag List')
@section('content')
    <div class="col-12">
        <div class="position-relative col-12">
            <h1 class="text-center">Tag List</h1>
            <livewire:admin.new-button routeName="tags.create">
        </div>

        <table class="table table-dark table-hover table-bordered table-striped text-center align-middle">
            <thead>
                <tr>
                    <th>No.</th>
                    <th class="col-8">Nama</th>
                    <th>Click Count</th>
                    <th>Click Count (Bulan Ini)</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->popularity }}</td>
                        <td>{{ $item->clicked_today }}</td>
                        <td><a href="{{ route('tags.edit', $item->id) }}"><button class="btn btn-warning"
                                    type="button">EDIT</button></a></td>
                        <td>
                            <form action="{{ route('tags.destroy', $item->id) }}" method="post">@csrf @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('Yakin Ingin Hapus?')">HAPUS</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
