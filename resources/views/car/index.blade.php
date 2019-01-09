@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>

<div class="uper container">
    <h1>{{ __('Cars') }}</h1>
    @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
    @endif 
    <div class="form">
        <form method="GET" action="{{ url('/home') }}">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                </div>
                <div class="col-md-6">
                    <button class="btn btn-info">Search</button>
                </div>
            </div>
        </form>
    </div>
    <a href="{{ url('/home') }}">{{ __('Reset search') }}</a>   
    </span>    
    <table class="table table-striped">
    <thead>
        <tr>
          <td>Brand</td>
          <td>Model</td>
          <td>Variant</td>
          <td>Licenseplate</td>
        </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
        <tr>
            <td>{{$car->brand}}</td>
            <td>{{$car->model}}</td>
            <td>{{$car->variant}}</td>
            <td>{{$car->licenseplate}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
<div>
@endsection