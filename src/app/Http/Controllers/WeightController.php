<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WeightLog;
use App\Models\WeightTarget;
use Illuminate\Support\Facades\Hash;

class WeightController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerForm(AuthRequest $request)
    {
        $request->session()->put('register_step1');

        return redirect()->route('register.step2');
    }

    public function weightRegister()
    {
        // Step 1が完了しているか確認
        if (!$request->session()->has('register_step1')) {
            return redirect()->route('register.step1');
        }

        return view('auth.weight_register');
    }

    public function registerComplete(AuthRequest $request)
    {
        // Step 1が完了しているか確認
        if (!$request->session()->has('register_step1')) {
            return redirect()->route('register.step1');
        }

        // Step 1のデータを取得
        $step1Data = session('register_step1');

        // ユーザーを作成
        $user = User::create([
            'name' => $step1Data['name'],
            'email' => $step1Data['email'],
            'password' => Hash::make($step1Data['password']),
        ]);

        // 現在の体重を記録
        WeightLog::create([
            'user_id' => $user->id,
            'date' => now(),
            'weight' => $request->current_weight,
        ]);

        // 目標体重を記録
        WeightTarget::create([
            'user_id' => $user->id,
            'target_weight' => $request->target_weight,
        ]);

        // セッションをクリア
        session()->forget('register_step1');

        // 認証処理（オプション）
        auth()->login($user);

        // リダイレクト
        return redirect()->route('index');
    }

    public function login()
    {
        return view('auth.login');
    }

}
