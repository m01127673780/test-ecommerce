<div class="col-md-6">
<div class="form-group">
	<label form="sizes" class="col-md-3">{{trans('admin.size_id')}}</label>
	<div class="col-md-9" >
		{!! Form::select('size_id',$sizes,'',['class'=>'form-control','placeholder'=>trans('admin.size_id')])!!} 
	</div>
</div><!--form-group-->
<div class="form-group">
	<label form="sizes" class="col-md-3">{{trans('admin.size')}}</label>
	<div class="col-md-9" >
		{!! Form::text('size','',['class'=>'form-control','placeholder'=>trans('admin.size')])!!} 
	</div>
</div><!--form-group-->
</div><!--col-md-6-->
<!----------------------------------------------------------------->
<div class="col-md-6">

<div class="form-group">
	<label form="sizes" class="col-md-3">{{trans('admin.weight_id')}}</label>
	<div class="col-md-9" >
		{!! Form::select('weight_id',$weights,'',['class'=>'form-control','placeholder'=>trans('admin.weight_id')])!!} 
	</div>
</div><!--form-group-->

<div class="form-group">
	<label form="sizes" class="col-md-3">{{trans('admin.weight')}}</label>
	<div class="col-md-9" >
		{!! Form::text('weight','',['class'=>'form-control','placeholder'=>trans('admin.weight')])!!} 
	</div>
</div><!--form-group-->

</div><!--col-md-6-->
<div class="clearfix"></div>
