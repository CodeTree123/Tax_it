@extends('admin_master')
@push('custom-css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
@endpush

<style>
    .fancybox__container {
        z-index: 1200;
    }
</style>

@section('content')
<div class="card">
    <div class="card-body border shadow-lg">
        <form action="{{route('product.update',$product->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{old('name',$product->name)}}" aria-describedby="emailHelp" old-value>
                        <span class="text-danger mt-3">@error('name') {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="hs_code" class="form-label">HS - CODE</label>
                        <input type="number" name="hs_code" class="form-control" id="hs_code" value="{{old('name',$product->hs_code)}}" aria-describedby="emailHelp">
                        <span class="text-danger mt-3">@error('hs_code') {{$message}} @enderror</span>
                    </div>
                    <div class="col">
                        <label for="CD" class="form-label">CD</label>
                        <input type="number" name="CD" class="form-control" id="CD" value="{{$product->CD}}" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="SD" class="form-label">SD</label>
                        <input type="number" name="SD" class="form-control" id="SD" value="{{$product->SD}}" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="VAT" class="form-label">VAT</label>
                        <input type="number" name="VAT" class="form-control" id="VAT" value="{{$product->VAT}}" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="AIT" class="form-label">AIT</label>
                        <input type="number" name="AIT" class="form-control" id="AIT" value="{{$product->AIT}}" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="RD" class="form-label">RD</label>
                        <input type="number" name="RD" class="form-control" id="RD" value="{{$product->RD}}" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="ATV" class="form-label">ATV</label>
                        <input type="number" name="ATV" class="form-control" id="ATV" value="{{$product->ATV}}" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="TTI" class="form-label">TTI</label>
                        <input type="number" name="TTI" class="form-control" id="TTI" value="{{$product->TTI}}" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="sCD" class="form-label">sCD</label>
                        <input type="number" name="sCD" class="form-control" id="sCD" value="{{$product->sCD}}" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="sSD" class="form-label">sSD</label>
                        <input type="number" name="sSD" class="form-control" id="sSD" value="{{$product->sSD}}" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="sVAT" class="form-label">sVAT</label>
                        <input type="number" name="sVAT" class="form-control" id="sVAT" value="{{$product->sVAT}}" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="sAIT" class="form-label">sAIT</label>
                        <input type="number" name="sAIT" class="form-control" id="sAIT" value="{{$product->sAIT}}" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="sRD" class="form-label">sRD</label>
                        <input type="number" name="sRD" class="form-control" id="sRD" value="{{$product->sRD}}" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="sATV" class="form-label">sATV</label>
                        <input type="number" name="sATV" class="form-control" id="sATV" value="{{$product->sATV}}" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <label for="sTTI" class="form-label">sTTI</label>
                        <input type="number" name="sTTI" class="form-control" id="sTTI" value="{{$product->sTTI}}" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="TARIFF" class="form-label">TARIFF</label>
                        <input type="number" name="TARIFF" class="form-control" id="TARIFF" value="{{$product->TARIFF}}" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
