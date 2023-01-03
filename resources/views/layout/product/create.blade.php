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
        <form action="{{route('product.create')}}" method="post">
            @csrf
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" id="name" >
                        <span class="text-danger mt-3">@error('name') {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="hs_code" class="form-label">HS - CODE</label>
                        <input type="number" name="hs_code" class="form-control" id="hs_code" >
                        <span class="text-danger mt-3">@error('hs_code') {{$message}} @enderror</span>

                    </div>
                    <div class="col">
                        <label for="CD" class="form-label">CD</label>
                        <input type="number" name="CD" class="form-control" id="CD" >
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="SD" class="form-label">SD</label>
                        <input type="number" name="SD" class="form-control" id="SD" >
                    </div>
                    <div class="col">
                        <label for="VAT" class="form-label">VAT</label>
                        <input type="number" name="VAT" class="form-control" id="VAT" >
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="AIT" class="form-label">AIT</label>
                        <input type="number" name="AIT" class="form-control" id="AIT" >
                    </div>
                    <div class="col">
                        <label for="RD" class="form-label">RD</label>
                        <input type="number" name="RD" class="form-control" id="RD" >
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="ATV" class="form-label">ATV</label>
                        <input type="number" name="ATV" class="form-control" id="ATV" >
                    </div>
                    <div class="col">
                        <label for="TTI" class="form-label">TTI</label>
                        <input type="number" name="TTI" class="form-control" id="TTI" >
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="sCD" class="form-label">sCD</label>
                        <input type="number" name="sCD" class="form-control" id="sCD" >
                    </div>
                    <div class="col">
                        <label for="sSD" class="form-label">sSD</label>
                        <input type="number" name="sSD" class="form-control" id="sSD" >
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="sVAT" class="form-label">sVAT</label>
                        <input type="number" name="sVAT" class="form-control" id="sVAT" >
                    </div>
                    <div class="col">
                        <label for="sAIT" class="form-label">sAIT</label>
                        <input type="number" name="sAIT" class="form-control" id="sAIT" >
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="sRD" class="form-label">sRD</label>
                        <input type="number" name="sRD" class="form-control" id="sRD" >
                    </div>
                    <div class="col">
                        <label for="sATV" class="form-label">sATV</label>
                        <input type="number" name="sATV" class="form-control" id="sATV" >
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col">
                        <label for="sTTI" class="form-label">sTTI</label>
                        <input type="number" name="sTTI" class="form-control" id="sTTI" >
                    </div>
                    <div class="col">
                        <label for="TARIFF" class="form-label">TARIFF</label>
                        <input type="number" name="TARIFF" class="form-control" id="TARIFF" >
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center modal-footer mb-4">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection
