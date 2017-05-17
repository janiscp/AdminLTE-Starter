@extends('adminlte::layouts.default')

<meta id="token" name="token" value="{{ csrf_token() }}">


@section('content')
  <section class="content-header">
    <h1>
      Home
      <small>Optional description</small>
    </h1>

    <ol class="breadcrumb">
      <!--li><a href="#"><i class="fa fa-dashboard"></i> </a></li-->
      <li class="active">Home</li>
    </ol>
  </section>
@endsection


@section('yield_ext_scripts')
@endsection


@section('yield_int_scripts')
@endsection