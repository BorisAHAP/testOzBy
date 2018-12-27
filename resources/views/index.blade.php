@extends('layouts.app')
@section('content')
    <div class="nav-item d-none d-md-flex">
        <a href="javascript:;" class="showForm">Добавить
            товар</a>
    </div>
    <div class="col-lg-12" id="hideForm" @if(session()->has('code')) style="display: block"
         @else style="display: none" @endif>
        <form class="card" method="post" action="#" enctype="multipart/form-data">
            @csrf
            <input type="text" value="{{Auth::id()}}" hidden name="user_id">
            <div class="card-body">
                <h3 class="card-title">Добавить товар</h3><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-0">
                            <label class="form-label">Изображение</label>
                            <input name="image" type="file"
                                   class="form-control {{ $errors->has('image') ? ' is-invalid' : '' }}">
                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
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
                            <textarea rows="5" class="form-control {{ $errors->has('note') ? ' is-invalid' : '' }}"
                                      name="note" placeholder="Описание товара"></textarea>
                            @if ($errors->has('note'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('note') }}</strong>
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
    </div>
    <br>
    <div class="clearfix"></div>

    <div id="horizontalTab">
        <ul class="resp-tabs-list">
            <li> Men's</li>
            <li> Women's</li>
            <li> Bags</li>
            <li> Footwear</li>
        </ul>

        <div class="resp-tabs-container">
            <!--/tab_one-->
            <div class="tab1">
                <div class="col-md-3 product-men">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="men-thumb-item">
                            <img src="images/m1.jpg" alt="" class="pro-image-front">
                            <img src="images/m1.jpg" alt="" class="pro-image-back">
                            <div class="men-cart-pro">
                                <div class="inner-men-cart-pro">
                                    <a href="single.html" class="link-product-add-cart">Quick View</a>
                                </div>
                            </div>
                        </div>
                        <div class="item-info-product ">
                            <h4><a href="single.html">Formal Blue Shirt</a></h4>
                            <div class="info-product-price">
                                <span class="item_price">$45.99</span>
                                <del>$69.71</del>
                            </div>
                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                <form action="#" method="post">
                                    <fieldset>
                                        <input type="hidden" name="cmd" value="_cart"/>
                                        <input type="hidden" name="add" value="1"/>
                                        <input type="hidden" name="business" value=" "/>
                                        <input type="hidden" name="item_name" value="Formal Blue Shirt"/>
                                        <input type="hidden" name="amount" value="30.99"/>
                                        <input type="hidden" name="discount_amount" value="1.00"/>
                                        <input type="hidden" name="currency_code" value="USD"/>
                                        <input type="hidden" name="return" value=" "/>
                                        <input type="hidden" name="cancel_return" value=" "/>
                                        <input type="submit" name="submit" value="Add to cart" class="button"/>
                                    </fieldset>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
            <!--//tab_one-->
        </div>
    </div>
@endsection