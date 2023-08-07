@extends('layouts.adminlayout')
@section('title', 'Buat Tag Baru')
@section('content')
    <div class="col-12 d-flex justify-content-center align-items-center h-100">
        <form action="{{ route('tags.store') }}" method="post" class="col-9 d-flex align-items-center flex-column">
            @csrf
            <h1>Tambah Tag Baru</h1>

            <div class="mt-4 input-group">
                <label for="name" class="input-group-text">NAMA TAG</label>
                <input type="text" class="form-control" id="name" required autofocus name="name">
            </div>

            <div class="col-12 mt-4 d-flex justify-content-center gap-3">
                <button class="btn btn-primary col-3 " type="submit">Submit</button>

                <a href="{{ route('tags.index') }}" class="col-3"><button class="btn btn-danger col-12"
                        type="button">Cancel</button></a>
            </div>
        </form>
    </div>
@endsection
