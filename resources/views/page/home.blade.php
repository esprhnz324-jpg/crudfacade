@extends('layout.template')
@section('title', 'Homepage')
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
    max-width: 960px;
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 24px;
  ">

    {{-- Banner --}}
    <div style="
      background: #3852B4;
      border-radius: 16px;
      padding: 32px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
    ">
      <div>
        <p style="
          color: #a0b4e8;
          font-size: 14px;
          margin: 0 0 4px;
        ">Welcome back 👋</p>
        <h2 style="
          color: #fff;
          font-size: 28px;
          font-weight: 600;
          margin: 0 0 6px;
        ">{{ session('fname') ?? 'Student' }}</h2>
        <p style="
          color: #c5d0f0;
          font-size: 14px;
          margin: 0;
        ">
          Student ID: <strong style="color: #FFC81E;">{{ session('stud_id') ?? '----' }}</strong>
        </p>
      </div>
      <a href="{{ route('auth.logout') }}" class="btn" style="
        background: #FFC81E;
        color: #1a1a1a;
        padding: 12px 28px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
      ">
        Logout
      </a>
    </div>

    {{-- Links --}}
    <div style="
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
    ">

      <a href="{{ route('page.profile') }}" class="btn" style="
        flex: 1;
        min-width: 160px;
        background: #fff;
        border-radius: 12px;
        padding: 24px;
        text-decoration: none;
        border: 1px solid #dde3f5;
        display: flex;
        align-items: center;
        gap: 14px;
      ">
        <span style="font-size: 28px;">👤</span>
        <div>
          <p style="
            margin: 0;
            font-size: 13px;
            color: #8899cc;
          ">My</p>
          <p style="
            margin: 0;
            font-size: 16px;
            font-weight: 600;
            color: #3852B4;
          ">Profile</p>
        </div>
      </a>

      <div style="
        flex: 1;
        min-width: 160px;
        background: #fff;
        border-radius: 12px;
        padding: 24px;
        border: 1px solid #dde3f5;
        display: flex;
        align-items: center;
        gap: 14px;
      ">
        <span style="font-size: 28px;">📅</span>
        <div>
          <p style="
            margin: 0;
            font-size: 13px;
            color: #8899cc;
          ">Today</p>
          <p style="
            margin: 0;
            font-size: 16px;
            font-weight: 600;
            color: #3852B4;
          ">{{ date('M d, Y') }}</p>
        </div>
      </div>

      <div style="
        flex: 1;
        min-width: 160px;
        background: #fff;
        border-radius: 12px;
        padding: 24px;
        border: 1px solid #dde3f5;
        display: flex;
        align-items: center;
        gap: 14px;
      ">
        <span style="font-size: 28px;">🕐</span>
        @php
            date_default_timezone_set('Asia/Manila');
            @endphp

        <div>
            <p style="margin: 0; font-size: 13px; color: #8899cc;">Time</p>
                <p style="margin: 0; font-size: 16px; font-weight: 600; color: #3852B4;">
                    {{ date('h:i A') }}
                </p>
        </div>
      </div>

    </div>

    {{-- Recent Activity --}}
    <div style="
      background: #fff;
      border-radius: 16px;
      border: 1px solid #dde3f5;
      overflow: hidden;
    ">

      <div style="
        padding: 20px 28px;
        border-bottom: 1px solid #eef0fb;
      ">
        <h3 style="
          margin: 0;
          font-size: 17px;
          color: #3852B4;
        ">Recent Activity</h3>
      </div>

      @php
        $logs = \App\Models\Log::where('user_id', session('user_id'))->latest()->take(5)->get();
      @endphp

      @if($logs->isEmpty())
        <p style="
          padding: 40px;
          text-align: center;
          color: #a0b0d0;
        ">No recent activity found.</p>
      @else
        @foreach($logs as $log)
          <div style="
            padding: 16px 28px;
            border-bottom: 1px solid #f0f2fb;
            display: flex;
            justify-content: space-between;
            align-items: center;
          ">
            <div>
              <p style="
                margin: 0;
                font-size: 14px;
                font-weight: 500;
                color: #1a1a1a;
              ">{{ $log->logs_desc }}</p>
              <p style="
                margin: 4px 0 0;
                font-size: 12px;
                color: #a0b0d0;
              ">{{ $log->logs_type }}</p>
            </div>
            <span style="
              font-size: 12px;
              color: #a0b0d0;
            ">{{ $log->created_at }}</span>
          </div>
        @endforeach
      @endif

    </div>

  </div>
</div>

@endsection