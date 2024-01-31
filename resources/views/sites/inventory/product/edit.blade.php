@extends('inventory.layout')
@section('title', 'Update Product')
@section('content')
    <div class="container-fluid">
    	<div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-headphones bg-blue"></i>
                        <div class="d-inline">
                            <h5>Update Product</h5>
                            <span>Update product in inventory</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/dashboard"><i class="ik ik-home"></i></a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Update Product</a>
                            </li>
                        </ol>
                    </nav>
                      <!-- start message area-->
            @include('include.message')
            <!-- end message area-->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
                            @csrf   
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="title">Title<span class="text-red">*</span></label>
                                        <input id="title" type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="Enter product title" required="">
                                        <div class="help-block with-errors"></div>

                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea class="form-control html-editor h-205"  name="description" rows="10">{{$product->desc}}</textarea>
                                    </div>

                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Select Categories<span class="text-red">*</span></label>
                                        <select class="form-control" name="category_id" required>
                                            <option selected="selected" value="" >Select Categories</option>
                                            @foreach ($categories as $category)
                                               <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected':''}}>{{$category->cat_name}}</option> 
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="sku">SKU<span class="text-red">*</span></label>
                                        <input id="sku" type="text" class="form-control" name="sku" value="" placeholder="Enter Product SKU" required="">
                                        <div class="help-block with-errors"></div>
                                    </div> --}}
                                    <div class="form-group">
                                        <label for="price">Price<span class="text-red">*</span></label>
                                        <input id="price" type="text" class="form-control" name="price" value="{{$product->price}}" placeholder="Enter product price" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <label>Product Images<span class="text-red">*</span></label>
                                        {{-- <div class="input-images" data-input-name="product-images" data-label="Drag & Drop product images here or click to browse"></div> --}}
                                        <input type="file" name="image" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Product Status<span class="text-red">*</span></label>
                                        <select class="form-control" name="status" required>
                                            <option value="publish" {{$product->status == "publish" ? 'selected':''}}>publish</option>
                                            <option value="unpublish" {{$product->status == "unpublish" ? 'selected':''}}>unpublish</option>
                                          </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Competition Status<span class="text-red">*</span></label>
                                        <select class="form-control" name="competiton_status" required>
                                            <option value="1" {{$product->competiton_status == "1" ? 'selected':''}}>Yes</option>
                                            <option value="0" {{$product->competiton_status == "0" ? 'selected':''}}>No</option>
                                          </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn  btn-primary">Update Product</button>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <img src="{{asset('assets/images/products')}}/{{$product->image}}" alt="" style="height:10vw" class="mx-auto">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
