<?php

namespace App\Http\Controllers;

use App\Specialty;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialties = Specialty::paginate(3);
        return view('specialties.index')->with(compact('specialties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('specialties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|min:3',
        ];

        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'name.min' => 'El campo nombre debe contener al menos 3 caracteres',
            'description.required' => 'El campo descripcion es requerido',
            'description.min' => 'El campo descripcion debe contener al menos 3 caracteres',
        ];


        $this->validate($request, $rules, $messages);

        $specialty = new Specialty();

        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();

        $notifications = 'La especialidad se ha creado correctamente!';

        return redirect('specialties')->with(compact('notifications'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function show(Specialty $specialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialty $specialty)
    {
        return view('specialties.edit', compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Specialty $specialty)
    {
        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|min:3',
        ];

        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'name.min' => 'El campo nombre debe contener al menos 3 caracteres',
            'description.required' => 'El campo descripcion es requerido',
            'description.min' => 'El campo descripcion debe contener al menos 3 caracteres',
        ];


        $this->validate($request, $rules, $messages);

        $specialty->name = $request->input('name');
        $specialty->description = $request->input('description');
        $specialty->save();

        $notifications = 'La especialidad se ha actualizado correctamente!';

        return redirect('specialties')->with(compact('notifications'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Specialty  $specialty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Specialty $specialty)
    {
        $deletedSpecialty = $specialty->name;
        $specialty->delete();

        $notifications = 'La especialidad '.$deletedSpecialty.' se ha eliminado correctamente!';

        return redirect('/specialties')->with(compact('notifications'));
    }
}
