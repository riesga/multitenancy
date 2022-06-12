<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\TokenRepository;
use Laravel\Passport\RefreshTokenRepository;

class PassportController extends Controller
{
    /**
     * Register user.
     *
     * @return json
     */
    public function register(Request $request)
    {
        $input = $request->all();

        $validate_data = [
            'email' => 'required|email',
            'password' => 'required|min:8',
            'first_name' => 'required|string|max:255',
            'second_name' => 'string|max:255',
            'last_name' => 'required|string|max:255',
            'second_last_name' => 'max:255|string',
            'company' => 'required|string|max:255',
            'document_type' => 'required|integer',
            'tax_regime' => 'required|integer',
            'company_type' => 'required|string|max:1',
            'nit' => 'required|string|max:15',
            'check_digit' => 'required|integer',
            'ciiu' => 'required|string|max:10',
            'code_postal' => 'required|integer',
            'stratum' => 'required|integer',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'plan' => 'required|integer',
            'comments' => 'required|string|max:255',
        ];

        $validator = Validator::make($input, $validate_data);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please see errors parameter for all errors.',
                'errors' => $validator->errors()
            ]);
        }

        $user = User::create([
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'first_name' => $input['first_name'],
            'second_name' => $input['second_name'],
            'last_name' => $input['last_name'],
            'second_last_name' => $input['second_last_name'],
            'company' => $input['company'],
            'document_type' => $input['document_type'],
            'tax_regime' => $input['tax_regime'],
            'company_type' => $input['company_type'],
            'nit' => $input['nit'],
            'check_digit' => $input['check_digit'],
            'ciiu' => $input['ciiu'],
            'code_postal' => $input['code_postal'],
            'stratum' => $input['stratum'],
            'address' => $input['address'],
            'country' => $input['country'],
            'department' => $input['department'],
            'municipality' => $input['municipality'],
            'telephone' => $input['telephone'],
            'plan' => $input['plan'],
            'comments' => $input['comments'],
            'email' => $input['email'],
            'state' => $input['state'],
        ]);

        return response()->json([
            'success' => true,
            'message' => 'User registered succesfully, Use Login method to receive token.'
        ], 200);
    }

    /**
     * Login user.
     *
     * @return json
     */
    public function login(Request $request)
    {
        $input = $request->only(['email', 'password']);

        $validate_data = [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];

        $validator = Validator::make($input, $validate_data);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Consulte la respuesta para ver todos los errores..',
                'errors' => $validator->errors()
            ]);
        }

        // authentication attempt
        if (auth()->attempt($input)) {
            $token = auth()->user()->createToken('passport_token')->accessToken;

            return response()->json([
                'success' => true,
                'message' => 'Inicio de sesión de usuario exitoso, use token para autenticarse.',
                'token' => $token
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Autenticacion de usuario fallo.'
            ], 401);
        }
    }

    /**
     * Access method to authenticate.
     *
     * @return json
     */
    public function userDetail()
    {
        return response()->json([
            'success' => true,
            'message' => 'Data fetched successfully.',
            'data' => auth()->user()
        ], 200);
    }

    /**
     * Logout user.
     *
     * @return json
     */
    public function logout()
    {
        $access_token = auth()->user()->token();

        // logout from only current device
        $tokenRepository = app(TokenRepository::class);
        $tokenRepository->revokeAccessToken($access_token->id);

        // use this method to logout from all devices
        // $refreshTokenRepository = app(RefreshTokenRepository::class);
        // $refreshTokenRepository->revokeRefreshTokensByAccessTokenId($$access_token->id);

        return response()->json([
            'success' => true,
            'message' => 'User logout successfully.'
        ], 200);
    }
}
