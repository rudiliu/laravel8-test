

@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Users</h1>

    <form id="filter" action="" method="GET" class="row">
        <div class="col-md-3 form-group">
            <div class="input-group">
                {{ Form::select('perPage', [25 => '25 / page', 50 => '50 / page', 100 => '100 / page', 500 => '500 / page'], request()->input('perPage'), [ 'id' => 'perPage', 'class'=>'form-control', 'onchange'=>"$(location).attr('href', 'users?perPage='+ $('#perPage').val())"]) }}<br><br>
            </div>
        </div>

        <div class="col-md-6 form-group">
            <div class="input-group">
                <input class="input-error form-control" id="term" name="term" placeholder="Search by name, email" type="text" value="{{ (request()->has('term') ? request()->input('term') : '') }}"><span><button type="submit" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i> </button></span>
            </div>
        </div>
    </form>

    <div class="row">
        <div class="col-md-12 text-left">
            @if(request()->input('term')!='')
                Search result for "{{request()->input('term')}}"<br><br>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="col-md-12 text-right">
                        <a href="{{route('users.create')}}" class="btn btn-info btn-circle ripple" ><i class="fa fa-user-plus" aria-hidden="true"></i></a> <br><br>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($results as $item)

                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td class="text-center">

                                        <a href="users/{{$item->id}}/edit" title="Edit"><i class="fa fa-edit" aria-hidden="true"></i></a> &nbsp;

                                        <a href="#" title="delete" onclick="event.preventDefault();document.getElementById('delete-btn-{{$item->id}}').click();"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a> 

                                        <form action="{{ route('users.destroy', $item->id) }}" method="POST" style="display: inline !important;" >
                                            @method('DELETE')
                                            @csrf
                                            <button id="delete-btn-{{$item->id}}" class="d-none" onclick="return confirm('Are you sure to delete this item?')"><i class="fa fa-trash text-danger" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-12 text-center">
                        @if(count($results) < 1)
                            No User Found
                        @endif
                    </div>

                    <div class="col-md-12 text-center">
                        @php
                            $paginate = $results->links('vendor.pagination.bootstrap-4');

                            if(request()->has('term'))
                                $paginate = $results->appends(['term' => request()->input('term')])->links('vendor.pagination.bootstrap-4');

                            if(request()->has('perPage'))
                                $paginate = $results->appends(['perPage' => request()->input('perPage')])->links('vendor.pagination.bootstrap-4');
                        @endphp

                        {{$paginate}}
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection


