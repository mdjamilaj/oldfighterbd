@include('admin.layouts.header')
<!-- Page content -->
<div class="container-fluid min-700px">
	{{-- Product List  --}}
	<div class="col-xl-12">
		@csrf
		@if ($message = Session::get('success'))
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-8col-sm-12 mt-2 alert alert-success">
				{{ $message }}
			</div>
		</div>
		@endif

		@if (count($errors) > 0)
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-8col-sm-12 mt-2 alert alert-danger">
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</div>
		</div>
		@endif

		<div class="card mt-5">
			<div class="card-header border-0">
				<div class="row align-items-center">
					<div class="col">
						<h3 class="mb-0">Shop Order Detials</h3>
					</div>
				</div>
			</div>
			<?php if(empty($datas)){  ?>
			<div class="alert alert-danger mr-2 ml-2">
				Sorry No Information Found !!!
			</div>
			<?php }else{ ?>
			<div class="table-responsive">
				<!-- Projects table -->
				<table class="table align-items-center table-flush">
					<thead class="thead-light">
						<tr>
							<th scope="col">#</th>
                            <th scope="col">User ID</th>
							<th scope="col">Buy Price</th>
                            <th scope="col">Sale Price</th>
							<th scope="col">Quantity</th>
							<th scope="col">Sub Total</th>
                            <th scope="col">Total</th>
                            <th scope="col">Product Name</th>
							<th scope="col">Product Description</th>
							<th scope="col">Product Delivery</th>
						</tr>
					</thead>
					<tbody>
						@foreach($datas as $key => $data)
						<tr>
                            <td scope="row">{{ $key+1 }}</td>
							<td style="">{{$data->user_id}}</td>
                            <td style="">{{$data->sale_price}}</td>
                            <td style="">{{$data->buy_price}}</td>
                            <td style="">{{$data->quantity}}</td>
							<td style="">{{$data->invoice->sub_total}}</td>
                            <td style="">{{$data->invoice->total}}</td>
                            <td style="">{{$data->product->name}}</td>
							<td style="">{!! \Illuminate\Support\Str::limit(strip_tags($data->product->description), 70, $end=' ......') !!}</td>
							<td style="padding: 15px;margin:10px;">
								<input type="text" style="width:300px;" id="{{ $data->id.'input2' }}" value="{{ $data->product_delivery }}" placeholder="Enter Product" style="width: 110px">
								<button class="btn btn-sm btn-success"  onclick="product_delivery_update({{ $data->id }},{{ $data->id }}+'input2' )">Update</button>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
			<?php } ?>
		</div>
	</div>
</div>

<!-- /.container-fluid -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
	function product_delivery_update($id, $el_id) {
	    var product_delivery = document.getElementById($el_id).value;
		var id = $id;
		$.ajaxSetup({
			headers: {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    	}
		});
	    $.ajax({
	        type:"POST",
	        url : "{{ route('product_delivery') }}",
	        data : {
				product_delivery: product_delivery,
				id: id
			},
	        success : function(response) {
				if(response == 'success')
				{
					Swal.fire({
					position: 'top-end',
					icon: 'success',
					title: 'Save Product',
					showConfirmButton: false,
					timer: 1500
					})
					document.getElementById($el_id).value = product_delivery;
				}else{
					Swal.fire({
						position: 'top-end',
						icon: 'error',
						title: 'Not Save Product',
						showConfirmButton: false,
						timer: 1500
					})
				}
	        }
	    });
	};
</script>

@include('admin.layouts.footer')

{{-- ALTER TABLE `shop_details` ADD `product_delivery` TEXT NOT NULL AFTER `quantity`; --}}