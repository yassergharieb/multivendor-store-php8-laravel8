@extends('layouts.admin')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('SubCategories.index')}}">
                                </a>
                                </li>
                                <li class="breadcrumb-item active"> اضافة منتج
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
                                    <h4 class="card-title" id="basic-layout-form"> إضافة  منتج </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                @include('admin.includes.alerts.success')
                                @include('admin.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="form" action="{{route('product.store')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf


                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> بيانات المنتح </h4>


                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1"> product name   </label>
                                                                    <input type="text" value="" id="name"
                                                                           class="form-control"
                                                                           placeholder="  "
                                                                           name="name">
                                                                    @error("name")
                                                                    <span class="text-danger"> هذا الحقل مطلوب</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 ">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">
                                                                    {{__('messages.slug')}} </label>
                                                                    <input type="text" id="abbr"
                                                                           class="form-control"
                                                                           placeholder="  "
                                                                           value=""
                                                                           name="slug">

                                                                    @error("slug")
                                                                    <span class="text-danger"> {{__('messages.slug_required')}} </span>
                                                                    @enderror
                                                                </div>
                                                            </div>




                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="projectinput1"> الوصف   </label>
                                                                    <textarea  value="" id="name"
                                                                           class="form-control"
                                                                           placeholder="  "
                                                                           name="description"> </textarea>
                                                                    @error("description")
                                                                    <span class="text-danger"> هذا الحقل مطلوب</span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6 ">
                                                                <div class="form-group">
                                                                    <label for="projectinput1">
                                                                     الوصف المختصر </label>
                                                                    <textarea
                                                                           class="form-control"
                                                                           placeholder="  "
                                                                           value=""
                                                                           name="short_description"> </textarea>

                                                                    @error("short_description")
                                                                    <span class="text-danger"> {{__('messages.slug_required')}} </span>
                                                                    @enderror
                                                                </div>
                                                            </div>




                                                        </div>
                                                        <div class="row" id="status">
                                                            <div class="col-md-6">
                                                                <div class="form-group mt-1">
                                                                    <input type="checkbox" value="1"
                                                                            name="category"
                                                                           id="switcheryColor4"
                                                                           class="switchery" data-color="success" checked/>

                                                                    <label for="switcheryColor4"
                                                                           class="card-title ml-1">الحالة   </label>

                                                                    @error("is_active")
                                                                    <span class="text-danger"> </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6"  id='parent_data'>
                                                                <div class="form-group mt-1">
                                                                   <select name="categories[]" id="" multiple>
                                                                    @foreach ($data['categories'] as  $category)
                                                                        <option value="{{$category->id}}"> {{$category->category_name}} </option>
                                                                    @endforeach
                                                                   </select>

                                                                    <label for="switcheryColor4"
                                                                           class="card-title ml-1">اختر القسم الرئيسي   </label>

                                                                    @error("categories")
                                                                    <span class="text-danger"> </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6" id='parent_data'>
                                                                <div class="form-group mt-1">
                                                                   <select name="brand_id" id="">
                                                                    @foreach ($data['brands'] as  $brand)
                                                                        <option value="{{$brand->id}}"> {{$brand->brand_name}} </option>
                                                                    @endforeach
                                                                   </select>

                                                                    <label for="switcheryColor4"
                                                                           class="card-title ml-1">اختر  الماركة    </label>

                                                                    @error("brand_id")
                                                                    <span class="text-danger"> </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6" id='parent_data'>
                                                                <div class="form-group mt-1">
                                                                   <select name="tags[]" id="" multiple>
                                                                    @foreach ($data['tags'] as  $tag)
                                                                        <option value="{{$tag->id}}"> {{$tag->tag_name}} </option>
                                                                    @endforeach
                                                                   </select>

                                                                    <label for="switcheryColor4"
                                                                           class="card-title ml-1">اختر  علامات البحث    </label>

                                                                    @error("tags")
                                                                    <span class="text-danger"> </span>
                                                                    @enderror
                                                                </div>
                                                            </div>




                                                        </div>





                                            </div>


                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
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

