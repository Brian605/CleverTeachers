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
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Courses</a></li>
                        <li class="breadcrumb-item" aria-current="page">Course Listing</li>
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
            <a class="btn btn-danger" href="/listing">
               Clear Search
            </a>
            @endif
            <a  class="btn btn-danger" href="/courses/new">New Course</a>
        </div>
    </div>
    <div class="row">
<div class="dt-responsive table-responsive">
    <table id="cbtn-selectors" class="table table-striped nowrap">
        <thead>
        <tr>
            <th>Code</th>
            <th>Title</th>
            <th>Duration</th>
            <th>Category</th>
            <th>Fees</th>
            <th>Entry Grade</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @php
            $courses=\App\Models\Course::query();
            if (!empty($_GET['search'])){
                $courses=$courses->where('title','like','%'.$_GET['search'].'%')
                ->orWhere('description','like','%'.$_GET['search'].'%');

            }
            $courses=$courses->get();
 @endphp

        @foreach($courses as $course)
            <tr>
                <td>
                    {{$course->code}}
                </td>
                <td>
                    {{$course->title}}
                </td>
                <td>
                    {{$course->duration}}
                </td>
                <td>
                    {{$course->category}}
                </td>
                <td>
                 Ksh. {{$course->fees}}
                </td>
                <td>
                    {{$course->grade}}
                </td>
                <td>
                    @if($course->status=='Active')
                        <a href="/course/deactivate/{{$course->id}}" class="btn btn-warning btn-sm">Deactivate</a>
                    @else
                        <a href="/course/activate/{{$course->id}}" class="btn btn-primary btn-sm">Activate</a>
                    @endif
                        <a href="/course/edit/{{$course->id}}" class="btn btn-info btn-sm">Edit</a>
                        <a href="/course/delete/{{$course->id}}" class="btn btn-danger btn-sm">Delete</a>


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

