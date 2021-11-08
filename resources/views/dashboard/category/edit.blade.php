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
            CKEDITOR.replace('editor3');
            CKEDITOR.replace('editor4');
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
    <script>
        //Initialize Select2 Elements
        $('.select2').select2()
    </script>
@endsection
{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            Categories
            <small>Edit Category</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/category')}}">Category</a></li>
            <li class="active">Edit Category</li>
        </ol>
    </section>


    <section class="content">
        @include('dashboard.layouts.messages')
        <form role="form" action="{{route('category.update', $category->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('patch')
            <div class="row">
                <!-- English Side -->
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Category Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                @if($category->parent_category_id)
                                    <div class="col-lg-12">
                                        <label for="exampleInputEmail1">Parent Category</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" disabled  value="{{$category->parentCategory->category_en->title}}">
                                        <p class="help-block">This Title of Parent Category</p>
                                    </div>
                                @endif

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Title</label>
                                    <input type="text" class="form-control" name="title_en" id="exampleInputEmail1" placeholder="Enter Category Title" value="{{$category->category_en->title}}">
                                    <p class="help-block">Enter title of category</p>
                                </div>

                                {{--<div class="col-lg-12">
                                    <label for="exampleInputEmail1">Category Slug</label>
                                    <textarea type="text" class="form-control" name="slug_en" id="exampleInputEmail1" placeholder="Enter Category slug">{{$category->category_en->slug}}</textarea>
                                    <p class="help-block">Enter Title of Category</p>
                                </div>--}}

                                    <div class="col-lg-12">
                                        <label for="exampleInputEmail1">Category Url</label>
                                        <input type="text" class="form-control" name="url" id="exampleInputEmail1" placeholder="Enter Category slug" value="{{$category->url}}">
                                        <p class="help-block">Enter Url of Article which will shown in url <strong>If Url is empty, system will choose article title as url by Default</strong></p>
                                    </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Category Description</label>
                                    <textarea class="form-control" name="description_en" id="editor3" placeholder="Enter Category Description" rows="6">{{$category->category_en->description}}</textarea>
                                    <p class="help-block">Enter Description of Category</p>
                                </div>

                                    <div class="col-lg-12">
                                        <label for="exampleInputEmail1"> Image</label>
                                        <input type="file" class="form-control" name="image_id" id="exampleInputEmail1" placeholder="Enter Category text">
                                        <p class="help-block"> Upload Category Image </p>
                                    </div>
                                    {{--<div class="col-lg-12">
                                        <label for="exampleInputEmail1">Category Images</label>
                                        <input type="file" class="form-control" name="images[]" id="exampleInputEmail1" placeholder="Enter Category text"multiple>
                                        <p class="help-block"> Upload Category Images </p>
                                    </div>--}}

                                    <div class="col-lg-12">
                                        <label for="exampleInputEmail1">Image Alt Text</label>
                                        <input type="text" class="form-control" name="img_alt" id="exampleInputEmail1" placeholder="Enter Alt Text" value="{{$category->image->alt}}">
                                        <p class="help-block"> Enter Alt Text for Image to show it if image isn't loaded </p>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="exampleInputEmail1"> Icon</label>
                                        <input type="file" class="form-control" name="icon" id="exampleInputEmail1" placeholder="Enter Category text">
                                        <p class="help-block"> Upload Category Icon </p>
                                    </div>

                                    <div class="col-lg-12">
                                        <label for="exampleInputEmail1">Icon Alt Text</label>
                                        <input type="text" class="form-control" name="icon_alt" id="exampleInputEmail1" placeholder="Enter Alt Text" value="{{$category->iconImg->alt}}">
                                        <p class="help-block"> Enter Alt Text for Icon to show it if image isn't loaded </p>
                                    </div>

                                {{--<div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Video Url</label>
                                    <input type="text" class="form-control" name="video_id" id="exampleInputEmail1" placeholder="Enter Category Title" value="{{$category->video_id ? $category->video->url : ''}}">
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
                            <h3 class="box-title">أضف بيانات الصنف</h3>
                        </div>
                        <!-- .box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                @if($category->parent_category_id)
                                    <div class="col-lg-12">
                                        <label for="exampleInputEmail1">الصنف الرئيسي</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" disabled  value="{{$category->parentCategory->category_ar->title}}">
                                        <p class="help-block">عموان الصنف الرئيسي</p>
                                    </div>
                                @endif

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> عنوان الصنف</label>
                                    <input type="text" class="form-control" name="title_ar" id="exampleInputEmail1" placeholder="ادخل عنوان الصنف" value="{{$category->category_ar->title}}">
                                    <p class="help-block">أضف عنوان الصنف</p>
                                </div>

                                {{--<div class="col-lg-12">
                                    <label for="exampleInputEmail1"> نبذة عن الصنف</label>
                                    <textarea type="text" class="form-control" name="slug_ar" id="exampleInputEmail1" placeholder="ادخل  نبذة عن الصنف" >{{$category->category_ar->slug}}</textarea>
                                    <p class="help-block">ادخل  نبذة عن الصنف</p>
                                </div>--}}

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1">وصف الصنف</label>
                                    <textarea class="form-control" name="description_ar" id="editor4" placeholder="ادخل  وصف الصنف" rows="6">{{$category->category_ar->description}}</textarea>
                                    <p class="help-block">ادخل وصفا دقيقا عن الصنف</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection
