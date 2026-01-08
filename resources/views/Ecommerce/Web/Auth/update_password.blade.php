@extends('Ecommerce.Web.Auth.layout.index')
    
@section('title', 'Update Password')

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
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password">
            </div>
            <div class="mb-3">
                <!-- <label class="form-label">البريد الإلكتروني</label> -->
                <label class="form-label">Password Again</label>
                <input type="password" class="form-control" id="repassword" name="password" placeholder="Enter New Password Again">
            </div>
            <input type="hidden" name="userID" id="userID" value="{{ $user->id }}">

            <button type="submit" class="btn btn-primary w-100 btnUpdatePassword">Update Password</button>
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

        $('.btnUpdatePassword').click(function(e){

            e.preventDefault();
            let password = $('#password').val();
            let password2 = $('#repassword').val();
            let userID = $('#userID').val();

            if (password == ''){
                
                Swal.fire({
                    title: "Error",
                    text: "Please Enter Your Password For Your Account",
                    icon: "error",
                    confirmButtonText: "OK",
                });

            } else if(password2 == '') {

                Swal.fire({
                    title: "Error",
                    text: "Please Enter Your Password Again For Your Account",
                    icon: "error",
                    confirmButtonText: "OK",
                });

            }else if(password != password2) {

                Swal.fire({
                    title: "Error",
                    text: "Sorry Password Not Match",
                    icon: "error",
                    confirmButtonText: "OK",
                });

            }else {
                $.ajax({
                    method: 'post',
                    url: "/user/updated_password",
                    data: {
                        userID: userID,
                        password: password,
                    },

                    headers: {
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },

                    success: function (response) {

                        //  console.log(response); // 👈 ضروري جداً

                       if (response.data == 1) {

                            Swal.fire({
                                title: "Success",
                                text: "Your Password is Updated",
                                icon: "success",
                                confirmButtonText: "OK",
                            }).then(() => {
                                window.location.href = '/login';
                            });

                        } else {
                            Swal.fire({
                                title: "Error",
                                text: "Something went wrong",
                                icon: "error",
                                confirmButtonText: "OK",
                            });
                        }
                        
                    }
                    // console.log(response);

                })
            }
        })
    });

</script>

@endsection