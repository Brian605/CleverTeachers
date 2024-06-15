@extends('layouts.main')
@section('header')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-auto">
                    <div class="page-header-title">
                        <h5 class="mb-0">Home</h5>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"><i class="ph-duotone ph-house"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Academics</a></li>
                        <li class="breadcrumb-item" aria-current="page">Study Modes</li>
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
                <a class="btn btn-danger" href="/modes">
                    Clear Search
                </a>
            @endif
            <button type="button" class="btn btn-danger" data-bs-target="#newSchool" data-bs-toggle="modal">New</button>
        </div>
    </div>
    <div class="row">
        @php
            $categories=\App\Models\StudyMode::query();
            if (!empty($_GET['search'])){
                $categories=$categories->where('name','like','%'.$_GET['search'].'%');
            }
            $categories=$categories->paginate(12);
        @endphp
        @foreach($categories as $category)
            @include('partials.mode_item',['category'=>$category])
        @endforeach
        {{$categories->links()}}
    </div>

    @include('partials.new_mode')
@endsection
