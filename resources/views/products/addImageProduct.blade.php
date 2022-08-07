@extends('layouts.header-footer')
@section('content')
    <div class="container" style="padding: 20px 0;  text-align: center;">
        <h1>Завантажте зображення</h1>
            <form method="post" enctype="multipart/form-data" action="">
            {{ csrf_field() }}
            <div>
                <input name="file" type="file" class="btn btn-primary">
                <button type="submit" class="btn btn-primary">{{__('dictionary.publish')}}</button>
            </div>
        </form>
    </div>

@stop
