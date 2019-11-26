<section class="banner">
  <img  class="banner__bg" src="{{ $data['bg']['url'] }}" alt="{{ $data['bg']['alt'] }}">
  <p class="banner__content">
    {{ $data['title'] }}:<br>
    {{ get_option_field('phone') }}, {{ get_option_field('email') }}
  </p>
</section>