@if(get_field('show_map'))

<section>
  {!! do_shortcode('[google_map_easy id="1"]') !!}
</section>

@endif

<section class="section contact">
  <div class="container">
    @include('partials.title', ['title' => __('Kontakt', 'aris')])
    <div class="row">
      <div class="contact__item col-sm-12 col-lg-4">
        <div class="contact__icon contact__icon--phone">
          <i class="fas fa-phone"></i>
        </div>
        <div>
          <h3 class="contact__title">
            <a href="tel:{{ str_replace(' ','', get_option_field('phone')) }}">
              {{ get_option_field('phone') }}
            </a>
          </h3>
        </div>
      </div>
      <div class="contact__item col-sm-12 col-lg-4">
        <div class="contact__icon">
          <i class="fas fa-envelope"></i>
        </div>
        <div>
          <h3 class="contact__title">
            <a href="mailto:{{ get_option_field('email') }}">
              {{ get_option_field('email') }}
            </a>
          </h3>
        </div>
      </div>
      <div class="contact__item col-sm-12 col-lg-4">
        <div class="contact__icon">
          <i class="fas fa-map-marker-alt"></i>
        </div>
        <div>
          <h3 class="contact__title">
            {!! get_option_field('address') !!}
          </h3>
        </div>
      </div>
    </div>
  </div>
</section>

<footer class="footer">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-md-auto footer__copyright text text--bold text--white">
        {{ get_option_field("copyright") }}
      </div>
      <div class="col-md-auto footer__logo">
        <a href="http://iqconnect.pl">
          <img src="{{ get_option_field('iqlogo')['url'] }}" alt="{{ get_option_field('iqlogo')['alt'] }}">
        </a>
      </div>
    </div>
  </div>
</footer>

<script>
  $('.blocks-gallery-item a').attr('data-fancybox', 'gallery');
</script>