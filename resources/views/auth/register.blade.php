<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('dash/assets/imgs/theme/favicon.svg')}}">
    <link href="{{asset('dash/assets/css/style.css?v=1.0.0')}}" rel="stylesheet">
    <title>Register - Ecom Marketplace</title>
  </head>
  <body>
    <div class="screen-overlay"></div>
    <section class="content-main d-flex align-items-center min-vh-100">
        <div class="card mx-auto" style="width: 400px;">
          <div class="card-body">
            <h4 class="card-title mb-4">Create an Account</h4>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <!-- Name -->
                <div class="mb-3">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Username -->
                <div class="mb-3">
                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username">
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Phone -->
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text">+62</span>
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required placeholder="Phone Number">
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>

                <!-- Terms and Conditions -->
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input @error('terms') is-invalid @enderror" id="terms" name="terms" required>
                    <label class="form-check-label small" for="terms">
                        I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                    </label>
                    @error('terms')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="mb-4">
                    <button type="submit" class="btn btn-primary w-100">
                        {{ __('Register') }}
                    </button>
                </div>

                <!-- Social Login -->
                <p class="text-center small text-muted mb-3">or sign up with</p>
                <div class="d-grid gap-3 mb-4">
                    <a href="#" class="btn btn-light">
                        <svg class="icon-svg" aria-hidden="true" width="20" height="20" viewBox="0 0 20 20" style="margin-right: 8px; vertical-align: middle;">
                            <path d="M16.51 8H8.98v3h4.3c-.18 1-.74 1.48-1.6 2.04v2.01h2.6a7.8 7.8 0 002.38-5.88c0-.57-.05-.66-.15-1.18z" fill="#4285F4"></path>
                            <path d="M8.98 17c2.16 0 3.97-.72 5.3-1.94l-2.6-2a4.8 4.8 0 01-7.18-2.54H1.83v2.07A8 8 0 008.98 17z" fill="#34A853"></path>
                            <path d="M4.5 10.52a4.8 4.8 0 010-3.04V5.41H1.83a8 8 0 000 7.18l2.67-2.07z" fill="#FBBC05"></path>
                            <path d="M8.98 4.18c1.17 0 2.23.4 3.06 1.2l2.3-2.3A8 8 0 001.83 5.4L4.5 7.49a4.77 4.77 0 014.48-3.3z" fill="#EA4335"></path>
                        </svg>
                        Sign up with Google
                    </a>
                </div>

                <!-- Login Link -->
                <p class="text-center mb-0">
                    Already have an account? 
                    <a href="{{ route('login') }}" class="text-primary">Sign in</a>
                </p>
            </form>
          </div>
        </div>
    </section>
    <script src="{{asset('dash/assets/js/vendors/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('dash/assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dash/assets/js/main.js?v=1.0.0')}}"></script>
  </body>
</html>