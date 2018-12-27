@extends('layouts.app')
@section('content')

    @if(Auth::check())
        <div class="nav-item d-none d-md-flex">
            <a href="javascript:;" class="showForm">Добавить
                товар</a>
        </div>

        <div class="col-lg-12" id="hideForm" @if(session()->has('errors')) style="display: block"
             @else style="display: none" @endif>
            <form class="card" method="post" action="{{route('add_product')}}" enctype="multipart/form-data">
                @csrf
                <input type="text" hidden name="user_id" value="{{Auth::id()}}">
                <div class="card-body">
                    <h3 class="card-title">Добавить товар</h3><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label class="form-label">Название</label><br>
                                <input type="text" name="name" value="">
                                <br>
                                @if ($errors->has('name'))
                                    <span class="progress-bar-danger" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label class="form-label">Изображение</label>
                                <input name="image" type="file"
                                       class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}">
                                @if ($errors->has('image'))
                                    <span class="progress-bar-danger" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label class="form-label">Описание</label>
                                <textarea rows="5"
                                          class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                          name="description" placeholder="Описание товара"></textarea>
                                @if ($errors->has('description'))
                                    <span class="progress-bar-danger" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label class="form-label">Количество</label><br>
                                <input type="number" name="count" value="1" max="100" min="1">
                                @if ($errors->has('count'))
                                    <span class="progress-bar-danger" role="alert">
                                        <strong>{{ $errors->first('count') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label class="form-label">Цена</label><br>
                                <input type="number" name="price" value="1" min="1" step="0.1"><span> бел.руб</span>
                                @if ($errors->has('price'))
                                    <span class="progress-bar-danger" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Добавить</button>
                </div>
            </form>
            <br>
        </div>
    @endif
    <br>
    <div class="clearfix"></div>

    <div id="horizontalTab">
        <ul class="resp-tabs-list">
            <li> Новые</li>
            <li> По имени</li>
            <li> По цене</li>
        </ul>

        <div class="resp-tabs-container">
            <!--/tab_one-->
            <div class="tab1">
                @if($products->count()>0)
                    @foreach($products as $product)
                        <div class="col-md-3 product-men hideCount" data-id="56">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    @if(Auth::id()===$product->getUserId())
                                    <span class="product-new-top">Мой товар</span>
                                    @endif
                                    <img src="{{asset('storage/'.$product->getImage())}}" height="180px" width="240px"
                                         class="pro-image-front">
                                    <img src="{{asset('storage/'.$product->getImage())}}" height="180px" width="240px"
                                         class="pro-image-back">
                                    <div class="men-cart-pro">
                                        <div class="inner-men-cart-pro">
                                            <a href="{{route('showOne',$product->getAliase())}}" class="link-product-add-cart">Подробнее</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="{{route('showOne',$product->getAliase())}}">{{$product->getName()}}</a></h4>
                                    <div class="info-product-price">
                                        <span class="item_price">{{$product->getPrice()}} бел.руб</span>
                                    </div>
                                    @if(Auth::check())
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">

                                        <input type="submit" name="submit" value="Купить" data-product="{{$product->getId()}}" data-userid="{{$product->getUserId()}}" data-id="{{Auth::id()}}" class="button buy"/>

                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

                <div class="clearfix"></div>
            </div>

            <!--//tab_one-->
        </div>
    </div>
@endsection