
@if($status == 'disactive')
    <button  value="{{$id}}" class='edit btn btn-success btn_status' >Active</button>
@elseif($status == 'active')
    <button  value="{{$id}}" class='edit btn btn-danger btn_status' >In Active</button>
@endif
