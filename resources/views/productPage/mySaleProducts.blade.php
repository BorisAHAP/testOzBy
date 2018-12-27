@extends('layouts.app')
@section('content')
    {{--@dd($products)--}}
    <div class="bs-docs-example">
        <table class="table">
            <thead>
            <tr>

                <th>Товар</th>
                <th>Цена</th>
                <th>Количество осталось</th>
                <th>Дата последней продажи</th>
                <th>Данные покупателя</th>

            </tr>
            </thead>
            <tbody>
            @if($products->count()>0)
                @foreach($products as $product)
                    <tr>

                        <td>{{$product->p_name}}</td>
                        <td>{{$product->p_price}}</td>
                        <td>{{$product->p_count}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endsection