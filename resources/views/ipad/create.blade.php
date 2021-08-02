@extends('layouts.submain')

@section('content')
<div class="main_right">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>端末登録</h2></div>

                <div class="card-body">
           @if (count($errors) > 0)
  <ul>
    @foreach($errors->all() as $err)
    <li class="text-danger">{{ $err }}</li>
    @endforeach
  </ul>
@endif
<form method="POST" action="/ipad">
  @csrf
   <div class="pl-2">
    <label id="price">管理番号：</label>
    <input id="price" name="number" type="text"
      size="5" value="{{ old('number') }}" />
  </div>
  <div class="pl-2">
    <label id="isbn">機種：</label>
    <input id="isbn" name="generation" type="text"
      size="15" value="{{ old('generation') }}" />
  </div>
  <div class="pl-2">
    <label id="title">自治体：</label><br />
    <input id="title" name="group" type="text"
      size="30" value="{{ old('group') }}" />
  </div>
  <div class="pl-2">
    <label id="price">地域：</label><br />
    <input id="price" name="areaid" type="text"
      size="5" value="{{ old('areaid') }}" />
  </div>
  <div class="pl-2">
    <label id="publisher">学校：</label><br />
    <input id="publisher" name="schoolid" type="text"
      size="10" value="{{ old('schoolid') }}" />
      </div>
   <div class="pl-2">
    <label id="price">電話番号：</label><br />
    <input id="price" name="tel" type="text"
      size="5" value="{{ old('tel') }}" />
  </div>
  <div class="pl-2">
    <label id="price">IMEI：</label><br />
    <input id="price" name="imei" type="text"
      size="5" value="{{ old('imei') }}" />
  </div>

  <div class="pl-2">
    <label id="price">シリアル：</label><br />
    <input id="price" name="serial" type="text"
      size="5" value="{{ old('serial') }}" />
  </div>
  <div class="pl-2">
    <label id="price">職業：</label><br />
    <input id="price" name="person" type="text"
      size="5" value="{{ old('person') }}" />
  </div>
  <div class="pl-2">
    <label id="price">状態：</label><br />
    <input id="price" name="status" type="text"
      size="5" value="{{ old('status') }}" />
  </div>

  <div class="pl-2">
    <input type="submit" value="送信" />
  </div>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
