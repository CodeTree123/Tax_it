@extends('admin_master')
@section('content')
<style>
  body {
    margin-top: 20px;
    background: #FAFAFA;
  }

  .row {
    line-height: 0.05rem;
  }

  .order-card {
    color: #fff;
  }

  .bg-c-blue {
    background: linear-gradient(45deg, #4099ff, #73b4ff);
  }

  .bg-c-green {
    background: linear-gradient(45deg, #2ed8b6, #59e0c5);
  }

  .bg-c-yellow {
    background: linear-gradient(45deg, #FFB64D, #ffcb80);
  }

  .bg-c-pink {
    background: linear-gradient(45deg, #FF5370, #ff869a);
  }


  .card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4, 26, 55, 0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
  }

  .card .card-block {
    padding: 25px;
  }

  .order-card i {
    font-size: 63px;
  }

  .f-left {

    font-size: 63px;
  }

  .f-right {
    float: right;
    font-size: 32px;
  }
</style>
<!-- <link rel="stylesheet" href="{{asset('Frontend/assets/css/icon.css')}}"> -->

<div class="container">
  <div class="row">
    <div class="col-md-4 col-xl-3">
      <div class="card bg-c-yellow order-card">
        <div class="card-block">
        <h3>{{$user}}</h3>
          <h6>
            <i class="fa-solid fa-user-plus"></i>
          </h6>
          <span class="f-right my-1">User</span>
        </div>
      </div>
    </div>
    <div class="col-md-4 col-xl-3">
      <div class="card bg-c-pink order-card">
        <div class="card-block">
        <h3>{{$product}}</h3>
          <h6>
          <i class="fa-solid fa-boxes-stacked"></i>
          </h6>
          <span class="f-right my-1">Product</span>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection