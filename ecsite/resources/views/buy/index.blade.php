@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        お届け先入力
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/buy">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">氏名</label>
                                    @if (Request::has('confirm'))
                                        <p class="form-control-static">{{ old('name') }}</p>
                                        <input id="name" type="hidden" name="name">
                                    @else
                                        <input id="name" class="form-control" type="text" name="name" value="{{ old('name') }}">
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label for="postalcode">郵便番号</label>
                                    @if (Request::has('confirm'))
                                        <p class="form-control-static">{{ old('postalcode') }}</p>
                                        <input id="postalcode" type="hidden" name="postalcode" value="{{ old('postalcode') }}">
                                    @else
                                        <input type="text" name="postalcode" class="form-control" id="postalcode" >
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="region">都道府県</label>
                                    @if (Request::has('confirm'))
                                        <p class="form-control-static">{{ old('region') }}</p>
                                        <input id="region" type="hidden" name="region" value="{{ old('region') }}">
                                    @else
                                        <select name="region" id="region" class="form-control">
                                            @foreach (Config::get('region') as $value)
                                                <option @if(old('region') == $value) selected @endif>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row mb-1">
                                <div class="form-group col-md-6">
                                    <label for="addressline1">住所1</label>
                                    @if (Request::has('confirm'))
                                        <p class="form-control-static">{{ old('addressline1') }}</p>
                                        <input id="addressline1" type="hidden" name="addressline1" value="{{ old('addressline1') }}">
                                    @else
                                        <input type="text" name="addressline1" id="addressline1" class="form-control" value="{{ old('addressline1') }}">
                                    @endif
                                </div>
                            </div>

                            <div class="form-row mb-1">
                                <div class="form-group col-md-6">
                                    <label for="addressline2">住所2</label>
                                    @if (Request::has('confirm'))
                                        <p class="form-control-static">{{ old('addressline2') }}</p>
                                        <input id="addressline2" type="hidden" name="addressline2" value="{{ old('addressline2') }}">
                                    @else
                                        <input type="text" name="addressline2" id="addressline2" class="form-controle" value="{{ old('addressline2') }}">
                                    @endif
                                </div>
                            </div>

                            <div class="form-row mb-1">
                                <div class="form-group col-md-6">
                                    <label for="phonenumber">電話番号</label>
                                    @if(Request::has('confirm'))
                                        <p class="form-control-static">{{ old('phonenumber') }}</p>
                                        <input id="phonenumber" type="hidden" name="phonenumber" value="{{ old('phonenumber') }}">
                                    @else
                                        <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}">
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    @if (Request::has('confirm'))
                                        <button type="submit" class="btn btn-primary" name="post">注文を確定</button>
                                        <button type="submit" class="btn btn-default" name="back">修正</button>
                                    @else
                                        <button type="submit" class="btn btn-primary" name="confirm">入力内容確認</button>
                                    @endif
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @foreach ($cartitems as $cartitem)
                        <div class="card-header">
                            {{ $cartitem->name }}
                        </div>
                        <div class="card-body">
                            <div>
                                {{ $cartitem->amount }}円
                            </div>
                            <div>
                                {{ $cartitem->quantity }}個
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
