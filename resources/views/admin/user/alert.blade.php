@extends('template.admin')
@section('content')


@if(session()->has('alertSuccess'))
<div class="alert alert-success">
    <h4>{{session()->get('alertSuccess')}}</h4>
</div>
@endif
        

@endsection