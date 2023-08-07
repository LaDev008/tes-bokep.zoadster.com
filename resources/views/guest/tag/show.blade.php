@extends('layouts.mainlayout')
@section('title', 'Tag Based')
@section('content')
    <div class="col-12 d-flex flex-column gap-3">
        <h1>Videos On {{ $tag->name }} Tag</h1>
        @if ($tag->videos->count() == 0)
            {{-- <h3 class="text-center">Belum Ada Video Dengan Kategori {{ $tag->name }}</h3> --}}
            <h3 class="text-center">Can't Find Videos With {{ $tag->name }} Tag</h3>
        @else
            <div class="row g-0 d-flex flex-wrap">
                @foreach ($tag->videos as $item)
                    <div class="col-lg-3 p-1">
                        <livewire:thumbnail-display :video="$item">
                    </div>
                @endforeach
            </div>
            <div class="separator"></div>
        @endif

        @foreach ($other_tag as $item)
            @if ($item->count > 0)
                <h1>Videos On {{ $item->name }} Tag</h1>
                <div class="row g-0 d-flex flex-wrap">
                    @foreach ($item->videos as $data)
                        <div class="col-lg-3 p-1">
                            <livewire:thumbnail-display :video="$data">
                        </div>
                    @endforeach
                </div>
                <div class="separator"></div>
            @endif
        @endforeach
    </div>
@endsection
