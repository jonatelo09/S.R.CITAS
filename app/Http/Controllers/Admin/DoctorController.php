<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Specialty;
use App\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
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
        $doctors = User::doctors()->paginate(10);

        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialties = Specialty::all();
        return view('doctors.create', compact('specialties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $rules = [
            'name'    => 'required|min:3',
            'email'   => 'required|email',
            'cedula'  => 'required|digits:8',
            'address' => 'required',
            'phone'   => 'required',
        ];

        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'name.min' => 'El campo nombre debe contener al menos 3 caracteres',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El campo email debe ser un correo valido.',
            'cedula.required' => 'El campo cedula es requerido',
            'cedula.digits' => 'El campo cedula debe contener solo numero con un maximo de 8 digitos',
            'address.required' => 'El campo Direccion es requerido',
            'phone.required' => 'El campo Telefono es requerido',
        ];


        $this->validate($request, $rules, $messages);

        $user = User::create(
            $request->only('name','email','cedula','address','phone')
            + [
                'role' => 'doctor',
                'password' => bcrypt($request->input('password')),
            ]
        );

        $user->specialties()->attach($request->input('specialties'));

        $notifications = 'El Médico se ha registrado correctamente.';

        return redirect('doctors')->with(compact('notifications'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(User $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = User::doctors()->findOrFail($id);
        $specialties = Specialty::all();
        // dd($specialties);
        $specialty_ids = $doctor->specialties()->pluck('specialties.id');
        // dd($specialty_ids);
        return view('doctors.edit', compact('doctor','specialties','specialty_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name'    => 'required|min:3',
            'email'   => 'required|email',
            'cedula'  => 'required|digits:8',
            'address' => 'required',
            'phone'   => 'required',
        ];

        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'name.min' => 'El campo nombre debe contener al menos 3 caracteres',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El campo email debe ser un correo valido.',
            'cedula.required' => 'El campo cedula es requerido',
            'cedula.digits' => 'El campo cedula debe contener solo numero con un maximo de 8 digitos',
            'address.required' => 'El campo Direccion es requerido',
            'phone.required' => 'El campo Telefono es requerido',
        ];


        $this->validate($request, $rules, $messages);

        $doctors = User::doctors()->findOrFail($id);

        $data = $request->only('name','email','cedula','address','phone');

        $password = $request->input('password');

        if ($password) {
            $data['password'] = bcrypt($password);
        }

        $doctors->fill($data);
        $doctors->save(); // UPDATE

        $doctors->specialties()->sync($request->input('specialties'));

        $notifications = 'El Médico se ha actualizado correctamente.';

        return redirect('doctors')->with(compact('notifications'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $doctor)
    {
        $doctorName = $doctor->name;
        $doctor->delete();

        $notifications = "El médico $doctorName se ha eliminado correctamente.";
        return redirect('doctors')->with(compact('notifications'));
    }
}
