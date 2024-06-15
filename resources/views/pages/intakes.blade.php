@extends('layouts.main')
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
                        <li class="breadcrumb-item" aria-current="page">Intakes</li>
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
                <a class="btn btn-danger" href="/intakes">
                    Clear Search
                </a>
            @endif
            <a  class="btn btn-danger" href="#" data-bs-target="#newSem" data-bs-toggle="modal">New Intake</a>
        </div>
    </div>

    <div class="row">
        <div class="dt-responsive table-responsive overflow-scroll">
            <table id="cbtn-selectors" class="table table-striped nowrap">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $courses=\App\Models\Intake::query();
                    if (!empty($_GET['search'])){
                        $courses=$courses->where('name','like','%'.$_GET['search'].'%')
                  ;

                    }
                    $courses=$courses->get();
                @endphp

                @foreach($courses as $course)
                    <tr>

                        <td>
                            {{$course->name}}
                        </td>
                        <td>
                            {{date('d/m/Y H:i',strtotime($course->startDate))}}
                        </td>
                        <td>
                            {{date('d/m/Y H:i',strtotime($course->endDate))}}
                        </td>
                        <td>
                            {{$course->status}}
                        </td>
                        <td>
                            @if($course->status=='Inactive')
                                <a href="/intakes/activate/{{$course->id}}" class="btn btn-success btn-sm">Activate</a>
                            @else
                                <a href="/intakes/deactivate/{{$course->id}}" class="btn btn-danger btn-sm">Deactivate</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>

    <div class="modal fade" id="newSem">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Intake</h4>
                    <button class="btn-close" type="button" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/intake/create">
                        @csrf
                        <div class="mb-4">
                            <label class="form-label" for="name">Intake Name</label>
                            <input class="form-control" type="text" name="name" id="name">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="start">Start Date</label>
                            <input class="form-control" type="datetime-local" name="start" id="start">
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="end">End Date</label>
                            <input class="form-control" type="datetime-local" name="end" id="end">
                        </div>
                        <div class="text-end m-2">
                            <button class="btn btn-danger">Create Intake</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
