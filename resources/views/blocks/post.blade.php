@php
  $id =  $post->ID;
  $image = get_post_thumbnail_id($id);
  $title = $post -> post_title;
  $link = get_permalink($id);
@endphp

<article class="boxes-img__box">
  <a href="{{ $link }}">
    {!! image($image, 'medium', 'boxes-img__img') !!}
    <h3 class="subtitle boxes-img__title">
      {{ $title }}
    </h3>
  </a>
</article>