@php
  $days = ['niedz.', 'pon.', 'wt.', 'śr.', 'czw.', 'pt.', 'sob.'];
  $tomorow = new DateTime('tomorrow');
@endphp

<style>
.calendar {
  margin-top: 0;
}
</style>

<div class="calendar" data-calendar>
  <nav class="calendar__nav">
    <div class="calendar__wrapper calendar__mouth">
      <span class="calendar__label" data-calendar-month>
      </span>
      <button class="calendar__button" data-calendar-change-month="prev"></button>
      <button class="calendar__button calendar__button--next" data-calendar-change-month="next"></button>
    </div>
    <form action="./" method="GET">
      <div class="calendar__wrapper calendar__form">
          <div class="calendar__date">
            <div>
              Od
              <input name="from" type="date" class="calendar__label" min="{{ $tomorow->format('Y-m-d')}}" data-calendar-input="from" data-calendar-from value="--.--.----">
            </div>
            <div>
              Do
              <input name="to" type="date" class="calendar__label" min="{{ $tomorow->format('Y-m-d') }}" data-calendar-input="to" data-calendar-to value="--.--.----">
            </div>  
          </div>
          <button class="calendar__send button button--big" href="http://localhost:3000/aris/booking/">
            Szukaj
          </button>
      </div>
    </form>


  </nav>
  <header class="calendar__header">
    @foreach ( $days as $day )
    <div class="calendar__cell calendar__cell--header">
      {{ $day }}
    </div>
    @endforeach
  </header>
  <div class="calendar__body" data-calendar-body>

      @for ($i = 0; $i < 42; $i++)

      @if ($i == 0 || $i > 6 && $i % 7 == 0 )
      <div class="calendar__row">
      @endif

        <div class="calendar__cell" data-calendar-cell>
          <span data-calendar-cell-label></span>
        </div>

      @if ( $i == 6 || $i > 6 && $i % 7 == 6)
      </div>
      @endif

      @endfor
  </div>
</div>



