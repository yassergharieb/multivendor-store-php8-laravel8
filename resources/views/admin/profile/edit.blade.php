@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="">home </a>
                                </li>
                                <li class="breadcrumb-item"><a href="">admin profile </a>
                                </li>
                                <li class="breadcrumb-item active">edit
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    {{-- <h4 class="card-title" id="basic-layout-form"> إضافة متجر </h4> --}}
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>

                                </div>
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">


                                        <form class="form" action="{{route('admin.pofile.update' , $admin->id)}}"
                                              method="post">
                                            {{-- <input type="hidden"  value="" id="latitude" name="latitude">
                                            <input type="hidden" value="" id="longitude"  name="longitude"> --}}
                                            @csrf
                                            {{-- @method('put') --}}


                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> edit your admin profile </h4>

                                                <div class="row">
                                                    <div class="col-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">name </label>
                                                            <input type="text" id="pac-input"
                                                                   class="form-control"
                                                                   value="{{$admin->name}}"
                                                                   {{-- value="{{$shiping_mehtod->getTranslation('translations' , $local)}}" --}}
                                                                   placeholder="  " name="name">

                                                            @error("name")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>






                                                <div class="row">
                                                    <div class="col-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">email </label>
                                                            <input type="email" id="pac-input"
                                                                   class="form-control"
                                                                   placeholder="  " name="email"
                                                                       value="{{$admin->email}}">



                                                            @error("email")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                </div>

                                                <div class="row">
                                                    <div class="col-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">password </label>
                                                            <input type="password" id="pac-input"
                                                                   class="form-control"
                                                                   placeholder="  " name="password">




                                                            @error("password")
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>



                                                </div> <div class="row">
                                                    <div class="col-6 ">
                                                        <div class="form-group">
                                                            <label for="projectinput1">confirm password </label>
                                                            <input type="password_confirmation" id="pac-input"
                                                                   class="form-control"
                                                                   placeholder="">





                                                        </div>
                                                    </div>



                                                </div>

                                            </div>




                                            <div class="form-actions">


                                                <button type="submit" class="btn btn-primary" >
                                                    <i class="la la-check-square-o"></i> حفظ
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection



