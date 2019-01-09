<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class CarsController extends Controller
{     
    /**
    * Display a listing of cars.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        if(isset($request)){
            $cars = '';
            if($request->has('search')){
                $cars=Car::where('model', 'LIKE', "%{$request->input('search')}%")->orWhere('brand', 'LIKE', "%{$request->input('search')}%")->orWhere('variant', 'LIKE', "%{$request->input('search')}%")->orWhere('licenseplate', 'LIKE', "%{$request->input('search')}%")->get();  
            }else{
                $cars = Car::get();
            }
            return view('car.index', compact('cars'));
        }else{
            $cars = Car::all();

            return view('car.index', compact('cars'));        
        }

    }


    /**
    * Display a listing of cars where userid = current user.
    *
    * @return \Illuminate\Http\Response
    */    
    public function sellerview()
    {
        $car = Car::where('user_id', auth()->id())->get();
        
        return view('car.seller', compact('car'));
    }

    /**
     * Show the form for creating a new car.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('car.create');
    }

    /**
     * Store a newly created car.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' =>'required',
            'model' => 'required',
            'variant' => 'required'
        ]);
        
        $car = new Car([      
            'user_id' => auth()->id(),
            'brand' => $request->get('brand'),
            'model' => $request->get('model'),
            'variant' => $request->get('variant'),
            'licenseplate' => $request->get('licenseplate'),
        ]);
        
        $car->save();
        return redirect('/admin')->with('success', 'Car has been added');
    }

    /**
     * Show the form for editing the specified car.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);

        return view('car.edit', compact('car'));
    }

    /**
     * Update the specified car.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'brand' =>'required',
            'model' => 'required',
            'variant' => 'required'
        ]);

        $car = Car::find($id);
        $car->brand = $request->get('brand');
        $car->model = $request->get('model');
        $car->variant = $request->get('variant');
        $car->licenseplate = $request->get('licenseplate');
        $car->save();

        return redirect('/admin')->with('success', 'Car has been updated');
    }

    /**
     * Remove the specified car.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();

        return redirect('/admin')->with('success', 'Car has been deleted Successfully');
    }
    
}