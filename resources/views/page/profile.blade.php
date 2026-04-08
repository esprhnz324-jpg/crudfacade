@extends('layout.template')
@section('title', 'Profile')
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

    @if(session('success'))
      <div style="
        background: #e8f7ef;
        color: #216e3d;
        border: 1px solid #c5eacb;
        border-radius: 14px;
        padding: 16px 20px;
      ">
        {{ session('success') }}
      </div>
    @endif

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
          ">Profile</p>
          <h2 style="
            margin: 8px 0 0;
            color: #3852B4;
            font-size: 26px;
          ">{{ $uid->fname }} {{ $uid->lname }}</h2>
          <p style="
            margin: 8px 0 0;
            color: #a0b0d0;
            font-size: 14px;
          ">
            Student ID: <strong style="color: #3852B4;">{{ $uid->stud_id }}</strong>
          </p>
        </div>
        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
          <a href="{{ route('page.home') }}" class="btn" style="
            background: #f5f7ff;
            color: #3852B4;
            padding: 12px 24px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            border: 1px solid rgba(255,255,255,0.25);
          ">Back</a>
          <a href="{{ route('page.updateprofile') }}" class="btn" style="
            background: #3852B4;
            color: #fff;
            padding: 12px 24px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
          ">Edit Profile</a>
        </div>
      </div>

      <div style="
        padding: 28px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
      ">
        <div style="
          display: flex;
          flex-direction: column;
          gap: 8px;
        ">
          <span style="
            color: #8899cc;
            font-size: 13px;
          ">First name</span>
          <strong style="
            color: #1a1a1a;
            font-size: 15px;
          ">{{ $uid->fname }}</strong>
        </div>
        <div style="
          display: flex;
          flex-direction: column;
          gap: 8px;
        ">
          <span style="
            color: #8899cc;
            font-size: 13px;
          ">Last name</span>
          <strong style="
            color: #1a1a1a;
            font-size: 15px;
          ">{{ $uid->lname }}</strong>
        </div>
        <div style="
          display: flex;
          flex-direction: column;
          gap: 8px;
        ">
          <span style="
            color: #8899cc;
            font-size: 13px;
          ">Email</span>
          <strong style="
            color: #1a1a1a;
            font-size: 15px;
          ">{{ $uid->email }}</strong>
        </div>
        <div style="
          display: flex;
          flex-direction: column;
          gap: 8px;
        ">
          <span style="
            color: #8899cc;
            font-size: 13px;
          ">Birthday</span>
          <strong style="
            color: #1a1a1a;
            font-size: 15px;
          ">{{ $uid->bday }}</strong>
        </div>
        <div style="
          display: flex;
          flex-direction: column;
          gap: 8px;
        ">
          <span style="
            color: #8899cc;
            font-size: 13px;
          ">Age</span>
          <strong style="
            color: #1a1a1a;
            font-size: 15px;
          ">{{ $uid->age }}</strong>
        </div>
        <div style="
          display: flex;
          flex-direction: column;
          gap: 8px;
        ">
          <span style="
            color: #8899cc;
            font-size: 13px;
          ">Gender</span>
          <strong style="
            color: #1a1a1a;
            font-size: 15px;
          ">{{ ucfirst($uid->gender) }}</strong>
        </div>
        <div style="
          grid-column: 1 / -1;
          display: flex;
          flex-direction: column;
          gap: 8px;
        ">
          <span style="
            color: #8899cc;
            font-size: 13px;
          ">Address</span>
          <strong style="
            color: #1a1a1a;
            font-size: 15px;
            line-height: 1.5;
          ">{{ $uid->address }}</strong>
        </div>
        <div style="
          grid-column: 1 / -1;
          display: flex;
          flex-direction: column;
          gap: 8px;
        ">
          <span style="
            color: #8899cc;
            font-size: 13px;
          ">Contact Number</span>
          <strong style="
            color: #1a1a1a;
            font-size: 15px;
          ">{{ $uid->contact_no }}</strong>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
