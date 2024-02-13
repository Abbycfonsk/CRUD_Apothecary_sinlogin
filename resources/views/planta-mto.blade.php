@extends('layout')
@section('contenido')

            <div class='row animated fadeIn slow'>
                <div class='column col-8'>
                    <div class="card m-auto" style="width:800px">
                        <form id='formulario' action="{{route('planta.mantenimiento',[old('id') ?? $planta->id ?? null])}}" method="post"  enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            @if ($planta)
                                <div class="card-body">
                                    <h2 class="card-title">
                                        <input name='nombre' type='text' value="{{old('nombre') ?? $planta->nombre??null}}">
                                    </h2>
                                    <hr>
                                    <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Parte de la planta</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="idcategoria" aria-label="Categorias">
                                            <option selected value=''>Seleccione una categoría</option>
                                    @foreach ($categorias as $categoria)
                                        @if ((old('idcategoria') ?? $planta->idcategoria ?? null) == $categoria->id)
                                            <option selected value='{{$categoria->id}}'>{{$categoria->nombre}}</option>
                                        @else
                                            <option value='{{$categoria->id}}'>{{$categoria->nombre}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                                    <h5 class="card-subtitle mb-2 text-muted">Propiedades:</h5>
                                        <textarea rows='2' cols='90' name='propiedades'>{{old('propiedades') ?? $planta->propiedades??null}}</textarea>
                                    <hr>
                                    <h5 class="card-subtitle mb-2 text-muted">Indicaciones:</h5>
                                        <textarea rows='4' cols='90' name='indicaciones'>{{old('indicaciones') ?? $planta->indicaciones??null}}</textarea>

                                    <hr>
                                    <h5 class="card-subtitle mb-2 text-muted">Como se usa:</h5>
                                    <textarea rows='8' cols='90' name='comousar'>{{old('comousar') ?? $planta->comousar??null}}</textarea>
                                    <hr>
                                    <input type="file" class="form-control" name="portada" id='portada' accept='image/*' onchange='previsualizar()'>
                                    <hr>
                                    <button type="button" class="btn btn-secondary" onclick="enviarFormulario('PUT')" >Modificar planta</button>
                                    <button type="button" class="btn btn-danger" onclick="enviarFormulario('DELETE')">Baja planta</button>
                                    <a href="/plantas" class="btn btn-outline-secondary btn-block" style='float:right'>Volver a listado</a>
                                </div>

                                @error('nombre')

                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                                @error('propiedades')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                                @error('indicaciones')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                                @error('comousar')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                                @error('idcategoria')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                @enderror
                                @if (isset($mensajes))

                                    <div class="alert alert-warning">
                                        <p>{{$mensajes ?? null}}</p>
                                    </div>
                                @endif





                        </form>
                        <br>
                    </div>
                </div>
                <div class='column col-4'>
                        @if(isset($planta))
                            <img src='{{asset("/img/$planta->img")}}' alt="previsualizar" id='previsualizar'>
                        @else
                            <img src='{{asset("/img/sinportada.jpg")}}' alt="previsualizar" id='previsualizar'>
                        @endif
                    @else

                        <h4>Planta no existe</h4>

                    @endif

                </div>
            </div>

            <script>
                function enviarFormulario(metodo){

                    document.querySelector('[name=_method]').value=metodo;
                    document.querySelector('#formulario').submit();
                }
            </script>
@endsection
