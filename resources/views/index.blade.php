@extends('layouts.app')

@section('content')

  @php
      $hero = array(
        'header' => 'Atrakcje',
        'small' => true
      );
  @endphp


  @include('components.hero', ['data'=>$hero]);

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

@if (have_posts())

  <section class="section">
    <div class="container">
        <div class="row boxes-img">

          @while (have_posts()) @php the_post() @endphp

            <div class="col-md-4">
              @include('partials.content-'.get_post_type())
            </div>

          @endwhile

        </div>
    </div>
  </section>

  @endif


@endsection
