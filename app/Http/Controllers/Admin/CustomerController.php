<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 6;

        if (!empty($keyword)) {
            $customer = Customer::where('nama', 'LIKE', "%$keyword%")
                ->orWhere('no_hp', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $customer = Customer::latest()->paginate($perPage);
        }

        return view('admin.customer.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_hp' => 'required'
        ]);
        $requestData = $request->all();
        $dataUser = [
            'name' => $requestData['nama'],
            'email' => $requestData['email'],
            'password' => Hash::make($requestData['password'])
        ];
        $requestData['email_verified_at'] = now();
        $user_id = User::insert($dataUser);
        unset($requestData['email']);
        unset($requestData['password']);
        unset($requestData['email_verified_at']);
        $requestData['user_id'] = $user_id;
        Customer::create($requestData);

        return redirect('admin/customer')->with('flash_message', 'Customer added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);

        return view('admin.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'no_hp' => 'required'
        ]);
        $requestData = $request->all();
        if ($request->password != '') {
            $user = User::whereEmail($requestData['email']);
            $user->update(['password' => $requestData['password']]);

        }
        unset($requestData['email']);
        unset($requestData['password']);

        $customer = Customer::findOrFail($id);
        $customer->update($requestData);

        return redirect('admin/customer')->with('flash_message', 'Customer updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Customer::destroy($id);

        return redirect('admin/customer')->with('flash_message', 'Customer deleted!');
    }
}
