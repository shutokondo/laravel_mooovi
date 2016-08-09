@section('aside')
<aside class="section">
  <h4 class="text-small hr-bottom--thin no-space-bottom">
    <i class="icon-crown color-gray-light"></i>投稿ランキング
  </h4>
  <ul class="listview listview--condensed text-small">
    @foreach ($ranking as $product)
    <li data-cinema-id="346394">
      <a href="/products/{{ $product->id }}">
        <div class="box">
          <div class="box__cell w40 align-center">
            <p class="label bgcolor-gray-lighter align-center">
              {{ $i }}
            </p>
          </div>
          <div class="box__cell pl1em">
            <p class="text-xsmall no-space">
              {{ $product->title }}
            </p>
            <img src="{{ $product->image_url }}" alt="">
          </div>
        </div>
      </a>
    </li>
    @foreach
  </ul>
</aside>
@endsection