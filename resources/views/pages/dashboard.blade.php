@php use App\Models\Teacher; @endphp
@extends('layouts.main')
@section('header')
    @php
        $teacher=Teacher::find(auth()->id());
$course=Teacher::where('course',$teacher->course)->first();

    @endphp
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
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item" aria-current="page">Home</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
@endsection

@section('content')
    <!-- [ Main Content ] start -->
    <div class="row">
        <div class="col-xl-4 col-md-6">
            <div class="card feed-card card-border-none">
                <div class="card-body py-0">
                    <div class="row">
                        <div class="col-4 bg-warning border-feed">
                            <i class="material-icons-two-tone d-block f-46">admin_panel_settings</i>
                        </div>
                        <div class="col-8">
                            <div class="p-t-25 p-b-25">
                                <h2 class="f-w-400 m-b-10">{{\App\Models\Unit::where('teacher_id',$teacher->id)->count()}}</h2>
                                <p class="text-muted m-0">
                                    Exams <span class="text-info f-w-400"><a class="btn btn-primary" href="/exams">Manage Exams</a> </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card feed-card card-border-none">
                <div class="card-body py-0">
                    <div class="row">
                        <div class="col-4 bg-secondary border-feed">
                            <i class="material-icons-two-tone d-block f-46">supervised_user_circle</i>
                        </div>

                        <div class="col-8">
                            <div class="p-t-25 p-b-25">
                                <h2 class="f-w-400 m-b-10">{{\App\Models\Student::where('course',$course->id)->count()}}</h2>
                                <p class="text-muted m-0">
                                    Students <span class="text-info f-w-400"><a class="btn btn-primary" href="/students">Manage Students</a> </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card feed-card card-border-none">
                <div class="card-body py-0">
                    <div class="row">
                        <div class="col-4 bg-success border-feed">
                            <i class="fa fa-book-reader f-46"></i>
                        </div>
                        <div class="col-8">
                            <div class="p-t-25 p-b-25">
                                <h2 class="f-w-400 m-b-10">{{\App\Models\Assignment::where('teacherId',$teacher->id)->count()}}</h2>
                                <p class="text-muted m-0">
                                    Assignments <span class="text-info f-w-400"><a class="btn btn-primary" href="/assignments">Manage Assignments</a> </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6">
            <div class="card feed-card card-border-none">
                <div class="card-body py-0">
                    <div class="row">
                        <div class="col-4 bg-info border-feed">
                            <i class="material-icons-two-tone d-block f-46">list_alt</i>
                        </div>
                        <div class="col-8">
                            <div class="p-t-25 p-b-25">
                                <h2 class="f-w-400 m-b-10">{{\App\Models\Semester::count()}}</h2>
                                <p class="text-muted m-0">
                                    Units <span class="text-info f-w-400"><a class="btn btn-primary" href="/units">Manage Units</a> </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- [ Main Content ] end -->
@endsection
