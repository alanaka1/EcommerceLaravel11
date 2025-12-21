@extends('Ecommerce.Web.Auth.layout.index')
 
@section('title', 'Register')

@section('css')

@endsection
 
@section('content')

<div class="card-body p-4">

    <div class="text-center mb-4">
        <i class="fas fa-user-plus fa-3x text-success mb-2"></i>
        <!-- <h4>إنشاء حساب</h4> -->
        <h4>Register</h4>
        <!-- <p class="text-muted small">أنشئ حسابك خلال دقيقة</p> -->
        <p class="text-muted small">Create your account in one minute</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
            @csrf
        <div class="mb-3">
            <!-- <label class="form-label">الاسم الكامل</label> -->
            <label class="form-label">Full Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder='Full Name'>
        </div>

        <div class="mb-3">
            <!-- <label class="form-label">البريد الإلكتروني</label> -->
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder='Email'>
        </div>

        <div class="mb-3">
            <!-- <label class="form-label">كلمة المرور</label> -->
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="********">
        </div>

        <div class="mb-3">
            <!-- <label class="form-label">تأكيد كلمة المرور</label> -->
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" placeholder="********">
        </div>

        <button class="btn btn-success w-100">
            <!-- إنشاء الحساب -->
            Register
        </button>
    </form>

    <p class="text-center mt-3 small">
        <!-- عندك حساب؟ -->
        Already registered?
        <a href="{{ route('login') }}">Login</a>
    </p>

</div>

@endsection
 
@section('javascript')

@endsection