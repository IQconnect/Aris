{{--
  Template Name: Booking
--}}

@extends('layouts.app')

@section('content')

<section class="booking">
  <div class="container">
    <div class="row">
      @if ($_GET['from'] && $_GET['to'])
        @include('components.places')
      @else
        @include('components.calendar')
      @endif
    </div>
  </div>
</section>


@endsection
