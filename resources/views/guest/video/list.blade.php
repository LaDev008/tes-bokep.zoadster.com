@extends('layouts.mainlayout')
@section('title', 'Video')
@section('content')
    <livewire:banner-display />
    <livewire:banner-display />
    <h1>Most Viewed</h1>
    <div class="col-12 d-flex flex-wrap">
        @foreach ($videos->sortByDesc('views') as $item)
            <div class="col-lg-3 p-2 col-6">
                <livewire:thumbnail-display :video="$item">
            </div>
        @endforeach
    </div>
    <div class="separator"></div>
    <h1>Populer Hari Ini</h1>
    <div class="col-12 d-flex flex-wrap">
        @foreach ($videos->sortByDesc('clicked_today') as $item)
            <div class="col-lg-3 p-2 col-6">
                <livewire:thumbnail-display :video="$item">
            </div>
        @endforeach
    </div>
    <div class="separator"></div>
    <h1>Video Terbaru</h1>
    <div class="col-12 d-flex flex-wrap">
        @foreach ($videos->sortByDesc('created_at') as $item)
            <div class="col-lg-3 p-2 col-6">
                <livewire:thumbnail-display :video="$item">
            </div>
        @endforeach
    </div>
    <div class="separator"></div>
    <livewire:banner-display />
@endsection
