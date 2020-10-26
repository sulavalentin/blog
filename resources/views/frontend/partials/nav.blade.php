<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('frontend.index') }}">{{ trans('navs.logo') }}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            {{ trans('navs.menu') }} <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.index') }}">{{ trans('navs.home') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ trans('navs.about') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.contact') }}">{{ trans('navs.contact') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
