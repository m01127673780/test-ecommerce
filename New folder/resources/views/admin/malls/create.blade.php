@extends('admin.index')
@section('content')

 @push('js')
 <script type="text/javascript" src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyBwxuW2cdXbL38w9dcPOXfGLmi1J7AVVB8'></script>
 <script type="text/javascript" src='{{ url('design/adminlte/dist/js/locationpicker.jquery.js') }}'></script>
<?php
    $lat = !empty(old('lat')) ? old('lat') : '30.034024628931657';
    $lng = !empty(old('lng')) ? old('lng') : '31.24238681793213';

?>
 <script>
  $('#us1').locationpicker({
      location: {
          latitude: {{ $lat }},
          longitude:{{ $lng }}
      },
      radius: 300,
      markerIcon: '{{ url('design/adminlte/dist/img/map-marker-2-xl.png') }}',
      inputBinding: {
        latitudeInput: $('#lat'),
        longitudeInput: $('#lng'),
       // radiusInput: $('#us2-radius'),
        locationNameInput: $('#address')
      },
      enableAutocomplete: true

  });
 </script>
 @endpush


<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    {!! Form::open(['url'=>aurl('malls'),'files'=>true]) !!}
    <input type="hidden" value="{{ $lat }}" id="lat" name="lat">
    <input type="hidden" value="{{ $lng }}" id="lng" name="lng">
     <div class="form-group">
        {!! Form::label('name_ar',trans('admin.name_ar')) !!}
        {!! Form::text('name_ar',old('name_ar'),['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('name_en',trans('admin.name_en')) !!}
        {!! Form::text('name_en',old('name_en'),['class'=>'form-control']) !!}
     </div>



     <div class="form-group">
        {!! Form::label('contact_name',trans('admin.contact_name')) !!}
        {!! Form::text('contact_name',old('contact_name'),['class'=>'form-control']) !!}
     </div>



     <div class="form-group">
        {!! Form::label('email',trans('admin.email')) !!}
        {!! Form::email('email',old('email'),['class'=>'form-control']) !!}
     </div>




     <div class="form-group">
        {!! Form::label('mobile',trans('admin.mobile')) !!}
        {!! Form::text('mobile',old('mobile'),['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('address',trans('admin.address')) !!}
        {!! Form::text('address',old('address'),['class'=>'form-control address']) !!}
     </div>

     <div class="form-group">
        {!! Form::label('country_id',trans('admin.country_id')) !!}
        {!! Form::select('country_id',App\Model\Country::pluck('country_name_'.session('lang'),'id'),old('country_id'),['class'=>'form-control']) !!}
     </div>

     <div class="form-group">
       <div id="us1" style="width: 100%; height: 400px;"></div>
     </div>




     <div class="form-group">
        {!! Form::label('facebook',trans('admin.facebook')) !!}
        {!! Form::text('facebook',old('facebook'),['class'=>'form-control']) !!}
     </div>


     <div class="form-group">
        {!! Form::label('twitter',trans('admin.twitter')) !!}
        {!! Form::text('twitter',old('twitter'),['class'=>'form-control']) !!}
     </div>



     <div class="form-group">
        {!! Form::label('icon',trans('admin.mall_icon')) !!}
        {!! Form::file('icon',['class'=>'form-control']) !!}
     </div>


     {!! Form::submit(trans('admin.add'),['class'=>'btn btn-primary']) !!}
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->



@endsection