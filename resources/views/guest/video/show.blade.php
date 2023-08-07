@extends('layouts.mainlayout')
@section('title', 'Nonton Video')
@section('content')
    <div class="col-12 d-flex flex-column gap-2">
        <div class="row g-0 d-flex gap-lg-0 gap-2">
            <img src="https://via.placeholder.com/360x80" alt="" class=" col-lg-6 px-lg-1">
            <img src="https://via.placeholder.com/360x90" alt="" class=" col-lg-6 px-lg-1">
        </div>
        <div class="row g-0 d-flex gap-lg-0 gap-2">
            <img src="https://via.placeholder.com/360x80" alt="" class=" col-lg-6 px-lg-1">
            <img src="https://via.placeholder.com/360x90" alt="" class=" col-lg-6 px-lg-1">
        </div>

        <div class="row g-0 d-flex flex-wrap justify-content-center">
            <div class="col-lg-6">
                <livewire:video-display :item="$video">
            </div>
        </div>

        <div class="row g-0 d-flex gap-lg-0 gap-2">
            <img src="https://via.placeholder.com/360x80" alt="" class=" col-lg-6 px-lg-1">
            <img src="https://via.placeholder.com/360x90" alt="" class=" col-lg-6 px-lg-1">
        </div>
    </div>
@endsection
