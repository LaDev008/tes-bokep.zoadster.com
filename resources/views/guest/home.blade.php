@extends('layouts.mainlayout')
@section('title', 'Home')
@section('content')
    <div class="col-12 d-flex flex-column gap-3">
        <form class="d-flex mt-3 mt-lg-0 d-lg-none">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>


        <div class="row g-0">
            <div class="col-12 d-flex flex-wrap">
                @foreach ($videos as $item)
                    <div class="col-12 col-lg-2 p-1">
                        <livewire:thumbnail-display :video="$item">
                    </div>
                @endforeach
            </div>
        </div>

        @foreach ($categories as $item)
            @if ($item->videos->count() > 0)
                <livewire:guest.categories-display :item="$item">
            @endif
        @endforeach

        <div class="d-flex flex-wrap justify-content-around gap-2">
            @foreach ($tags as $item)
                <a href="{{ route('tag.show', $item->slug) }}">
                    <button class="pill-button">
                        {{ $item->name }}
                    </button>
                </a>
            @endforeach
        </div>
    </div>

@endsection
