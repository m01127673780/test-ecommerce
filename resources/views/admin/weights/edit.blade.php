@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('weights/'.$weights->id),'method'=>'put']) !!}
    <div class="form-group">
      {!! Form::label('name_ar',trans('admin.name_ar')) !!}
      {!! Form::text('name_ar',$weights->name_ar,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('name_en',trans('admin.name_en')) !!}
      {!! Form::text('name_en',$weights->name_en,['class'=>'form-control']) !!}
    </div>
 
    {!! Form::submit(trans('admin.save'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection
