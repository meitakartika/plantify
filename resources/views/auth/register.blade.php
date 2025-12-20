@extends('layout.app')

@section('title', 'Register | Plantify')

<style>
    /* REGISTER PAGE */
    .register-page {
        min-height: 100vh;
        background: #EBF5F3 url('/images/login-bg.png') center / cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 24px;
    }

    .register-card {
        width: 100%;
        max-width: 420px;
        background: #fff;
        border-radius: 20px;
        padding: 36px 32px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, .08);
    }

    .register-card h1 {
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

    /* BUTTON */
    .btn-register {
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

    .btn-register:hover {
        background: #63aa8f;
    }

    /* LOGIN LINK */
    .login-link {
        margin-top: 20px;
        text-align: center;
        font-size: 14px;
        color: #4A4A4A;
    }

    .login-link a {
        color: #4CBA9B;
        font-weight: 600;
        text-decoration: none;
    }

    .login-link a:hover {
        text-decoration: underline;
    }

    /* RESPONSIVE */
    @media (max-width: 480px) {
        .register-card {
            padding: 28px 24px;
        }

        .register-card h1 {
            font-size: 26px;
        }
    }

    @media (max-height: 600px) {
        .register-page {
            align-items: flex-start;
            padding-top: 60px;
            padding-bottom: 60px;
        }
    }

    @media (max-height: 700px) {
        .register-page {
            align-items: flex-start;
            padding-top: 48px;
            padding-bottom: 48px;
        }
    }

    @media (max-width: 480px) {
        .register-card {
            padding: 24px 20px;
            border-radius: 16px;
        }

        .register-card h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form-control {
            padding: 12px 14px;
            font-size: 14px;
            border-radius: 10px;
        }

        .btn-register {
            padding: 12px;
            font-size: 14px;
            border-radius: 10px;
        }

        .login-link {
            font-size: 13px;
        }
    }

    @media (max-width: 768px) {
        .register-card {
            max-width: 380px;
        }
    }
</style>

@section('content')
    <section class="register-page">
        <div class="register-card">
            <h1>Sign Up</h1>

            <form action="#" method="POST">
                @csrf

                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username">
                </div>

                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password">
                </div>

                <button type="submit" class="btn-register">
                    Sign Up <i class="bi bi-arrow-right"></i>
                </button>

                <div class="login-link">
                    Already have an account?
                    <a href="{{ route('login') }}">Log In</a>
                </div>
            </form>
        </div>
    </section>
@endsection
