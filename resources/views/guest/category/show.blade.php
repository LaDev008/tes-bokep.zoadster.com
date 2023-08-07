@extends('layouts.mainlayout')
@section('title', 'Category Based')
@section('content')
    <div class="col-12 d-flex flex-column gap-3">
        <h1>Videos On {{ $category->name }} Category</h1>
        @if ($category->videos->count() == 0)
            <h3 class="text-center">Can't Find Videos With {{ $category->name }} Category</h3>
        @endif
        <div class="row g-0">
            @foreach ($category->videos as $item)
                <div class="col-lg-3 p-1">
                    <livewire:thumbnail-display :video="$item">
                </div>
            @endforeach
        </div>
        <div class="separator"></div>
    </div>
@endsection
