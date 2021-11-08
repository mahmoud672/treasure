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
@endsection
{{-- Start of page Content --}}
@section('content')

    <section class="content-header">
        <h1>
            Projects
            <small>All Projects</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{adminUrl('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{adminUrl('/project')}}">Project</a></li>
            <li class="active">All Projects</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary" style="padding: 15px">
                    <div class="box-header with-border">
                        <h3 class="box-title">All Projects Info</h3>
                        <a href="{{adminUrl('project/create')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Project </a>
                    </div>
                    @include('dashboard.layouts.messages')
                    <!-- /.box-header -->
                    <!-- form start -->
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Image</th>
                            <th>Title</th>
                            {{--<th>Branch</th>
                            <th>Client Name</th>
                            <th>Contract Subject</th>--}}
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>id</th>
                            <th>Image</th>
                            <th>Title</th>
                            {{--<th>Branch</th>
                            <th>Client Name</th>
                            <th>Contract Subject</th>--}}
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @if($projects)
                            @foreach($projects as $project)
                                <tr>
                                    <td>{{$project->id}}</td>
                                    <td><img src="{{assetPath($project->image->path)}}" width="50" alt=""></td>
                                    <td>{{$project->project_en->title}}</td>
                                   {{-- <td>{{$project->branch->branch_ar->name}}</td>
                                    <td>{{$project->project_ar->client_name}}</td>
                                    <td>{{$project->project_ar->contract_subject}}</td>--}}
                                    <td>{{$project->created_at ? $project->created_at->diffForHumans() : ''}}</td>
                                    <td>{{$project->updated_at ? $project->updated_at->diffForHumans() : ''}}</td>
                                    <td>
                                        <a href="{{adminUrl("project/$project->id/show-images")}}" class="" style="font-size: 20px"><i class="fa fa-image"></i> </a>
                                        <a href="{{route('project.edit', $project->id)}}" class style="font-size: 20px"><i class="fa fa-pencil-square-o"></i> </a>
                                        <button type="button" class data-toggle="modal" data-target="#delete{{$project->id}}" style="font-size: 20px">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                    @if($projects)
                        @foreach($projects as $project)
                            <div class="modal modal-danger fade" id="delete{{$project->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Delete User</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You Sure You Want To Delete Project <strong>{{$project->project_ar->title}}</strong></p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{route('project.destroy', $project->id)}}" method="post">
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

                </div>
            </div>
        </div>
    </section>

@endsection
