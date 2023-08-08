<div class="row ">
    <style>
        .thumbnail-item {
            color: white;
        }

        .thumbnail-item:hover {
            color: var(--primary-color) !important;

        }

        .thumbnail-container {
            position: relative;
        }

        .duration-text {
            position: absolute;
            left: 2%;
            bottom: 2%;
            background: #00000080;
            color: white;
            padding: 4px;
            border-radius: 5px;
        }

        .thumbnail-image {
            width: 100%;
            aspect-ratio: 4/3;
        }

        @media screen and (max-width: 1400px) {
            .thumbnail-image {
                width: 100%;
                height: auto;
            }

        }
    </style>
    <a href="{{ route('videos.show', $video->slug) }}" class="col-12 thumbnail-item">
        <div class="thumbnail-container">
            <img src="{{ $video->thumbnail }}" alt="{{ $video->title }}" class="thumbnail-image">
            <label class="duration-text">{{ $video->video_length }}</label>
        </div>
        <label class="mt-2 fs-5">{{ $video->title }}</label>
    </a>
</div>
