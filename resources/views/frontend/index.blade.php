@extends('frontend.layouts.app')

@section('content')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset('img/home-bg.jpg') }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>{{ trans('labels.frontend.home.title') }}</h1>
                        <span class="subheading">{{ trans('labels.frontend.home.subtitle') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @foreach($posts as $post)
                <div class="post-preview">
                    <a href="{{ route('frontend.post', ['post' => $post]) }}">
                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>
                        <h3 class="post-subtitle">
                            {{ $post->getFirstNWordsFromBody() }}
                        </h3>
                    </a>
                    <p class="post-meta">
                        {!! trans('labels.frontend.post.author', ['author' => '<a href="#">'.$post->author .'</a>', 'date' => $post->created_at->format('d.m.Y')]) !!}
                    </p>
                </div>
                <hr>
                @endforeach
                <!-- Pager -->
                <div class="clearfix">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
