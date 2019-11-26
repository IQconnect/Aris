@php
  $boxes = $data['boxes'];
@endphp

<section class="section section--bg">
  <div class="container">
    <div class="boxes-text row">
      @foreach ( $boxes as $item )
          <div class="col-sm-6 col-lg-4 wow fadeIn">
            <div class="boxes-text__item">
              <div class="boxes-text__title">
                {{ $item['header'] }}
              </div>
              <div class="boxes-text__desc">
                {{ $item['desc'] }}
              </div>
              @if($item['link'])
                <a class="boxes-text__link" href="{{ $item['link'] }}">
                  sprawdź szczegóły <i class="fas fa-angle-right"></i>
                </a>
              @endif
            </div>
          </div>
      @endforeach
    </div>
  </div>
</section>