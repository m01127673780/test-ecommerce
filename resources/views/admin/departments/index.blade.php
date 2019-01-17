@extends('admin.index')
@section('content')
@push('js')
<script type="text/javascript">
		$(document).ready(function(){

			$('#jstree').jstree({
	  "core" : {
	  	'data' : [
       { "id" : "ajson1", "parent" : "#", "text" : "Simple root node" },
       { "id" : "ajson2", "parent" : "#", "text" : "Root node 2" },
       { "id" : "ajson3", "parent" : "ajson2", "text" : "Child 1" },
       { "id" : "ajson4", "parent" : "ajson2", "text" : "Child 2" },
    ],
	    "themes" : {
	      "variant" : "large"
	    }
	  },
	  "checkbox" : {
	    "keep_selected_style" :true
	  },
	  "plugins" : [ "wholerow", "checkbox" ]
	});
 });

</script>
@endpush
<div class="box">
  <div class="box-header">
    <h3 class="box-title">{{ $title }}</h3> 
  </div>
  <!-- /.box-header -->
  <div class="box-body">
   <div id="jstree"></div>

  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->

 

@endsection