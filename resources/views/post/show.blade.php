@extends('layouts.main')
@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up"
               data-aos-delay="200">{{$date->translatedFormat('F')}} {{$date->day}} {{$date->year}}
                • {{$date->format('H:1')}} • Featured • {{$post->comments->count()}} Комментарии</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{'storage/'.$post->main_image}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>

            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="py-0">
                        <form action="{{route('post.like.store',$post->id)}}" method="POST">
                            @csrf
                            @method("POST")
                            <button type="submit" class="border-0 bg-transparent">
                                @auth()
                                    @if(auth()->user()->likedposts->contains($post->id))
                                        <i class="fas fa-heart"></i>
                                    @else
                                        <i class="far fa-heart"></i>
                                    @endif
                                @endauth


                            </button>
                        </form>
                    </section>
                    <section class="related-posts">

                        @if(count($relatedPosts) == 0)
                            <h2 class="section-title mb-4" data-aos="fade-up">Посты</h2>
                        @endif
                        @if(count($relatedPosts) > 0)
                            <h2 class="section-title mb-4" data-aos="fade-up">Схожие Посты</h2>
                        @endif
                        <div class="row">
                            @foreach($relatedPosts as $Relatedpost)
                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{'storage/'.$Relatedpost->preview_image}}" alt="related post"
                                         class="post-thumbnail" style="height: 200px">
                                    <p class="post-category">{{$Relatedpost->category->title}}</p>
                                    <a href="{{route('post.show',$Relatedpost->id)}}"><h5
                                            class="post-title">{{$Relatedpost->title}}</h5></a>
                                </div>

                            @endforeach
                            @if(count($relatedPosts) == 0)
                                @foreach($randomPosts as $Relatedpost)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <img src="{{'storage/'.$Relatedpost->preview_image}}" alt="related post"
                                             class="post-thumbnail" style="height: 200px">
                                        <p class="post-category">{{$Relatedpost->category->title}}</p>
                                        <a href="{{route('post.show',$Relatedpost->id)}}"><h5
                                                class="post-title">{{$Relatedpost->title}}</h5></a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </section>

                    <section class="comment-list mb-5">
                        <h2 class="section-title mb-5" data-aos="fade-up">
                            Комментарии({{$post->comments->count()}})
                        </h2>
                        @foreach($post->comments as $comment)

                            <div class="comment-text mb-3">
                            <span class="username">
                                <div>
                                    {{$comment->user->name}}
                                </div>
                                <span class="text-muted float-right">{{$comment->DateAsCarbon->diffForHumans()}}</span>
                                {{$comment->message}}
                            </span>
                            </div>
                        @endforeach
                    </section>
                    @auth()
                        <section class="comment-section">
                            <h2 class="section-title mb-5" data-aos="fade-up">Отправить комментарий</h2>
                            <form action="{{route('post.comment.store',$post->id)}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-12" data-aos="fade-up">
                                        <label for="comment" class="sr-only">Comment</label>
                                        <textarea name="message" id="comment" class="form-control"
                                                  placeholder="Напишите комментарий"
                                                  rows="10"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12" data-aos="fade-up">
                                        <input type="submit" value="Отправьте сообщение" class="btn btn-warning">
                                    </div>
                                </div>
                            </form>
                        </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
