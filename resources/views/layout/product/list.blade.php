@extends('admin_master')
@push('custom-css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
@endpush

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Product list</h2>
</div>

<table id="example" class="table-responsive" style="width:100%">
    <thead>
        <tr class="text-center">
            <th scope="col">#SL</th>
            <th scope="col">Parent HS CODE</th>
            <th scope="col">Parent Name</th>
            <th scope="col">Hs-code</th>
            <th scope="col">Name</th>
            <th scope="col">SU</th>
            <th scope="col">CD</th>
            <th scope="col">RD</th>
            <th scope="col">SD</th>
            <th scope="col">VAT</th>
            <th scope="col">AIT</th>
            <th scope="col">AT</th>
            <th scope="col">TTI</th>
            <th scope="col">SRO-Ref</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $key=>$product)
        <tr class="text-center">
            <th scope="row">{{$key +1}}</th>
            <th scope="row">{{@$product->parentP->cat_hscode}}</th>
            <th scope="row">{{@$product->parentP->cat_name}}</th>
            <td class="text-center">{{$product->HSCODE}}</td>
            <td class="table-primary">{{$product->DESCRIPTION}}</td>
            <td>{{$product->SU}}</td>
            <td>{{$product->CD}}</td>
            <td>{{$product->RD}}</td>
            <td>{{$product->SD}}</td>
            <td>{{$product->VAT}}</td>
            <td>{{$product->AT}}</td>
            <td>{{$product->AIT}}</td>
            <td>{{$product->TTI}}</td>
            @if($product->SRO_Ref == null)
            <td>N/A</td>
            @else
            <td>{{$product->SRO_Ref}}</td>
            @endif
            <td>
                <a href="{{route('product.edit',$product->id)}}" class="btn btn-primary m-2">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>
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
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endpush