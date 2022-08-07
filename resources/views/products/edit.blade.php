@extends('layouts.header-footer')
@section('content')
            <div class="container" style="padding: 20px 0">

                <form method="post"  action="" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="type_object">{{__('dictionary.type_object')}}</label>
                            <select class="form-control col-md-12" id="type_object" name="type_object">
                                @foreach($typesObject as $object)
                                    <option value="{{$object}}" {{$products['type_object']===$object?'selected':''}}>{{$object}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label class="control-label" for="firm_object">Firm</label>
                            <select class="form-control col-md-12" id="firm_object" name="firm_object">
                                @foreach($firmsObject as $firm)
                                    <option value="{{$firm}}" {{$products['firm_object']===$firm?'selected':''}}>{{$firm}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="model_object" class="control-label">Model</label>
                        <input type="text" name="model_object" class="form-control" id="model_object" placeholder="" value="{{isset($products)?$products['model_object']:''}}">
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="control-label" for="price">{{__('dictionary.price')}}</label>
                            <input type="text" name="price" class="form-control" id="price" placeholder="Вкажіть ціну" value="{{isset($products)?$products['price']:''}}">

                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label" for="type_currency">{{__('dictionary.type_currency')}}</label>
                            <select class="form-control" id="type_currency" name="type_currency">
                                @foreach($typesCurrency as $currency)
                                    <option value="{{$currency}}" {{$products['type_currency']===$currency?'selected' :''}}>{{$currency}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-md-6">
                            <div class="row">
                                <label for="name" class="control-label col-md-6">{{__('dictionary.condition')}}</label>
                                <div class="col-md-6">
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="condition" id="condition" value="Новий" {{ $products['condition']=="Новий" ?'checked':''}}>
                                        <label class="form-check-label" for="condition">
                                            {{__('dictionary.new')}}
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <input class="form-check-input" type="radio" name="condition" id="condition1" value="БВ" {{ $products['condition']=="БВ" ?'checked':''}}>
                                        <label class="form-check-label" for="condition1">
                                            {{__('dictionary.notnew')}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="phone" class="control-label">{{__('dictionary.phone')}}</label>
                        <input type="text" name="phone" class="form-control" id="phone" value="{{isset($products)?$products['phone']:''}}">
                    </div>

                    <div class="form-group">
                        <label for="more_information">{{__('dictionary.additional_information')}}</label>
                        <textarea class="form-control" id="more_information" name="more_information" rows="3">{{isset($products)?$products['more_information']:''}}</textarea>
                    </div>

                    <div class="form-group">
                        <input type="hidden" name="remember" value="{{App\Models\Product::REMEMBER_FALSE}}">
                        <input type="checkbox" name="remember" value="{{App\Models\Product::REMEMBER_TRUE}}" id="remember" {{ $products['remember']=='ON' ?'checked':''}}>
                        <label for="remember">{{__('dictionary.remember')}}</label>
                    </div>

                    <button type="submit" class="btn btn-primary">{{__('dictionary.publish')}}</button>

                </form>
            </div>
@stop
