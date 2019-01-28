@extends('admin.index')
@section('content')

<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('weights')]) !!}
    <div class="form-group">
      {!! Form::label('name_ar',trans('admin.name_ar')) !!}
      {!! Form::text('name_ar',old('name_ar'),['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('name_en',trans('admin.name_en')) !!}
      {!! Form::text('name_en',old('name_en'),['class'=>'form-control']) !!}
    </div>

    {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
@endsection
