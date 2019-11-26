@php
// Get all orders
$args = array(
'limit' => 9999,
'return' => 'ids',
'date_completed' => '2018-10-01...2020-10-10',
'status' => 'completed'
);
$query = new WC_Order_Query( $args );
$orders = $query->get_orders();

// format data what only needs
$_ordres = [];

foreach( $orders as $order_id ) {

  $_order = wc_get_order( $order_id );
  $_items = $_order->get_items();

  foreach ($_items as $_item ) {
    $name = $_item->get_name();
  }

  $from = get_field('from',  $order_id);
  $to = get_field('to',  $order_id);

  $order = array(
    'from' => $from,
    'to' => $to,
    'item' => $name
  );

  array_push($_ordres, $order);
}

$_ordres_json = json_encode($_ordres);

$args = array(
  'post_type' => 'product',
  'numberposts' => 999,
);

$products = get_posts($args);

$from = $_GET['from'];
$to = $_GET['to'];

$quantity = round((strtotime($to) - strtotime($from)) / (60 * 60 * 24)) + 1;

@endphp
<script>
const orders = @php echo $_ordres_json @endphp;

console.log('orders: ', orders);
</script>

@if($products)

<div class="mx-auto" style="margin-top: -100px;">
  <h2 class="section__title title title--center">Wybierz miejsce</h2>
  <ul class="places">
      @foreach ($products as $item)
      @php
          $_product = get_product($item->ID);
          $id = $_product -> get_id();
          $name = $_product -> get_name();
          $image = $_product -> get_image_id();

          $bookedDate = get_field('orders', $id);
          $bookedDateArray = explode(",", $bookedDate);

          $allow = true;

          foreach ($bookedDateArray as $blockDate) {
            $blockDateArray = explode(':', $blockDate);
            $blockFrom = $blockDateArray[0];
            $blockTo = $blockDateArray[1];

            if (!allowBooking($from, $to, $blockFrom, $blockTo && $allow==true)) {
              $allow = false;
            }
          }
      @endphp

      @if ($allow)
      <li class="places__elem">
        {!! image($image, 'full', 'places__img') !!}
        <div class="places__dsc">
          <h2 class="title">
            {{ $name }}
          </h2>
          <a href="{{ '../zamowienie/'  . '?from=' . $from . '&to=' . $to . '&add-to-cart=' . $id . '&quantity=' . $quantity}}" data-add-to-cart>
            Zaparkuj tutaj!
          </a>
        </div>
      </li>
      @endif
      @endforeach
  </ul>
</div>
@endif
