@extends('layouts.main')
@section('header')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-auto">
                    <div class="page-header-title">
                        <h5 class="mb-0">Gallery</h5>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"><i class="ph-duotone ph-house"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Media</a></li>
                        <li class="breadcrumb-item" aria-current="page">Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
@endsection

@section('content')
    <div class="row d-flex justify-content-evenly mb-4">

        <div class="col-md-12 col-4 text-end">
            @if(isset($_GET['search']))
            <a class="btn btn-danger" href="/gallery">
               Clear Search
            </a>
            @endif
            <button type="button" class="btn btn-danger" data-bs-target="#newSchool" data-bs-toggle="modal">Add To Gallery</button>
        </div>
    </div>
    <div class="row">
        @php
        $categories=\App\Models\Gallery::query();
        if (!empty($_GET['search'])){
            $categories=$categories->where('caption','like','%'.$_GET['search'].'%');
        }
        $categories=$categories->paginate(12);
 @endphp
        @foreach($categories as $category)
        @include('partials.gallery_item',['gallery'=>$category])
        @endforeach
        {{$categories->links()}}
    </div>

    @include('partials.new_gallery')
    @include('partials.edit_gallery')
@endsection
@push('extra')
    <script>
        function showEdit(id,name){
            $("#categId").val(id)
            $("#edname").val(name)
            $("#editTitle").text("Editing Caption")
            $("#editSchool").modal("show")
        }
    </script>
@endpush
