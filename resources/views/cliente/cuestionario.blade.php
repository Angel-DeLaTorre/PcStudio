@extends('layouts.appCuestionario')

@section('content')

        @if($valor)
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function () {                    
                    
                        var session = {!! json_encode($valor) !!}; 
                        
                        if(session = 1){
                            alert('Es necesario agregar todos los datos');
                        }else{

                        }
                    
                    });
                </script>
        @endif
    <div class="container">
        <div class="card">
            <div class="card-content">
                <h1>Encuesta recomendaciones</h1>
                <h4>En búsqueda de mejorar tu experiencia como cliente, el propósito de este cuestionario es tener las
                    mejores recomendaciones para ti.
                </h4>
            </div>
        </div>
        <form class="form-group" method="POST" action="/encuesta" enctype="multipart/form-data">
            <!--CSRF Es una directiva de blade para la proteccion de la peticion
                                    laravel genera un token -->
            @csrf
            <div class="card">
                <div class="card-content">
                    <div class="col-md-10 form-group">
                        <h3>Tiempo aproximado en el cual usas una computadora</h3>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R1" id="R1" value="0">
                                <label class="form-check-label" for="exampleRadios1">Menos de 1 hora</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R1" id="R1" value="1">
                                <label class="form-check-label" for="exampleRadios1">1 hora</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R1" id="R1" value="2">
                                <label class="form-check-label" for="exampleRadios1">De 2 a 3 horas</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R1" id="R1" value="3">
                                <label class="form-check-label" for="exampleRadios1">De 4 a 5 horas</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R1" id="R1" value="4">
                                <label class="form-check-label" for="exampleRadios1">Mas de 5 horas</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-10 form-group">
                        <h3> ¿Actualmente a que te dedicas?</h3>

                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R2" id="R2" value="1">
                                <label class="form-check-label" for="exampleRadios1">Estudiante</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R2" id="R2" value="2">
                                <label class="form-check-label" for="exampleRadios1">Ambos</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R2" id="R2" value="3">
                                <label class="form-check-label" for="exampleRadios1">Empleado</label>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-10 form-group">
                        <h3> Área en la que te encuentras actualmente</h3>
                        <div class="form-group">

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R3" id="R3" value="1">
                                <label class="form-check-label" for="exampleRadios1">Económico administrativo
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R3" id="R3" value="3">
                                <label class="form-check-label" for="exampleRadios1">Ciencia y tecnología</label>
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R3" id="R3" value="2">
                                <label class="form-check-label" for="exampleRadios1">Mercadotecnia y diseño</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R3" id="R3" value="1">
                                <label class="form-check-label" for="exampleRadios1">Ciencias de la salud</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R3" id="R3" value="3">
                                <label class="form-check-label" for="exampleRadios1">Entretenimiento</label>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-10 form-group">
                        <h3>¿Cual son las herramientas que usa en su día a día?</h3>
                        <div class="form-group">

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R4" id="R4" value="1">
                                <label class="form-check-label" for="exampleRadios1">Suite office (Word, Power
                                    point,
                                    Excel</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R4" id="R4" value="3">
                                <label class="form-check-label" for="exampleRadios1">Herramientas de diseño
                                    gráfico</label> </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R4" id="R4" value="2">
                                <label class="form-check-label" for="exampleRadios1">Entretenimiento</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R4" id="R4" value="1">
                                <label class="form-check-label" for="exampleRadios1">Desarrollo de software
                                    multiplataforma</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R4" id="R4" value="3">
                                <label class="form-check-label" for="exampleRadios1">Análisis de datos</label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R4" id="R4" value="3">
                                <label class="form-check-label" for="exampleRadios1">Diseño industrial (AutoCAD, MATLAB, AutoDESK)</label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="button is-primary" style="">Guardar Encuesta</button>
        </form>
    </div>


@endsection
