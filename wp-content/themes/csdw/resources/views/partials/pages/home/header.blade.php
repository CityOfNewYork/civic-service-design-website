<header class="home-header chameleonic header-animated">
  <div class="container">
    <h1 class="home-header__title page-title">{{ $header_settings['title'] }}</h1>
    @if($header_settings['description'])
      <div class="home-header__content html-content">
        {!! $header_settings['description'] !!}
      </div>
    @endif
  </div>



  <div class="header-animated__item header-animated__item--round header-animated__item--right-top">
    <svg width="117" height="117" viewBox="0 0 117 117" fill="none" xmlns="http://www.w3.org/2000/svg">
      <circle cx="58.5" cy="58.5" r="58.5" fill="#F9A5DA"/>
    </svg>
  </div>

  <div class="header-animated__item header-animated__item--triangle header-animated__item--right-bottom">
    <svg width="142" height="132" viewBox="0 0 142 132" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M55.0996 18.3491L31.5536 131.449L141.753 94.7508L55.0996 18.3491Z" fill="#284CCA"/>
    </svg>
  </div>

  <div class="header-animated__item header-animated__item--quadrangle header-animated__item--left-bottom">
    <svg width="241" height="152" viewBox="0 0 241 152" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect x="219.256" y="151.413" width="243" height="49" transform="rotate(-153.936 219.256 151.413)" fill="#FBB95A"/>
    </svg>
  </div>

  <div class="header-animated__item header-animated__item--square header-animated__item--left-center">
    <svg width="110" height="131" viewBox="0 0 110 131" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect x="-21" y="65.4365" width="92.5412" height="92.5412" transform="rotate(-45 -21 65.4365)" fill="#FC5D52"/>
    </svg>
  </div>

  <div class="header-animated__item header-animated__item--square header-animated__item--left-top">
    <svg width="106" height="106" viewBox="0 0 106 106" fill="none" xmlns="http://www.w3.org/2000/svg">
      <rect y="80.0408" width="83.9696" height="83.9696" transform="rotate(-72.4037 0 80.0408)" fill="#C1C6CB"/>
    </svg>
  </div>

</header>
