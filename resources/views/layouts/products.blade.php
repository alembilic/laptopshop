@if(count($products)>0)
    @foreach($products as $product)
        <div class="col-md-4 text-center ">
            <div class="product">
                <div class="product-grid"
                     style="background-image:url({{ Voyager::image(json_decode($product->image)[0]) }});">
                    <div class="inner">
                        <p>
                            <a href="#" onclick="event.preventDefault(); getMessage({{ $product->id }})"  class="icon"><i class="icon-shopping-cart"></i></a>
                            <a href="{{ route('product', $product->id) }}" class="icon"><i class="icon-eye"></i></a>
                        </p>
                    </div>
                </div>
                <div class="desc">
                    <h3><a href="{{ route('product', $product->id) }}">{{ $product->title }}</a></h3>
                    <span class="price">{{ $product->price }}KM</span>
                </div>
            </div>
        </div>
    @endforeach
@else
    <div style="margin: auto">
        <h4 class="text-center">No data...</h4>
    </div>
@endif

<script>
    function getMessage(id) {
        $.ajax({
            type:'GET',
            url:'/add_to_chart/'+id,
            success:function(data) {
                data = JSON.parse(data);
                $.notify(data.message, data.type);
                // location.reload();
            }
        });
    }
</script>
