@php
  $showHeadeder = $data['header'];
  $title = $data['title'];
  $subtitle = $data['subtitle'];
  $atractions = $data['atractions'];
@endphp

<section class="section section--color">
  <div class="container">
    @includeWhen($showHeadeder, 'partials.title', ['title' => $title, 'subtitle' => $subtitle])
    @if ($atractions)
      <div class="row boxes-img">
        @foreach($atractions as $atraction)
          <div class="col-md-4">
            @include('blocks.post', ['post'=>$atraction])
          </div>
        @endforeach
      </div>
    @endif
  </div>
</section>