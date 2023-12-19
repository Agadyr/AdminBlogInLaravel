@extends('layouts.main')
@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up" style="margin-bottom: 10px">
                @if(count($posts) > 0)
                    Блог</h1>
            @else
                <h1 class="edica-page-title" data-aos="fade-up">
                Такие посты не найдены</h1>
            @endif
            @if(count($posts) > 0)
                <section class="featured-posts-section">
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{"storage/".$post->preview_image}}" alt="blog post">
                                </div>
                                <div class="d-flex justify-content-sm-between align-items-center">
                                    <p class="blog-post-category">{{$post->category->title}}</p>
                                    @auth()
                                        <form action="{{route('post.like.store',$post->id)}}" method="POST">
                                            @csrf
                                            @method("POST")
                                            <span>{{$post->liked_users_count}}</span>
                                            <button type="submit" class="border-0 bg-transparent">
                                                @if(auth()->user()->likedposts->contains($post->id))
                                                    <i class="fas fa-heart" style="color: #ff2c6d"></i>
                                                @else
                                                    <i class="far fa-heart" style="color: #ff2c6d"></i>
                                                @endif


                                            </button>
                                        </form>
                                    @endauth
                                    @guest()
                                        <div>
                                            <span>{{$post->liked_users_count}}</span>
                                            <i class="far fa-heart" style="color: #ff2c6d"></i>
                                        </div>
                                    @endguest
                                </div>
                                <a href="{{route('post.show',$post->id)}}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{$post->title}}</h6>
                                </a>
                            </div>

                        @endforeach


                    </div>
                    @else
                        <h5>Вы можете посмотреть похожие посты</h5>
                        <div class="row">
                            <div class="col-md-8">
                                <section>
                                    <div class="row blog-post-row">
                                        @foreach($randomPosts as $randomPost)
                                            <div class="col-md-6 blog-post" data-aos="fade-up">
                                                <div class="blog-post-thumbnail-wrapper">
                                                    <img src="{{'storage/'.$randomPost->preview_image}}"
                                                         alt="blog post">
                                                </div>
                                                <p class="blog-post-category">{{$randomPost->category->title}}</p>
                                                <a href="#!" class="blog-post-permalink">
                                                    <h6 class="blog-post-title">{{$randomPost->title}}</h6>
                                                </a>
                                            </div>
                                        @endforeach

                                    </div>
                                </section>
                            </div>
                        </div>
                </section>
        </div>
        @endif

    </main>
@endsection
