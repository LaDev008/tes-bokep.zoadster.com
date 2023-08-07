@extends('layouts.adminlayout')
@section('title', 'Edit Tag {{ $tag->name }}')
@section('content')
    <div class="col-12 d-flex justify-content-center align-items-center h-100">
        <form action="{{ route('tags.update', $tag->id) }}" method="post" class="col-6">
            @csrf
            @method('put')
            <h1 class="text-center">Edit Tag {{ $tag->name }}</h1>

            <div class="mt-4 input-group">
                <label for="name" class="input-group-text">NAMA TAG</label>
                <input type="text" class="form-control" id="name" required value="{{ $tag->name }}" name="name">
            </div>

            <div class="col-12 mt-4 d-flex justify-content-center gap-3">
                <button class="btn btn-primary col-3 " type="submit">Change</button>

                <a href="{{ route('tags.index') }}" class="col-3"><button class="btn btn-danger col-12"
                        type="button">Cancel</button></a>
            </div>
        </form>
    </div>
@endsection
