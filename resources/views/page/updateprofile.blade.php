@extends('layout.template')
@section('title', 'Edit Profile')
@section('content')
<div style="
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: calc(100vh - 140px);
  padding: 24px 16px;
  box-sizing: border-box;
">
  <div style="
    max-width: 840px;
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 24px;
  ">

    <div style="
      background: #fff;
      border-radius: 16px;
      border: 1px solid #dde3f5;
      overflow: hidden;
    ">
      <div style="
        padding: 24px 28px;
        border-bottom: 1px solid #eef0fb;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
      ">
        <div>
          <p style="
            margin: 0;
            color: #8899cc;
            font-size: 14px;
          ">Edit Profile</p>
          <h2 style="
            margin: 8px 0 0;
            color: #3852B4;
            font-size: 26px;
          ">Update your student details</h2>
        </div>
        <a href="{{ route('page.profile') }}" class="btn" style="
          background: #f5f7ff;
          color: #3852B4;
          padding: 12px 24px;
          border-radius: 50px;
          text-decoration: none;
          font-weight: 600;
          font-size: 14px;
          border: 1px solid #d4d9ec;
        ">Cancel</a>
      </div>

      <div style="
        padding: 28px;
        display: flex;
        flex-direction: column;
        gap: 20px;
      ">
        @if($errors->any())
          <div style="
            border: 1px solid #f5c6cb;
            background: #f8d7da;
            color: #721c24;
            border-radius: 14px;
            padding: 16px;
          ">
            <strong style="
              display: block;
              margin-bottom: 8px;
            ">Please fix the errors below:</strong>
            <ul style="
              margin: 0;
              padding-left: 20px;
            ">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <form method="POST" action="{{ route('page.updateprofile.submit') }}" style="
          display: grid;
          gap: 20px;
        ">
          @csrf

          <div style="
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
          ">
            <label style="
              display: flex;
              flex-direction: column;
              gap: 8px;
              font-size: 13px;
              color: #64748b;
            ">
              First name
              <input type="text" name="fname" value="{{ old('fname', $uid->fname) }}" style="
                padding: 14px 16px;
                border: 1px solid #dfe4f1;
                border-radius: 14px;
                font-size: 14px;
                color: #1a1a1a;
              " required>
            </label>
            <label style="
              display: flex;
              flex-direction: column;
              gap: 8px;
              font-size: 13px;
              color: #64748b;
            ">
              Last name
              <input type="text" name="lname" value="{{ old('lname', $uid->lname) }}" style="
                padding: 14px 16px;
                border: 1px solid #dfe4f1;
                border-radius: 14px;
                font-size: 14px;
                color: #1a1a1a;
              " required>
            </label>
          </div>

          <div style="
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
          ">
            <label style="
              display: flex;
              flex-direction: column;
              gap: 8px;
              font-size: 13px;
              color: #64748b;
            ">
              Email
              <input type="email" name="email" value="{{ old('email', $uid->email) }}" style="
                padding: 14px 16px;
                border: 1px solid #dfe4f1;
                border-radius: 14px;
                font-size: 14px;
                color: #1a1a1a;
              " required>
            </label>
            <label style="
              display: flex;
              flex-direction: column;
              gap: 8px;
              font-size: 13px;
              color: #64748b;
            ">
              Birthday
              <input type="date" name="bday" value="{{ old('bday', $uid->bday) }}" style="
                padding: 14px 16px;
                border: 1px solid #dfe4f1;
                border-radius: 14px;
                font-size: 14px;
                color: #1a1a1a;
              " required>
            </label>
          </div>

          <div style="
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
          ">
            <label style="
              display: flex;
              flex-direction: column;
              gap: 8px;
              font-size: 13px;
              color: #64748b;
            ">
              Age
              <input type="number" name="age" min="1" max="120" value="{{ old('age', $uid->age) }}" style="
                padding: 14px 16px;
                border: 1px solid #dfe4f1;
                border-radius: 14px;
                font-size: 14px;
                color: #1a1a1a;
              " required>
            </label>
            <label style="
              display: flex;
              flex-direction: column;
              gap: 8px;
              font-size: 13px;
              color: #64748b;
            ">
              Gender
              <select name="gender" style="
                padding: 14px 16px;
                border: 1px solid #dfe4f1;
                border-radius: 14px;
                font-size: 14px;
                color: #1a1a1a;
              " required>
                <option value="male" {{ old('gender', $uid->gender) === 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('gender', $uid->gender) === 'female' ? 'selected' : '' }}>Female</option>
                <option value="other" {{ old('gender', $uid->gender) === 'other' ? 'selected' : '' }}>Other</option>
              </select>
            </label>
          </div>

          <label style="
            display: flex;
            flex-direction: column;
            gap: 8px;
            font-size: 13px;
            color: #64748b;
          ">
            Address
            <textarea name="address" rows="3" style="
              padding: 14px 16px;
              border: 1px solid #dfe4f1;
              border-radius: 14px;
              font-size: 14px;
              color: #1a1a1a;
            ">{{ old('address', $uid->address) }}</textarea>
          </label>

          <label style="
            display: flex;
            flex-direction: column;
            gap: 8px;
            font-size: 13px;
            color: #64748b;
          ">
            Contact Number
            <input type="text" name="contact_no" value="{{ old('contact_no', $uid->contact_no) }}" style="
              padding: 14px 16px;
              border: 1px solid #dfe4f1;
              border-radius: 14px;
              font-size: 14px;
              color: #1a1a1a;
            " required>
          </label>

          <div style="
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
          ">
            <label style="
              display: flex;
              flex-direction: column;
              gap: 8px;
              font-size: 13px;
              color: #64748b;
            ">
              New password
              <input type="password" name="password" style="
                padding: 14px 16px;
                border: 1px solid #dfe4f1;
                border-radius: 14px;
                font-size: 14px;
                color: #1a1a1a;
              ">
            </label>
            <label style="
              display: flex;
              flex-direction: column;
              gap: 8px;
              font-size: 13px;
              color: #64748b;
            ">
              Confirm password
              <input type="password" name="password_confirmation" style="
                padding: 14px 16px;
                border: 1px solid #dfe4f1;
                border-radius: 14px;
                font-size: 14px;
                color: #1a1a1a;
              ">
            </label>
          </div>

          <p style="
            margin: 0;
            color: #8899cc;
            font-size: 13px;
          ">Leave password fields empty to keep your current password.</p>

          <button type="submit" style="
            width: fit-content;
            background: #3852B4;
            color: #fff;
            border: none;
            padding: 14px 28px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
          ">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
