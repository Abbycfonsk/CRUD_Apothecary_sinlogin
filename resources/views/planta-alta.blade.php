@extends ('layout')
@section('contenido')
            <div class='row animated fadeIn slow' style="display:flex; flex-direction:row-reverse">
                <div class='column col-8'>
                    <form id='formulario' action="{{route('planta.alta')}}" method='post' enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="nombre" value = "{{old('titulo')??$planta->nombre??null}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Parte de la planta</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="idcategoria" aria-label="Categorias">
                                            <option selected value=''>Seleccione una categoría</option>
                                    @foreach ($categorias as $categoria)
                                        @if ((old('idcategoria') ?? $planta->idcategoria ?? 'Seleccione una categoría') == $categoria->id)
                                            <option selected value='{{$categoria->id}}'>{{$categoria->nombre}}</option>
                                        @else
                                            <option value='{{$categoria->id}}'>{{$categoria->nombre}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Propiedades</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="propiedades" value = "{{old('propiedades')??$planta->propiedades??null}}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Imagen</label>
                            <div class="col-sm-10">
                            <input type="file" class="form-control" name="portada" id='portada' value = "{{old('img')??$planta->img??null}}" accept='image/*' onchange='previsualizar()'>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Indicaciones</label>
                            <div class="col-sm-10">
                            <textarea  class="form-control" name="indicaciones" rows="4" >{{old('indicaciones')??$planta->indicaciones??null}}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Como se usa</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" name="comousar" rows="5">{{old('comousar')??$pelicula->comousar??null}}</textarea>
                            </div>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary">Alta planta</button>
                    </form>
                    <h4>
                        @if($errors->any())
                        <div>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @else
                            @if(isset($mensaje))
                            <div class="alert alert-warning">
                                <p>{{$mensaje??null}}</p>
                            </div>
                            @endif
                        @endif
                    </h4>
                </div>
                <div class='column col-4'>
                @if (isset($planta))
                    <img src='{{asset("/img/$planta->img")}}' alt="previsualizar" id='previsualizar'>
                @else
                    <img src='{{asset("/img/sinportada.jpg")}}' alt="previsualizar" id='previsualizar'>
                @endif
                </div>
            </div>
@endsection
