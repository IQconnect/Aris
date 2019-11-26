<section class="post {{ post_class() }}">
  <div class="container">
    <div class="row">
      <div class="col">
        <article class="post__content">
          @if (have_posts())
            @while (have_posts()) @php the_post() @endphp
            {!! the_content() !!}
            @endwhile
          @endif
        </article>
      </div>
    </div>
  </div>
</section>