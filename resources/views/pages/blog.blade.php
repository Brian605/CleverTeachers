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
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Various</a></li>
                        <li class="breadcrumb-item" aria-current="page">Blog</li>
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
            <a class="btn btn-danger" href="/blog">
               Clear Search
            </a>
            @endif
            <a  class="btn btn-danger" href="/blogs/new">New Blog Post</a>
        </div>
    </div>
    <div class="row">
<div class="dt-responsive table-responsive">
    <table id="cbtn-selectors" class="table table-striped nowrap">
        <thead>
        <tr>
            <th>Date</th>
            <th>Title</th>
            <th>Posted By</th>
            <th>Category</th>
            <th>Views</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @php
            $courses=\App\Models\Blog::query();
            if (!empty($_GET['search'])){
                $courses=$courses->where('title','like','%'.$_GET['search'].'%')
                ->orWhere('description','like','%'.$_GET['search'].'%');

            }
            $courses=$courses->get();
 @endphp

        @foreach($courses as $course)
            <tr>
                <td>
                    {{date('d/m/Y',strtotime($course->created_at))}}
                </td>

                <td>
                    {{$course->title}}
                </td>
                <td>
                 {{$course->poster}}
                </td>
                <td>
                    {{$course->category}}
                </td>
                <td>
                    {{$course->views}}
                </td>
                <td>

                        <a href="/blogs/delete/{{$course->id}}" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
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

