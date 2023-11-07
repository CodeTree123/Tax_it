@extends('admin_master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Add Currency</h3>
        </div>
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form action="{{route('currency.post')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Currency</label>
                            <select name="name" class="form-control" id="">
                                <option value="">Select Currency</option>
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
                            <input type="numeric" class="form-control" name="low_rate" placeholder="Buying/Low Rate">
                        </div>
                        <div class="form-group mt-2">
                            <label for="high_rate">Selling/High Rate</label>
                            <input type="numeric" class="form-control" name="high_rate" placeholder="Selling/HIgh Rate">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-5">
        <div class="card-header">
            <h3>Currency List</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Currency Name</th>
                        <th scope="col">Buying/Low rate</th>
                        <th scope="col">Selling/High rate</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($currency as $key=>$c)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$c->name}}</td>
                        <td>{{$c->low_rate}}</td>
                        <td>{{$c->high_rate}}</td>
                        <td><a href="{{url('currency/edit')}}/{{$c->id}}" class="btn btn-primary">Edit</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection