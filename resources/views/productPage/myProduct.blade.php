@extends('layouts.app')
@section('content')
        <form class="card" method="post" action="{{route('update',$product->getId())}}" enctype="multipart/form-data">
            @csrf
            <input type="text" hidden name="user_id" value="{{Auth::id()}}">
            <div class="card-body">
                <h3 class="card-title">Редактировать {{$product->getName()}}</h3><br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-0">
                            <label class="form-label">Название</label><br>
                            <input type="text" name="name" value="{{$product->getName()}}">
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
                        <img src="{{asset('storage/'.$product->getImage())}}" height="240px" width="320px" alt="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group mb-0">
                            <label class="form-label">Описание</label>
                            <textarea rows="5"
                                      class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}"
                                      name="description" placeholder="Описание товара">{{$product->getDescription()}}</textarea>
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
                            <input type="number" name="count" value="{{$product->getCount()}}" max="100" min="1">
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
                            <input type="number" name="price" value="{{$product->getPrice()}}" min="1" step="0.1"><span> бел.руб</span>
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
                <button type="submit" class="btn btn-primary">Редактировать</button>
            </div>
        </form>
        <br>
@endsection