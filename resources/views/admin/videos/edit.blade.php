@extends('layouts.adminlayout')
@section('title', 'Edit')
@section('content')
    <div class="col-12 d-flex justify-content-center align-items-center h-100">
        <livewire:admin.video.edit :item="$video">
    </div>
@endsection
