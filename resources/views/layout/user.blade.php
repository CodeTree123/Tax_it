@extends('admin_master')
@push('custom-css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
@endpush

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>User list</h2>
</div>
<table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th scope="col">#SL</th>
            <th scope="col">Name</th>
            <th scope="col">Mobile</th>
            <th scope="col">Email</th>
            <th scope="col">Company Name</th>
            <th scope="col">Address</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key=>$user)
        @if($user->role_id == 2)
        <tr>
            <th scope="row">{{$key ++}}</th>
            @if($user->name == null)
            <td>N/A</td>
            @else
            <td>{{$user->name}}</td>
            @endif
            <td>{{$user->mobile}}</td>
            @if($user->email == null)
            <td>N/A</td>
            @else
            <td>{{$user->email}}</td>
            @endif
            @if($user->Company_name == null)
            <td>N/A</td>
            @else
            <td>{{$user->Company_name}}</td>
            @endif
            @if($user->address == null)
            <td>N/A</td>
            @else
            <td>{{$user->address}}</td>
            @endif
        </tr>
        @endif
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