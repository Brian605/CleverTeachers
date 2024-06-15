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
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Student Details</a></li>
                        <li class="breadcrumb-item" aria-current="page">Applications</li>
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
            <a class="btn btn-danger" href="{{request()->path()}}">
               Clear Search
            </a>
            @endif

        </div>
    </div>
    <div class="row">
        <h4>PERSONAL DETAILS</h4>
<div class="">
    <table  class="table table-striped nowrap table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>Intake</th>
            <th>Applicant Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>ID Number</th>
            <th>Date of Birth</th>
            <th>Religion</th>
            <th>County</th>
            <th>Residence</th>
        </tr>
        </thead>
        <tbody>

            <tr>

                <td>
                    {{\App\Models\Intake::find($application->intake)->name}}
                </td>
                <td>
                    {{$application->firstName}}  {{$application->middleName}}  {{$application->lastName}}
                </td>
                <td>
                    {{$application->email}}
                </td>

                <td>
                    {{$application->phone}}
                </td>
                <td>
                    {{$application->idNumber}}
                </td>
                <td>
                    {{$application->dateOfBirth}}
                </td>
                <td>
                    {{$application->religion}}
                </td>
                <td>
                    {{$application->county}}
                </td>
                <td>
                    {{$application->residence}}
                </td>

            </tr>

        </tbody>
    </table>
</div>

    </div>
    <div class="row">
        <h4>MEDICAL HISTORY</h4>
        <div class="">
            <table  class="table table-striped nowrap table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Presence of Medical Condition</th>
                    <th>The Condition</th>

                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>
                        {{$application->history}}
                    </td>

                    <td>
                        {{$application->condition}}
                    </td>

                </tr>

                </tbody>
            </table>
        </div>

    </div>

    <div class="row">
        <h4>PARENT/NEXT OF KIN DETAILS</h4>
        <div class="">
            <table  class="table table-striped nowrap table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Father's Name</th>
                    <th>Father's Email</th>
                    <th>Father's Phone</th>

          </tr>
                </thead>
                <tbody>

                <tr>
                    <td>
                        {{$application->fatherName}}
                    </td>

                    <td>
                        {{$application->fatherEmail}}
                    </td>
                    <td>
                        {{$application->fatherPhone}}
                    </td>
                </tr>
                </tbody>
                <thead class="thead-dark">
                <th>Mother's Name</th>
                <th>Mother's Email</th>
                <th>Mother's Phone</th>
                </thead>
                <tbody>
                <tr>
                    <td>
                        {{$application->motherName}}
                    </td>
                    <td>
                        {{$application->motherEmail}}
                    </td>
                    <td>
                        {{$application->motherPhone}}
                    </td>
                </tr>
                </tbody>
                <thead class="thead-dark">

                <th>Next Of Kin's Name</th>
                <th>Next Of Kin's Email</th>
                <th>Next Of Kin's Phone</th>
                </thead>
                <tbody>
                <tr>
                    <td>
                        {{$application->nokName}}
                    </td>
                    <td>
                        {{$application->nokEmail}}
                    </td>
                    <td>
                        {{$application->nokPhone}}
                    </td>

                </tr>

                </tbody>
            </table>
        </div>

    </div>

    <div class="row">
        <h4>FEE PAYMENT DETAILS</h4>
        <div class="dt-responsive table-responsive">
            <table  class="table table-striped nowrap table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Who is Paying</th>
                    <th>Name (if Other)</th>
                    <th>Phone (if Other)</th>
                    <th>Relationship (if Other)</th>

                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>
                        {{$application->feePayer}}
                    </td>

                    <td>
                        {{$application->payerName}}
                    </td>
                    <td>
                        {{$application->payerPhone}}

                    </td>
                    <td>
                        {{$application->payerRelation}}

                    </td>

                </tr>

                </tbody>
            </table>
        </div>

    </div>

    <div class="row">
        <h4>EDUCATION BACKGROUND</h4>
        <div class="">
            <table  class="table table-striped nowrap table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Highest Level Of Education</th>
                    <th>Grade Attained</th>
                    <th>School Name</th>
                    <th>Year Completed</th>

                </tr>
                </thead>
                <tbody>

                <tr>
                    <td>
                        {{$application->education}}
                    </td>

                    <td>
                        {{$application->grade}}
                    </td>
                    <td>
                        {{$application->school}}
                    </td>
                    <td>
                        {{$application->schoolYear}}
                    </td>

                </tr>

                </tbody>
            </table>
        </div>

    </div>

    <div class="row">
        <h4>COURSE DETAILS</h4>
        <div class="">
            <table  class="table table-striped nowrap table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th>Course Name</th>
                    <th>Examined By</th>
                    <th>Study Mode</th>
                    </tr>
                </thead>
                <tbody>

                <tr>
                    <td>
                        {{\App\Models\Course::find($application->course)->title}}
                    </td>

                    <td>
                        {{$application->examiners[0]}}
                    </td>
                    <td>
                        {{$application->mode}}
                    </td>

                </tr>

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

