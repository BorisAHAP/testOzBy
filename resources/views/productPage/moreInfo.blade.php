@extends('layouts.app')
@section('content')
<div class="bs-docs-example">
    @dump(Auth::user())
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
                <tr>

                    <td>{{$info->p_name}}</td>
                    <td>{{$info->p_price}}</td>
                    <td>{{$info->p_count}}</td>
                    <td>{{$info->o_date}}</td>
                    <td>
                        <p>имя: <span>{{$info->u_name}}</span></p>
                        <p>фамилия: <span>{{$info->u_sur}}</span></p>
                        <p>email: <span>{{$info->u_email}}</span></p>
                        <p>телефон: <span>{{$info->u_phone}}</span></p>
                    </td>
                </tr>

        </tbody>
    </table>
</div>
@endsection