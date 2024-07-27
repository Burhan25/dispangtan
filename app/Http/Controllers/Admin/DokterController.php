<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokters = User::where('role', UserRole::DOKTER)->paginate(10);
        return view('admin.dokter.index', compact('dokters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'str' => ['required', 'string', 'size:21', 'unique:users,str'],
            'nip' => ['nullable', 'digits:18', 'unique:users,nip'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'certificate' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'], // Add this line
        ]);

        if ($request->hasFile('certificate')) {
            $certificatePath = $request->file('certificate')->store('certificates', 'public');
        }

        $user = User::create([
            'name' => $request->name,
            'str' => $request->str,
            'nip' => $request->nip,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => UserRole::DOKTER,
            'certificate' => $certificatePath ?? null,
        ]);

        $user->sendEmailVerificationNotification();

        return redirect()->back()->with('success', 'Dokter berhasil didaftarkan');
    }

    // Other methods...
    public function destroy(Request $request)
    {
        User::where('id', $request->dokter_id)->delete();

        return redirect()->back()->with('success', 'Dokter berhasil dihapus');
    }

    public function verify(Request $request)
    {
        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        if ($user && !$user->hasVerifiedEmail()) {
            $user->email_verified_at = Carbon::now();
            $user->save();

            return back()->with('resent', 'Email verification has been successfully sent.');
        }

        return back()->with('error', 'Invalid email or email is already verified.');
    }
    public function resendVerify(Request $request)
    {
        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        if ($user && !$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();

            return back()->with('resent', 'Email verification has been successfully sent.');
        }

        return back()->with('error', 'Invalid email or email is already verified.');
    }
}
