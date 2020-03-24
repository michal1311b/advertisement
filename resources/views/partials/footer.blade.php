<footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-9">
          <h6>{{ trans('sentence.homepage.what.it') }}</h6>
          <p class="text-justify">{{ trans('sentence.homepage.employmed') }}</p>
        </div>

        <div class="col-xs-6 col-md-3">
          <h6>Menu</h6>
          <ul class="footer-links">
            <li><a href="https://employmed.eu/blog-employmed" title="{{ __('Blog') }}">{{ __('Blog') }}</a></li>
            <li><a href="{{ route('advertisement-list') }}" title="{{ trans('sentence.offers') }}">{{ trans('sentence.offers') }}</a></li>
            <li><a href="{{ route('foreign-list') }}" title="{{ trans('sentence.foreigns-list') }}">{{ trans('sentence.foreigns-list') }}</a></li>
            <li><a href="{{ route('cookies.show') }}" title="{{ trans('sentence.cookies-policy') }}">{{ trans('sentence.cookies-policy') }}</a></li>
            <li><a href="{{ route('company-list') }}" title="{{ trans('sentence.company-list') }}">{{ trans('sentence.company-list') }}</a></li>
            <li><a href="{{ route('course.index') }}" title="{{ trans('sentence.courses') }}">{{ trans('sentence.courses') }}</a></li>
            <li><a href="{{ route('contact.show') }}" title="{{ trans('sentence.contact-form') }}">{{ trans('sentence.contact-form') }}</a></li>
          </ul>
        </div>
      </div>
      <hr>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright © {{ now()->year }}. All rights reserved by
                <a href="#">EmployMed</a>.
            </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li>
                <a class="facebook" href="https://www.facebook.com/EmployMed" title="EmployMed Facebook site">
                    <i class="fa fa-facebook"></i>
                </a>
            </li>
            <li>
                <a class="twitter" href="/" title="EmployMed.eu">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo EmployMed.eu" class="w-100 logo">
                </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
</footer>
    {{-- <!-- Copyright -->
    <div class="footer-copyright text-center py-3">
        <div class="container-fluid pt-2">
            <div class="row">
                <div class="col-12 text-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-100 logo">
                    <div class="text-white">Copyright © {{ now()->year }}. All rights reserved by EmployMed.</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright --> --}}