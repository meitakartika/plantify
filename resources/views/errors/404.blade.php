@extends('layout.app')

@section('title', '404 | Page Not Found')

<style>
    .error-wrapper {
        min-height: 80vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background: #EBF5F3;
        text-align: center;
    }

    .error-code {
        font-size: 72px;
        font-weight: 700;
        color: #4CBA9B;
        margin-bottom: 16px;
    }

    .error-desc {
        font-size: 18px;
        font-weight: 500;
        color: #1D2F33;
        margin-bottom: 62px;
        max-width: 500px;
    }

    .back-home {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 14px 28px;
        background: #4CBA9B;
        color: #fff;
        border-radius: 999px;
        font-weight: 500;
        transition: 0.3s ease;
    }

    .back-home:hover {
        background: #63aa8f;
        color: #fff;
        transform: translateY(-2px);
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .error-wrapper {
            padding: 0 20px;
            min-height: 70vh;
        }

        .error-code {
            font-size: 56px;
            margin-bottom: 12px;
        }

        .error-desc {
            font-size: 16px;
            margin-bottom: 40px;
        }

        .back-home {
            padding: 12px 24px;
            font-size: 15px;
        }
    }

    @media (max-width: 480px) {
        .error-code {
            font-size: 44px;
        }

        .error-desc {
            font-size: 15px;
            line-height: 1.6;
        }

        .back-home {
            width: 100%;
            justify-content: center;
        }
    }
</style>

@section('content')
    <div class="error-wrapper">
        <h1 class="error-code">404 Not Found</h1>
        <p class="error-desc">
            Your visited page not found. You may go home page.
        </p>

        <a href="{{ route('home') }}" class="btn back-home">
            Back to home page <i class="bi bi-arrow-right"></i>
        </a>
    </div>
@endsection
