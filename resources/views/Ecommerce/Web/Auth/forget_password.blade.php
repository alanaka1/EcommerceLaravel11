@extends('Ecommerce.Web.Auth.layout.index')
    
@section('title', 'Reset Password')

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

    <form method="POST" action="{//{ route('password.email') }}">
        @csrf
            <div class="mb-3">
                <!-- <label class="form-label">البريد الإلكتروني</label> -->
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="example@email.com">
            </div>

            <button type="submit" class="btn btn-primary w-100 btnResetPassword">Reset Password</button>
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

        $('.btnResetPassword').one('click', function(e){

            e.preventDefault();
            let email = $('#email').val();

            if (email == ''){
                
                Swal.fire({
                    title: "Error",
                    text: "Please Enter Your Email",
                    icon: "error",
                    confirmButtonText: "OK",
                });
            } else {
                $.ajax({
                    method: 'post',
                    url: "{{ route('user.reset.password') }}",
                    data: {
                        email: email,
                    },

                    headers: {
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function(response) {
                        
                        if (response.data == 0) {
                            Swal.fire({
                                title: "Error",
                                text: "Wrong Email",
                                icon: "error",
                                confirmButtonText: "OK"
                            });
                            } else {
                            Swal.fire({
                                title: "Success",
                                text: "Reset Password Link Sent To Your Email",
                                icon: "success",
                                confirmButtonText: "OK"
                            });

                            }

                            console.log(response);
                        }
                })
            }
        })
    });

</script>

@endsection