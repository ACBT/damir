<!DOCTYPE html>
<html lang="en">
<head>
    <title>Эльдомаркет</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="{{asset('styles/style.css')}}" />
    <link type="text/css" rel="stylesheet" href="{{asset('styles/skin.css')}}" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
    <script type="text/javascript" src="{{asset('js/jquery.jcarousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/initSlider.js')}}"></script>
</head>
<body class="home">
<div id="wrap">
    <div id="header"> <img src="images/logo.png" />
        <div id="nav">
            <ul class="menu">
                <li class=""><a href="index.html">Главная</a></li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Войти') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->Name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Выйти') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        <!--end nav-->
    </div>

    <!--end header-->
    <div id="featured-section">
        <h1>Эльдомаркет</h1>
        <!--end circles-->
        <div id="image-slider">
            <ul id="mycarousel" class="jcarousel-skin-tango">
                @foreach($tovars as $tovar)
                <li>
                    <span style="position: absolute; padding-left: 21px; padding-top: 15px">
                        <p style="margin-bottom: 0">Название: {{$tovar->Name}}</p>
                        <p style="margin-bottom: 0">Количество: {{$tovar->Amount}}</p>
                        <p style="margin-bottom: 0">Цена: {{$tovar->Price}}</p>
                        @if(Auth::user())
                            @if(Auth::user()->Type_User == 1)
                        <p style="margin-bottom: 0"><a id="{{$tovar->id}}"  onclick="tovarindex(this.id)">редактировать</a></p>
                        <p style="margin-bottom: 0"><a id="{{$tovar->id}}"  onclick="tovardelete(this.id)">удалить</a></p>
                            @endif
                        @endif
                    </span>
                    <img width="280" height="190" src="images/280x190.gif" alt="" />
                </li>
                @endforeach
            </ul>
        </div>
        <!--end image-slider-->
    </div>

    <div id="contact-details">
        @yield('content')
    </div>

    @if(Auth::user())
    @if(Auth::user()->Type_User == 1)
    <div id="frontpage-main">
        <div id="frontpage-content">
            <h3>Товар</h3>
            <ul class="blue-bullets">
                <li >
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Название') }}</label>

                    <div class="col-md-6">
                        <input id="Name" type="text" class="form-control @error('Name') is-invalid @enderror" name="Name" value="{{ old('Name') }}" required autocomplete="Name" autofocus>

                        @error('Name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </li>
                <li style="margin-top: 15px">
                    <label for="Photo" class="col-md-4 col-form-label text-md-right">{{ __('Фото') }}</label>

                    <div class="col-md-6">
                        <input id="Photo" type="file" class="form-control @error('Photo') is-invalid @enderror" name="Photo" value="{{ old('Photo') }}" required autocomplete="Photo" autofocus>

                        @error('Photo')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </li>
                <li style="margin-top: 15px">
                    <label for="Amount" class="col-md-4 col-form-label text-md-right">{{ __('Количество') }}</label>

                    <div class="col-md-6">
                        <input id="Amount" type="number" class="form-control @error('Amount') is-invalid @enderror" name="Amount" value="{{ old('Amount') }}" required autocomplete="Amount" autofocus>

                        @error('Amount')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </li>
                <li style="margin-top: 15px">
                    <label for="Price" class="col-md-4 col-form-label text-md-right">{{ __('Цена') }}</label>

                    <div class="col-md-6">
                        <input id="Price" type="number" class="form-control @error('Price') is-invalid @enderror" name="Price" value="{{ old('Price') }}" required autocomplete="Price" autofocus>

                        @error('Price')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </li>
                <li style="margin-top: 15px">
                    <button type="button" id="save" data-idi="" onclick="tovarcreate(this.dataset.idi)" class="btn btn-primary">
                        {{ __('Добавить') }}
                    </button>
                </li>
            </ul>
        </div>
        <!--end frontpage-content-->
        <div id="frontpage-sidebar">
            <h3>О нас</h3>
            <ul class="blue-bullets">
                <li >
                    <label for="Path" class="col-md-4 col-form-label text-md-right">{{ __('Программа') }}</label>

                    <div class="col-md-6">
                        <input id="Path" type="file" class="form-control @error('Path') is-invalid @enderror" name="Price" value="{{ old('Path') }}" required autocomplete="Path" autofocus>

                        @error('Path')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </li>
                <li style="margin-top: 15px">
                    <label for="Version" class="col-md-4 col-form-label text-md-right">{{ __('Версия') }}</label>

                    <div class="col-md-6">
                        <input id="Version" type="number" class="form-control @error('Version') is-invalid @enderror" name="Version" value="{{ old('Version') }}" required autocomplete="Version" autofocus>

                        @error('Version')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </li>
                <li style="margin-top: 15px">
                    <button type="button" id="save1" onclick="" class="btn btn-primary">
                        {{ __('Добавить') }}
                    </button>
                </li>
            </ul>
        </div>
        <!--end frontpage-main-->
    </div>

        <script>
            function tovarcreate(id){
                var Name = $('#Name').val();
                var Photo = $('#Photo').val();
                var Amount = $('#Amount').val();
                var Price = $('#Price').val();
                $.ajax({
                    url: '{{route('Tovar.store')}}',
                    type: "POST",
                    data: {"_token": $('meta[name="csrf-token"]').attr('content'), Name:Name,Photo:Photo,Amount:Amount, Price:Price, id:id},
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('#Name').val('');
                        $('#Photo').val('');
                        $('#Amount').val('');
                        $('#Price').val('');
                        $('#save').text('Добавить');
                        document.getElementById('save').dataset.idi = 0;
                        location.reload();
                        alert('Выполнено');

                    },
                    error: function (msg) {
                        alert('Ошибка: заполните обязательные для ввода поля или данная запись уже существует.');
                    }
                });
            };

            function starscreate(){
                var Stars = $('#Stars').val();
                var Description = $('#Description').val();
                $.ajax({
                    url: '{{route('Stars.store')}}',
                    type: "POST",
                    data: {"_token": $('meta[name="csrf-token"]').attr('content'), Stars:Stars,Description:Description,},
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        location.reload();
                        alert('Спасибо за отзыв');

                    },
                    error: function (msg) {
                        alert('Ошибка: заполните обязательные для ввода поля или данная запись уже существует.');
                    }
                });
            };

            function tovarindex(id){
                $.ajax({
                    url: '{{route('Tovar.index')}}',
                    type: "POST",
                    data: {"_token": $('meta[name="csrf-token"]').attr('content'), id:id},
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        $('#Name').val(data['Name']);
                        $('#Amount').val(data['Amount']);
                        $('#Price').val(data['Price']);
                        document.getElementById('save').dataset.idi = id;
                        $('#save').text('Редактировать');
                    },
                    error: function (msg) {
                        alert('Ошибка: заполните обязательные для ввода поля или данная запись уже существует.');
                    }
                });
            };

            function tovardelete(id){
                $.ajax({
                    url: '{{route('Tovar.destroy')}}',
                    type: "POST",
                    data: {"_token": $('meta[name="csrf-token"]').attr('content'), id:id},
                    headers: {
                        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        alert('Удалено');
                        location.reload();
                    },
                    error: function (msg) {
                        alert('Ошибка: заполните обязательные для ввода поля или данная запись уже существует.');
                    }
                });
            };
        </script>

    @endif
    @endif

    <div id="frontpage-main">
        <div id="frontpage-content">
            <h3>Отзывы</h3>
            <ul class="blue-bullets">
                @foreach($stars as $star)
                <li>
                    <p style="margin-bottom: 0">{{$star->user->Name}} {{$star->user->Surname}}</p>
                    <p style="margin-bottom: 0">{{$star->Description}}</p>
                    <p style="margin-bottom: 0">Оценка: {{$star->Stars}}</p>
                </li>
                @endforeach
            </ul>
        </div>
        <!--end frontpage-content-->
        <div id="frontpage-sidebar">
            @if(Auth::user())
                    @if(\App\Stars::where('user_id', Auth::user()->id)->first() === null)
                    <h3>Оставить отзыв</h3>
                    <ul class="blue-bullets">
                        <li >
                            <label for="Version" class="col-md-4 col-form-label text-md-right">{{ __('Оценка') }}</label>

                            <div class="col-md-6">
                                <input id="Stars" type="number" class="form-control @error('Stars') is-invalid @enderror" max="5" min="1" name="Stars" value="{{ old('Stars') }}" required autocomplete="Stars" autofocus>
                                @error('Stars')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </li>
                        <li  style="margin-top: 15px">
                            <label for="Description" class="col-md-4 col-form-label text-md-right">{{ __('Описание') }}</label>

                            <div class="col-md-6">
                                <textarea id="Description" class="form-control @error('Description') is-invalid @enderror" name="Description" required autocomplete="Description" autofocus> {{ old('Description') }}</textarea>
                                @error('Description')
                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                @enderror
                            </div>
                        </li>
                        <li  style="margin-top: 30px">
                            <button type="button" id="save2" onclick="starscreate()" class="btn btn-primary">
                                {{ __('Оставить') }}
                            </button>
                        </li>
                    </ul>
                    <!--end frontpage-sidebar-->
                    @else
                        <h3>Вы уже оставили отзыв</h3>
                    @endif
                @else
                <h3>Чтобы оставить отзыв нужно авторизоваться</h3>
            @endif
        </div>
    </div>

    <!--end featured-section-->
    <div id="frontpage-main">
        <div id="frontpage-content">
            <h3>Эльдомаркет</h3>
            <p>Предоставляет возможность манипуляци полным путём товарооборота</p>
            <ul class="blue-bullets">
                <li>Скачивание программы</li>
            </ul>
        </div>
        <!--end frontpage-content-->
        <div id="frontpage-sidebar">
            <h3>О нас</h3>
            <p class="meta">21 марта 1974 / Дата основания</p>
            <p>Лучший магазин электроники и бытовой техники на Российском рынке. В нашем ассортименте можно найти все что необходимо для жизни в современном мире от батареек до комплексной системы умного дома.</p>

            <!--end frontpage-sidebar-->
        </div>
        <!--end frontpage-main-->
        <div id="footer">
            <p class="copyright">Авториские права &copy; <a href="#">Булатов Дамир</a> - Все права защищены </p>
        </div>
        <!--end footer-->
    </div>
</div>
<!--end wrap-->
</body>
<!--end cache-images-->
</html>