@php
  $baner = $data['baner'];
@endphp

<section>
  <div class="main-carousel">
      @foreach ($baner as $ban)
        <div class="container-fluid slider carousel-cell" style="background: url('{{ $ban['image']['url'] }}'); background-size: cover; background-position: center;">
        </div>
      @endforeach
  </div>
</section>