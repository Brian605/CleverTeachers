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
                        <h5 class="mb-0">{{$course->title}}</h5>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/"><i class="ph-duotone ph-house"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">{{$teacher->name}}</a></li>
                        <li class="breadcrumb-item" aria-current="page">Exams Results</li>
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
            <a class="btn btn-danger" href="/exams">
               Clear Search
            </a>
            @endif
            <button class="btn btn-danger" data-bs-target="#newFile" data-bs-toggle="modal">New Marks</button>

        </div>
    </div>
    <div class="row">
<div class="dt-responsive table-responsive">
    <table id="cbtn-selectors" class="table table-striped nowrap">
        <thead>
        <tr>
            <th>#</th>
            <th>Reg Number</th>
            <th>Student Name</th>
            <th>Unit</th>
            <th>Cat 1</th>
            <th>Cat 2</th>
            <th>Main Exams</th>
            <th>Score</th>
        </tr>
        </thead>
        <tbody>
        @php
            $applications=\App\Models\UnitMarks::where('course_id',$course->id);
            if (!empty($_GET['search'])){
                $applications=$applications->where('course_id','like','%'.$_GET['search'].'%');

            }
            if (!empty($_GET['intake'])){
                $applications=$applications->where('intake',$_GET['intake']);

            }
            $applications=$applications->get();
            $count=1;
 @endphp

        @foreach($applications as $application)
            <tr>
                <td>
                    {{$count}}
                </td>
                <td>
                    {{\App\Models\Student::find($application->student_id)->regNumber}}
                </td>
                <td>
                    {{\App\Models\Student::find($application->student_id)->firstName}}  {{\App\Models\Student::find($application->student_id)->middleName}}  {{\App\Models\Student::find($application->student_id)->lastName}}
                </td>
                <td>
                    {{\App\Models\Unit::find($application->unit_id)->name}}
                </td>

                <td>
                    {{$application->cat1}}
                </td>
                <td>
                    {{$application->cat2}}
                </td>
                <td>
                    {{$application->exams}}
                </td>
                <td>
                    N/A
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
                    New Marks
                </h4>
                <button class="btn btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/marks/create" enctype="multipart/form-data">
                    @csrf
                    @php
 $sem=\App\Models\Semester::all();
 $students=\App\Models\Student::where('course',$course->id)->get();
 $units=\App\Models\Unit::where('course_id',$course->id)->get();
 $f=true;
 $f1=true;
 $f2=true;
 @endphp
                    <input type="hidden"  value="{{$course->id}}" name="courseId">
                        <div class="mb-4">
                            <label class="form-label" for="semester">Semester</label>
                            <select class="form-control form-select" name="semester" required>
                                @foreach($sem as $s)
                                    @if($s)
                                        <option selected value="{{$s->id}}">{{$s->name}}</option>
                                        @php $f=false; @endphp
                                    @else
                                        <option  value="{{$s->id}}">{{$s->name}}</option>

                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                        <label class="form-label" for="student">Student</label>
                        <select class="form-control form-select" name="student" required>
                            @foreach($students as $student)
                                @if($f1)
                                    <option selected value="{{$student->id}}">{{$student->regNumber}}</option>
                                    @php $f1=false; @endphp
                                @else
                                    <option  value="{{$student->id}}">{{$student->regNumber}}</option>

                                @endif
                            @endforeach
                        </select>
                    </div>
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
                        <label class="form-label" for="cat1">Cat 1</label>
                        <input class="form-control" type="number" name="cat1">

                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="cat2">Cat 2</label>
                        <input class="form-control" type="number" name="cat2">

                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="exams">Exams</label>
                        <input class="form-control" type="number" name="exams">

                    </div>


                    <div class="mb-4 text-end">
                        <button class="btn btn-success">Save Marks</button>
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

