<?php

namespace App\Http\Controllers;

use App\Models\ListUser;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $auth = Auth::user();
            if (!$auth) {
                return response()->json(["data" => "not_auth"]);
            }

            $request->validate([
                'name'         => 'required|string|max:255',
                'pay_with'     => 'required|string|max:255',
                'pay_status'   => 'required|string|max:255',
                'value'        => 'required|numeric',
                'pay_type'     => 'required|integer',
                'installments' => 'required|integer',
            ]);

            $register = ListUser::insert([
                "user_id"       => $auth->id,
                "name"          => $request->name,
                "value"         => $request->value,
                "pay_type"      => $request->pay_type,
                "installments"  => $request->installments,
                "pay_on"        => $request->pay_with,
                "is_paid"       => $request->pay_status ? "paid" ?? true : false,
                "created_at"    => now("America/Sao_paulo"),
                "updated_at"    => now("America/Sao_paulo"),
            ]);

            if (!$register) {
                return response()->json(["data" => "error"]);
            } else {
                return response()->json(["data" => "success"]);
            }
        } catch (Exception $err) {
            return response()->json(["data" => "error"]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(ListUser $list)
    {
        try {
            $auth = Auth::user();
            if ($auth) {
                return response()->json([
                    "data" => $list->where('user_id', $auth->id)->latest()->get()
                ]);
            } else {
                return response()->json(["data" => "error"]);
            }
        } catch (Exception $e) {
            return response()->json(["data" => "error"]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ListUser $list)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ListUser $list)
    {
        //
    }
}
