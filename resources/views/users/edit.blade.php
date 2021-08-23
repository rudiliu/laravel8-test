@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update User - {{$user->name}}</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                    <div class="panel-layout" style="margin:0">
                        @include('errors.form')
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            {{ Form::model($user,['method'=>'PATCH','url'=>route('users.update',['user'=>$user->id]),'class'=>'form form-horizontal bordered-row form-validate','driver'=>'form']) }}
                            @include('users.form')
                            {{ Form::close() }}
                        </div>
                    </div>

                    <div class="last_update_info text-right">
                        <i>Updated
                            <span data-toggle="tooltip" title="{{$user->updated_at}}"> {{$user->updated_at->diffForHumans()}}</span>
                        </i>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@stop
