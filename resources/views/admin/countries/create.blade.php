@extends('layouts.adminlayout')
@section('title', 'Buat Kategori Negara Baru')
@section('content')
    <div class="col-12 d-flex justify-content-center align-items-center h-100">
        <form action="{{ route('countries.store') }}" method="post"
            class="rounded-3 p-5 bg-dark d-flex align-items-center flex-column gap-3 text-light w-50">
            @csrf
            <h1>BUAT KATEGORI NEGARA BARU</h1>
            <div class="input-group">
                <label for="name" class="input-group-text ">NAMA KATEGORI NEGARA</label>
                <input type="text" class="form-control" id="name" name="name" required autofocus>
            </div>
            @error('name')
                <x-error-message :message="$message" />
            @enderror

            <div class="w-100 d-flex gap-3 justify-content-center">
                <button class="btn btn-primary w-25" type="submit">SUBMIT</button>
                <a href="{{ route('countries.index') }}" class="w-25"><button class="btn btn-danger w-100"
                        type="button">CANCEL</button></a>
            </div>
        </form>
    </div>
@endsection
