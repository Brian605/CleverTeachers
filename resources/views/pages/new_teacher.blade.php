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
                        <li class="breadcrumb-item"><a href="/listing">Teachers</a></li>
                        <li class="breadcrumb-item" aria-current="page">New Teacher</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
@endsection

@section('content')
    <div class="row">
        <form method="post" action="/teachers/create">
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
                            <div class="mb-4 col-md-4">
                                <label for="code" class="form-label">
                                   Teacher Name
                                </label>
                                <input class="form-control" name="name" id="code" type="text" maxlength="255" required>
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="title" class="form-label">
                                   Department
                                </label>
                                <select class="form-control" onchange="getCourses()" name="department" id="title" type="text"  required>
                                    @php
                                    $deps=\App\Models\Category::all();
                                    $first=true;
                                    @endphp
                                    @foreach($deps as $dep)
                                        @if($first)
                                           <option selected value="{{$dep->id}}">
                                               {{$dep->name}}
                                           </option>
                                            @php
                                                $first=false;
                                            @endphp
                                        @else
                                            <option value="{{$dep->id}}">
                                                {{$dep->name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="title" class="form-label">
                                    Course
                                </label>
                                <select class="form-control form-select" name="course" id="description" type="text"  required>

                                </select>
                            </div>

                        </div>
                         </div>
                        <div class="accordion-body row">
                            <div class="mb-4 col-md-4">
                                <label class="form-label" for="phone">Phone Number</label>
                                <input  required id="phone" maxlength="10" minlength="10" type="tel" class="form-control" name="phone">
                            </div>
                            <div class="mb-4 col-md-4">
                                <label class="form-label" for="email">Email Address</label>
                                <input  required id="email" type="email" class="form-control" name="email">
                            </div>
                            <div class="mb-4 col-md-4">
                                <label class="form-label" for="attachments">Profile Picture</label>
                                <input  accept="image/*" required id="attachments" type="file" class="attachment" name="filepond" data-max-file-size="10MB" data-max-files="1">
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-danger">
                    Save Teacher
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
            getCourses()
        })();

        function getCourses() {
            let dep=$("#title").val();
            $.ajax({
               method:'GET' ,
                url:'/department/course/'+dep,
                success:function (response) {
                  $("#description").html('')
                    let first=true;
                    response.forEach(data=>{
                        let option=document.createElement('option');
                        if (first){
                            option.setAttribute('selected','true')
                            first=false;
                        }
                        option.value=data.id
                        option.innerText=data.title
                        document.getElementById('description').appendChild(option)
                    });

                }
            })
        }

    </script>

@endpush
