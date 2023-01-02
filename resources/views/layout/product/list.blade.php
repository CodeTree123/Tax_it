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
            <td class="text-center">{{$product->name}}</td>
            <td>{{$product->hs_code}}</td>
            <td>{{$product->CD}}</td>
            <td>{{$product->SD}}</td>
            <td>{{$product->VAT}}</td>
            <td>{{$product->AIT}}</td>
            <td>{{$product->RD}}</td>
            <td>{{$product->ATV}}</td>

            <td>
                <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#view{{$product->id}}">
                    <i class="fa-solid fa-eye"></i>
                </button>

                <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary mb-2">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>

                <!-- Modal -->
                <div class="modal fade userbilboardModal" id="view{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Product detail's of ( Hs-code : {{$product->hs_code}})
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