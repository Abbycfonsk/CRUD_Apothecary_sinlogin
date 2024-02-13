@extends('layout')
    @section('contenido')
            <div class='row animated fadeIn slow'>
                <form action="{{route('vista.plantas')}}" method="GET" class="d-flex justify-content-right">
                    <div class="m-3">
                        <label class="form-label">Buscar:</label>
                        <input autofocus type="search" class="form-control" id="filtro"  name="filtro" value="{{$filtro ?? null}}" onkeyup="this.form.submit()">
                    </div>
                    <div class="m-3">
                        <label class="form-label">Categoría</label>
                        <select class="form-select" name="idcategoria" onchange="this.form.submit()">
                            <option value="">Todas las categorias</option>
                            @foreach ($categorias as $categoria)
                                @if(($idcategoria ?? null) == $categoria->id)
                                    <option selected value='{{$categoria->id}}'>{{$categoria->nombre}}</option>
                                @else
                                    <option value='{{$categoria->id}}'>{{$categoria->nombre}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <hr>
            <div class="row row-cols-4 d-flex justify-content-evenly">
                @if (sizeof($plantas)==0)
                <div class='alert alert-danger' >
                    <p>No hay datos</p>
                </div>
                @else
                    @foreach ($plantas as $planta)
                        <div class="card" style="border-radius:0px; margin:2px">
                            <div class="foto">
                                <img class="card-img-top" style= "padding-top: 5px" src='{{asset("/img/$planta[img]")}}'>
                            </div>

                            <hr>
                            <div class="card-body">

                                <h4 class="card-title">{{$planta['nombre']}}</h4>
                                <hr>
                                <p class="card-text"></p>
                                <p class="card-text"><h6>Propiedades:</h6>{{$planta['propiedades']}}</p>
                                <hr>
                                    <a href="{{route('vista.planta',[$planta->id])}}" class="btn btn-secondary btn-block">+ info</a>
                                    <a href="{{route('vista.mantenimiento',[$planta->id])}}" class="btn btn-outline-secondary btn-block">Mantenimiento</a>

                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
    @endsection


