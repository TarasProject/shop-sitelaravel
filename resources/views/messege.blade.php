@if(Session::has('flash_message'))
    <?php $data = json_decode(Session::get('flash_message'), true)?>
    <div class="alert alert-{{$data['class']}}" >
        <p>{{$data['message']}}</p>
    </div>
@endif