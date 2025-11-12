<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon; // TAMBAHKAN INI!

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'refresh', 'logout']]);
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only(['email', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(Auth::user());
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(Auth::refresh());
    }

    protected function respondWithToken($token)
    {
        $user = Auth::user();

        // Konversi waktu dari UTC ke WIB (Asia/Jakarta)
        $createdAt = Carbon::parse($user->created_at)->setTimezone('Asia/Jakarta');
        $updatedAt = Carbon::parse($user->updated_at)->setTimezone('Asia/Jakarta');
        $loginTime = Carbon::now('Asia/Jakarta');

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'email_verified_at' => $user->email_verified_at,
                'created_at' => $createdAt->format('Y-m-d H:i:s'),  // WIB
                'updated_at' => $updatedAt->format('Y-m-d H:i:s'),  // WIB
            ],
            'expires_in' => Auth::factory()->getTTL() * 60,
            'login_time_wib' => $loginTime->format('d F Y, H:i:s') . ' WIB',
            'timezone' => 'Asia/Jakarta'
        ]);
    }
}
