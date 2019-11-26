@php
    $gallery = $data;
@endphp

<ul class="post-gallery">
  @foreach ($gallery as $img)
  <li class="post-gallery__item">
    <a href="{{ $img['url'] }}" data-fancybox="gallery">
      {!! image($img['ID'], 'post_thumbnail', 'post-gallery__img') !!}
    </a>
  </li>
  @endforeach
</ul>
