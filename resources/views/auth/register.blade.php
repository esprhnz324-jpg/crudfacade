@extends('layout.template')
@section('title', 'Register')
@section('content')

<style>
  .reg-input { transition: border-color 0.2s; }
  .reg-input:focus { border-color: #FFC81E !important; outline: none; }
  .reg-input::placeholder { color: #a0b0d0; }
  .reg-btn:hover { background: #ffb800 !important; }
  .reg-btn:active { transform: scale(0.98); }
  .login-link:hover { text-decoration: underline !important; }
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
    width: 100%;
    max-width: 900px;
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid #ddd;
  ">

    {{-- Top accent bar --}}
    <div style="height: 4px; background: linear-gradient(to right, #3852B4, #FFC81E);"></div>

    <div style="
      background: #3852B4;
      padding: 32px 40px 40px;
      box-sizing: border-box;
    ">

      {{-- Header --}}
      <div style="text-align: center; margin-bottom: 32px;">
        <div style="
          width: 52px;
          height: 52px;
          border-radius: 50%;
          background: #ffffff;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 22px;
          margin: 0 auto 12px;
        ">&#128100;</div>
        <h2 style="color: #ffffff; font-size: 24px; font-weight: 500; margin: 0 0 4px;">Create an Account</h2>
        <p style="color: #c5d0f0; font-size: 13px; margin: 0;">Student Portal</p>
      </div>

      <form action="{{ route('registered') }}" method="post">
        @csrf

        {{-- @if($errors->any())
          <div style="
            background: rgba(255,100,100,0.15);
            border: 1px solid #ff9999;
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 20px;
            color: #ffcccc;
            font-size: 13px;
          ">{{ $errors->first() }}</div>
        @endif --}}

        {{-- Row 1: First Name & Last Name --}}
        <div style="display: flex; gap: 16px; margin-bottom: 14px;">
          <div style="flex: 1;">
            <label style="display: block; font-size: 12px; color: #c5d0f0; margin-bottom: 6px;">First Name *</label>
            <input type="text" name="fname" placeholder="First name"
              class="reg-input"
              value="{{ old('fname') }}"
              style="
                width: 100%;
                padding: 12px 16px;
                font-size: 14px;
                background: #ffffff;
                border: 1px solid {{ $errors->has('stud_id') ? '#ff4d4d' : '#5a73d4' }};
                border-radius: 8px;
                color: #1a1a1a;
                box-sizing: border-box;
            ">
            @error('fname')
            <span style="color: #ffcccc; font-size: 12px; padding-left: 4px;">{{ $message }}</span>
          @enderror
          </div>
          <div style="flex: 1;">
            <label style="display: block; font-size: 12px; color: #c5d0f0; margin-bottom: 6px;">Last Name *</label>
            <input type="text" name="lname" placeholder="Last name"
              class="reg-input"
              value="{{ old('lname') }}"
              style="
                width: 100%;
                padding: 12px 16px;
                font-size: 14px;
                background: #ffffff;
                border: 1px solid {{ $errors->has('lname') ? '#ff4d4d' : '#5a73d4' }};
                border-radius: 8px;
                color: #1a1a1a;
                box-sizing: border-box;
            ">
            @error('lname')
            <span style="color: #ffcccc; font-size: 12px; padding-left: 4px;">{{ $message }}</span>
          @enderror
          </div>
        </div>

        {{-- Row 2: Email --}}
        <div style="margin-bottom: 14px;">
          <label style="display: block; font-size: 12px; color: #c5d0f0; margin-bottom: 6px;">Email Address *</label>
          <input type="email" name="email" placeholder="email@example.com"
            class="reg-input"
            value="{{ old('email') }}"
            style="
              width: 100%;
              padding: 12px 16px;
              font-size: 14px;
              background: #ffffff;
              border: 1px solid {{ $errors->has('email') ? '#ff4d4d' : '#5a73d4' }};
              border-radius: 8px;
              color: #1a1a1a;
              box-sizing: border-box;
          ">
          @error('email')
            <span style="color: #ffcccc; font-size: 12px; padding-left: 4px;">{{ $message }}</span>
          @enderror
        </div>

        {{-- Row 3: Birthday & Age --}}
        <div style="display: flex; gap: 16px; margin-bottom: 14px;">
          <div style="flex: 2;">
            <label style="display: block; font-size: 12px; color: #c5d0f0; margin-bottom: 6px;">Birthday *</label>
            <input type="date" name="bday"
              class="reg-input"
              value="{{ old('bday') }}"
              style="
                width: 100%;
                padding: 12px 16px;
                font-size: 14px;
                background: #ffffff;
                border: 1px solid {{ $errors->has('bday') ? '#ff4d4d' : '#5a73d4' }};
                border-radius: 8px;
                color: #1a1a1a;
                box-sizing: border-box;
            ">
            @error('bday')
              <span style="color: #ffcccc; font-size: 12px; padding-left: 4px;">{{ $message }}</span>
            @enderror
          </div>
          <div style="flex: 1;">
            <label style="display: block; font-size: 12px; color: #c5d0f0; margin-bottom: 6px;">Age *</label>
            <input type="number" name="age" placeholder="Age"
              class="reg-input"
              value="{{ old('age') }}"
              min="1" max="100"
              style="
                width: 100%;
                padding: 12px 16px;
                font-size: 14px;
                background: #ffffff;
                border: 1px solid {{ $errors->has('age') ? '#ff4d4d' : '#5a73d4' }};
                border-radius: 8px;
                color: #1a1a1a;
                box-sizing: border-box;
            ">
            @error('age')
              <span style="color: #ffcccc; font-size: 12px; padding-left: 4px;">{{ $message }}</span>
            @enderror
          </div>
        </div>

        {{-- Row 4: Gender & Contact No --}}
        <div style="display: flex; gap: 16px; margin-bottom: 14px;">
          <div style="flex: 1;">
            <label style="display: block; font-size: 12px; color: #c5d0f0; margin-bottom: 6px;">Gender *</label>
            <select name="gender"
              class="reg-input"
              style="
                width: 100%;
                padding: 12px 16px;
                font-size: 14px;
                background: #ffffff;
                border: 1px solid {{ $errors->has('gender') ? '#ff4d4d' : '#5a73d4' }};
                border-radius: 8px;
                color: #1a1a1a;
                box-sizing: border-box;
                cursor: pointer;
            ">
            @error('gender')
              <span style="color: #ffcccc; font-size: 12px; padding-left: 4px;">{{ $message }}</span>
            @enderror
              <option value="" disabled {{ old('gender') ? '' : 'selected' }}>Select gender</option>
              <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
              <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
              <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
          </div>
          <div style="flex: 1;">
            <label style="display: block; font-size: 12px; color: #c5d0f0; margin-bottom: 6px;">Contact No *</label>
            <input type="text" name="contact_no" placeholder="09XXXXXXXXX"
              class="reg-input"
              value="{{ old('contact_no') }}"
              style="
                width: 100%;
                padding: 12px 16px;
                font-size: 14px;
                background: #ffffff;
                border: 1px solid {{ $errors->has('contact_no') ? '#ff4d4d' : '#5a73d4' }};
                border-radius: 8px;
                color: #1a1a1a;
                box-sizing: border-box;
            ">
            @error('contact_no')
              <span style="color: #ffcccc; font-size: 12px; padding-left: 4px;">{{ $message }}</span>
            @enderror
          </div>
        </div>

        {{-- Row 5: Address --}}
        <div style="margin-bottom: 14px;">
          <label style="display: block; font-size: 12px; color: #c5d0f0; margin-bottom: 6px;">Address *</label>
          <input type="text" name="address" placeholder="Street, City, Province"
            class="reg-input"
            value="{{ old('address') }}"
            style="
              width: 100%;
              padding: 12px 16px;
              font-size: 14px;
              background: #ffffff;
              border: 1px solid {{ $errors->has('address') ? '#ff4d4d' : '#5a73d4' }};
              border-radius: 8px;
              color: #1a1a1a;
              box-sizing: border-box;
          ">
          @error('address')
            <span style="color: #ffcccc; font-size: 12px; padding-left: 4px;">{{ $message }}</span>
          @enderror
        </div>

        {{-- Row 6: Password --}}
        <div style="margin-bottom: 24px;">
          <label style="display: block; font-size: 12px; color: #c5d0f0; margin-bottom: 6px;">Password *</label>
          <input type="password" name="password" placeholder="Create a password"
            class="reg-input"
            style="
              width: 100%;
              padding: 12px 16px;
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

        {{-- Row 7: Confirm Password --}}
        <div style="margin-bottom: 24px;">
          <label style="display: block; font-size: 12px; color: #c5d0f0; margin-bottom: 6px;">Confirm Password *</label>
          <input type="password" name="password_confirmation" placeholder="Confirm your password"
            class="reg-input"
            style="
              width: 100%;
              padding: 12px 16px;
              font-size: 14px;
              background: #ffffff;
              border: 1px solid #5a73d4;
              border-radius: 8px;
              color: #1a1a1a;
              box-sizing: border-box;
          ">
        </div>

        {{-- Submit --}}
        <button type="submit" class="reg-btn" style="
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
          transition: background 0.2s;
        ">REGISTER</button>

      </form>

      <p style="text-align: center; font-size: 13px; color: #c5d0f0; margin: 20px 0 0;">
        Already have an account?
        <a href="{{ route('auth.login') }}" class="login-link" style="
          color: #ffffff;
          font-weight: 500;
          text-decoration: none;
        ">Login</a>
      </p>

    </div>
  </div>
</div>

@endsection