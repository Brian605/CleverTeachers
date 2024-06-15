@extends('layouts.main')
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.30.6/filepond.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.css">
@endsection
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
                        <li class="breadcrumb-item"><a href="/listing">Courses</a></li>
                        <li class="breadcrumb-item" aria-current="page">New Course</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
@endsection

@section('content')
    <div class="row">
        <form method="post" action="/course/create">
            @csrf
            <div class="accordion" id="courseAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button text-danger fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            General Details
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#courseAccordion">
                        <div class="accordion-body">
                        <div class="row d-flex justify-content-evenly">
                            <div class="mb-4 col-md-2">
                                <label for="code" class="form-label">
                                    Course Code
                                </label>
                                <input class="form-control" name="code" id="code" type="text" maxlength="255" required>
                            </div>
                            <div class="mb-4 col-md-5">
                                <label for="title" class="form-label">
                                    Course Title
                                </label>
                                <input class="form-control" name="title" id="title" type="text" maxlength="255" required>
                            </div>
                            <div class="mb-4 col-md-5">
                                <label for="title" class="form-label">
                                    Course Description
                                </label>
                                <textarea class="form-control" name="description" id="description" type="text"  required></textarea>
                            </div>
                            <div class="mb-4 col-md-6">
                                <label for="duration" class="form-label">
                                    Course Duration
                                </label>
                                <input class="form-control" name="duration" id="duration" type="text" maxlength="255" required>
                            </div>
                            <div class="mb-4 col-md-6">
                                <label for="lecs" class="form-label">
                                    Total Lectures
                                </label>
                                <input class="form-control" name="lecs" id="lecs" type="number" maxlength="100" required>
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="title" class="form-label">
                                    Has Certificate
                                </label>
                                <input class="form-check" name="certificate" id="certificate" type="checkbox" required>
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="fees" class="form-label">
                                    Total Fees
                                </label>
                                <input class="form-control" name="fees" id="fees" type="number" required>
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="grade" class="form-label">
                                   Entry Grade
                                </label>
                                <input class="form-control" name="grade" id="grade" type="text" required>
                            </div>
                        </div>
                         </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button text-danger fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            Preview Details
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#courseAccordion">
                        <div class="accordion-body row">
                                <div class="mb-4 col-md-6">
                                    <label class="form-label" for="attachments">Preview Image</label>
                                    <input required id="attachments" type="file" class="attachment" name="filepond" data-max-file-size="10MB" data-max-files="1">
                                </div>
                            <div class="mb-4 col-md-6">
                                <label class="form-label" for="video">Preview Video Link</label>
                                <input id="video" type="url" class="form-control" name="video">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button text-danger fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            Course Curriculum
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#courseAccordion">
                        <div class="accordion-body row">
                            <div class="mb-4 col-md-6">
                                <label class="form-label" for="curriculum">Upload Course Curriculum</label>
                                <input required id="curriculum" type="file" class="curriculum" name="curriculum" accept="application/pdf" data-max-file-size="10MB" data-max-files="1">
                            </div>
                            <div class="mb-4 col-md-6">
                                @php
                                    $categories=\App\Models\Category::all();
                                    $first=true;
                                    @endphp
                                <label class="form-label" for="category">Course Category</label>
                                <select required id="category"  class="form-control form-select" name="category">
                                @foreach($categories as $category)
                                    @if($first)
                                        <option selected value="{{$category->name}}">{{$category->name}}</option>
                                    @php $first=false; @endphp
                                        @else
                                            <option  value="{{$category->name}}">{{$category->name}}</option>
                                        @endif
                                @endforeach
                                </select>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-danger">
                    Save Course
                </button>
            </div>
        </form>
    </div>

@endsection
@push('extra')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.30.6/filepond.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.12/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond-plugin-image-exif-orientation@1.0.11/dist/filepond-plugin-image-exif-orientation.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond-plugin-file-validate-size@2.2.8/dist/filepond-plugin-file-validate-size.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond-plugin-file-encode@2.1.14/dist/filepond-plugin-file-encode.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond-plugin-file-validate-type@1.2.9/dist/filepond-plugin-file-validate-type.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond-plugin-image-resize@2.0.10/dist/filepond-plugin-image-resize.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond-plugin-image-transform@3.8.7/dist/filepond-plugin-image-transform.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond-plugin-image-edit@1.6.3/dist/filepond-plugin-image-edit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/filepond-plugin-image-crop@2.0.6/dist/filepond-plugin-image-crop.min.js"></script>
    <script>
        (function (){
            /* filepond */
            FilePond.registerPlugin(
                FilePondPluginImagePreview,
                FilePondPluginImageExifOrientation,
                FilePondPluginFileValidateSize,
                FilePondPluginFileEncode,
                FilePondPluginImageEdit,
                FilePondPluginFileValidateType,
                FilePondPluginImageCrop,
                FilePondPluginImageResize,
                FilePondPluginImageTransform
            );

            const MultipleElement = document.querySelector('.attachment');
            const CElement = document.querySelector('.curriculum');

            FilePond.create(MultipleElement,{
                allowMultiple: false,
                allowImagePreview: true,
                allowImageFilter: true,
                imagePreviewHeight: 100,
                allowRevert: true,
                maxFiles: 1,
                name:'filepond',
                server: {
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    url: "/system/files/add",
                    process: true,
                    restore: "system/files/delete",
                    fetch: false,
                },
            });
            FilePond.create(CElement,{
                allowMultiple: false,
                allowImagePreview: true,
                allowImageFilter: true,
                imagePreviewHeight: 100,
                allowRevert: true,
                maxFiles: 1,
                name:'curriculum',
                server: {
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                    },
                    url: "/system/files/add",
                    process: true,
                    restore: "system/files/delete",
                    fetch: false,
                },
            });

        })();

    </script>

@endpush
