@php use App\Models\Teacher; @endphp
@extends('layouts.main')
@php
    $teacher=Teacher::find(auth()->id());
$course=Teacher::where('course',$teacher->course)->first();

@endphp
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
                        <h5 class="mb-0">{{$course->title}}</h5>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"><i class="ph-duotone ph-house"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">{{$teacher->name}}</a></li>
                        <li class="breadcrumb-item" aria-current="page">Assignments</li>
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
            <a class="btn btn-danger" href="/assignments">
               Clear Search
            </a>
            @endif
            <button class="btn btn-danger" data-bs-target="#newFile" data-bs-toggle="modal">New Assignment</button>

        </div>
    </div>
    <div class="row">
<div class="dt-responsive table-responsive">
    <table id="cbtn-selectors" class="table table-striped nowrap">
        <thead>
        <tr>
            <th>#</th>
            <th>Course</th>
            <th>Unit</th>
            <th>Due Date</th>
            <th>Submissions</th>
        </tr>
        </thead>
        <tbody>
        @php
            $applications=\App\Models\Assignment::where('courseId',$teacher->course);

            $applications=$applications->get();
            $count=1;
 @endphp

        @foreach($applications as $application)
            <tr>
                <td>
                    {{$count}}
                </td>
                <td>
                    {{\App\Models\Course::find($application->courseId)->title}}
                </td>

                <td>
                    {{\App\Models\Unit::find($application->unitId)->name}}
                </td>

                <td>
                    {{date('d/m/Y H:i',strtotime($application->dueDate))}}
                </td>
                <td>
                    <a href="/submissions" class="btn btn-danger">View</a>
                </td>

            </tr>
            @php $count++; @endphp
        @endforeach
        </tbody>
    </table>
</div>

    </div>
<div class="modal fade" id="newFile">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">
                    New Assignment
                </h4>
                <button class="btn btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/assignment/create" enctype="multipart/form-data">
                    @csrf
                    @php
 $units=\App\Models\Unit::where('course_id',$course->id)->get();
 $f2=true;
 @endphp
                    <input type="hidden"  value="{{$course->id}}" name="courseId">
                    <input type="hidden"  value="{{$teacher->id}}" name="teacherId">

                    <div class="mb-4">
                        <label class="form-label" for="student">Unit</label>
                        <select class="form-control form-select" name="unit" required>
                            @foreach($units as $unit)
                                @if($f2)
                                    <option selected value="{{$unit->id}}">{{$unit->name}}</option>
                                    @php $f2=false; @endphp
                                @else
                                    <option  value="{{$unit->id}}">{{$unit->name}}</option>

                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="description">Description</label>
                        <textarea class="form-control" id="description" required name="description"></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="dueDate">Due Date</label>
                        <input class="form-control" type="datetime-local" name="dueDate">

                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="exams">Attachments</label>
                        <input class="form-control" type="file" name="attachment[]" multiple>

                    </div>


                    <div class="mb-4 text-end">
                        <button class="btn btn-success">Post Assignment</button>
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

