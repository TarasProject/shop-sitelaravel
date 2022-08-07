@extends('layouts.header-footer')
@section('content')
    <div class="container" style="padding-top: 25px;">
        @include('messege')
    <div class="flex-container">
        @foreach($users as $user)
        <div class="flex-block">

                <a href="{{route('users.addImage', $user->id)}}"><img class="card-img-top rounded mx-auto d-block" src="{{$user->file_name?asset('storage/upload/'.$user->file_name):'/images/download_image.jpg'}}" alt="Image user" style="height: 200px; width: 240px; display: block;" data-holder-rendered="true"></a>
                <div>
                    <table>
                        <tbody>
                        <tr>
                            <td>{{__('dictionary.name_user')}}:</td>
                            <td>{{$user->name}}</td>

                        </tr>
                        <tr>
                            <td>E-mail:</td>
                            <td>{{$user->email}}</td>
                        </tr>
                        <tr>
                            <td>{{__('dictionary.phone')}}:</td>
                            <td>{{$user->phone}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="btn-group">
                        <a class="btn btn-primary btn btn-outline-info btn-sm" href="{{route('users.edit',$user->id)}}" role="button">Редагувати користувача</a>
                        <a class="btn btn-primary btn btn-outline-info btn-sm" href="{{route('users.delete',$user->id)}}" role="button">Видалити акаунт</a>
                    </div>
                </div>

        </div>
        @endforeach
    </div>
    </div>




    {{--<div class="album py-5 bg-light">--}}
            {{--<div class="container" style="padding-top: 25px">--}}
                {{--@include('messege')--}}
                {{--<div class="row">--}}
                {{--@foreach($users as $user)--}}
                        {{--<div class="col-md-4">--}}
                            {{--<div class="card mb-4 shadow-sm">--}}
                                {{--<a href="{{route('users.addImage', $user->id)}}"><img class="card-img-top rounded mx-auto d-block" src="{{$user->file_name?asset('storage/upload/'.$user->file_name):'/images/download_image.jpg'}}" alt="Image user" style="height: 200px; width: 240px; display: block;" data-holder-rendered="true"></a>--}}
                                {{--<div>--}}
                                    {{--<table>--}}
                                        {{--<tbody>--}}
                                        {{--<tr>--}}
                                            {{--<td>Ім'я:</td>--}}
                                            {{--<td>{{$user->name}}</td>--}}

                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>Електронний адрес:</td>--}}
                                            {{--<td>{{$user->email}}</td>--}}
                                        {{--</tr>--}}
                                        {{--<tr>--}}
                                            {{--<td>Контактний телефон:</td>--}}
                                            {{--<td>{{$user->phone}}</td>--}}
                                        {{--</tr>--}}
                                        {{--</tbody>--}}
                                    {{--</table>--}}
                                    {{--<div class="btn-group">--}}
                                        {{--<a class="btn btn-primary btn btn-outline-info btn-sm" href="{{route('users.edit',$user->id)}}" role="button">Редагувати користувача</a>--}}
                                        {{--<a class="btn btn-primary btn btn-outline-info btn-sm" href="{{route('users.delete',$user->id)}}" role="button">Видалити акаунт</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                {{--@endforeach--}}
                {{--</div>--}}
            {{--</div>--}}
    {{--</div>--}}
@stop
