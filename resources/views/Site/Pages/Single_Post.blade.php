@extends('Site.Layouts.index')
@section('title')
    Post
@endsection
@section('content')
    <div class="site-cover site-cover-sm same-height overlay single-page"
         style="background-image: url('https://img.freepik.com/free-photo/office-table-with-cup-coffee-keyboard-notepad_1220-4617.jpg');">
        <div class="container">
            <div class="row same-height justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="post-entry text-center">
                        <h1 class="mb-4"><a href="#">{{$post->title}}</a></h1>
                        <div class="post-meta align-items-center text-center">
                            <figure class="author-figure mb-0 mr-3 d-inline-block"><img
                                    src="{{asset('')}}{{$post->writers->image}}" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By {{$post->writers->name}}</span>
                            <span>&nbsp;-&nbsp;{{$post->created_at->format('Y-m-d')}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="site-section py-lg">
        <div class="container">

            <div class="row blog-entries element-animate">

                <div class="col-md-12 col-lg-8 main-content">

                    <div class="post-content-body">
                        <p>{!!$post->body!!}</p>
                        <div class="row mb-5 mt-5">
                            @foreach($imagesPost as $image)
                                <div class="col-md-6 mb-4">
                                    <img src="{{asset('')}}{{$image->image}}" alt="Image placeholder" width="300px"
                                         height="300px" class="img-fluid rounded">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="pt-5">
                        @if($comments->count() != 0)
                        <h3 class="mb-5">{{$comments->count()}} Comments</h3>
                        <ul class="comment-list">
                            @foreach($comments as $comment)
                            <li class="comment">
                                <div class="vcard">
                                    <img src="{{asset('Website')}}/images/person_2.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>{{$comment->name}}</h3>
                                    <div class="meta">{{$comment->created_at->format('Y-m-d')}} at {{\Carbon\Carbon::parse($comment->created_at)->format('H:i')}}</div>
                                    <p>{{$comment->message}}</p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="{{route('comments.store')}}" method="Post" class="p-5 bg-light">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Name *</label>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <input hidden name="post_id" value="{{$post->id}}">
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

                <!-- END main-content -->

                <div class="col-md-12 col-lg-4 sidebar">
                    <div class="sidebar-box search-form-wrap">
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <span class="icon fa fa-search"></span>
                                <input type="text" class="form-control" id="s"
                                       placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <div class="bio text-center">
                            <img src="{{asset('')}}{{$post->writers->image}}" alt="Image Placeholder" class="img-fluid mb-5">
                            <div class="bio-body">
                                <h2>{{$post->writers->name}}</h2>
                                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem
                                    facilis sunt repellendus excepturi beatae porro debitis voluptate nulla quo veniam
                                    fuga sit molestias minus.</p>
                                <p><a href="#" class="btn btn-primary btn-sm rounded px-4 py-2">Read my bio</a></p>
                            </div>
                            <br>
                            <p class="social">
                                <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                                <a href="#"><span class="icon-twitter p-2"></span></a>
                                <a href="#"><span class="icon-instagram p-2"></span></a>
                            </p>
{{--                            <p class="social">--}}
{{--                                <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>--}}
{{--                                <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>--}}
{{--                                <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>--}}
{{--                                <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>--}}
{{--                            </p>--}}
                        </div>
                    </div>
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h3 class="heading">Recent Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                <li>
                                    <a href="{{route('SinglePost',$recentPost->id)}}">
                                        <img src="{{asset('')}}{{$recentPost->image}}" alt="Image placeholder" class="mr-4">
                                        <div class="text">
                                            <h4>{{$recentPost->title}}</h4>
                                            <div class="post-meta">
                                                <span class="mr-2">{{\Carbon\Carbon::parse($recentPost->created_at->format('H:i'))}} </span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            @foreach($mainCategories as $mainCategory)
                                <li><a href="{{route('mainCategory',$mainCategory->id)}}">{{$mainCategory->name}} <span>({{$mainCategory->posts()->count()}})</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Tags</h3>
                        <ul class="tags">
                            @foreach($tags as $tag)
                                <li><a href="#">{{$tag->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- END sidebar -->

            </div>
        </div>
    </section>

{{--    <div class="site-section bg-light">--}}
{{--        <div class="container">--}}

{{--            <div class="row mb-5">--}}
{{--                <div class="col-12">--}}
{{--                    <h2>More Related Posts</h2>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row align-items-stretch retro-layout">--}}

{{--                <div class="col-md-5 order-md-2">--}}
{{--                    <a href="single.html" class="hentry img-1 h-100 gradient"--}}
{{--                       style="background-image: url('images/img_4.jpg');">--}}
{{--                        <span class="post-category text-white bg-danger">Travel</span>--}}
{{--                        <div class="text">--}}
{{--                            <h2>The 20 Biggest Fintech Companies In America 2019</h2>--}}
{{--                            <span>February 12, 2019</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <div class="col-md-7">--}}

{{--                    <a href="single.html" class="hentry img-2 v-height mb30 gradient"--}}
{{--                       style="background-image: url('images/img_1.jpg');">--}}
{{--                        <span class="post-category text-white bg-success">Nature</span>--}}
{{--                        <div class="text text-sm">--}}
{{--                            <h2>The 20 Biggest Fintech Companies In America 2019</h2>--}}
{{--                            <span>February 12, 2019</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <div class="two-col d-block d-md-flex">--}}
{{--                        <a href="single.html" class="hentry v-height img-2 gradient"--}}
{{--                           style="background-image: url('images/img_2.jpg');">--}}
{{--                            <span class="post-category text-white bg-primary">Sports</span>--}}
{{--                            <div class="text text-sm">--}}
{{--                                <h2>The 20 Biggest Fintech Companies In America 2019</h2>--}}
{{--                                <span>February 12, 2019</span>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                        <a href="single.html" class="hentry v-height img-2 ml-auto gradient"--}}
{{--                           style="background-image: url('images/img_3.jpg');">--}}
{{--                            <span class="post-category text-white bg-warning">Lifestyle</span>--}}
{{--                            <div class="text text-sm">--}}
{{--                                <h2>The 20 Biggest Fintech Companies In America 2019</h2>--}}
{{--                                <span>February 12, 2019</span>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}

@endsection
