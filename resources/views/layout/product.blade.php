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
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Product list</h2>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary float-right mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add Product
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{route('product.create')}}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="hs_code" class="form-label">HS - CODE</label>
                            <input type="number" name="hs_code" class="form-control" id="hs_code" aria-describedby="emailHelp">
                        </div>
                        <div class="col">
                            <label for="CD" class="form-label">CD</label>
                            <input type="number" name="CD" class="form-control" id="CD" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="SD" class="form-label">SD</label>
                            <input type="number" name="SD" class="form-control" id="SD" aria-describedby="emailHelp">
                        </div>
                        <div class="col">
                            <label for="VAT" class="form-label">VAT</label>
                            <input type="number" name="VAT" class="form-control" id="VAT" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="AIT" class="form-label">AIT</label>
                            <input type="number" name="AIT" class="form-control" id="AIT" aria-describedby="emailHelp">
                        </div>
                        <div class="col">
                            <label for="RD" class="form-label">RD</label>
                            <input type="number" name="RD" class="form-control" id="RD" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="ATV" class="form-label">ATV</label>
                            <input type="number" name="ATV" class="form-control" id="ATV" aria-describedby="emailHelp">
                        </div>
                        <div class="col">
                            <label for="TTI" class="form-label">TTI</label>
                            <input type="number" name="TTI" class="form-control" id="TTI" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="sCD" class="form-label">sCD</label>
                            <input type="number" name="sCD" class="form-control" id="sCD" aria-describedby="emailHelp">
                        </div>
                        <div class="col">
                            <label for="sSD" class="form-label">sSD</label>
                            <input type="number" name="sSD" class="form-control" id="sSD" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="sVAT" class="form-label">sVAT</label>
                            <input type="number" name="sVAT" class="form-control" id="sVAT" aria-describedby="emailHelp">
                        </div>
                        <div class="col">
                            <label for="sAIT" class="form-label">sAIT</label>
                            <input type="number" name="sAIT" class="form-control" id="sAIT" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="sRD" class="form-label">sRD</label>
                            <input type="number" name="sRD" class="form-control" id="sRD" aria-describedby="emailHelp">
                        </div>
                        <div class="col">
                            <label for="sATV" class="form-label">sATV</label>
                            <input type="number" name="sATV" class="form-control" id="sATV" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label for="sTTI" class="form-label">sTTI</label>
                            <input type="number" name="sTTI" class="form-control" id="sTTI" aria-describedby="emailHelp">
                        </div>
                        <div class="col">
                            <label for="TARIFF" class="form-label">TARIFF</label>
                            <input type="number" name="TARIFF" class="form-control" id="TARIFF" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr class="text-center">
            <th scope="col">#SL</th>
            <th scope="col">Name</th>
            <th scope="col">Hs-code</th>
            <th scope="col">CD</th>
            <th scope="col">SD</th>
            <th scope="col">VAT</th>
            <th scope="col">AIT</th>
            <th scope="col">RD</th>
            <th scope="col">ATV</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $key=>$product)
        <tr class="text-center">
            <th scope="row">{{$key +1}}</th>
            <td>{{$product->name}}</td>
            <td>{{$product->hs_code}}</td>
            <td>{{$product->CD}}</td>
            <td>{{$product->SD}}</td>
            <td>{{$product->VAT}}</td>
            <td>{{$product->AIT}}</td>
            <td>{{$product->RD}}</td>
            <td>{{$product->ATV}}</td>

            <td>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#view{{$product->id}}">
                    <i class="btn btn-success fa-solid fa-eye"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade userbilboardModal" id="view{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Product Details ( Hs-code : {{$product->hs_code}} )
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <form action="{{route('product.update',$product->id)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="name" class="form-label">Product Name</label>
                                            <input type="text" name="name" class="form-control" id="name" value="{{$product->name}}" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="hs_code" class="form-label">HS - CODE</label>
                                            <input type="number" name="hs_code" class="form-control" id="hs_code" value="{{$product->hs_code}}" aria-describedby="emailHelp">
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
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>




                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="update{{$product->id}}">
                    <i class="fa-regular fa-pen-to-square"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade userbilboardModal" id="update{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Product Update
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">TTI</th>
                                            <th scope="col">sCD</th>
                                            <th scope="col">sSD</th>
                                            <th scope="col">sVAT</th>
                                            <th scope="col">sAIT</th>
                                            <th scope="col">sRD</th>
                                            <th scope="col">sATV</th>
                                            <th scope="col">sTTI</th>
                                            <th scope="col">TARIFF</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                @if($product->TTI == null)
                                                <h6>N/A</h6>
                                                @else
                                                {{$product->TTI}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->sCD == null)
                                                <h6>N/A</h6>
                                                @else
                                                {{$product->sCD}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->sSD == null)
                                                <h6>N/A</h6>
                                                @else
                                                {{$product->sSD}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->sVAT == null)
                                                <h6>N/A</h6>
                                                @else
                                                {{$product->sVAT}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->sAIT == null)
                                                <h6>N/A</h6>
                                                @else
                                                {{$product->sAIT}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->sRD == null)
                                                <h6>N/A</h6>
                                                @else
                                                {{$product->sRD}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->sATV == null)
                                                <h6>N/A</h6>
                                                @else
                                                {{$product->sATV}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->sTTI == null)
                                                <h6>N/A</h6>
                                                @else
                                                {{$product->sTTI}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->TARIFF == null)
                                                <h6>N/A</h6>
                                                @else
                                                {{$product->TARIFF}}
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="{{route('product.delete',$product->id)}}">
                    <i class="btn btn-danger fa-solid fa-trash"></i>
                </a>
            </td>
        </tr>

        @endforeach


    </tbody>
</table>
@endsection



@push('custom-scripts')
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endpush