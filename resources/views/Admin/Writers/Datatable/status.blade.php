
@if($is_active == 0)
    <button  value="{{$id}}" class='edit btn btn-success btn_status' >Active</button>
@else
    <button  value="{{$id}}" class='edit btn btn-danger btn_status' >Dis Active</button>
@endif
