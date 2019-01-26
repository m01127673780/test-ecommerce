@extends('style.index')
@section('content')
<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            {!! setting()->message_maintenance !!}
        </div>
    </div>
</div>
@endsection