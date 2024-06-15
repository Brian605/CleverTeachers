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
                        <li class="breadcrumb-item"><a href="/listing">Events</a></li>
                        <li class="breadcrumb-item" aria-current="page">New Event</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
@endsection

@section('content')
    <div class="row">
        <form method="post" action="/events/create">
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
                            <div class="mb-4 col-md-6">
                                <label for="title" class="form-label">
                                    Event Title
                                </label>
                                <input class="form-control" name="title" id="title" type="text" maxlength="255" required>
                            </div>
                            <div class="mb-4 col-md-6">
                                <label for="title" class="form-label">
                                    Event Description
                                </label>
                                <textarea class="form-control" name="description" id="description" type="text"  required></textarea>
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="duration" class="form-label">
                                    Event Date
                                </label>
                                <input class="form-control" name="date" id="duration" type="date" maxlength="255" required>
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="lecs" class="form-label">
                                   Event Starting Time
                                </label>
                                <input class="form-control" name="start" id="lecs" type="time" maxlength="100" required>
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="title" class="form-label">
                                    Event End Time
                                </label>
                                <input class="form-control" name="end" id="certificate" type="time" required>
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="fees" class="form-label">
                                   Event Venue
                                </label>
                                <input class="form-control" name="location" id="fees" type="text" required>
                            </div>
                            <div class="mb-4 col-md-4">
                                <label for="grade" class="form-label">
                                   Entry Fee
                                </label>
                                <input class="form-control" name="cost" id="grade" type="number" value="0" required>
                            </div>
                            <div class="mb-4 col-md-4">
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
                            Other Details
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#courseAccordion">
                        <div class="accordion-body row">
                                <div class="mb-4 col-md-6">
                                    <label class="form-label" for="attachments">Banner Image</label>
                                    <input required id="attachments" type="file" class="attachment" name="filepond" data-max-file-size="10MB" data-max-files="1">
                                </div>
                            <div class="mb-4 col-md-6">
                                <label class="form-label" for="video">Organizer</label>
                                <input id="video" type="text" class="form-control" name="organizer">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button text-danger fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            Objectives and Sponsors
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#courseAccordion">
                        <div class="accordion-body row">
                            <div class="mb-4 col-md-6">
                                <h4 class="form-label">Objectives</h4>
                                <div class="row d-flex justify-content-evenly" id="objectives">

                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary" type="button" onclick="addObjective()">
                                        Add Objective
                                    </button>
                                </div>
                             </div>
                            <div class="mb-4 col-md-6">
                                <h4 class="form-label">Sponsors</h4>
                                <div class="row d-flex justify-content-evenly" id="sponsors">

                                </div>
                                <div class="text-end">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#newSponsorModal">
                                        Add Sponsor
                                    </button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-danger">
                    Save Event
                </button>
            </div>
        </form>
    </div>

    <div class="modal fade" id="newSponsorModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">
                        New Sponsor
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-4">
                        <label class="form-label" for="lgurl">
                          Sponsor Logo
                        </label>
                        <input type="url" class="form-control" id="lgurl">
                    </div>
                    <div class="text-end">
                        <button class="btn btn-danger" type="button" onclick="addSponsor()">Add Sponsor</button>
                    </div>
                </div>
            </div>
        </div>
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

        })();

        function addObjective() {
            let div=document.createElement('div')
            div.classList.add('mt-2')
            div.innerHTML='<input class="form-control" name="objective[]">'
            document.getElementById('objectives').appendChild(div)
        }

        function addSponsor() {
          let logo=$("#lgurl").val().toString().trim();
          if (!logo){
              return;
          }
          let image=document.createElement('img')
            image.src=logo
            image.style.width='100px'
            image.style.height='70px'
            let input=document.createElement('input')
            input.name='sponsor[]'
            input.type="hidden"
            input.value=logo
            document.getElementById('sponsors').appendChild(image)
            document.getElementById('sponsors').appendChild(input)
            $("#newSponsorModal").modal('hide')

        }

    </script>

@endpush
