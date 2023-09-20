@extends('Site.Layouts.index')
@section('title')
    Main Category
@endsection
@section('content')
    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span>Category</span>
                    <h3>{{$mainCategory->name}}</h3>
                    <p>{{$mainCategory->description}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section bg-white">
        <div class="container">
            <div class="row">
                @foreach($subCategories as $subCategory)
                <div class="col-lg-4 mb-4">
                    <div class="entry2">
                        <a href="{{route('subCategory',$subCategory->id)}}"><img src="{{asset('')}}{{$subCategory->image}}" alt="Image" class="img-fluid rounded"></a>
                        <div class="excerpt">
                            <h2>
                                <a href="{{route('subCategory',$subCategory->id)}}">{{$subCategory->name}}</a>
                            </h2>
                            <p>{{$subCategory->description}}</p>
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
