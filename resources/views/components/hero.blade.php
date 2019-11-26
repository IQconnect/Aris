@php
    $header = $data['header'] ? $data['header'] : get_the_title();
    $subheader = $data['subheader'];
    $small = $data['small'];
    $image = $data['image'];

    if($small)  $class = 'hero--small';
@endphp
<section class="hero {{ $class }}">
  <div class="hero__content">
    <h1>
      <span class="hero__header @if(strlen($header) > 15) title @else headline @endif">
        {{ __($header, 'aris') }}
        @if ($subheader)
          <span class="hero__subheader subheadline uppercase">
            {{ __($subheader, 'aris') }}
          </span>
        @endif
      </span>
    </h1>
  </div>
  @if(!$small || $small &&  $image == null)
  <video class="hero__bg" playsinline="" autoplay="" muted="" loop="" poster="{{ $data['image']['url'] }}">
    <source src="@asset('images/aris.mp4')" type="video/mp4">
  </video>
  @else
  {!! image($data['image']['id'], 'full', 'hero__bg') !!}
  @endif
  <img class="hero__cloud" src="@asset('images/cloud.png')" alt="chmury">
</section>

<style>
  .uppercase {
    text-transform: uppercase;
  }
</style>

<script>
  if(window.location.href == "https://campingaris.pl/en/atrakcje/") {
    document.querySelector('.hero__header').innerText = 'Attractiones';
  }

  if(window.location.href == "https://campingaris.pl/de/atrakcje/") {
    document.querySelector('.hero__header').innerText = 'Attraktionen';
  }
</script>