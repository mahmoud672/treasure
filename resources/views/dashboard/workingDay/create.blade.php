@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')
@endsection
{{--Drop Your Customized Scripts Codes Here--}}
@section('customizedScript')
    <script>
        //Initialize Select2 Elements
        $('.select2').select2()
    </script>
@endsection
{{-- Start of page Content --}}
@section('content')


    <section class="content-header">
        <h1>
            Working Days
            <small>Create Working Days</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/offer')}}">Working Days</a></li>
            <li class="active">Create Working Days</li>
        </ol>
    </section>


    <section class="content">
        @include('dashboard.layouts.messages')
        <form role="form" action="{{route('working-days.store')}}" enctype="multipart/form-data" method="post">
            @csrf
            @method('post')
            <div class="row">
                <!-- English Side -->
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Working Days Info</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1">Choose Branch</label>
                                    <select name="branch_id" id="admin_type" class="form-control">
                                        <option value="0">Choose Branch Name</option>
                                        @if($branches)
                                            @foreach($branches as $branch)
                                                <option value="{{$branch->id}}">{{$branch->branch_en->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <p class="help-block"> Choose type of album </p>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Enter closing Days</label>
                                    <input type="text" class="form-control" name="closing_days_en" id="exampleInputEmail1" placeholder="Day - Day" value="{{old("closing_days_en")}}">
                                    <p class="help-block">Favourite Format For Avalability Example: sat - thu  8Am-8Pm ..</p>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Enter Work Days</label>
                                    <input type="text" class="form-control" name="working_time_en" id="exampleInputEmail1" placeholder="Enter From : Day - Day" value="{{old("working_time_en")}}">
                                    <p class="help-block">Favourite Format For Avalability Example: sat - thu   ..</p>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Enter Work Hours</label>
                                    <input type="text" class="form-control" name="working_hrs_en" id="exampleInputEmail1" placeholder="Enter From : hourAm  - hourPm" value="{{old("working_hrs_en")}}">
                                    <p class="help-block">Favourite Format For Avalability Example:From 8Am - 8Pm ..</p>
                                </div>
                            </div>
                        </div>
                        {{--<div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Saturday</label>
                                    <input type="text" class="form-control" name="sat_en" id="exampleInputEmail1" placeholder="Enter Working Hours" value="{{old('sat_en')}}">
                                    <p class="help-block">Enter Saturday Working Hours</p>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Sunday</label>
                                    <input type="text" class="form-control" name="sun_en" id="exampleInputEmail1" placeholder="Enter Working Hours" value="{{old('sun_en')}}">
                                    <p class="help-block">Enter Sunday Working Hours</p>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Monday</label>
                                    <input type="text" class="form-control" name="mon_en" id="exampleInputEmail1" placeholder="Enter Working Hours" value="{{old('mon_en')}}">
                                    <p class="help-block">Enter Monday Working Hours</p>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Tuesday</label>
                                    <input type="text" class="form-control" name="tus_en" id="exampleInputEmail1" placeholder="Enter Working Hours" value="{{old('tus_en')}}">
                                    <p class="help-block">Enter Tuesday Working Hours</p>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Wednesday</label>
                                    <input type="text" class="form-control" name="wed_en" id="exampleInputEmail1" placeholder="Enter Working Hours" value="{{old('wed_en')}}">
                                    <p class="help-block">Enter Wednesday Working Hours</p>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Thursday</label>
                                    <input type="text" class="form-control" name="thu_en" id="exampleInputEmail1" placeholder="Enter Working Hours" value="{{old('thu_en')}}">
                                    <p class="help-block">Enter Thursday Working Hours</p>
                                </div>
                            </div>
                        </div>

                        <div class="box-body">
                            <div class="form-group">
                                <div class="col-lg-12">
                                    <label for="exampleInputEmail1"> Friday</label>
                                    <input type="text" class="form-control" name="fri_en" id="exampleInputEmail1" placeholder="Enter Working Hours" value="{{old('fri_en')}}">
                                    <p class="help-block">Enter Friday Working Hours</p>
                                </div>
                            </div>
                        </div>--}}

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
                            <h3 class="box-title">اضف مواعيد العمل</h3>
                        </div>
                        <!-- .box-header -->
                        <!-- form start -->



                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label for="exampleInputEmail1"> أكتب أيام الاغلاق</label>
                                            <input type="text" class="form-control" name="closing_days_ar" id="exampleInputEmail1" placeholder="يوم - يوم" value="{{old("closing_days_ar")}}">
                                            <p class="help-block">أكتب أيام الاغلاق</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label for="exampleInputEmail1"> أكتب أيام العمل</label>
                                            <input type="text" class="form-control" name="working_time_ar" id="exampleInputEmail1" placeholder="يوم - يوم" value="{{old("working_time_ar")}}">
                                            <p class="help-block">أكتب أيام العمل</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="box-body">
                                    <div class="form-group">
                                        <div class="col-lg-12">
                                            <label for="exampleInputEmail1">أكتب أوقات العمل</label>
                                            <input type="text" class="form-control" name="working_hrs_ar" id="exampleInputEmail1" placeholder="أكتب من ساعة - ساعة" value="{{old("working_hrs_ar")}}">
                                            <p class="help-block">أكتب أوقات العمل</p>
                                        </div>
                                    </div>
                                </div>
                              {{--  <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for="exampleInputEmail1"> الأحد</label>
                                        <input type="text" class="form-control" name="sun_ar" id="exampleInputEmail1" placeholder="ادخل ساعات العمل" value="{{old('sun_ar')}}">
                                        <p class="help-block">ساعات العمل يوم الأحد</p>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for="exampleInputEmail1"> الإثنين</label>
                                        <input type="text" class="form-control" name="mon_ar" id="exampleInputEmail1" placeholder="ادخل ساعات العمل" value="{{old('mon_ar')}}">
                                        <p class="help-block">ساعات العمل يوم الإثنين</p>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for="exampleInputEmail1"> الثلاثاء</label>
                                        <input type="text" class="form-control" name="tus_ar" id="exampleInputEmail1" placeholder="ادخل ساعات العمل" value="{{old('tus_ar')}}">
                                        <p class="help-block">ساعات العمل يوم الثلاثاء</p>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for="exampleInputEmail1"> الأربعاء</label>
                                        <input type="text" class="form-control" name="wed_ar" id="exampleInputEmail1" placeholder="ادخل ساعات العمل" value="{{old('wed_ar')}}">
                                        <p class="help-block">ساعات العمل يوم الأربعاء</p>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for="exampleInputEmail1"> الخميس</label>
                                        <input type="text" class="form-control" name="thu_ar" id="exampleInputEmail1" placeholder="ادخل ساعات العمل" value="{{old('thu_ar')}}">
                                        <p class="help-block">ساعات العمل يوم الخميس</p>
                                    </div>
                                </div>
                            </div>

                            <div class="box-body">
                                <div class="form-group">
                                    <div class="col-lg-12">
                                        <label for="exampleInputEmail1"> الجمعة</label>
                                        <input type="text" class="form-control" name="fri_ar" id="exampleInputEmail1" placeholder="ادخل ساعات العمل" value="{{old('fri_ar')}}">
                                        <p class="help-block">ساعات العمل يوم الجمعة</p>
                                    </div>
                                </div>
                            </div>--}}


                </div>
            </div>
        </form>
    </section>

@endsection
