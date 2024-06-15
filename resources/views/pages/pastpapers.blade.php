@extends('layouts.main')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/plugins/dataTables.bootstrap5.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/plugins/buttons.bootstrap5.min.css')}}">
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
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Media</a></li>
                        <li class="breadcrumb-item" aria-current="page">Past Papers</li>
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
            <a class="btn btn-danger" href="/pastpapers">
               Clear Search
            </a>
            @endif
            <a  class="btn btn-danger" href="#" data-bs-toggle="modal" data-bs-target="#newFile">New Paper</a>

        </div>
    </div>
    <div class="row">
<div class="dt-responsive table-responsive">
    <table id="cbtn-selectors" class="table table-striped nowrap">
        <thead>
        <tr>
            <th>File Name</th>
            <th>File</th>
            <th>Category</th>
            <th>Views</th>
            <th>Downloads</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @php
            $courses=\App\Models\PastPaper::query();
            if (!empty($_GET['search'])){
                $courses=$courses->where('name','like','%'.$_GET['search'].'%');

            }
            $courses=$courses->get();
 @endphp

        @foreach($courses as $course)
            <tr>
                <td>
                    {{$course->subject}}
                </td>
                <td>
                    <a download href="{{Storage::path($course->file)}}" class="btn btn-sm btn-warning"><span class="fa fa-download"></span> Download </a>
                </td>
                <td>
                    {{$course->school}}
                </td>
                <td>
                    {{$course->views}}
                </td>
                <td>
                    {{$course->downloads}}
                </td>

                <td>
                        <a  href="/pastpapers/delete/{{$course->id}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

    </div>
<div class="modal fade" id="newFile">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    New Past Paper
                </h4>
                <button class="btn btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/pastpapers/create" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label" for="name">File Name</label>
                        <input type="text" id="name" class="form-control" required name="name">
                    </div>
                    <div class="mb-4">
                        @php
                            $categories=\App\Models\Category::all();
                            $first=true;
                        @endphp
                        <label class="form-label" for="category">Category</label>
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

                    <div class="mb-4">
                        <label class="form-label" for="file">File</label>
                        <input type="file" id="file" class="form-control" required name="file">
                    </div>
                    <div class="mb-4 text-end">
                        <button class="btn btn-success">Save File</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('extra')
    <script src="{{asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/buttons.colVis.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/buttons.print.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/pdfmake.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jszip.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/vfs_fonts.js')}}"></script>
    <script src="{{asset('assets/js/plugins/buttons.html5.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/buttons.bootstrap5.min.js')}}"></script>

    <script>
        $('#cbtn-selectors').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'copyHtml5',
                    exportOptions: {
                        columns: [0, ':visible']
                    }
                },
                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: ':visible'
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 5]
                    }
                },
            ]
        });
    </script>
@endpush

