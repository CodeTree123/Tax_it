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


            <div class="col mb-2">
                <label for="name" class="form-label">Product Name :</label>
                <input type="text" name="DESCRIPTION" class="form-control" id="name">
                <span class="text-danger mt-3">@error('name') {{$message}} @enderror</span>
            </div>
            <div class="col mb-2">
                <label for="hs_code" class="form-label">HS - CODE :</label>
                <input type="number" name="HSCODE" class="form-control" id="hs_code">
                <span class="text-danger mt-3">@error('HSCODE') {{$message}} @enderror</span>
            </div>
            <div class="col mb-2">
                <label for="SU" class="form-label">SU :</label>
                <input type="number" name="SU" class="form-control" id="SU">
            </div>
            <div class="col mb-2">
                <label for="CD" class="form-label">CD :</label>
                <input type="number" name="CD" class="form-control" id="CD">
            </div>
            <div class="col mb-2">
                <label for="RD" class="form-label">RD :</label>
                <input type="number" name="RD" class="form-control" id="RD">
            </div>
            <div class="col mb-2">
                <label for="SD" class="form-label">SD :</label>
                <input type="number" name="SD" class="form-control" id="SD">
            </div>
            <div class="col mb-2">
                <label for="VAT" class="form-label">VAT :</label>
                <input type="number" name="VAT" class="form-control" id="VAT">
            </div>
            <div class="col mb-2">
                <label for="AIT" class="form-label">AIT :</label>
                <input type="number" name="AIT" class="form-control" id="AIT">
            </div>
            <div class="col mb-2">
                <label for="ATV" class="form-label">AT :</label>
                <input type="number" name="ATV" class="form-control" id="ATV">
            </div>
            <div class="col mb-2">
                <label for="TTI" class="form-label">TTI :</label>
                <input type="number" name="TTI" class="form-control" id="TTI">
            </div>
            <div class="col mb-2">
                <label for="SRO-Ref" class="form-label">SRO-Ref :</label>
                <input type="number" name="SRO_Ref" class="form-control" id="SRO-Ref">
            </div>
            <div class="d-flex justify-content-center modal-footer mb-4">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
    </div>
    </form>
</div>
@endsection