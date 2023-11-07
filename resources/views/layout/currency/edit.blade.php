@extends('admin_master')
@section('content')
<div class="card">
    <div class="card-header">
        <h3>Edit Currency</h3>
    </div>
    <div class="card-body">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="{{route('currency.post')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Currency</label>
                        <select name="name" class="form-control" id="">
                            <option value="{{$currency->name}}">{{$currency->name}}</option>
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="GBP">GBP</option>
                            <option value="AUD">AUD</option>
                            <option value="JPY">JPY</option>
                            <option value="CAD">CAD</option>
                            <option value="SEK">SEK</option>
                            <option value="SGD">SGD</option>
                            <option value="CNH">CNH</option>
                            <option value="INR">INR</option>
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        <label for="low_rate">Buying/Low Rate</label>
                        <input type="numeric" class="form-control" name="low_rate" value="{{$currency->low_rate}}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="high_rate">Selling/High Rate</label>
                        <input type="numeric" class="form-control" name="high_rate" value="{{$currency->high_rate}}">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection