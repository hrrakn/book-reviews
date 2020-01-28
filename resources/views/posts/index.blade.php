@extends('layout')

@section('content')

<div class="home__img mt-4 mb-4">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <h1 class="home__copy mb-4 text-light">本屋巡りを楽しくサポート</h1>
                <p class="text-light">あなたのお気に入りの本屋さんを紹介できる、本屋専門レビューサイトです。
                </p>
                <div class="home__search-form mx-auto" style="width:200px;">

                    <div class="row justify-content-center">
                        <div class="card-body card-body-top p-2">
                            <form action="/shop/search" method="get" class="form-inline">
                                <div class="d-flex">
                                    <div class="form-group">
                                        <select lang="ja" class="form-areaPrefInfo form-control" id="pref_id" name="pref_id">
                                            <option value="13">東京都</option>
                                            <option value="1">北海道</option>
                                            <option value="2">青森県</option>
                                            <option value="3">岩手県</option>
                                            <option value="4">宮城県</option>
                                            <option value="5">秋田県</option>
                                            <option value="6">山形県</option>
                                            <option value="7">福島県</option>
                                            <option value="8">茨城県</option>
                                            <option value="9">栃木県</option>
                                            <option value="10">群馬県</option>
                                            <option value="11">埼玉県</option>
                                            <option value="12">千葉県</option>
                                            <option value="14">神奈川県</option>
                                            <option value="15">新潟県</option>
                                            <option value="19">山梨県</option>
                                            <option value="20">長野県</option>
                                            <option value="16">富山県</option>
                                            <option value="17">石川県</option>
                                            <option value="18">福井県</option>
                                            <option value="21">岐阜県</option>
                                            <option value="22">静岡県</option>
                                            <option value="23">愛知県</option>
                                            <option value="24">三重県</option>
                                            <option value="25">滋賀県</option>
                                            <option value="26">京都府</option>
                                            <option value="27">大阪府</option>
                                            <option value="28">兵庫県</option>
                                            <option value="29">奈良県</option>
                                            <option value="30">和歌山県</option>
                                            <option value="31">鳥取県</option>
                                            <option value="32">島根県</option>
                                            <option value="33">岡山県</option>
                                            <option value="34">広島県</option>
                                            <option value="35">山口県</option>
                                            <option value="36">徳島県</option>
                                            <option value="37">香川県</option>
                                            <option value="38">愛媛県</option>
                                            <option value="39">高知県</option>
                                            <option value="40">福岡県</option>
                                            <option value="41">佐賀県</option>
                                            <option value="42">長崎県</option>
                                            <option value="43">熊本県</option>
                                            <option value="44">大分県</option>
                                            <option value="45">宮崎県</option>
                                            <option value="46">鹿児島県</option>
                                            <option value="47">沖縄</option>
                                        </select>
                                    </div>
                                    <div class="form-group ml-2">
                                        <input type="text" name="keyword" id="keyword" class="form-control" style="width:180px" placeholder="本屋を探す">
                                    </div>
                                    <div>
                                        <button class="btn btn-primary ml-2 col-xs-1 "><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <a href="{{ route('reviews') }}" class="btn btn-primary mt-4">みんなのレビューをみる</a>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="level text-center mb-4">
        <p class="level-item subtitle is-4 is-text">
            タイプ別　おすすめ本屋
        </p>
    </div>
    <div class="tag is-medium is-link is-light mb-3">
        新刊書店
    </div>
    <div class="columns text-center is-mobile mb-5">
        @foreach ($bookstores as $bookstore)
        @if($bookstore->category_id === 1)
        <div class="column">
            <a href="{{route('bookstore', ['bookstore' => $bookstore])}}" class="text-decoration-none">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src=" {{ $bookstore->img }}" alt="img">
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            <p class="is-size-4"> {{ $bookstore->name }}</p>
                            <p>住所：{{ $bookstore->place }}</p>
                            <p>営業：{{ $bookstore->time }}</p>
                            <a href="#">{{$bookstore->url}}</a>
                            <br>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endif
        @endforeach
    </div>
    <div class="tag is-medium is-link is-light mb-3">
        古書店
    </div>
    <div class="columns text-center is-mobile mb-5">
        @foreach ($bookstores as $bookstore)
        @if($bookstore->category_id === 2)
        <div class="column">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src=" {{ $bookstore->img }}" alt="img">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="content">
                        <p class="is-size-4"> {{ $bookstore->name }}</p>
                        <p>住所：{{ $bookstore->place }}</p>
                        <p>営業：{{ $bookstore->time }}</p>
                        <a href="#">{{$bookstore->url}}</a>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
    <div class="tag is-medium is-link is-light mb-3">
        ブックカフェ
    </div>
    <div class="columns text-center is-mobile mb-5">
        @foreach ($bookstores as $bookstore)
        @if($bookstore->category_id === 3)
        <div class="column">
            <div class="card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src=" {{ $bookstore->img }}" alt="img">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="content">
                        <p class="is-size-4"> {{ $bookstore->name }}</p>
                        <p>住所：{{ $bookstore->place }}</p>
                        <p>営業：{{ $bookstore->time }}</p>
                        <a href="#">{{$bookstore->url}}</a>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>
<!-- CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>

<script>
    var ctx = document.getElementById("myRaderChart");
    var myRadarChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: ["店の雰囲気", "品揃え", "マニアック度", "おすすめ度"],
            datasets: [{
                label: none,
                data: [5, 4, 3, 3, 3],
                backgroundColor: 'RGBA(225,95,150, 0.5)',
                borderColor: 'RGBA(225,95,150, 1)',
                borderWidth: 2,
            }]
        }
    });
</script>
@endsection