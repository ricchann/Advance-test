@extends('layouts.layout')
<style>
  .complete {
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }

  .complete-content {
    margin: 60px;
    font-weight: bold;
  }

  .complete-btn {
    width: 150px;
    padding: 10px 10px;
    text-align: center;
    text-decoration: none;
    background: #000;
    color: #fff;
    font-size: 14px;
    border-radius: 5px;
    cursor: pointer;
  }

</style>
@section('content')
<div class="complete">
  <p class="complete-content">ご意見いただきありがとうございました。</p>
  <input type="submit" value="トップページへ" class="complete-btn">
<div>
@endsection