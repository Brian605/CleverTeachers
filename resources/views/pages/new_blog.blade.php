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
                        <li class="breadcrumb-item"><a href="/listing">Blogs</a></li>
                        <li class="breadcrumb-item" aria-current="page">New Blog</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
@endsection

@section('content')
    <div class="row">
        <form method="post" action="/blog/create" onsubmit="return setBlogData();">
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
                            <div class="mb-4 col-md-5">
                                <label for="title" class="form-label">
                                    Post Title
                                </label>
                                <input class="form-control" name="title" id="title" type="text" maxlength="255" required>
                            </div>
                            <div class="mb-4 col-md-5">
                                <label for="title" class="form-label">
                                    Short Description
                                </label>
                                <textarea class="form-control" name="description" id="description" type="text"  required></textarea>
                            </div>
                            <div class="mb-4 col-md-2">
                                @php
                                    $categories=\App\Models\Category::all();
                                    $first=true;
                                @endphp
                                <label class="form-label" for="category">Event Category</label>
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

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button text-danger fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                           Banner Image
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#courseAccordion">
                        <div class="accordion-body row">
                                <div class="mb-4 col-md-12">
                                    <label class="form-label" for="attachments">Banner Image</label>
                                    <input required id="attachments" type="file" class="attachment" name="filepond" data-max-file-size="10MB" data-max-files="1">
                                </div>
                            <div class="mb-4 col-md-6">
                                <label class="form-label" for="video">Poster</label>
                                <input id="video" readonly value="{{auth()->user()->name}}" type="text" class="form-control" name="organizer">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button text-danger fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            Blog Content
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#courseAccordion">
                        <div class="accordion-body row">
                            <div class="mb-4 col-md-12">
                                <input type="hidden" id="bblog" name="blog">
                                <label class="form-label">Content</label>
                                <div class="row d-flex justify-content-evenly" id="blog" name="blog"></div>

                             </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-danger">
                    Save Post
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
    <script src="{{asset('assets/js/plugins/ckeditor/classic/ckeditor.js')}}"></script>
    <script>
        let mEditor;
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

        })();

        ClassicEditor
            .create( document.querySelector( '#blog' ),{

            } )
            .then(editor=>{
                mEditor=editor
            })
            .catch( error => {
                console.error( error );
            } );

        function setBlogData() {
            if(!mEditor.getData().toString().trim()){
                return false;
            }
          $("#bblog").val(mEditor.getData())
            return true;
        }

    </script>

@endpush
