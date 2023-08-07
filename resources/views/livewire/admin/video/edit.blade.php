<form wire:submit.prevent='submit'
    class="rounded-3 p-5 bg-dark d-flex align-items-center flex-column gap-3 text-light w-50"
    enctype="multipart/form-data">
    <h1>Edit Video {{ $title }}</h1>

    <div class="col-12 d-flex">
        @if ($photo)
            <div class="col mx-auto">
                <h2>Thumbnail: </h2>
                <img src="{{ $photo->temporaryUrl() }}" class="w-100">
            </div>
        @else
            <div class="col mx-auto">
                <h2>Thumbnail: </h2>
                <img src="{{ $old_photo }}" class="w-100">
            </div>
        @endif
        @if ($video)
            <div class="col mx-auto">
                <h2>Video: </h2>
                <video src="{{ $video->temporaryUrl() }}" controls width="100%"></video>
            </div>
        @else
            <div class="col mx-auto">
                <h2>Video: </h2>
                <video src="{{ $old_video }}" controls width="100%"></video>
            </div>
        @endif
    </div>

    <div class="input-group">
        <label for="photo" class="input-group-text">THUMBNAIL</label>
        <input type="file" class="form-control" wire:model="photo" id="photo" accept=".jpg, .jpeg, .png, .webp">
        @error('photo')
            <x-error-message :message="$message" />
        @enderror
    </div>

    <div class="input-group">
        <label for="video" class="input-group-text">VIDEO</label>
        <input type="file" class="form-control" wire:model="video" id="video"
            accept=".mp4, .avif, .avi, .mov, .wmv, .webm">
        @error('video')
            <x-error-message :message="$message" />
        @enderror
    </div>
    <div class="input-group">
        <label for="title" class="input-group-text ">Judul Video</label>
        <input type="text" class="form-control" id="title" wire:model.lazy="title" required>
    </div>
    @error('title')
        <x-error-message :message="$message" />
    @enderror

    <select wire:model="category_id" id="category_id" class="form-select">
        <option hidden>--- PILIH KATEGORI VIDEO ---</option>
        @foreach ($categories as $data)
            <option value="{{ $data->id }}">{{ $data->name }}</option>
        @endforeach
    </select>

    <select wire:model="country_id" id="country_id" class="form-select">
        <option hidden>--- PILIH NEGARA ---</option>
        @foreach ($countries as $data)
            <option value="{{ $data->id }}">{{ $data->name }}</option>
        @endforeach
    </select>
    <button type="button" class="btn btn-primary me-auto" data-bs-toggle="modal" data-bs-target="#tags">
        PILIH TAG
    </button>

    <h2 class="text-center">DETAIL VIDEO</h2>

    <div class="modal fade" id="tags" tabindex="-1" role="dialog" aria-labelledby="tags" aria-hidden="true"
        wire:ignore.self>
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-black" id="tags">Tags</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-black">
                    @foreach ($tags as $data)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" wire:model="tag_items"
                                value="{{ $data->id }}">
                            <label class="form-check-label" for="">{{ $data->name }}</label>
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Pilih</button>
                </div>
            </div>
        </div>
    </div>

    <div class="input-group">
        <label for="source" class="input-group-text">SUMBER VIDEO</label>
        <input type="text" class="form-control" id="source" wire:model.lazy="source">
    </div>
    <div class="input-group">
        <label for="video_length" class="input-group-text">DURASI VIDEO</label>
        <input type="text" class="form-control" id="video_length" wire:model.lazy="video_length" readonly>
    </div>

    <div class="w-100 d-flex gap-3 justify-content-center">
        <button class="btn btn-primary w-25" type="submit">SUBMIT</button>
        <a href="{{ route('videos.index') }}" class="w-25"><button class="btn btn-danger w-100"
                type="button">CANCEL</button></a>
    </div>
</form>
