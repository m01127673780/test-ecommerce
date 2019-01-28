@extends('admin.index')
@section('content')


<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('products')]) !!}

<a class="btn btn-primary" href="">{{ trans('admin.save_continue') }} <i class="fa fa-floppy-o "></i></a>
<a class="btn btn-success" href="">{{ trans('admin.save') }} <i class="fa fa-floppy-o"></i></a>
<a class="btn btn-info" href="">{{ trans('admin.copy_products') }} <i class="fa fa-copy"></i></a>
<a class="btn btn-danger" href="">{{ trans('admin.delete') }} <i class="fa fa-trash"></i></a>
<br>
<br>

 <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#product_info">{{ trans('admin.product_info') }}</a></li>
  <li><a data-toggle="tab" href="#product_setting">            {{ trans('admin.product_setting') }}</a></li>
  <li><a data-toggle="tab" href="#product_media">              {{ trans('admin.product_media') }}</a></li>
  <li><a data-toggle="tab" href="#product_size_weight">        {{ trans('admin.product_size_weight') }}</a></li>
  <li><a data-toggle="tab" href="#product_other_data">        {{ trans('admin.product_other_data') }}</a></li>
 </ul>

<div class="tab-content">
  <div id="product_info" class="tab-pane fade in active">
    <h3>Planes1</h3>
    <p>{{ trans('admin.product_info') }}</p>
  </div>
  <div id="product_setting" class="tab-pane fade">
    <h3>Tanks2</h3>
      <p>{{ trans('admin.product_setting') }}</p>  </div>
  
  <div id="product_media" class="tab-pane fade">
    <h3>Tanks3</h3>
      <p>{{ trans('admin.product_media') }}</p>  </div>
  
  <div id="product_other_data" class="tab-pane fade">
    <h3>Tanks4</h3>
      <p>{{ trans('admin.product_other_data') }}</p>  </div>
  
 
 
  <div id="product_size_weight" class="tab-pane fade">
    <h3>Tanks4</h3>
      <p>{{ trans('admin.product_size_weight') }}</p>  </div>
  
 
 
  


</div>


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
