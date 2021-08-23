@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create New Users</h1>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">

                    <div class="panel-layout" style="margin:0">
                        @include('errors.form')
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            {{ Form::open(['url'=>route('users.store'),'class'=>'form form-horizontal bordered-row form-validate','role'=>'form']) }}
                            @include('users.form')
                            {{ Form::close() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
