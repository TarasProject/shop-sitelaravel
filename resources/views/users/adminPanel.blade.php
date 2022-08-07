@extends('layouts.header-footer')
@section('content')
    <div class="container" style="padding: 20px 0">
        <form method="post" action=" ">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="input_store">Новий магазин</label>
                <input type="text" name="input_store" class="form-control" id="input_store" value="{{old('name_store')}}" placeholder="Введіть магазин">
            </div>
            <button type="submit" class="btn btn-primary">{{__('dictionary.publish')}}</button>
        </form>
    </div>
@stop
