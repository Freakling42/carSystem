@extends('layouts.app')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>

<div class="uper container">
    <h1>{{ __('Your cars') }}</h1>
    <a href="{{ route('create') }}">Create new car</a>
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Brand</td>
                <td>Model</td>
                <td>Variant</td>
                <td>Licenseplate</td>
                <td colspan="2"></td>
            </tr>
        </thead>
        <tbody>
            @foreach($car as $car)
                <tr>
                    <td>{{$car->brand}}</td>
                    <td>{{$car->model}}</td>
                    <td>{{$car->variant}}</td>
                    <td>{{$car->licenseplate}}</td>
                    <td><a href="{{ route('car.edit',$car->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('car.destroy', $car->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<div>
@endsection