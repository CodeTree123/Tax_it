@extends('admin_master')
@push('custom-css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
@endpush
@push('script_jquery')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Add Parent Product</h3>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="name" class="form-label">Product Description</label>
                                    <input type="text" class="form-control" name="cat_name" placeholder="Category Name" id="cat_name" required>
                                    <span style="color:red; font-size:14px" id="errors-container"></span>
                                    <span style="color:rgb(21, 198, 110); font-size:16px; font-weight:bold" id="success-container"></span>
                                </div>
                                <div class="form-group">
                                    <label for="name" class="form-label">Product HS Code</label>
                                    <input type="numeric" class="form-control" name="cat_hscode" placeholder="Category HS Code" id="cat_hscode">
                                    <span style="color:red; font-size:14px" id="errors-container"></span>
                                    <span style="color:rgb(21, 198, 110); font-size:16px; font-weight:bold" id="success-container"></span>
                                </div>
                                <button class="btn btn-primary w-100 my-2" id="save">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card my-3">
        <div class="card-header">
            <h3>Add Child Product</h3>
        </div>
        <div class="card-body border shadow-lg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="form-group">
                            <form action="{{route('product.create')}}" method="post">
                                @csrf
                                <div class="col mb-5">
                                    <label for="name" class="form-label">Parent Product</label>
                                    <select class="form-control" id="cat_list" name="cat_id">
                                        <option value="">Select Category</option>
                                        @foreach($category as $cat)
                                        <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger mt-3">@error('cat_id') {{$message}} @enderror</span>
                                </div>
                                <div class="col mb-2">
                                    <label for="name" class="form-label">Product Description :</label>
                                    <input type="text" name="DESCRIPTION" class="form-control" id="name">
                                    <span class="text-danger mt-3">@error('DESCRIPTION') {{$message}} @enderror</span>
                                </div>
                                <div class="col mb-2">
                                    <label for="hs_code" class="form-label">HS - CODE :</label>
                                    <input type="text" name="HSCODE" class="form-control" id="hs_code">
                                    <span class="text-danger mt-3">@error('HSCODE') {{$message}} @enderror</span>
                                </div>
                                <div class="col mb-2">
                                    <label for="SU" class="form-label">SU :</label>
                                    <input type="text" name="SU" class="form-control" id="SU">
                                    <span class="text-danger mt-3">@error('SU') {{$message}} @enderror</span>
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
                                    <label for="AT" class="form-label">AT :</label>
                                    <input type="number" name="AT" class="form-control" id="AT">
                                </div>
                                <div class="col mb-2">
                                    <label for="AIT" class="form-label">AIT :</label>
                                    <input type="number" name="AIT" class="form-control" id="AIT">
                                </div>
                                <div class="col mb-2">
                                    <label for="TTI" class="form-label">TTI :</label>
                                    <input type="numeric" name="TTI" class="form-control" id="TTI">
                                </div>
                                <div class="col mb-2">
                                    <label for="SRO-Ref" class="form-label">SRO-Ref :</label>
                                    <input type="text" name="SRO_Ref" class="form-control" id="SRO-Ref">
                                </div>
                                <div class="d-flex justify-content-center modal-footer mb-4">
                                    <button type="submit" class="btn btn-primary w-100">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var category_list = this.value;

        $("#cat_list").select2({
            data: category_list
        });
        //add category ajax code start
        $(document).on('click', '#save', function() {
            let errorsContainer = $('#errors-container');
            let catName = $('#cat_name').val();
            let catHscode = $('#cat_hscode').val();
            let showToast = true;
            $.ajax({
                type: "POST",
                url: "{{ route('category.add') }}",
                data: {
                    '_token': '{{ csrf_token() }}',
                    'cat_name': catName,
                    'cat_hscode': catHscode,
                },
                dataType: "json",
                success: function(response) {
                    if (response.message) {
                        $('#errors-container').empty();
                        $('#success-container').text(response.message).fadeIn();
                        setTimeout(function() {
                            $('#success-container').fadeOut();
                        }, 3000);
                    }
                    errorsContainer.empty();
                },
                error: function(response) {
                    if (response.status == 422) {
                        errors = response.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            errorsContainer.text(value);
                        });
                    }
                }
            });
        });
        // get latest category on add product form
        $(document).on('click', '#save', function() {
            $.ajax({
                type: "GET",
                url: "{{ route('get.cats')}}",
                dataType: "JSON",
                success: function(res) {
                    let html = '<option value="">Select Category</option>';
                    $.each(res.cats, function(key, value) {
                        html += '<option value="' + value.id + '">' + value.cat_name + '</option>';
                    });
                    $('#cat_list').html(html);
                }
            });
        });
    });
</script>
@endsection