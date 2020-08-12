@extends('layouts.app')

@section('module_name')
    <h1 style="color: white;" class="ml-5" id="module_text">Productos</h1>
@endsection

@section('content')
	<div class="container">
		<?php
		$subtotal = 0;
		$total = 0.0;
		?>

		<form action="">
			<input type="submit" class="btn btn-outline-primary mb-3" value="comprar" >
			@foreach ($listaProductoCarrito as $producto)
			<div class="row shadow bg-white rounded">
				<div class="col-lg-2">
					<a href="detail/{{$producto->idProducto}}">
						<img src="{{asset('img/productos/'.$producto->imagenUrl)}}" alt="">
					</a>
				</div>
				<div class="col-lg-8">
					<a href="detail/{{$producto->idProducto}}"><p>{{$producto->titulo}}</p></a>
					<p>{{$producto->descripcion}}</p>
					<p>{{$producto->marca}}</p>
					<div class="row ml-1">
						<?php 
							if ($producto->descuentoVenta > 0){
								$nuevoCosto = ($producto->precioVenta - ($producto->descuentoVenta * $producto->precioVenta) / 100);
								echo '<p><del>$'.$producto->precioVenta.'</del></p>'.
									'<p class="text-danger ml-2"> $'.$nuevoCosto.' ¡Precio de oferta!</p>';
							}else{
								echo '<p>$'.$producto->precioVenta.'</p>';        
							} 
							if ($producto->cantidad <= 0){
								echo '<p class="ml-4 text-danger">Agotado</p>';
							}
						?>
					</div>
					<div>
						<div class="form-group">
							<input hidden type="idProducto" value="{{$producto->idProducto}}">
							<label for="cantidad">Cantidad: </label>
							<select name="cantidad" id="cantidad" class="form-control col-lg-6">
								@for($i = 1; $i < 10; $i++)
									<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-2">
					<a href="{{ route('deleteProducto', $producto->idCarrito) }}"><p class="btn btn-outline-danger">Quitar de carrito</p></a>
					<a href="{{ route('deleteProducto', $producto->idCarrito) }}"><p class="btn btn-outline-primary">Guadar para mas tarde</p></a>
				</div>
			</div>
			<?php $subtotal = ($producto->precioVenta * $producto->cantidadProducto) ?>
			<input type="hidden" value="{{$total += $subtotal}}" />
			<hr>
			@endforeach
		</form>
		<h1>Total = ${{ $total}}</h1>  

		<hr>

		@foreach ($listaProductoCarrito as $producto)
			<div class="row shadow bg-white rounded">
				<div class="col-lg-2">
					<a href="detail/{{$producto->idProducto}}">
						<img src="{{asset('img/productos/'.$producto->imagenUrl)}}" alt="">
					</a>
				</div>
				<div class="col-lg-8">
					<a href="detail/{{$producto->idProducto}}"><p>{{$producto->titulo}}</p></a>
					<p>{{$producto->descripcion}}</p>
					<p>{{$producto->marca}}</p>
					<div class="row ml-1">
						<?php 
							if ($producto->descuentoVenta > 0){
								$nuevoCosto = ($producto->precioVenta - ($producto->descuentoVenta * $producto->precioVenta) / 100);
								echo '<p><del>$'.$producto->precioVenta.'</del></p>'.
									'<p class="text-danger ml-2"> $'.$nuevoCosto.' ¡Precio de oferta!</p>';
							}else{
								echo '<p>$'.$producto->precioVenta.'</p>';        
							} 
							if ($producto->cantidad <= 0){
								echo '<p class="ml-4 text-danger">Agotado</p>';
							}
						?>
					</div>
					<div>
						<div class="form-group">
							<input hidden type="idProducto" value="{{$producto->idProducto}}">
							<label for="cantidad">Cantidad: </label>
							<select name="cantidad" id="cantidad" class="form-control col-lg-6">
								@for($i = 1; $i < 10; $i++)
									<option value="{{$i}}">{{$i}}</option>
								@endfor
							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-2">
					<a href="{{ route('deleteProducto', $producto->idCarrito) }}"><p class="btn btn-outline-danger">Quitar de carrito</p></a>
					<a href="{{ route('deleteProducto', $producto->idCarrito) }}"><p class="btn btn-outline-primary">Agregar a compra</p></a>
				</div>
			</div>
			<?php $subtotal = ($producto->precioVenta * $producto->cantidadProducto) ?>
			<input type="hidden" value="{{$total += $subtotal}}" />
			<hr>
			@endforeach
	</div>
@endsection 
