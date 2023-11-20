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
<div class="card m-2">
    <div class="card-body border shadow-lg">
        <form action="{{route('product.update',$product->id)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Parent Name</label>
                <input type="text" class="form-control" name="cat_name" value="{{@$product->parentP->cat_name}}">
            </div>
            <div class="form-group">
                <label for="hs">Parent HS Code</label>
                <input type="text" class="form-control" name="cat_hscode" value="{{@$product->parentP->cat_hscode}}">
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" name="DESCRIPTION" class="form-control" id="name" value="{{old('name',$product->DESCRIPTION)}}" aria-describedby="emailHelp" old-value>
                        <span class="text-danger mt-3">@error('DESCRIPTION') {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="hs_code" class="form-label">HS - CODE</label>
                        <input type="text" name="HSCODE" class="form-control" id="hs_code" value="{{old('hs_code',$product->HSCODE)}}" aria-describedby="emailHelp">
                        <span class="text-danger mt-3">@error('HSCODE') {{$message}} @enderror</span>
                    </div>
                    <div class="col">
                        <label for="SU" class="form-label">SU</label>
                        <input type="text" name="SU" class="form-control" id="SU" value="{{$product->SU}}" aria-describedby="emailHelp">
                        <span class="text-danger mt-3">@error('SU') {{$message}} @enderror</span>
                    </div>
                    <div class="col">
                        <label for="CD" class="form-label">CD</label>
                        <input type="number" name="CD" class="form-control" id="CD" value="{{$product->CD}}" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="RD" class="form-label">RD</label>
                        <input type="number" name="RD" class="form-control" id="RD" value="{{$product->RD}}" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="SD" class="form-label">SD</label>
                        <input type="number" name="SD" class="form-control" id="SD" value="{{$product->SD}}" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="VAT" class="form-label">VAT</label>
                        <input type="number" name="VAT" class="form-control" id="VAT" value="{{$product->VAT}}" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="AIT" class="form-label">AIT</label>
                        <input type="number" name="AIT" class="form-control" id="AIT" value="{{$product->AIT}}" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="AT" class="form-label">AT</label>
                        <input type="number" name="AT" class="form-control" id="AT" value="{{$product->AT}}" aria-describedby="emailHelp">
                    </div>
                    <div class="col">
                        <label for="TTI" class="form-label">TTI</label>
                        <input type="number" name="TTI" class="form-control" id="TTI" value="{{$product->TTI}}" aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="SRO_Ref" class="form-label">Sro_ref</label>
                        <input type="text" name="SRO_Ref" class="form-control" id="SRO_Ref" value="{{$product->SRO_Ref}}" aria-describedby="emailHelp">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary w-100">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection