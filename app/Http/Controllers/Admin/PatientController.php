<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class PatientController extends Controller
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
        $patients = User::patients()->paginate(10);

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
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
            'name'    => 'required|min:3',
            'email'   => 'required|email|unique:users,email',
            'cedula'  => 'required|digits:8|unique:users,cedula',
            'address' => 'required',
            'phone'   => 'required',
        ];

        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'name.min' => 'El campo nombre debe contener al menos 3 caracteres',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El campo email debe ser un correo valido.',
            'email.unique' => 'El correo ya existe, intente con un correo diferente.',
            'cedula.required' => 'El campo cedula es requerido',
            'cedula.digits' => 'El campo cedula debe contener solo numero con un maximo de 8 digitos',
            'cedula.unique' => 'El campo INE ya existe, verifique el dato.',
            'address.required' => 'El campo Direccion es requerido',
            'phone.required' => 'El campo Telefono es requerido',
        ];


        $this->validate($request, $rules, $messages);

        User::create(
            $request->only('name','email','cedula','address','phone')
            + [
                'role' => 'patient',
                'password' => bcrypt($request->input('password')),
            ]
        );

        $notifications = 'El paciente se ha registrado correctamente.';

        return redirect('patients')->with(compact('notifications'));
    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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

        $doctors = User::patients()->findOrFail($id);

        $data = $request->only('name','email','cedula','address','phone');

        $password = $request->input('password');

        if ($password) {
            $data['password'] = bcrypt($password);
        }

        $doctors->fill($data);
        $doctors->save(); // UPDATE

        $notifications = 'El paciente se ha actualizado correctamente.';

        return redirect('doctors')->with(compact('notifications'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $patient)
    {
        $namePatient = $patient->name;
        $patient->delete();

        $notifications = "El paciente $namePatient se ha eliminado correctamente";

        return redirect('patients')->with(compact('notifications'));
    }
}
