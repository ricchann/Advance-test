@extends('layouts.layout')
<style>

.search-container {
  margin: 10px auto;
  width: 90%;
}
.search-form {
  padding: 10px 0;
  border: solid 2px;
}
.fullname_gender-container {
  margin: 20px 0;
  display: flex;
  align-items: center;
}
.fullname_container {
  margin: 0 30px;
  width: 370px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.gender_container {
  margin: 0 30px;
}


.date_container {
  margin: 20px 30px;
  display: flex;
  align-items: center;
}
.date_container div {
  width: 740px;
  display: flex;
  align-items: center;
}
.date_container div label {
  margin-right: 120px;
}
.date_container span {
  width: 50px;
  text-align: center;
}
.email_container {
  margin: 20px 30px;
  width: 370px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.input-name {
  width: 200px;
  height: 40px;
  border: 1px solid #ccc;
  border-radius: 5px;
}
.search-btn {
  display: flex;
  flex-direction: column;
  align-items: center;
}
.search-btn input {
  width: 150px;
  padding: 10px 10px;
  text-align: center;
  text-decoration: none;
  background: #000;
  color: #fff;
  font-size: 16px;
  border-radius: 5px;
  margin-bottom: 10px;
  cursor: pointer;
}
.search-btn a {
  font-size: 15px;
  color: #000;
}
.pagination {
  margin: 20px;
}
.result-container {
  margin: 20px 0;
  width: 100%;
}
.search-result td {
  line-height: 35px;
}
.result-title {
  border-bottom: 1px solid #000;
}
.result-title th {
  padding: 10px 30px;
  text-align: left;
}
.search-opinion-limit:hover{
  display: none;
}
.search-opinion {
  display: none;
}
.search-opinion-limit:hover +
.search-opinion {
  display: block;
}
.delete-btn {
  display: inline-block;
  width: 70px;
  height: 28px;
  background: #000;
  color: #fff;
  font-size: 14px;
  border-radius: 5px;
  cursor: pointer;
  
}


</style>

@section('title','管理システム')

@section('content')
<div class="search-container">
  <form action="/search" method="get" class="search-form">
    <div class="fullname_gender-container">
      <div class="fullname_container">
        <label for="fullname">お名前</label>
        <input class="input-name" type="text" name="fullname" id="fullname" value="{{$fullname}}">
      </div>
      <div class="gender_container">
        <label for="gender">性別<label>
        <input type="radio" name="gender" id="gender" value="" {{ $gender !== '1||2' ? 'checked' : '' }}>
        <label for="gender">全て</label>
        <input type="radio" name="gender" id="male" value="1" {{ $gender == '1' ? 'checked' : '' }}>
        <label for="male">男</label>
        <input type="radio" name="gender" id="female" value="2" {{ $gender == '2' ? 'checked' : '' }}>
        <label for="female">女</label>
      </div>
    </div>
    <div class="date_container">
      <div>
        <label for="date">登録日</label>
        
          <input class="input-name" type="date" name="startDate" id="date" value="{{$startDate}}">
          <span>~</span>
          <input class="input-name" type="date" name="endDate" id="date" value="{{$endDate}}">
        
      </div>
    </div>
    <div class="email_container">
      <label for="email">メールアドレス</label>
      <input class="input-name" type="text" name="email" id="email" value="{{$email}}">
    </div>
    <div class="search-btn">
      <input type="submit" value="検索">
      <a href="/search">リセット</a>
    </div>
  </form>
  <p class="pagination">{{ $items->appends(request()->query())->links()}}</p>
  <table class="result-container">
    <tr class="result-title">
      <th>ID</th>
      <th>お名前</th>
      <th>性別</th>
      <th>メールアドレス</th>
      <th>ご意見</th>
    </tr>
    @if(isset($items))
    @foreach($items as $item)
    <form action="/search" method="POST">
      @csrf
      <tr class="search-result">
        <td><p class="">{{$item->id}}</p></td>
        <td><p class="">{{$item->fullname}}</p></td>
        <td>
          @if($item->gender==1)
          <p class="">男性</p>
          @elseif($item->gender==2)
          <p class="">女性</p>
          @else
          <p class="">性別不明</p>
          @endif
        </td>
        <td><p class="">{{$item->email}}</p></td>
        <td>
          </p>
          <p class="search-opinion-limit">{{Str::limit($item->opinion,30)}}</p>
          <p class="search-opinion">{{$item->opinion}}</p>
        </td>
        <td>
          <input type="hidden" name="id" value="{{$item->id}}">
          <input class="delete-btn" type="submit" value="削除">
        </td>
      </tr>
    </form>
    @endforeach
    @else
    <p>見つかりませんでした。</p>
    @endif
  </table>
</div>
@endsection