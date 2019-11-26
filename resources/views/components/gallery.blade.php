@php
$gallery = $data['gallery'];
@endphp

<section class="section">
  <div class="container">
    @include('partials.title', ['title' => $data['title'], 'subtitle' => $data['subtitle']])
    <div class="row">
      <div class="col-12">
        <div class="gallery">
          @php
          $galleryName = rand(1, 999);
          @endphp
          @foreach ($gallery as $img)
          <a data-fancybox="gallery{{$galleryName}}" href="{{ $img['url'] }}">
            <img class="gallery__image" src="{{ $img['sizes']['medium'] }}">
          </a>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>