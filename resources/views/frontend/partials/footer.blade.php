<hr>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="#">
                            <span class="fa-stack fa-lg">
                              <i class="fas fa-circle fa-stack-2x"></i>
                              <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <span class="fa-stack fa-lg">
                              <i class="fas fa-circle fa-stack-2x"></i>
                              <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <span class="fa-stack fa-lg">
                              <i class="fas fa-circle fa-stack-2x"></i>
                              <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                </ul>
                <div class="clearfix"></div>
                <div class="text-center">
                    <a href="{{ route('set.locale', ['locale' => 'ro']) }}">
                        {{ trans('labels.locale.ro') }}
                    </a>
                    <a href="{{ route('set.locale', ['locale' => 'ru']) }}">
                        {{ trans('labels.locale.ru') }}
                    </a>
                    <a href="{{ route('set.locale', ['locale' => 'en']) }}">
                        {{ trans('labels.locale.en') }}
                    </a>
                </div>
                <div class="clearfix"></div>
                <p class="copyright text-muted">Copyright &copy; Your Website 2020</p>
            </div>
        </div>
    </div>
</footer>
