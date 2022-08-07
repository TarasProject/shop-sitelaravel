@extends('layouts.header-footer')
@section('content')
            <div class="container" style="padding: 20px 0">
                <form method="post"  action="" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="store_id">{{__('dictionary.store')}}</label>
                            <select class="form-control col-md-12" id="store_id" name="store_id">
                            @foreach($newStores as $newStore)
                                <option value="{{$newStore->id}}">{{$newStore->name_store}}</option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4" {{ $errors->has('type_object') ? ' has-error' : '' }}>
                            <label class="control-label" for="type_object">{{__('dictionary.type_object')}}</label>
                            <select class="form-control col-md-12" id="type_object" name="type_object">
                                <option selected>{{old("type_object")}}</option>
                                <option value="TV">TV</option>
                                <option value="Smartphone">Smartphone</option>
                                <option value="Notebook">Notebook</option>
                            </select>
                            @if ($errors->has('type_object'))
                                <div class="text-danger">
                                    <strong>{{ $errors->first('type_object') }}
                                    </strong>
                                </div>
                            @endif
                        </div>

                        <div class="form-group col-md-4" {{ $errors->has('firm_object') ? ' has-error' : '' }}>
                            <label class="control-label" for="firm_object">Firm</label>
                            <select class="form-control col-md-12" id="firm_object" name="firm_object">
                                <option selected>{{old("firm_object")}}</option>
                                <option value="Aser">Aser</option>
                                <option value="Epson">Sumsung</option>
                                <option value="Epson">Lenovo</option>
                            </select>
                            @if ($errors->has('firm_object'))
                                <div class="text-danger">
                                    <strong>{{ $errors->first('firm_object') }}
                                    </strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group" {{ $errors->has('model_object') ? ' has-error' : '' }}>
                        <label for="model_object" class="control-label">Model</label>
                        <input type="text" name="model_object" class="form-control" id="model_object" placeholder="">
                        @if ($errors->has('model_object'))
                            <div class="text-danger">
                                <strong>{{ $errors->first('model_object') }}
                                </strong>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6" {{ $errors->has('price') ? ' has-error' : '' }}>
                            <label class="control-label" for="price">{{__('dictionary.price')}}</label>
                            <input type="text" name="price" class="form-control" id="price" placeholder="Вкажіть ціну" value="{{old("price")}}">
                            @if ($errors->has('price'))
                                <div class="text-danger">
                                    <strong>{{ $errors->first('price') }}
                                    </strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group col-md-6" {{ $errors->has('type_currency') ? ' has-error' : '' }}>
                            <label class="control-label" for="type_currency">{{__('dictionary.type_currency')}}и</label>
                            <select class="form-control" id="type_currency" name="type_currency">
                                <option selected>{{old("type_currency")}}</option>
                                <option value="USD">USD</option>
                                <option value="UAH">UAH</option>
                                <option value="EUR">EUR</option>
                            </select>
                            @if ($errors->has('type_currency'))
                                <div class="text-danger">
                                    <strong>{{ $errors->first('type_currency') }}
                                    </strong>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="name" class="control-label col-md-6">{{__('dictionary.condition')}}</label>
                                <div class="col-md-6">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="condition" id="condition" value="{{__('dictionary.new')}}">
                                        <label class="form-check-label" for="condition">
                                            {{__('dictionary.new')}}
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="condition" id="condition1" value="{{__('dictionary.notnew')}}">
                                        <label class="form-check-label" for="condition1">
                                            {{__('dictionary.notnew')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" {{ $errors->has('user_id') ? ' has-error' : '' }}>
                        <label for="user_id" class="control-label">{{__('dictionary.name_user')}}</label>
                        <select class="form-control" id="user_id" name="user_id">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach

                        </select>
                        @if ($errors->has('user_id'))
                            <div class="text-danger">
                                <strong>{{ $errors->first('user_id') }}
                                </strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group" {{ $errors->has('phone') ? ' has-error' : '' }}>
                        <label for="phone" class="control-label">{{__('dictionary.phone')}}</label>
                        <input type="text" name="phone" class="form-control" id="phone" placeholder="">
                        @if ($errors->has('phone'))
                            <div class="text-danger">
                                <strong>{{ $errors->first('phone') }}
                                </strong>
                            </div>
                        @endif
                    </div>



                    <div class="form-group">
                        <label for="more_information">{{__('dictionary.additional_information')}}</label>
                        <textarea class="form-control" id="more_information" name="more_information" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="remember" value="{{App\Models\Product::REMEMBER_FALSE}}">
                        <input type="checkbox" name="remember" value="{{App\Models\Product::REMEMBER_TRUE}}" id="remember">
                        <label for="remember">{{__('dictionary.remember')}}</label>
                    </div>

                    <button type="submit" class="btn btn-primary">{{__('dictionary.publish')}}</button>

                </form>
            </div>
@stop
