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
                                        <form class="form" action="{{route('product.stock.store' , $id)}}"
                                              method="POST"
                                              enctype="multipart/form-data">
                                            @csrf


                                            <div class="form-body">

                                                <h4 class="form-section"><i class="ft-home"></i> {{__('messages.product_info_in_warehouse')}} </h4>

                                              <input type="hidden" name="product_id" value="{{$id}}">



                                            <div class="row">


                                                <div class="form-group">
                                                        <label for="projectinput1">{{ __('messages.productcode') }}  </label>
                                                        <input  type= "text" value="" id="name" name = "sku"
                                                               class="form-control"
                                                               placeholder="  "
                                                                  />
                                                        @error("sku")
                                                        <span class="text-danger"> {{$message}}</span>
                                                        @enderror
                                                </div>
                                            </div>


                                            <div class="row">

                                                <div class="form-group mt-1">

                                                    <label for="switcheryColor4"
                                                           class="card-title ml-1"> {{__('messages.status') }}   </label>
                                                    <select name= "in_stock" value = {{old('manage_stock')}}
                                                           
                                                           
                                                           class="switchery"
                                                            data-color="success">

                                                     <option value="1"> {{__('messages.available')}}  </option>
                                                     <option value="0">{{__('messages.unavailable') }}</option>

                                                    </select>
                                                    @error("in_stock")
                                                    <span class="text-danger"> {{$message}} </span>
                                                    @enderror
                                                </div>
                                        </div>








                                                <div class="row">

                                                    <div class="form-group mt-1">

                                                        <label for="switcheryColor4"
                                                         class="card-title ml-1"> {{__('messages.track_warehouse') }}   </label>
                                                        <select name= "manage_stock"
                                                              
                                                                id="mySelect" class="switchery" data-color="success" >
                                                        <option selected> {{__('messages.choose_the_product_tracking_status') }} </option>

                                                         <option value="1"> {{__('messages.enable_warehouse_tracking') }} </option>
                                                         <option value="0">{{__('messages.disable_warehouse_tracking')}} </option>

                                                        </select>
                                                        @error("manage_stock")
                                                        <span class="text-danger"> {{$message}} </span>
                                                        @enderror
                                                    </div>
                                            </div>
                                            <div class="row" style="display:none;" id= "qty">
                                                <div class="form-group mt-1">
                                                    <label for="switcheryColor4"
                                                    class="card-title ml-1"> {{__('messages.qty')}}   </label>
                                                    <input name="qty" type = "number" value={{old('qty')}}
                                                      
                                                           id="switcheryColor4"
                                                           class="switchery" data-color="success" />



                                                    @error("qty")
                                                    <span class="text-danger"> {{$message}} </span>
                                                    @enderror
                                                </div>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script>
$(document).ready(function() {
  $('#mySelect').change(function() {
    if ($(this).val() === '1') {
      $('#qty').show();
    } else {
      $('#qty').hide();
    }
  });
});

</script>
