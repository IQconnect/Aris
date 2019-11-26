<section class="section section--color">
    <div class="container">
      @include('partials.title', ['title' => $data['title'], 'subtitle' => $data['subtitle']])
      <div class="row boxes-img">
        @foreach($data['images'] as $item)
          <div class="col-md-4 boxes-img__box">
            <img class="boxes-img__img" src="{{ $item['image']['url'] }}">
            <h3 class="title title--small boxes-img__title">
              {{ $item['titleImg'] }}
            </h3>
          </div>
        @endforeach
      </div>
    </div>
  </section>