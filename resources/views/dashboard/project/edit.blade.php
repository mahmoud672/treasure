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
            Projects
            <small>Edit Project</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/project')}}">Project</a></li>
            <li class="active">Edit Project</li>
        </ol>
    </section>


    <section class="content">
        @include('dashboard.layouts.messages')
        <form role="form" action="{{route('project.update', $project->id)}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('patch')
            <div class="row">
                <!-- English Side -->
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Project Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                {{--<div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Client Name</label>
                                    <input type="text" class="form-control" name="client_name_en" id="exampleInputEmail1" placeholder="Enter Client Name" value="{{$project->project_en->client_name}}">
                                    <p class="help-block">Enter Client Name</p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1">Contract Subject</label>
                                    <textarea type="text" class="form-control" name="contract_subject_en" id="editor10" placeholder="Enter Contract Subject">{{$project->project_en->contract_subject}}</textarea>
                                    <p class="help-block">Enter Contract Subject</p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1">Capacity</label>
                                    <input type="text" class="form-control" name="capacity_en" id="exampleInputEmail1" placeholder="Enter Capacity" value="{{$project->project_en->capacity}}">
                                    <p class="help-block">Enter Capacity </p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> From Date</label>
                                    <input  class="form-control" name="from_date" type="date" id="exampleInputEmail1" placeholder="Enter From Date" value="{{$project->from_date->format("Y-m-d")}}">
                                    <p class="help-block">Enter Starting Date</p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> To Date</label>
                                    <input  class="form-control" name="to_date" type="date" id="exampleInputEmail1" placeholder="Enter To Date" value="{{$project->to_date->format("Y-m-d")}}">
                                    <p class="help-block">Enter Ending Date</p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Branch</label>
                                    <select name="branch_id" id="" class="form-control">
                                        <option value="">---- Choose Branch ----</option>
                                        @if($branches)
                                            @foreach($branches as $branch)
                                                <option value="{{$branch->id}}" {{$project->branch_id == $branch->id ? "selected" : ""}}>{{$branch->branch_ar->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p class="help-block">Choose Branch</p>
                                </div>--}}

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Title</label>
                                    <input type="text" class="form-control" name="title_en" id="exampleInputEmail1" placeholder="Enter Project Title" value="{{$project->project_en->title}}">
                                    <p class="help-block">Enter title of service</p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1">Project Slug</label>
                                    <textarea type="text" class="form-control" name="slug_en" id="exampleInputEmail1" placeholder="Enter Project slug">{{$project->project_en->slug}}</textarea>
                                    <p class="help-block">Enter Title of Project</p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1">Project Url</label>
                                    <input type="text" class="form-control" name="url" id="exampleInputEmail1" placeholder="Enter Project slug" value="{{$project->url}}">
                                    <p class="help-block">Enter Url of Project which will shown in url <strong>If Url is empty, system will choose Project title as url by Default</strong></p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Project Description</label>
                                    <textarea class="form-control" name="description_en" id="editor3" placeholder="Enter Project Description" rows="6">{{$project->project_en->description}}</textarea>
                                    <p class="help-block">Enter Description of Project</p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Image</label>
                                    <input type="file" class="form-control" name="image_id" id="exampleInputEmail1" placeholder="Enter Project text">
                                    <p class="help-block"> Upload Project main Image </p>
                                </div>
                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1">Image Alt Text</label>
                                    <input type="text" class="form-control" name="img_alt" id="exampleInputEmail1" placeholder="Enter Alt Text" value="{{$project->image->alt}}">
                                    <p class="help-block"> Enter Alt Text for Image to show it if image isn't loaded </p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Icon</label>
                                    <input type="file" class="form-control" name="icon" id="exampleInputEmail1" placeholder="Enter Project text">
                                    <p class="help-block"> Upload Project Icon </p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1">Icon Alt Text</label>
                                    <input type="text" class="form-control" name="icon_alt" id="exampleInputEmail1" placeholder="Enter Alt Text" value="{{$project->iconImg->alt}}">
                                    <p class="help-block"> Enter Alt Text for Icon to show it if image isn't loaded </p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Video Url</label>
                                    <input type="text" class="form-control" name="video_id" id="exampleInputEmail1" placeholder="Enter Project Title" value="{{$project->video_id ? $project->video->url : ''}}">
                                    <p class="help-block"> Enter Youtube Video Embed Url </p>
                                </div>


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
                            <h3 class="box-title">أضف بيانات الصورة</h3>
                        </div>
                        <!-- .box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">

                                {{--<div class="col-lg-12">
                                    <label for="exampleInputEmail1"> اسم العميل</label>
                                    <input type="text" class="form-control" name="client_name_ar" id="exampleInputEmail1" placeholder="أدخل اسم الغميل" value="{{$project->project_ar->client_name}}">
                                    <p class="help-block">أدخل اسم الغميل</p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1">موضوع العقد</label>
                                    <textarea type="text" class="form-control" name="contract_subject_ar" id="editor11" placeholder="أدخل موضوع العقد">{{$project->project_ar->contract_subject}}</textarea>
                                    <p class="help-block">أدخل موضوع العقد</p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1">السعة</label>
                                    <input type="text" class="form-control" name="capacity_ar" id="exampleInputEmail1" placeholder="أدخل السعة" value="{{$project->project_ar->capacity}}">
                                    <p class="help-block">أدخل السعة </p>
                                </div>--}}

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> عنوان المشروع</label>
                                    <input type="text" class="form-control" name="title_ar" id="exampleInputEmail1" placeholder="ادخل عنوان المشروع" value="{{$project->project_ar->title}}">
                                    <p class="help-block">أضف عنوان المشروع</p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> نبذة عن المشروع</label>
                                    <textarea type="text" class="form-control" name="slug_ar" id="exampleInputEmail1" placeholder="ادخل  نبذة عن المشروع" >{{$project->project_ar->slug}}</textarea>
                                    <p class="help-block">ادخل  نبذة عن المشروع</p>
                                </div>

                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1">وصف المشروع</label>
                                    <textarea class="form-control" name="description_ar" id="editor4" placeholder="ادخل  وصف المشروع" rows="6">{{$project->project_ar->description}}</textarea>
                                    <p class="help-block">ادخل وصفا دقيقا عن المشروع</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection
