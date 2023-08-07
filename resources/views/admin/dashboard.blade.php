@extends('layouts.adminlayout')
@section('title', 'Dashboard')
@section('content')
    <div class="col-12 d-flex flex-wrap">
        <div class="col-3 p-3">
            <livewire:admin.navigation-card title="Kategori Negara" routeName="countries" />
        </div>
        <div class="col-3 p-3">
            <livewire:admin.navigation-card title="Kategori Video" routeName="categories" />
        </div>
        <div class="col-3 p-3">
            <livewire:admin.navigation-card title="Video" routeName="videos" />
        </div>
        <div class="col-3 p-3">
          <livewire:admin.navigation-card title="Tags" routeName="tags" />
      </div>

    </div>
@endsection
