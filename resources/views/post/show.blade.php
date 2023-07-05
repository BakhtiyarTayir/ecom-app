@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">• {{  $date->translatedFormat('d F Y') }} • {{ $date->translatedFormat('H:i') }} • {{ $post->comments->count() }} comments</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ asset('storage/' . $post->main_image) }}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        {!!  $post->content !!}
                    </div>
                </div>

            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section>
                        <form action="{{ route('post.liked.store', $post->id) }}" method="post">
                            @csrf
                            <button class="border-0 bg-transparent">
                                @auth()
                                    @if(auth()->user()->likedPosts->contains($post->id))
                                        <i class="fas fa-heart"></i>
                                    @else
                                        <i class="far fa-heart"></i>
                                    @endif
                                @endauth
                            </button>
                        </form>
                    </section>
                    @if($relatedPosts->count() > 0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @foreach($relatedPosts as $relatedPost)

                                <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                    <img src="{{ asset('storage/'. $relatedPost->preview_image) }}" alt="related post" class="post-thumbnail">
                                    <p class="post-category">{{ $relatedPost->category->title }}</p>
                                    <a href="{{ route('post.show', $relatedPost->id) }}"><h5 class="post-title">{{ $relatedPost->title }}</h5></a>
                                </div>

                            @endforeach
                        </div>
                    </section>
                    @endif
                    <section class="comment-section">
                        <h4 class="faq-title">Comments {{$post->comments->count()}}</h4>
                        @foreach($post->comments as $comment)

                        <div class="card mt-4" >
                            <div class="card-header d-flex justify-content-between">
                                <h5 class="card-title">{{ $comment->user->name }}</h5>
                                <span class="date small">{{ $comment->dateAsCarbon->diffForHumans() }}</span>
                            </div>
                            <div class="card-body">


                                <p class="card-text">
                                    {{$comment->message}}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </section>
                    @if(auth()->user() == null)
                        <p>Войдите чтобы оставить комментарий</p>
                        <a href="{{ route('login') }}">вход</a>
                    @endif
                    @auth()
                    <section class="comment-section">
                        <h2 class="section-title mb-5" data-aos="fade-up">Leave a Reply</h2>
                        <form action="{{ route('post.comment.store', $post->id) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="message" id="comment" class="form-control" placeholder="Comment" rows="10"></textarea>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
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
