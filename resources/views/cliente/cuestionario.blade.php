@extends('layouts.appCuestionario')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="card">
                <div class="col-md-10">
                <h1>PcStudio</h1>
                <h4>En busca de mejorar tu experiencia como cliente, se realizo un cuestionario para
                    la recomendacion segun tus necesidades y/o caracteristicas 
                </h4>
                </div>

            </div>
            <form class="form-group" method="POST" action="/encuesta" enctype="multipart/form-data">
                <!--CSRF Es una directiva de blade para la proteccion de la peticion
                laravel genera un token --> 
                @csrf
                <div class="card form-group">
                    <br>
                    <div class="col-md-10 form-group">
                        <h3> ¿Tiempo aprpximado en el cual usas una computadora?</h3>
                        
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
                                <input class="form-check-input" type="radio"name="R1" id="R1" value="2">
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
                        <h3> ¿Area en la que te encuentras actualmente?</h3>
                        <div class="form-group">

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R3" id="R3" value="1">
                                <label class="form-check-label" for="exampleRadios1">Económico administrativo </label>                                
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="R3" id="R3" value="3">
                                <label class="form-check-label" for="exampleRadios1">Ciencia y tecnología</label>                                </label>
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
                                    <label class="form-check-label" for="exampleRadios1">Suite office (Word, Power point,
                                        Excel</label>                                
                                </div>
    
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="R4" id="R4" value="3">
                                    <label class="form-check-label" for="exampleRadios1">Herramientas para diseño gráfico</label>                                </label>
                                </div>
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="radio"name="R4" id="R4" value="2">
                                    <label class="form-check-label" for="exampleRadios1">Entretenimiento</label>
                                </div>
    
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="R4" id="R4" value="1">
                                    <label class="form-check-label" for="exampleRadios1">Desarrollo de software multiplataforma</label>
                                </div>
                                
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="R4" id="R4" value="3">
                                    <label class="form-check-label" for="exampleRadios1">Análisis de datos</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="R4" id="R4" value="3">
                                    <label class="form-check-label" for="exampleRadios1">Diseño industria</label>
                                </div>
    
                            </div>
                        </div>
                </div>

                <div class="col-md-10">
                    <div class=" col-lg-10">
                        <button type="submit" class="btn btn-primary">Guardar Encuesta</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
