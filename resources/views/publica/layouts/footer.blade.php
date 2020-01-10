<footer class="fondos" id="non-printable">
    <div class="container" >
        <div class="row ">
            <div class="col-12 col-md-4 mt-5">
                <img class="d-block mx-auto" src="{{asset('images/logos/footer.png')}}">
            </div>
            <div class="col-12 col-md-4 mt-5 pl-5">
                <div class="row border-footer">
                    <div class="col-12">
                        <h5 class="titulo-footer">SECCIONES</h5>
                        <ul class="pl-0 mt-3">
                            <li><a href="{{route('home')}}" class="text-center" >Home</a></li>
                            <li><a href="{{route('empresa')}}" class="text-center" >Quienes Somos</a></li>
                            <li><a href="{{route('servicios')}}" class="text-center" >Servicios</a></li>
                            <li><a href="{{route('personal')}}" class="text-center" >Personal Especializado</a></li>
                            <li><a href="{{route('personal')}}" class="text-center" >Clientes</a></li>
                            <li><a href="{{route('contacto')}}" class="text-center" >Contacto</a></li>
                        </ul>
                    </div>
                    <div class="col-12 mt-4"><span style="color: #AAAAAA;font-size: 8px;">BY OSOLE</span></div>
                </div>
            </div>
            <div class="col-12 col-md-4 mt-5 pl-5">
                <div class="row align-items-center">
                    <div class="col-2 text-center icon-footer"><i class="fa fa-map-marker"></i></div>
                    <div class="col-8">
                           <a class="enlace-footer" target="_blank" href="{{$empresa->enlance_maps}}" target="_blank">
                            {{$empresa->domicilio[0]['calle']}} {{$empresa->domicilio[0]['altura']}}, {{$empresa->domicilio[0]['provincia']}}, {{$empresa->domicilio[0]['pais']}}
                           </a>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-2 text-center icon-footer"><i class="fa fa-phone"></i></div>
                    <div class="col-10">
                        @php $i = 0; @endphp
                        @if ($empresa->telefonos != null)
                        @foreach($empresa->telefonos as $telefono => $value)
                            {{($i>0?' / ':'')}}<a class="enlace-footer" href="tel:{{$value['numero']}}" target="_blank">
                                {{(isset($value['visible'])?$value['visible']:$value['numero'])}}
                            </a>
                            @php $i++; @endphp
                        @endforeach
                        @endif

                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-2 text-center icon-footer"><i class="fa fa-envelope"></i></div>
                    <div class="col-8">
                        @if ($empresa->emails != null)
                        @foreach($empresa->emails as $email)
                            <a class="enlace-footer" href="mailto:{{$email}}" target="_blank">{{$email}}</a> <br>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>