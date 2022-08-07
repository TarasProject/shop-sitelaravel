@extends('layouts.header-footer')
@section('content')
            <div class="album py-5 bg-light">
                <div class="container">
                    @include('messege')
                    <div class="row">
                        @foreach($products as $product)

                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm">
                                <a href="{{route('products.addImage', $product->id)}}"><img class="card-img-top" src="{{$product->file_name?asset('storage/upload/'.$product->file_name):'/images/download_image.jpg'}}" alt="Image product" style="height: 225px; width: 100%; display: block;" data-holder-rendered="true"></a>
                                <div class="card-body">

                                    <div>
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td>{{__('dictionary.store')}}</td>
                                                <td>{{$product->store->name_store??''}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('dictionary.type_object')}}</td>
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
                                                <td>{{__('dictionary.price')}}</td>
                                                <td>{{$product->price}}</td>

                                            </tr>
                                            <tr>
                                                <td>{{__('dictionary.type_currency')}}</td>
                                                <td>{{$product->type_currency}}</td>

                                            </tr>
                                            <tr>
                                                <td>{{__('dictionary.condition')}}</td>
                                                <td>{{$product->condition}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('dictionary.name_user')}}</td>
                                                <td>{{$product->user->name??''}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('dictionary.phone')}}</td>
                                                <td>{{$product->phone}}</td>
                                            </tr>
                                            <tr>
                                                <td>{{__('dictionary.additional_information')}}</td>
                                                <td>{{$product->more_information}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="{{route('products.edit',$product->id)}}" role="button">{{__('dictionary.edit')}}</a>
                                            <a class="btn btn-primary" href="{{route('products.delete',$product->id)}}" role="button">{{__('dictionary.delete')}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>

                </div>
            </div>
@stop
