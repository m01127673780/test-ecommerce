 
    
    <div id="product_setting" class="tab-pane fade">
    <h3>Tanks2</h3>
      <p>{{ trans('admin.product_setting') }} </p>


    <div class="form-group">
      {!! Form::label('price',trans('admin.price')) !!}
      {!! Form::text('price',$product->price,['class'=>'form-control','placeholder'=>trans('admin.price')]) !!}
    </div> <!-- /price" -->  
       
    <div class="form-group">
      {!! Form::label('stock',trans('admin.stock')) !!}
      {!! Form::text('stock',$product->stock,['class'=>'form-control','placeholder'=>trans('admin.stock')]) !!}
    </div> <!-- /stock" -->  
       
 	<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
      {!! Form::label('start_at',trans('admin.start_at')) !!}
      {!! Form::text('start_at',$product->start_at,['class'=>'form-control ','placeholder'=>trans('admin.start_at')]) !!}
	</div> <!-- /start_at" -->        

 	<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
      {!! Form::label('end_at',trans('admin.end_at')) !!}
      {!! Form::text('end_at',$product->end_at,['class'=>'form-control ','placeholder'=>trans('admin.end_at')]) !!}
	</div> <!-- /end_at" -->  
       
         <div class="clearfix"></div>

           <div class="form-group">
      {!! Form::label('price_offer',trans('admin.price_offer')) !!}
      {!! Form::text('price_offer',$product->price_offer,['class'=>'form-control','placeholder'=>trans('admin.price_offer')]) !!}
    </div> <!-- /price_offer" -->  
        
	<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
	      {!! Form::label('start_offer_at',trans('admin.start_offer_at')) !!}
	      {!! Form::text('start_offer_at',$product->start_offer_at,['class'=>'form-control datepicker','placeholder'=>trans('admin.start_offer_at')]) !!}
	</div> <!-- /start_offer_at" -->  
          
	<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
      {!! Form::label('end_offer_at',trans('admin.end_offer_at')) !!}
      {!! Form::text('end_offer_at',$product->end_offer_at,['class'=>'form-control ','placeholder'=>trans('admin.end_offer_at')]) !!}
	</div> <!-- /end_offer_at" -->

                <div class="clearfix"></div>
 

 	<div class="form-group  ">
      {!! Form::label('status',trans('admin.status')) !!}
      {!! Form::select('status',['pending'=>trans('admin.pending'),'refused'=>trans('admin.refused'),'active'=>trans('admin.active')],$product->status,['class'=>'form-control ','placeholder'=>trans('admin.status')]) !!}
	</div> <!-- /status" -->  
       
    <div class="form-group">
      {!! Form::label('reason',trans('admin.refused_reason')) !!}
      {!! Form::textarea('reason',$product->reason,['class'=>'form-control','placeholder'=>trans('admin.refused_reason')]) !!}
    </div> <!-- /reason" --> 
    </div>  <!-- /#product_setting" -->      
          
