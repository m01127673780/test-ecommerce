   <div id="product_info" class="tab-pane fade in active">
    <h3> {{ trans('admin.product_info') }}</h3>
 
       <div class="form-group">
      {!! Form::label('title',trans('admin.product_title')) !!}
      {!! Form::text('title',$product->title,['class'=>'form-control','placeholder'=>trans('admin.product_title')]) !!}
    </div>

  <div class="form-group">
	  {!! Form::label('content',trans('admin.product_content')) !!}
	  {!! Form::textarea('content',$product->content,['class'=>'form-control','placeholder'=>trans('admin.product_content')]) !!}
  </div>

</div><!-- /#product_info" -->
