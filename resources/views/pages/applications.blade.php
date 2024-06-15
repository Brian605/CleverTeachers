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
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Academics</a></li>
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
            <a class="btn btn-danger" href="/applications">
               Clear Search
            </a>
            @endif

        </div>
    </div>
    <div class="row">
<div class="dt-responsive table-responsive">
    <table id="cbtn-selectors" class="table table-striped nowrap">
        <thead>
        <tr>
            <th>#</th>
            <th>Intake</th>
            <th>Applicant Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>County</th>
            <th>Residence</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @php
            $applications=\App\Models\Applicant::query();
            if (!empty($_GET['search'])){
                $applications=$applications->where('name','like','%'.$_GET['search'].'%');

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
                    {{$application->county}}
                </td>
                <td>
                    {{$application->residence}}
                </td>
                <td>
                    <a href="/applications/details/{{$application->id}}" class="btn btn-sm btn-info">Details</a>
                    <a href="/applications/accept/{{$application->id}}" class="btn btn-sm btn-success">Accept</a>
                    <a href="/applications/delete/{{$application->id}}" class="btn btn-sm btn-danger">Delete</a>

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
                    New Downloadable File
                </h4>
                <button class="btn btn-close" data-bs-dismiss="modal" type="button"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/download/create" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label class="form-label" for="name">File Name</label>
                        <input type="text" id="name" class="form-control" required name="name">
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

