<div class="card">
    <div class="card-body text-center d-flex flex-column align-items-center gap-3">
        <h4 class="card-title">{{ $title }}</h4>
        <a href="{{ route($routeName . '.create') }}" class=" col-6">
            <button class="btn btn-primary col-12">Create New</button>
        </a>

        <a href="{{ route($routeName . '.index') }}" class=" col-6">
            <button class="btn btn-success col-12">Lihat Daftar</button>
        </a>
    </div>
</div>
