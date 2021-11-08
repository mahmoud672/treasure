@extends('dashboard.layouts.layouts')
@section('title', 'Dashboard')
{{--Drop Your Customized Style Codes Here--}}
@section('customizedStyle')

@endsection
{{--Drop Your Customized Scripts Codes Here--}}
@section('customizedScript')
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
    <script>


    </script>
@endsection
{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            Team
            <small>All Members</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/team')}}">Team</a></li>
            <li class="active">Team</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary" style="padding: 15px">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Members Info</h3>
                        <a href="{{adminUrl('team/create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Member </a>
                    </div>
                    @include('dashboard.layouts.messages')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>CEO</th>
                            {{--<th>Created By</th>--}}
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>CEO</th>
                            {{--<th>Created By</th>--}}
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($members)
                            @foreach($members as $member)
                                <tr>
                                    <td>{{$member->id}}</td>
                                    <td><img src="{{$member->image_id ? asset($member->image->path) : asset('dashboard/img/picture.png')}}" style="width: 50px" alt="slide image" > </td>
                                    <td>{{$member->team_en->name}}</td>
                                    <td>{{$member->team_en->job_title}}</td>
                                    <td>{{$member->is_ceo ? "Yes" : "No"}}</td>
                                   {{-- <td>{{$member->createdBy->name}}</td>--}}
                                    <td>{{$member->created_at ? $member->created_at->diffForHumans() : ''}}</td>
                                    <td>{{$member->updated_at ? $member->updated_at->diffForHumans() : ''}}</td>
                                    <td>
                                        <a href="{{route('team.edit', $member->id)}}" class style="font-size: 20px"><i class="fa fa-pencil-square-o"></i> </a>
                                        <button type="button" class data-toggle="modal" data-target="#delete{{$member->id}}" style="font-size: 20px">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        {{--<button type="button" class data-toggle="modal" data-target="#assign{{$member->id}}" style="font-size: 20px">
                                            <i class="fa fa-user"></i>
                                        </button>--}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                    @if($members)
                        @foreach($members as $member)
                            <div class="modal modal-danger fade" id="delete{{$member->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete User</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure You Want To Delete Member <strong>{{$member->team_en->name}}</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('team.destroy', $member->id)}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <div class="d-flex flex-row">
                                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal" style="margin-right: 5px">
                                                        cancel
                                                    </button>
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        @endforeach
                    @endif

                    <!---- Modal for Assign Manager For Member --->
                    @if($members)
                        @foreach($members as $member)
                            <div class="modal modal-success fade" id="assign{{$member->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Assign Manager</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure You Want To Assign Manager to <strong>{{$member->team_en->name}}</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{adminUrl("team/".$member->id."/assign-manager")}}" method="post">

                                                @csrf
                                                <div class="d-flex flex-row">

                                                    @if($members)
                                                        @foreach($members as $manager)
                                                            @if($manager->id != $member->id)
                                                                <div class="col-lg-12">
                                                                    <label for="exampleInputEmail1">{{$manager->{'team_'.currentLang()}->name}}</label>
                                                                    <input type="radio" class="form-check-input assign-manager-input" name="manager_id"  value="{{$manager->id}}"  {{$manager->id == $member->manager_id ? "checked" : ""}}>

                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    <div class="col-lg-12">
                                                        <label for="exampleInputEmail1" class="text text-black"> Remove Manager</label>
                                                        <input type="radio" class="form-check-input assign-manager-input" name="manager_id"  value="">
                                                        <p class="text text-black text-bold">Check This When you want to Remove Manager </p>
                                                    </div>


                                                </div>
                                                {{--<div class="col-lg-6">
                                                    <input type="submit" id="reset-manager" class="btn btn-danger" name="reset"  value="Reset" >
                                                </div>--}}

                                                    <div class="col-lg-6">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>

                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        @endforeach
                    @endif
                    <!-- /.modal -->

                    <!-------------------------------------------->

                </div>
            </div>
        </div>
    </section>

@endsection
