<a alt="show" href="{{route('images-post.show',$id)}}" class='edit btn btn-primary ' ><i class="fa-solid fa-image"></i></a>
<a alt="show" href="{{route('tags-post.show',$id)}}" class='edit btn btn-info ' ><i class="fa-solid fa-tag"></i></a>
<a alt="edit" href="{{route('posts.edit',$id)}}" class='edit btn btn-warning ' ><i class="fa-solid fa-pen-to-square"></i></a>
<button id="btn" class='edit btn btn-danger delete-btn' value="{{$id}}" ><i class="fa-solid fa-trash" style="color: #000000;"></i></button>
