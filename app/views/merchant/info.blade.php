@extends('merchant.templates.layout')

@section('stylesheet')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('public/assets/merchant/plugins/select2/select2.min.css') }}">
@endsection


@section('content')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Informasi Merchant
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    @include('merchant.info.password')
    @include('merchant.info.general')
    @include('merchant.info.address')
    @include('merchant.info.payment')
  </section><!-- /.content -->
@endsection


@section('javascript')
  <!-- Select2 -->
  <script src="{{ asset('public/assets/merchant/plugins/select2/select2.full.min.js') }}"></script>
  <!-- InputMask -->
  <script src="{{ asset('public/assets/merchant/plugins/input-mask/jquery.inputmask.js') }}"></script>
  <script src="{{ asset('public/assets/merchant/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
  <script src="{{ asset('public/assets/merchant/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

  <!-- Page script -->
  <script>
    $(function () {
      // Activate Sidebar Menu
      $("#menu_info").closest("li").addClass("active");

      // Initialize Select2 Elements
      $(".select2").select2();

      // Initialize InputMask Elements
      $("#ic_number").inputmask("9999999999999999");
      $("#postal_code").inputmask("99999");
    });
  </script>
@endsection
