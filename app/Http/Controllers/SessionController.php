<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Visitor;
use App\Seller;

class SessionController extends Controller
{
    public function daftarUserPage()
    {
        return view('auth.daftar');
    }

    // Registrasi User secara general
    public function daftarUserAuth()
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'nama_depan' => request('nama_depan'),
            'nama_belakang' => request('nama_belakang'),
            'email' => request('email'),
            'phone' => request('phone'),
            'role' => request('role'),
            'password' => bcrypt(request('password'))
        ]);

        auth()->login($user);
        
        return redirect()->route('daftar.user.complete.page');
    }

    public function daftarUserCompletePage()
    {
        return view('auth.complete-form-user');
    }

    // Spesifikasi role, mengidentifikasikan user sebagai visitor
    public function daftarUserComplete()
    {
        Visitor::create(request(['user_id', 'nim', 'fakultas', 'jurusan', 'alamat']));
        $user = User::find(auth()->user()->id);

        $user->confirmed = 'yes';
        $user->save();
        
        session()->flash('message', 'Welcome '.$user->nama_depan."!");
        return redirect()->route('home');
    }

    public function daftarSellerPage()
    {
        return view('auth.daftar');
    }

    // Registrasi seller, tetap diinput ke table users
    public function daftarSellerAuth()
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        $seller = User::create([
            'nama_depan' => request('nama_depan'),
            'nama_belakang' => request('nama_belakang'),
            'email' => request('email'),
            'phone' => request('phone'),
            'role' => request('role'),
            'password' => bcrypt(request('password'))
        ]);

        auth()->login($seller);

        return redirect()->route('daftar.seller.complete.page');
    }

    public function daftarSellerCompletePage()
    {
        return view('auth.complete-form-seller');
    }

    // Spesifikasi role, mengidentifikasikan user sebagai seller
    public function daftarSellerComplete()
    {
        $user = User::find(auth()->user()->id);

        $seller = Seller::create(request(['user_id', 'nama_warung', 'deskripsi']));

        $user->confirmed = 'yes';
        $user->save();

        session()->flash('message', 'Welcome '.$user->nama_depan."!");
        return redirect()->route('dashboard.home');
    }

    public function masuk()
    {
        return view('auth.masuk');
    }

    public function masukAuth(Request $req)
    {
        request()->validate([
            'email' => 'required',
            'password' => 'required|min:8'
        ]);

        if(!auth()->attempt(request(['email', 'password'])))
        {
            return back()->withErrors('Invalid Credenstials');
        }

        session()->flash('message', 'Welcome '.auth()->user()->nama_depan."!");
        return redirect()->route('home');
    }

    public function keluar()
    {
        auth()->logout();

        return redirect()->route('home');
    }
}
