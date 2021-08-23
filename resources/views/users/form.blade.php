

<div class="form-group row">
    {{ Form::label('name','Name',['class'=>'control-label col-sm-3']) }}
    <div class="col-sm-6">
        {{ Form::text('name',old('name'),['class'=>'form-control']) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('email','Email',['class'=>'control-label col-sm-3']) }}
    <div class="col-sm-6">
        {{ Form::text('email',old('email'),['class'=>'form-control']) }}
    </div>
</div>



@if(isset($user))
<div class="form-group row">
    {{ Form::label('password','Password',['class'=>'control-label col-sm-3']) }}
    <div class="col-sm-6">
        {{ Form::password('password', ['class'=>'form-control']) }}
        <small>leave password empty if not insist to change</small>
    </div>
</div>
@else
<div class="form-group row">
    {{ Form::label('password','Password',['class'=>'control-label col-sm-3']) }}
    <div class="col-sm-6">
        {{ Form::password('password', ['class'=>'form-control']) }}
    </div>
</div>

<div class="form-group row">
    {{ Form::label('password_confirmation','Confirm Password',['class'=>'control-label col-sm-3']) }}
    <div class="col-sm-6">
        {{ Form::password('password_confirmation', ['class'=>'form-control']) }}
    </div>
</div>
@endif


<div class="form-group row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        {{ link_to_route('users.index','Cancel',[],['class'=>'btn btn-default']) }}
        {{ Form::submit('Submit',['class'=>'btn btn-primary']) }}
    </div>
</div>


