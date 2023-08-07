<div class="col-12">
    <style>
        .clamped {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
    <video src="{{ $item->link }}" controls width="100%" style="margin: auto"></video>
    <label class="text-white mt-2 fs-5 clamped">{{ $item->title }}</label>
</div>
