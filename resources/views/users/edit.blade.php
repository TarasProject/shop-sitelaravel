@extends('layouts.header-footer')
@section('content')
    <div class="container" style="padding: 20px 0">
        <a href="{{route('users.addImage', $user->id)}}"><img class="card-img-top" src="{{$user->file_name?asset('storage/upload/'.$user->file_name):'/images/download_image.jpg'}}" alt="Image user" style="height: 200px; width: 200px; display: block;" data-holder-rendered="true"></a>
        <form method="post"  action="" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label" for="name">{{__('dictionary.name_user')}}</label>
                <input class="form-control" type="text" id="name" name="name" value="{{isset($user)?$user['name']:''}}">
            </div>
            <div class="form-group">
                <label class="control-label" for="email">E-mail</label>
                <input class="form-control" type="email" id="email" name="email" value="{{isset($user)?$user['email']:''}}" >
            </div>
            <div class="form-group">
                <label class="control-label" for="phone">{{__('dictionary.phone')}}</label>
                <input class="form-control" type="text" id="phone" name="phone" value="{{isset($user)?$user['phone']:''}}">
            </div>

            <button type="submit" class="btn btn-primary btn-lg btn-block">Змінити дані</button>
        </form>
    </div>
@stop
