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
                                        <form class="myform form"  action = "{{route('product.images.store')}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf


                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> بيانات سعر المنتح </h4>

                                              <input type="hidden" name="product_id" value="{{$id}}">



                                      <h4> <i class='ft-home'></i> صور المنتج </h4>
                                      {{-- <div class="col-md-6 ">
                                        <div class="form-group">
                                            <label for="projectinput1">
                                            صورة المنتج </label>
                                            <input type="file" id="abbr"
                                                   class="form-control"
                                                   placeholder="  "
                                                   value=""
                                                   name="images[]" multiple>

                                            @error("photo")
                                            <span class="text-danger"> الصورة مطلوبة </span>
                                            @enderror
                                        </div>
                                    </div> --}}


                                    <div class="form-group">
                                        <label for="Product Name">Product photos (can attach more than one):</label>

                                        <input type="file" class="form-control" name="photos[]" multiple />


                                    </div>
                                        @error("photos")
                                          <span class="text-danger"> {{$message}} </span>
                                        @enderror



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


@section('script')

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
// $(function() {
//     $('.myform').submit(function(e) {
//       e.preventDefault();
//       let formData =  new FormData(this);
//       $.ajax({
//         url: "{{route('product.images.store')}}",
//         data: formData,
//         type: 'POST',
//         processData: false,
//         contentType: false,

//         beforeSend: function(xhr) {
//            xhr.setRequestHeader('X-CSRF-TOKEN', "{{ csrf_token() }}")
//         },

//         success: function(response) {
//             console.log(response)
//         },

//         error: function (err) {
//             console.log(err)
//         }

//       })
//     });
// })


</script>


@endsection

