@extends('layouts.app')

@section('content')

    <div class="container">
        <br>
        <div class="text-center m-5">
            <h3>Cart items</h3>
        </div>
        <br>
        @if(count($items))
            <table class="table table-hover mt-5 mb-5">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @php $i=1;$s=0; @endphp
                @foreach($items as $item)
                    @php $s=$s+$item->products->price; @endphp
                    <tr>
                        <th scope="row">{{ $i++ }}</th>
                        <td style="max-width: 30%;max-height: 50px;"><img height="100px"
                                                                          src="{{ Voyager::image(json_decode($item->products->image)[0]) }}">
                        </td>
                        <td>{{ $item->products->title }}</td>
                        <td>{{ $item->products->price }}KM</td>
                        <td><a class="btn btn-sm btn-danger" onclick="event.preventDefault(); del({{ $item->id }})">Remove</a></td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th scope="col">Total: {{$i-1}}</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">{{$s}}KM</th>
                    <th scope="col"><a class="btn btn-sm btn-danger" onclick="event.preventDefault(); del_all()">Remove all</a></th>
                </tr>
                </tfoot>
            </table>
            <br>
            <div class="text-center">
                <p><a onclick="event.preventDefault(); order()" class="btn btn-primary btn-outline btn-lg">Order Items Now</a></p>
            </div>
        @else
            <div class="text-center">
                <h4>No products in chart!</h4>
            </div>
        @endif
        <br>
    </div>

@endsection

<script>
    function del(id) {
        $.ajax({
            type: 'GET',
            url: '/chart_delete/' + id,
            success: function (data) {
                data = JSON.parse(data);
                $.notify(data.message, data.type);
                location.reload();
            }
        });
    }
    function del_all() {
        $.ajax({
            type: 'GET',
            url: '/chart_delete_all',
            success: function (data) {
                data = JSON.parse(data);
                $.notify(data.message, data.type);
                location.reload();
            }
        });
    }

    function order() {
        $.ajax({
            type: 'GET',
            url: '/order',
            success: function (data) {
                data = JSON.parse(data);
                $.notify(data.message, data.type);
                location.reload();
            }
        });
    }
</script>
