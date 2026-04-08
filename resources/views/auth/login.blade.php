@extends('layout.template')
@section('title', 'Login')
@section('content')

<style>
  .login-input { transition: border-color 0.2s; }
  .login-input:focus { border-color: #FFC81E !important; outline: none; }
  .login-input::placeholder { color: #a0b0d0; }
  .login-btn:hover { background: #ffb800 !important; }
  .login-btn:active { transform: scale(0.98); }
  .forgot-link:hover { color: #ffffff !important; }
  .register-link:hover { text-decoration: underline !important; }
</style>

<div style="
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: calc(100vh - 140px);
  padding: 24px 16px;
  box-sizing: border-box;
">
  <div style="
    display: flex;
    width: 100%;
    max-width: 900px;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid #ddd;
    min-height: 480px;
  ">

    {{-- Left illustration panel --}}
    <div style="
      flex: 1;
      background: #f0f4ff;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px;
    ">
      <img src="{{ asset('illustration.png') }}"
           alt="Student illustration"
           style="max-width: 100%; max-height: 320px; object-fit: contain;">
    </div>

    {{-- Right form panel --}}
    <div style="
      flex: 1;
      background: #3852B4;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 48px 40px;
      gap: 16px;
      box-sizing: border-box;
    ">

      {{-- Lock icon --}}
      <div style="
        width: 56px;
        height: 56px;
        border-radius: 50%;
        background: #ffffff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
      ">&#128274;</div>

      <h2 style="
        color: #ffffff;
        font-size: 26px;
        font-weight: 500;
        margin: 0 0 8px;
      ">Login to Your Account</h2>

      <p style="
        text-align: center;
        margin: 0 0 8px;
        font-size: 13px;
        color: #8899cc;
      ">Student Portal</p>

      @if(session('error'))
        <div style=" color: #ffcccc; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px;">
          {{ session('error') }}
        </div>
      @endif

      @if(session('success'))
        <div style=" color: #a0f4ae; padding: 12px 16px; border-radius: 8px; margin-bottom: 16px;">
          {{ session('success') }}
        </div>
      @endif

      <form action="{{ route('logged') }}" method="post"
        style="width: 100%; display: flex; flex-direction: column; gap: 4px;">
        @csrf

        {{-- Student ID field --}}
        <div style="display: flex; flex-direction: column; gap: 4px; margin-bottom: 10px;">
          <input type="text" name="stud_id"
            placeholder="Student ID *"
            class="login-input"
            value="{{ old('stud_id') }}"
            style="
              width: 100%;
              padding: 14px 16px;
              font-size: 14px;
              background: #ffffff;
              border: 1px solid {{ $errors->has('stud_id') ? '#ff4d4d' : '#5a73d4' }};
              border-radius: 8px;
              color: #1a1a1a;
              box-sizing: border-box;
          ">
          @error('stud_id')
            <span style="color: #ffcccc; font-size: 12px; padding-left: 4px;">{{ $message }}</span>
          @enderror
        </div>

        {{-- Password field --}}
        <div style="display: flex; flex-direction: column; gap: 4px; margin-bottom: 10px;">
          <input type="password" name="password"
            placeholder="Password *"
            class="login-input"
            style="
              width: 100%;
              padding: 14px 16px;
              font-size: 14px;
              background: #ffffff;
              border: 1px solid {{ $errors->has('password') ? '#ff4d4d' : '#5a73d4' }};
              border-radius: 8px;
              color: #1a1a1a;
              box-sizing: border-box;
          ">
          @error('password')
            <span style="color: #ffcccc; font-size: 12px; padding-left: 4px;">{{ $message }}</span>
          @enderror
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center;">
          <label style="
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #c5d0f0;
            cursor: pointer;
          ">
            <input type="checkbox" name="remember"
              style="width: 16px; height: 16px; accent-color: #FFC81E;">
            Remember me
          </label>
          <a href="#" class="forgot-link" style="
            font-size: 13px;
            color: #c5d0f0;
            text-decoration: none;
            transition: color 0.2s;
          ">Forgot password?</a>
        </div>

        <button type="submit" class="login-btn" style="
          width: 100%;
          padding: 15px;
          font-size: 15px;
          font-weight: 500;
          background: #FFC81E;
          color: #1a1a1a;
          border: none;
          border-radius: 50px;
          cursor: pointer;
          letter-spacing: 1px;
          margin-top: 8px;
          transition: background 0.2s;
        ">LOGIN</button>

      </form>

      <p style="font-size: 13px; color: #c5d0f0; margin: 0;">
        Don't have an account?
        <a href="{{ route('auth.register') }}" class="register-link" style="
          color: #ffffff;
          font-weight: 500;
          text-decoration: none;
        ">Register</a>
      </p>

    </div>
  </div>
</div>

@endsection