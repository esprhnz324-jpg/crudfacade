@extends('layout.template')
@section('title', 'Student Portal')
@section('content')

<style>
  .hero-btn-primary:hover { background: #ffb800 !important; }
  .hero-btn-secondary:hover { background: rgba(255,200,30,0.15) !important; }
</style>

<div style="
  min-height: calc(100vh - 140px);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 40px 24px;
  box-sizing: border-box;
">

  {{-- Hero Section --}}
  <div style="
    text-align: center;
    max-width: 640px;
  ">
    {{-- Badge --}}
    <div style="
      display: inline-block;
      background: rgba(56, 82, 180, 0.1);
      border: 1px solid #3852B4;
      color: #3852B4;
      font-size: 13px;
      padding: 6px 18px;
      border-radius: 50px;
      margin-bottom: 24px;
    ">3AWebSys2 &mdash; Academic Year 2026</div>

    <h1 style="
      font-size: 42px;
      font-weight: 600;
      color: #1a1a2e;
      margin: 0 0 16px;
      line-height: 1.2;
    ">Welcome to the<br><span style="color: #3852B4;">Student Portal</span></h1>

    <p style="
      font-size: 16px;
      color: #555;
      margin: 0;
      line-height: 1.7;
    ">Manage your academic records, track your progress,<br>and stay connected with your institution.</p>

  </div>

</div>

@endsection