@extends('layouts.app')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>

<div class="card uper container">
    <div class="card-header">
        Edit Car
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
        <form method="post" action="{{ route('car.update', $car->id) }}">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="brand">brand:</label>
                <input value="{{$car->brand}}" type="text" class="form-control" name="brand"/>
            </div>
            <div class="form-group">
                <label for="model">model:</label>
                <input value="{{$car->model}}" type="text" class="form-control" name="model"/>
            </div>
            <div class="form-group">
                <label for="variant">variant:</label>
                <input value="{{$car->variant}}" type="text" class="form-control" name="variant"/>
            </div>
            <div class="form-group">
                <label for="licenseplate">licenseplate:</label>
                <input value="{{$car->licenseplate}}" type="text" class="form-control" name="licenseplate"/>
            </div>   
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection