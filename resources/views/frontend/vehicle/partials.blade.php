<section class="b-goods-1 b-goods-1_mod-a">
    <div class="row">
        <div class="b-goods-1__img">
            <a class="js-zoom-images" href="{{ asset($vehicle->main_image) }}">
                <img class="img-responsive" src="{{ asset($vehicle->main_image) }}" alt="foto" />
            </a>
        </div>
        <div class="b-goods-1__inner">
            <div class="b-goods-1__header">
                <h2 class="b-goods-1__name"><a href="{{route('vehicles.show',$vehicle->slug)}}">{{$vehicle->title??null}}</a></h2>
            </div>
            <div class="b-goods-1__info">
                {{$vehicle->short_description??null}}
            </div>
            <div class="b-goods-1__section">
                <div class="collapse in" id="desc-1">
                    <ul class="b-goods-1__desc list-unstyled">
                        <li class="b-goods-1__desc-item">{{$vehicle->brand->title??null}}</li>
                        <li class="b-goods-1__desc-item"> {{$vehicle->model->title??null}}</li>
                        @if(isset($vehicle->year->title))
                            <li class="b-goods-1__desc-item">{{$vehicle->year->title??null}}</li>
                        @endif
                        @if(isset($vehicle->fuel_type->title))
                            <li class="b-goods-1__desc-item hidden-th">{{$vehicle->fuel_type->title??null}}</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
