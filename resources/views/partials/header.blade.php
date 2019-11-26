<header class="header" header>
  <div class="container">
    <div class="row header__row">
      @if(get_option_field("logo"))
        <a class="header__brand col-auto" href="{{ home_url('/') }}">
          <img src="{{  get_option_field("logo")['url'] }}" alt="{{  get_option_field("logo")['alt'] }}">
        </a>
      @else
        <span>
        </span>
      @endif
      <button class="header__hamburger hamburger" data-toggle-menu>
        <span class="hamburger__line"></span>
        <span class="hamburger__line"></span>
        <span class="hamburger__line"></span>
      </button>
      <nav class="header__nav col-auto" data-nav>
         @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(
            [
              'theme_location' => 'primary_navigation',
              'menu_class' => 'header__menu',
            ]) !!}
        @endif
      </nav>
    </div>
  </div>
</header>