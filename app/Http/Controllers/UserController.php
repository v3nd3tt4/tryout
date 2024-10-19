<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil semua user beserta role mereka
        $users = User::with('roles')->get();
        $roles = Role::all();
        $data = array(
            'link' => 'user',
            'script' => 'user/script',
            'roles' => $roles
        );        
		return view('user/index', compact('users'))->with($data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string', // Pastikan password memiliki minimal 8 karakter
            'role' => 'required|string|exists:roles,name', // Pastikan role yang diinput ada di tabel roles
        ]);

        try {
            // Buat user baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Hash password sebelum disimpan
            ]);

            // Tetapkan role ke user
            $user->assignRole($request->role);

            return response()->json([
                'status' => 'success',
                'user' => $user, // Kembalikan data user baru jika diperlukan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(), // Kembalikan pesan error jika diperlukan
            ]);
        }
    }

    public function show(Request $request)
    {
        $id = $request->input('id');
        // Mengambil user dengan relasi role
        $user = User::with('roles')->where('id', $id)->first();

        if ($user) {
            // Jika user memiliki role, ambil role pertama (atau sesuaikan jika user punya multiple role)
            $role = $user->roles->pluck('name')->first(); // Mengambil nama role pertama

            return response()->json([
                'name' => $user->name,
                'email' => $user->email,
                'role' => $role, // Kirim role ke response
            ]);
        }

        return response()->json(['message' => 'User not found'], 404);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id, // Pastikan email unique kecuali untuk user yang sedang di-update
            'role' => 'required|string|exists:roles,name', // Pastikan role yang diinput ada di tabel roles
            'password' => 'nullable|string', // Password bisa dikosongkan atau minimal 8 karakter jika diisi
        ]);

        try {
            // Ambil user berdasarkan ID
            $user = User::findOrFail($id);

            // Update data user
            $user->name = $request->name;
            $user->email = $request->email;

            // Update password hanya jika field password diisi
            if ($request->filled('password')) {
                $user->password = Hash::make($request->password); // Hash password baru
            }

            // Simpan role baru (jika ada perubahan)
            if ($request->has('role')) {
                $user->syncRoles($request->role); // Mengganti role dengan yang baru
            }

            // Simpan perubahan ke database
            $user->save();

            return response()->json([
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(), // Mengembalikan pesan error jika ada
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $id =  $request->input('id');

        try {
            // Cari user berdasarkan ID
            $user = User::findOrFail($id);

            // Hapus semua role yang terkait dengan user
            $user->roles()->detach();

            // Hapus user dari tabel users
            $user->delete();

            return response()->json([
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => $e->getMessage(), // Mengembalikan pesan error untuk debugging
            ]);
        }
    }

    // Metode untuk menangani login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cek kredensial
        if (Auth::attempt(['email' => $request->username, 'password' => $request->password])) {
            session()->flash('alertlogin', [
                'type' => 'success',
                'message' => 'Login berhasil',
            ]);
            // Login berhasil, redirect ke halaman yang diinginkan
            return redirect()->intended('/')->with('success', 'Login berhasil sedang dialihkan'); // Ganti dengan rute yang sesuai
        }

        // Jika login gagal, kembalikan kembali dengan error
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    // Metode untuk logout
    public function logout(Request $request)
    {        
        Auth::logout();
        session()->flash('alertlogin', [
            'type' => 'success',
            'message' => 'Logout berhasil',
        ]);
        return redirect('/'); // Redirect ke halaman login setelah logout
    }


}
