<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
//use App\Models\Employee;
use App\Models\EmployeeModel;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('employee');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function dataEmployee()
     {
         $employee = EmployeeModel::all();
         return view('data_employee', compact('employee'));
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->file('image')->store('images');

        $request->validate([
            'nama_karyawan' => 'required|max:255',
            'nip' => 'required|numeric',
            'jabatan' => 'required',
            'departemen' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|numeric',
            'status' => 'required',
            'profile' => 'required|image|mimes:jpg,png|max:2048',
        ]);

        DB::table('karyawan')->insert([
            'nama_karyawan' => $request->nama_karyawan,
            'nip' => $request->nip,
            'jabatan' => $request->jabatan,
            'departemen' => $request->departemen,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'agama' => $request->religion,
            'status' => $request->status,
            'profile' => $request->file('profile')->store('images'),
        ]);

        return redirect('/')->with('success', 'Data Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = EmployeeModel::findOrFail($id);
        return view('edit_employee', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = EmployeeModel::findOrFail($id);
        $data->update($request->all()); 
        return redirect('data_employee')->with('success', 'Data Success Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('karyawan')->where('id', $id)->delete();
        return redirect('data_employee')->with('success', 'Data Successfully Deleted!');
    }

}
