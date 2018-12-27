@extends('layouts.app')
@section('content')
    {{--@dd($product)--}}
    <div class="banner-bootom-w3-agileits">
        <div class="container">
            <div class="col-md-4 single-right-left ">
                <div class="grid images_3_of_2">
                    <div class="flexslider">
                        <img src="{{asset('storage/'.$product->p_image)}}" height="240px" width="320px" alt="">
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 single-right-left simpleCart_shelfItem">
                <h3>{{$product->p_name}}</h3>
                <p><span class="item_price">{{$product->p_price}} бел.руб</span></p>
                <div class="description">
                    <h5>{{$product->p_desc}}</h5>

                </div>
                <div class="color-quality">
                    <div class="color-quality-right">
                        <h5>В наличии :</h5><span class="count">{{$product->p_count}}</span>
                    </div>
                </div>
                @if($product->p_count>0)
                    <div class="occasion-cart">
                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                            <input type="submit" name="submit" value="Купить" data-product="{{$product->p_id}}"
                                   data-userid="{{$product->u_id}}" data-id="{{Auth::id()}}" class="button buy"/>
                        </div>
                    </div>
                @else
                    <br>
                    <h3><a href="{{route('home')}}">Товар распродан </a></h3>
                @endif
                <br>
                <h5><a href="{{route('')}}">Редактировать свой товар </a></h5>
                <br>
            </div>
            <div class="clearfix"></div>
            <div class="single_page_agile_its_w3ls">
                <h6>Информация о продавце</h6>
                <p>Имя:
                <p>
                <h3>{{$product->u_name}} {{$product->u_surname}}</h3>
                <br>
                <p>Email:
                <p>
                <h3>{{$product->u_email}}</h3>
                <br>
                <p>Телефон:
                <p>
                <h3>{{$product->u_phone}}</h3>
                <br>
                <p>В продаже c:
                <p>
                <h3>{{$product->p_date}}</h3>
            </div>
            <!-- /new_arrivals -->
        </div>
    </div>
@endsection