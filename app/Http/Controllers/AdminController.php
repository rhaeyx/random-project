<?php

namespace App\Http\Controllers;

use App\Models\Invite;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard');
    }

    public function invite(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|unique:' . User::class,
        ]);

        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $code = substr(str_shuffle($characters), 0, 16);

        $link = config('app.url') . '/register?code=' . $code;

        $status['type'] = 'success';
        $status['message'] = 'Invite sent successfully. ' . $link;

        try {
            Invite::create([
                'email' => $request->email,
                'code' => $code,
            ]);
        } catch (Exception $e) {
            $status['type'] = 'error';
            $status['message'] = 'Something went wrong.';
        }

        return Inertia::render('Admin/Dashboard', compact('status'));
    }
}
