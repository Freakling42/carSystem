@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container card uper">
  <div class="card-header">
    Add Car
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('car.store') }}">
          <div class="form-group">
              @csrf
              <label for="brand">brand:</label>
              <input type="text" class="form-control" name="brand"/>
          </div>
          <div class="form-group">
              <label for="model">model:</label>
              <input type="text" class="form-control" name="model"/>
          </div>
          <div class="form-group">
              <label for="variant">variant:</label>
              <input type="text" class="form-control" name="variant"/>
          </div>
          <div class="form-group">
              <label for="licenseplate">licenseplate:</label>
              <input type="text" class="form-control" name="licenseplate"/>
          </div>          
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
@endsection