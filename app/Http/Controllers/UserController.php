<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate as FacadesGate;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'alamat' => 'required|string',
            'noTelp' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string'
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);

        $user = User::create($validatedData);
        request()->flash('info', "Data akun $user->nama berhasil disimpan ke database");
        return redirect()->route('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('halamanUtama');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function edit(User $user)
    {
        if (FacadesGate::allows('isAdmin')) {
            return view('user.edit', compact('user'));
        }else{
            return redirect()->route('halamanUtama');
        }
    }

    public function update(Request $request, User $user)
    {
        if (FacadesGate::allows('isAdmin')) {
            if($request->email){
                $validatedData = $request->validate([
                    'name' => 'required|string',
                    'alamat' => 'required|string',
                    'noTelp' => 'required|string',
                    'email' => 'required|string|unique:users,email',
                    'role' => 'required|string'
                ]);
            }else{
                $validatedData = $request->validate([
                    'name' => 'required|string',
                    'alamat' => 'required|string',
                    'noTelp' => 'required|string',
                    'role' => 'required|string'
                ]);
            }

            if ($request->password) {
                $validatedData['password'] = bcrypt($request->password);
            }

            $user->update($validatedData);

            return redirect()->route('user.index')
            ->with('success', "$user->name berhasil diupdate di database");

        }else{
            return redirect()->route('halamanUtama');
        }

    }

    public function index()
    {
        if (FacadesGate::denies('isUser')) {
            $user = User::all();
            return view('user.index', compact('user'));
        }else{
            return redirect()->route('halamanUtama');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if (FacadesGate::denies('isUser')) {
            $user->delete();
            return redirect()->route('user.index')
            ->with('success', "User berhasil dihapus database");
        }else{
            return redirect()->route('halamanUtama');
        }
    }

    public function create()
    {
        if (FacadesGate::denies('isUser')) {
            return view('user.create');
        }else{
            return redirect()->route('halamanUtama');
        }
    }

    public function store(Request $request)
    {
        if (FacadesGate::denies('isUser')) {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'alamat' => 'required|string',
                'noTelp' => 'required|string',
                'email' => 'required|string|unique:users,email',
                'password' => 'required|string',
                'role' => 'string'
            ]);
            if ($request->role) {
                $validatedData['role'] = $request->role;
            }

            $newUser = User::create($validatedData);

            return redirect()->route('user.index')
            ->with('success', "$newUser->name berhasil disimpan ke database");

        }else{
            return redirect()->route('halamanUtama');
        }
    }
}
