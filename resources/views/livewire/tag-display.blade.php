<div class="row g-0">
    <div class="col-12 py-3 py-lg-0">
        <h1>{{ $item->name }}</h1>
        <div class="separator"></div>
    </div>

    <div class="col-12 d-flex flex-wrap">
        @foreach ($item->videos as $data)
            <div class="col-lg-3 p-2 col-6">
                <livewire:thumbnail-display :video="$data">
            </div>
        @endforeach
    </div>
</div>
