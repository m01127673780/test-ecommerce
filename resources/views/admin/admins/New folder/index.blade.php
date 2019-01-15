@extends('admin.index')
@section('content')
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
     {!! $dataTable->table(['class'=>'dataTable table table-striped table-hover  table-bordered'],true) !!}
   </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
 <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div id="mutlipleDelete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit"  value="{{ trans('admin.yes') }}"  class="btn btn-danger del_all" />

      </div>
    </div>

  </div>
</div>

@push('js')
<script>
delete_all();
</script>
{!! $dataTable->scripts() !!}
@endpush

@endsection