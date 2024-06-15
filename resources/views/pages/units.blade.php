@extends('layouts.main')
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
                        @if(auth()->check() && auth()->user()->hasRole('Lecturer'))
                        <li class="breadcrumb-item"><a href="/"><i class="ph-duotone ph-house"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">{{\App\Models\User::find(auth()->id())->name}}</a></li>
                        <li class="breadcrumb-item" aria-current="page">{{$course->title}}</li>
                        @endif
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
            <a class="btn btn-danger" href="/units">
               Clear Search
            </a>
            @endif
            <button type="button" class="btn btn-danger" data-bs-target="#newUnit" data-bs-toggle="modal">New Unit</button>
        </div>
    </div>
    <div class="row">

        <div class="card col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
Course Units
                    </h4>
                </div>
                <div class="card-body">
                    @php
                    $units=\App\Models\Unit::query();
                    if (!empty($_GET['search'])){
                        $units=$units->where('name','like','%'.$_GET['search'].'%');
                    }
                    $units=$units->paginate(12);
                    $count=1;
 @endphp
                    <div class="row d-flex justify-content-evenly">
                        <div class="dt-responsive table-responsive">
                            <table id="cbtn-selectors" class="table table-striped nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Course</th>
                                    <th>Cat1 Marks</th>
                                    <th>Cat2 Marks</th>
                                    <th>Main Exam Marks</th>
                                    <th>Registered Students(Current Semester)</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($units as $unit)
                                    <tr>
                                        <td>
                                          {{$count}}
                                        </td>
                                        <td>
                                            {{$unit->name}}
                                        </td>
                                        <td>
                                            {{\App\Models\Course::find($unit->course_id)->title}}
                                        </td>
                                        <td>
                                            {{$unit->cat1}}
                                        </td>
                                        <td>
                                            {{$unit->cat2}}
                                        </td>
                                        <td>
                                            {{$unit->exams}}
                                        </td>
                                        <td>
                                         @php
                                             $sem=\App\Models\Semester::where('status','Active')->first();
                                             $count++;
                                         @endphp
                                            @if($sem !=null)
                                                {{\App\Models\UnitRegistration::where('unit_id',$sem->id)->count()}}
                                            @else
                                                0
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   @include('partials.new_unit')
@endsection

