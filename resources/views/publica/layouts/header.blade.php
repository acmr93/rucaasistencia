<header class="shadow-sm ">

    <nav id="contact_navbar" class="navbar navbar-expand-sm pb-0 d-none d-md-block" style="margin-bottom: -25px">
        <div class="container justify-content-center">
            <ul class="nav navbar-nav w-100 flex-nowrap justify-content-start">
                <li class="nav-item">
                    <i class="fa fa-whatsapp fa-lg mr-2 text-success"></i>
                    @if ($empresa->telefonos != null)
                        @foreach($empresa->telefonos as $telefono => $value)
                            @if ($value['tipo'] == 'whatsapp')
                                <a target="_blank" href="https://wa.me/{{$value['numero']}}" class="">{{(isset($value['visible'])?$value['visible']:$value['numero'])}} </a>
                            @endif
                        @endforeach
                    @endif
                </li>
                <li class="nav-item ml-3">
                    <i class="fa fa-phone fa-lg mr-2" style="color: #2AB0E1;"></i>
                    @php $i = 0; @endphp
                    @if ($empresa->telefonos != null)
                        @foreach($empresa->telefonos as $telefono => $value)
                            @if ($value['tipo'] == 'telefono')
                                <a href="tel:{{$value['numero']}}" target="_blank">
                                    {{($i>0?' / ':'')}}{{(isset($value['visible'])?$value['visible']:$value['numero'])}}
                                </a>
                            @php $i++; @endphp

                            @endif
                        @endforeach
                    @endif
                </li>
            </ul>
            <ul class="nav navbar-nav w-100 justify-content-end">
                <li class="nav-item">
                    <i class="fa fa-envelope fa-lg mr-2" style="color: #2AB0E1;"></i>
                    @if ($empresa->emails != null)
                        @foreach($empresa->emails as $email)
                            <a href="mailto:{{$email}}" target="_blank">{{$email}}</a>
                        @endforeach
                    @endif
                </li>
            </ul>
        </div>
    </nav>
    <nav  id="navbar" class="navbar navbar-light navbar-expand-md pt-0" style="margin-bottom: -5px">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse w-100">
                <ul class="nav navbar-nav w-100  justify-content-around">
                    <li class="nav-item ">
                        <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{route('home')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'empresa' ? 'active' : '' }}" href="{{route('empresa')}}">Quienes Somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'servicios' ? 'active' : '' }}" href="{{route('servicios')}}">Servicios</a>
                    </li>
                </ul>
            </div>
            <a class="navbar-brand order-first order-md-0 mx-4" href="{{route('home')}}" >
                <img class="mx-auto d-block" src="{{asset('images/logos/header.png')}}" height="">
            </a>
            <div class="collapse navbar-collapse w-100 ">
                <ul class="nav navbar-nav w-100  justify-content-around">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'personal-especializado' ? 'active' : '' }}" href="#">Personal Especializado</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'clientes' ? 'active' : '' }}" href="#">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'contacto' ? 'active' : '' }}" href="#">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
<div class="row"> 
        <div class="col-6 bg-verde" height="20px"></div>
        <div class="col-6 bg-azul" height="20px"></div>
</div>
</header>



