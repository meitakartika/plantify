@extends('layout.app')

@section('title', 'Login | Plantify')

<style>
    /* LOGIN PAGE */
    .login-page {
        min-height: 100vh;
        background: #EBF5F3 url('/images/login-bg.png') center / cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px;
    }

    .login-card {
        width: 100%;
        max-width: 420px;
        background: #fff;
        border-radius: 20px;
        padding: 36px 32px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, .08);
    }

    .login-card h1 {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 24px;
        color: #1D2F33;
    }

    /* FORM */
    .form-group {
        margin-bottom: 16px;
    }

    .form-control {
        width: 100%;
        padding: 14px 16px;
        border-radius: 12px;
        border: 1.5px solid #E3ECEA;
        font-size: 15px;
    }

    .form-control:focus {
        outline: none;
        border-color: #4CBA9B;
    }

    .forgot {
        display: inline-block;
        font-size: 14px;
        color: #4CBA9B;
        margin-bottom: 20px;
        text-decoration: none;
    }

    .forgot:hover {
        text-decoration: underline;
    }

    /* BUTTON */
    .btn-login {
        width: 100%;
        padding: 14px;
        border-radius: 12px;
        background: #4CBA9B;
        color: #fff;
        font-weight: 600;
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: .3s ease;
    }

    .btn-login:hover {
        background: #63aa8f;
    }

    /* RESPONSIVE */
    @media (max-width: 480px) {
        .login-card {
            padding: 28px 24px;
        }

        .login-card h1 {
            font-size: 26px;
        }
    }

    /* REGISTER LINK */
    .register-link {
        margin-top: 20px;
        text-align: center;
        font-size: 14px;
        color: #4A4A4A;
    }

    .register-link a {
        color: #4CBA9B;
        font-weight: 600;
        text-decoration: none;
    }

    .register-link a:hover {
        text-decoration: underline;
    }

    @media (max-height: 600px) {
        .login-page {
            align-items: flex-start;
            padding-top: 60px;
            padding-bottom: 60px;
        }
    }

    @media (max-width: 360px) {
        .login-card {
            padding: 24px 20px;
            border-radius: 16px;
        }

        .login-card h1 {
            font-size: 24px;
        }

        .form-control {
            padding: 12px 14px;
            font-size: 14px;
        }

        .btn-login {
            padding: 12px;
            font-size: 14px;
        }

        .register-link {
            font-size: 13px;
        }
    }

    @media (max-width: 768px) {
        .login-card {
            max-width: 380px;
        }
    }
</style>

@section('content')
    <section class="login-page">
        <div class="login-card">
            <h1>Log In</h1>

            <form action="#" method="POST">
                @csrf

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username or Email">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password">
                </div>

                <a href="#" class="forgot">Forget Password?</a>

                <button type="submit" class="btn-login">
                    Log In <i class="bi bi-arrow-right"></i>
                </button>

                <div class="register-link">
                    Don’t have an account?
                    <a href="{{ route('register') }}">Register</a>
                </div>
            </form>
        </div>
    </section>
@endsection
