@extends('layouts.app')

@section('module_name')
    <h1 style="color: white;" class="ml-5" id="module_text">Productos</h1>
@endsection

@section('content')
	<div class="container">
		<?php
		$subtotal = 0;
		$total = 0.0;
		$j = 0;
		?>
		<form action="/datosDestino" method="POST" >
		{{csrf_field()}}
		@csrf
			@if (!$listaProductoCarrito->IsEmpty())
				<input type="submit" class="btn btn-outline-primary  mb-3" value="Realizar compra" >	
			@else
				<h3>Su carrito esta vacio</h3>
			@endif
			
			@foreach ($listaProductoCarrito as $producto)
			<div class="row ">
				<div class="col-lg-2">
					<a href="detail/{{$producto->idProducto}}">
						<img src="{{asset('img/productos/'.$producto->imagenUrl)}}" alt="">
					</a>
				</div>
				<div class="col-lg-8">
					<a href="detail/{{$producto->idProducto}}"><p>{{$producto->titulo}}</p></a>
					<p class="cardItem">{{$producto->descripcion}}</p>
					<p class="cardItem">{{$producto->marca}}</p>
					<div class="row ml-1">
						<?php 
							if ($producto->descuentoVenta > 0){
								$nuevoCosto = ($producto->precioVenta - ($producto->descuentoVenta * $producto->precioVenta) / 100);

								echo '<p><del>$'.$producto->precioVenta.'</del></p>'.
									'<p class="text-danger ml-2"> $'.$nuevoCosto.' ¡Precio de oferta!</p>';
									?>
									<input hidden type="text" name="txtprecioVenta" id="txtprecioVenta<?php echo $j;?>" value="{{$nuevoCosto}}" />
									<?php
								}else{
								echo '<p>$'.$producto->precioVenta.'</p>';      
								?>
								<input hidden hidden type="text" name="txtprecioVenta" id="txtprecioVenta<?php echo $j;?>" value="{{$producto->precioVenta}}" />
								<?php  
							} 
							if ($producto->cantidad <= 0){
								echo '<p class="ml-4 text-danger cardItem">Agotado</p>';
							}
						?>
					</div>

					<div>
						<div class="form-group">
							<input hidden type="idProducto" value="{{$producto->idProducto}}">
							<div class="row">
								<label for="cantidad" class="mt-1 mr-3">Cantidad: </label>
								<select name="cantidad" id="cantidad<?php echo $j;?>" class="form-control col-lg-1 col-md-1 form-control-sm" onchange="ShowSelected();">
									@for($i = 1; $i <= $producto->cantidad; $i++)
									<option value="{{$producto->cantidadProducto}}" 
										@if ($producto->cantidadProducto == $i)
										selected
										@endif>{{$i}}</option>        
									@endfor
								</select>
							</div>
							
							<?php $subtotal = ($producto->precioVenta * $producto->cantidadProducto) ?>
							<input type="text" hidden name="txtIdProducto[]" id="txtIdProducto<?php echo $j;?>" value="{{$producto->idProducto}}" >

							<input type="text" hidden name="txtCantidad[]" id="txtCantidad<?php echo $j;?>" value="{{$producto->cantidadProducto}}">

							<input type="text" hidden name="txtSubtotal[]" id="txtSubtotal<?php echo $j;?>" value="{{$subtotal}}">
						
							<input type="hidden" id="txtTotall<?php echo $j;?>" value="{{$total += $subtotal}}" />
						</div>
					</div>
								
				</div>
				<div class="col-lg-2">
					<a href="{{ route('deleteProductoCarrito', $producto->idCarrito) }}"><p class="btn btn-outline-danger">Quitar de carrito</p></a>
					<a href="{{ route('guardarProducto', $producto->idCarrito) }}"><p class="btn btn-outline-primary">Guadar para mas tarde</p></a>
				</div>
			</div>
			<hr>
			<?php $j++;?>
			@endforeach
		</form>
		<input type="hidden" id="j" value="<?php echo $j; ?>" />
		<input type="hidden" id="txtTotal" value="{{$total}}" />
		<h3 id="hTotal1">Total ${{$total}}</h3>  
		<h2 id="hTotal2"></h2> 					
		<hr>

	<div class="row ">

		@foreach ($listaPendiente as $lp)
			<div class="row">
				<div class="col-lg-2">
					<a href="producto/detail/{{$lp->idProducto}}">
						<img src="{{asset('img/productos/'.$lp->imagenUrl)}}" alt="">
					</a>
				</div>
				<div class="col-lg-8">
					<a href="producto/detail/{{$lp->idProducto}}"><p>{{$lp->titulo}}</p></a>
					<p class="cardItem">{{$lp->descripcion}}</p>
					<p class="cardItem">{{$lp->marca}}</p>
					<div class="row ml-1">
						<?php 
							if ($lp->descuentoVenta > 0){
								$nuevoCosto = ($lp->precioVenta - ($lp->descuentoVenta * $lp->precioVenta) / 100);
								echo '<p><del>$'.$lp->precioVenta.'</del></p>'.
									'<p class="text-danger ml-2"> $'.$nuevoCosto.' ¡Precio de oferta!</p>';
							}else{
								echo '<p>$'.$lp->precioVenta.'</p>';        
							} 
							if ($lp->cantidad <= 0){
								echo '<p class="ml-4 text-danger">Agotado</p>';
							}
						?>
					</div>
					<div>
						<div class="form-group row">
							<input hidden type="idProducto" value="{{$lp->idProducto}}">
							<label for="cantidad" class="mt-1 mr-3">Cantidad: </label>
							<select name="cantidad" id="cantidad" class="form-control col-lg-1 col-md-1 form-control-sm">
								@for($i = 1; $i <= $lp->cantidad; $i++)
								<option value="{{$lp->cantidadProducto}}" 
									@if ($lp->cantidadProducto == $i)
									selected
									@endif>{{$i}}</option>        
								@endfor
							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-2">
					<a href="{{ route('deleteProductoCarrito', $lp->idCarrito) }}"><p class="btn btn-outline-danger">Quitar de carrito</p></a>
					<a href="{{ route('asignarCompra', $lp->idCarrito) }}"><p class="btn btn-outline-primary">Agregar a compra</p></a>
				</div>
			</div>
			<?php $subtotal = ($lp->precioVenta * $lp->cantidadProducto) ?>
			<input type="hidden" value="{{$total += $subtotal}}" />
			<hr>
			@endforeach
	</div>
@endsection 

@section('style')
	<link href="{{asset('css/cardProducto.css')}}" rel="stylesheet">
@endsection

<script type="text/javascript">
    function ShowSelected()
		{
		/* Para obtener el valor 
		var cod = document.getElementById("cantidad").value;
		alert(cod);*/
		var suma = 0;
		for (let i = 0; i <= document.getElementById('j').value; i++) {
				/* Para obtener el texto*/
				
				var combo= document.getElementById("cantidad".concat(i));
				var selected = combo.options[combo.selectedIndex].text;
				//alert(selected);

				document.getElementById('txtCantidad'.concat(i)).value = "";
				var cant = document.getElementById('txtCantidad'.concat(i)).value = selected;

				var precio = document.getElementById("txtprecioVenta".concat(i)).value;
				var subt = (cant * precio);
				document.getElementById('txtSubtotal'.concat(i)).value = "";
				var subtotal = document.getElementById('txtSubtotal'.concat(i)).value = subt;

				suma += subtotal;
				document.getElementById('txtTotal').value = suma;

				document.getElementById('hTotal1').style.display = 'none';
				document.getElementById('hTotal2').innerHTML = 'Total $'+suma;
			}
		}
</script>
