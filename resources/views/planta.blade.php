@extends('layout')
@section('contenido')
            <div class='row animated fadeIn slow'>
                <div class='column col-8'>
                    <div class="card m-auto">
                    @if ($planta!=null)
                        <div class="card-body">

                            <h2 class="card-title">{{$planta->nombre??null}}</h2>
                            <hr>
                            <p class="card-subtitle mb-2 text-muted"><h5>Parte de la planta:</h5>{{$categoria ?? null}}</p>
                            <p class="card-subtitle mb-2 text-muted"><h5>Propiedades:</h5> {{$planta->propiedades ?? null}}</p>
                            <hr>
                            <p class="card-subtitle mb-2 text-muted"><h5>Indicaciones:</h5>{{$planta->indicaciones ?? null}}</p>
                            <p class="card-subtitle mb-2 text-muted"><h5>Como se usa:</h5>{{$planta->comousar ?? null}}</p>

                        </div>

                    @else
                        <h4>Planta no existe</h4>
                    @endif
                    </div>
                    <br>
                    @if ($planta)
                        <a href="{{route('vista.mantenimiento',[$planta->id])}}" class="btn btn-secondary btn-block">Mantenimiento</a>
                        <a href="{{route('vista.plantas')}}" class="btn btn-outline-secondary btn-block">Volver a listado</a>
                    @else
                        <a href="" class="btn btn-secondary btn-block">Mantenimiento</a>
                        <a href="{{route('vista.plantas')}}" class="btn btn-outline-secondary btn-block">Volver a listado</a>
                    @endif
                </div>
                <div class='column col-4'>
                    @if ($planta)
                    <img src='{{asset("/img/$planta->img")}}'>
                    @else
                    <img src='{{asset("/img/sinportada.jpg")}}'>
                    @endif
                </div>
            </div>
@endsection
