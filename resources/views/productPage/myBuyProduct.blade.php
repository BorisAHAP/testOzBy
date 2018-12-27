@extends('layouts.app')
@section('content')
    {{--@dd($products)--}}
    <div class="bs-docs-example">
        <table class="table">
            <thead>
            <tr>

                <th>Товар</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Дата последней покупки</th>
                <th>Данные продавца</th>

            </tr>
            </thead>
            <tbody>
            @if($products->count()>0)
                @foreach($products as $product)
                    <tr>

                        <td>{{$product->p_name}}</td>
                        <td>{{$product->o_price}}</td>
                        <td>{{$product->o_count}}</td>
                        <td>{{$product->o_date}}</td>
                        <td><a href="http://testozby/product/{{$product->p_slug}}">Подробнее</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection