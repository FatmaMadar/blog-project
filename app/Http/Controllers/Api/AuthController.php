<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
class AuthController extends Controller
{
    //دالة تسجيل الدخول
public function login(Request $request)
{
    // التحقق من صحة البيانات المدخلة
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
 // البحث عن المستخدم في قاعدة البيانات
    $user = User::where('email', $request->email)->first();
    //التحقق من وجود المستخدم وصحة كلمة المرور
    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['بيانات الدخول غير صحيحة.'],
        ]);
    }
    //إنشاء رمز توكن جديد للمستخدم
    $token =$user->createToken('auth_token')->plainTextToken;
    //إرجاع استجابة تحتوي على رمز التوكن وبيانات المستخدم
    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
        'user' => $user,
    ]);
}

//دالة جلب بيانات المستخدم الحالي
public function me(Request $request)
{
    return response()->json($request->user());

}
//دالة تسجيل الخروج
public function logout(Request $request)
{
    // حذف التوكن الحالي للمستخدم
    $request->user()->currentAccessToken()->delete();
    return response()->json(['message' => 'تم تسجيل الخروج بنجاح.']);
}

}
