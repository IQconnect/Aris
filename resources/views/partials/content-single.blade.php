<section>
    <div class="container content-page">
        <div class="row">
            <div class="col wow fadeIn" data-wow-duration="1s">
                @while(have_posts()) @php the_post() @endphp
                    @php the_content() @endphp
                @endwhile
            </div>
        </div>
    </div>
</section>