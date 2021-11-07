@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')
@endsection
{{--Drop Your Customized Scripts Codes Here--}}
@section('customizedScript')
    <script src="{{assetPath('dashboard/bower_components/ckeditor/ckeditor.js')}}"></script>

    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor10');
            CKEDITOR.replace('editor12');
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>

    <script>
        //Initialize Select2 Elements
        //$('.select2').select2()
    </script>
@endsection
{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            Products
            <small>Add Product</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/product')}}">Products</a></li>
            <li class="active">Add Product</li>
        </ol>
    </section>


    <section class="content">
        @include('dashboard.layouts.messages')
        <form role="form" action="{{adminUrl('category/'.$category->id . '/create-product')}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('post')
            <input type="hidden" name="created_by">
            <div class="row">
                <!-- English Side -->
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                        <h3 class="box-title">Add product Info</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-lg-12">
                                <label for="exampleInputEmail1"> Category </label>
                                <input type="text" class="form-control" disabled="disabled" name="category" id="exampleInputEmail1"  value="{{$category->category_en->title}}">
                                <p class="help-block">This is The Parent product of the one you will add</p>
                            </div>

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1"> Title</label>
                                <input type="text" class="form-control" name="title_en" id="exampleInputEmail1" placeholder="Enter product Title" value="{{old('title_en')}}">
                                <p class="help-block">Enter product of product</p>
                            </div>

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1">Product Slug</label>
                                <textarea type="text" class="form-control" name="slug_en" id="exampleInputEmail1" placeholder="Enter Product slug">{{old('slug_en')}}</textarea>
                                <p class="help-block">Enter Title of Product</p>
                            </div>

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1">Product Url</label>
                                <input type="text" class="form-control" name="url" id="exampleInputEmail1" placeholder="Enter Product url" value="{{old('url')}}">
                                <p class="help-block">Enter Url of Article which will shown in url <strong>If Url is empty, system will choose article title as url by Default</strong></p>
                            </div>

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1"> Product Description</label>
                                <textarea  class="form-control" name="description_en" id="editor10" placeholder="Enter Product Description" rows="6">{{old('description_en')}}</textarea>
                                <p class="help-block">Enter Description of Product</p>
                            </div>

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1"> Image</label>
                                <input type="file" class="form-control" name="image_id" id="exampleInputEmail1" placeholder="Enter Product text">
                                <p class="help-block"> Upload Product main Image </p>
                            </div>
                            <div class="col-lg-12">
                                <label for="exampleInputEmail1">Product Images</label>
                                <input type="file" class="form-control" name="images[]" id="exampleInputEmail1" multiple>
                                <p class="help-block"> Upload Product Images </p>
                            </div>

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1">Image Alt Text</label>
                                <input type="text" class="form-control" name="img_alt" id="exampleInputEmail1" placeholder="Enter Alt Text" value="{{old('img_alt')}}">
                                <p class="help-block"> Enter Alt Text for Image to show it if image isn't loaded </p>
                            </div>

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1"> Icon</label>
                                <input type="file" class="form-control" name="icon" id="exampleInputEmail1" placeholder="Enter Product text">
                                <p class="help-block"> Upload Product Icon </p>
                            </div>

                            <div class="col-lg-12">
                                <label for="exampleInputEmail1">Icon Alt Text</label>
                                <input type="text" class="form-control" name="icon_alt" id="exampleInputEmail1" placeholder="Enter Alt Text" value="{{old('icon_alt')}}">
                                <p class="help-block"> Enter Alt Text for Icon to show it if image isn't loaded </p>
                            </div>

                           {{-- <div class="col-lg-12">
                                <label for="exampleInputEmail1">Product Price</label>
                                <input type="text" class="form-control" name="price" id="exampleInputEmail1" placeholder="Enter The Price of Product" value="{{old('price')}}">
                                <p class="help-block"> Enter Price for Product  </p>
                            </div>--}}

                            {{--<div class="col-lg-12">
                                <label for="exampleInputEmail1">Product Size</label>
                                <input type="text" class="form-control" name="size" id="exampleInputEmail1" placeholder="Enter The Size of Product" value="{{old('size')}}">
                                <p class="help-block"> Enter Size for Product  </p>
                            </div>--}}

                            {{--<div class="col-lg-12">
                                <label for="exampleInputEmail1">Product Material</label>
                                <input type="text" class="form-control" name="material_en" id="exampleInputEmail1" placeholder="Enter The Material of Product" value="{{old('material_en')}}">
                                <p class="help-block"> Enter Material for Product  </p>
                            </div>--}}
                            {{--<div class="col-lg-12">
                                <label for="exampleInputEmail1">Origin Country</label>
                                <input type="text" class="form-control" name="origin_country_en" id="exampleInputEmail1" placeholder="Enter The Origin Country of Product" value="{{old('origin_country_en')}}">
                                <p class="help-block"> Enter The Origin Country for Product  </p>
                            </div>--}}

                            {{--<div class="col-lg-12">
                                <label for="exampleInputEmail1"> Video Url</label>
                                <input type="url" class="form-control" name="video_id" id="exampleInputEmail1" placeholder="Enter Video Url">
                                <p class="help-block"> Enter Youtube Video Embed Url </p>
                            </div>--}}

                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- Arabic Side -->
                <div class="col-md-6 arab_dir">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">أضف بيانات المنتج</h3>
                        </div>
                        <!-- .box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> عنوان المنتج</label>
                                    <input type="text" class="form-control" name="title_ar" id="exampleInputEmail1" placeholder="ادخل عنوان المنتج" value="{{old('title_ar')}}">
                                    <p class="help-block">أضف عنوان المنتج</p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> نبذة عن المنتج</label>
                                    <textarea type="text" class="form-control" name="slug_ar" id="exampleInputEmail1" placeholder="ادخل  نبذة عن المنتج">{{old('slug_ar')}}</textarea>
                                    <p class="help-block">ادخل  نبذة عن المنتج</p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1">وصف المنتج</label>
                                    <textarea class="form-control" name="description_ar" id="editor12" placeholder="ادخل  وصف المنتج" rows="6" >{{old('description_ar')}}</textarea>
                                    <p class="help-block">ادخل وصفا دقيقا عن المنتج</p>
                                </div>
                                {{--<div class="col-lg-12">

                                    <label for="exampleInputEmail1"> المواد المصنوع منها المنتج </label>
                                    <input type="text" class="form-control" name="material_ar" id="exampleInputEmail1" placeholder="المواد المصنوع منها المنت" value="{{old('material_ar')}}">
                                    <p class="help-block"> المواد المصنوع منها المنت </p>
                                </div>--}}

                                {{--<div class="col-lg-12">
                                    <label for="exampleInputEmail1">بلد صناعة المنتج</label>
                                    <input type="text" class="form-control" name="origin_country_ar" id="exampleInputEmail1" placeholder="بلد صناعة المنتج" value="{{old('origin_country_ar')}}">
                                    <p class="help-block"> بلد صناعة المنتج  </p>
                                </div>--}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>


@endsection
