@extends('Ecommerce.Web.Auth.layout.index')
    
@section('title', 'Login')

@section('css')

@endsection
 
@section('content')

<div class="card-body p-4">
    <div class="text-center mb-4">
        <i class="fas fa-user-shield fa-3x text-primary mb-2"></i>
        <!-- <h4>تسجيل الدخول</h4> -->
        <h4>Login</h4>
        <!-- <p class="text-muted small">أدخل بياناتك للمتابعة</p> -->
        <p class="text-muted small">Enter your details to continue</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf
            <div class="mb-3">
                <!-- <label class="form-label">البريد الإلكتروني</label> -->
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="example@email.com">
            </div>

            <div class="mb-3">
                <!-- <label class="form-label">كلمة المرور</label> -->
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="********">
            </div>

            <div class="d-flex justify-content-between mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox">
                    <!-- <label class="form-check-label">تذكرني</label> -->
                    <label class="form-check-label">Remember me</label>
                </div>
                <!-- <a href="#" class="small">نسيت كلمة المرور؟</a> -->
                <a href="#" class="small">Forgot your password?</a>
            </div>

            <button type="submit" class="btn btn-primary w-100 btnLogin">Login</button>
        </form>

        <p class="text-center mt-3 small">
            <!-- ما عندك حساب؟ -->
            Don't you have an account?
            <!-- <a href="register.html">إنشاء حساب</a> -->
            <a href="{{ route('register') }}">Create an account</a>
        </p>
</div>

@endsection
 
@section('javascript')

<script>
    

    $(document).ready(function(){

        $('.btnLogin').click(function(e){

            e.preventDefault();
            let email = $('#email').val();
            let password = $('#password').val();

            if (email == '' || password == ''){
                
                Swal.fire({
                    title: "Error",
                    text: "Please Enter Your Email or Password",
                    icon: "error",
                    confirmButtonText: "OK",
                });
            } else {
                $.ajax({
                    method: 'post',
                    url: '/user/login',
                    data: {
                        email: email,
                        password: password,
                    },

                    headers: {
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response) {
                        
                        if (response.data == 0) {
                            
                            Swal.fire({
                                title: "Error",
                                text: "Email or Password Wrong",
                                icon: "error",
                                confirmButtonText: "OK",
                            })

                        } else if (response.data == 1) {
                            
                            window.location.href = '/dashboard';
                        
                        }else if (response.data == 2) {
                            
                            window.location.href = '/';
                        }
                        // console.log(response)
                    }
                })
            }
        })
    });

</script>

@endsection