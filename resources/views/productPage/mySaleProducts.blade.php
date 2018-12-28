@extends('layouts.app')
@section('content')
    <div class="bs-docs-example">
        <table class="table">
            <thead>
            <tr>

                <th>Товар</th>
                <th>Цена</th>
                <th>Количество осталось</th>
                <th>Дата последней продажи</th>
            </tr>
            </thead>
            <tbody>
            @if($products->count()>0)
                @foreach($products as $product)
                    <tr>

                        <td>{{$product->p_name}}</td>
                        <td>{{$product->p_price}}</td>
                        <td>{{$product->p_count}}</td>
                        <td><a href="{{route('more',$product->p_id)}}">Больше информации</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection