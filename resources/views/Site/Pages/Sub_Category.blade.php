@extends('Site.Layouts.index')
@section('title')
    Sub Category
@endsection
@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span>SubCategory</span>
                    <h3>{{$subCategory->name}}</h3>
                    <p>{{$subCategory->description}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section bg-white">
        <div class="container">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-lg-4 mb-4">
                    <div class="entry2">
                        <a href="{{route('SinglePost',$post->id)}}"><img src="{{asset('')}}{{$post->image}}" alt="Image" class="img-fluid rounded"></a>
                        <div class="excerpt">
                            @php
                            $tags = \App\Models\TagsPost::all()->where('post_id','=',$post->id);
                            @endphp
                            @if($tags->count()!=0)
                            @foreach($tags as $tag)
                            <span class="post-category text-white bg-danger mb-3">{{$tag->tags->name}}</span>
                            @endforeach
                            @else
                                <span class="post-category text-white bg-danger mb-3">No Tags for this post</span>
                            @endif
                            <h2>
                                <a href="{{route('SinglePost',$post->id)}}">{{$post->title}}</a>
                            </h2>
                            <div class="post-meta align-items-center text-left clearfix">
                                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('')}}{{$post->writers->image}}" alt="Image" class="img-fluid"></figure>
                                <span class="d-inline-block mt-1">By <a href="#">{{$post->writers->name}}</a></span>
                                <span>&nbsp;-&nbsp; July 19, 2019</span>
                            </div>
                            <p>{!! $post->body !!}</p>
                            <p><a href="{{route('SinglePost',$post->id)}}">Read More</a></p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row text-center pt-5 border-top">
                <div class="col-md-12">
                    <div class="custom-pagination">
                        <span>1</span>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">4</a>
                        <span>...</span>
                        <a href="#">15</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
