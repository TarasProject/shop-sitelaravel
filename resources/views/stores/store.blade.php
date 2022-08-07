@extends('layouts.header-footer')
@section('content')
    @foreach($products as $product)
        @if($product->store_id==$id)

            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <img class="card-img-top" src="{{$product->file_name?asset('storage/upload/'.$product->file_name):'/images/2.jpeg'}}" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" data-holder-rendered="true">
                    <div class="card-body">

                        <div class="table-user-body clearfix">
                            <table class="user-details">
                                <tbody>
                                <tr>
                                    <td>Магазин</td>
                                    <td>{{$product->store->name_store??''}}</td>
                                </tr>
                                <tr>
                                    <td>Тип об'єкта</td>
                                    <td>{{$product->type_object}}</td>
                                </tr>
                                <tr>
                                    <td>Firm</td>
                                    <td>{{$product->firm_object}}</td>
                                </tr>
                                <tr>
                                    <td>Model</td>
                                    <td>{{$product->model_object}}</td>
                                </tr>
                                <tr>
                                    <td>Ціна</td>
                                    <td>{{$product->price}}</td>

                                </tr>
                                <tr>
                                    <td>Тип валюти</td>
                                    <td>{{$product->type_currency}}</td>

                                </tr>
                                <tr>
                                    <td>Condition</td>
                                    <td>{{$product->condition}}</td>
                                </tr>
                                <tr>
                                    <td>Ім'я користувача</td>
                                    <td>{{$product->user->name??''}}</td>
                                </tr>
                                <tr>
                                    <td>Телефон</td>
                                    <td>{{$product->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Додаткова інформація</td>
                                    <td>{{$product->more_information}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a class="btn btn-primary" href="{{route('products.edit',$product->id)}}" role="button">Редагувати</a>
                                <a class="btn btn-primary" href="{{route('products.delete',$product->id)}}" role="button">Видалити</a>
                            </div>
                            <small class="text-muted">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@stop
