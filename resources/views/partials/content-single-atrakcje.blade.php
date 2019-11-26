
@php
    $hero = get_field('hero');
    $gallery = get_field('gallery');
@endphp

@include('components.hero', ['data'=>$hero]);

<section class="post {{ post_class() }}">
  <div class="container">
    <div class="row">
      <div class="col">
        @include('blocks.gallery', ['data'=>$gallery])
      </div>
      <div class="col">
        <article class="post__content">
          {!! the_content() !!}
        </article>
      </div>
    </div>
  </div>
</section>


