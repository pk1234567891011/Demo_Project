@extends('frontend.home')
@section('content')
	@if(Session::has('flash_message_success'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">×</button>

			<p>{!! session('flash_message_success') !!}</p>
		</div>
	@endif
	@if(Session::has('flash_message_error'))
		<div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">×</button>

			<p>{!! session('flash_message_error') !!}</p>
		</div>
	@endif
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="{{url('homes')}}">Home</a></li>
					<li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
					<?php $total_amount=0; ?>
					@foreach($userCart as $cart)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ URL::to('/') }}/products/{{ $cart->image }}" style="height:100px;width:80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$cart->product_name}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>INR{{$cart->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<a class="cart_quantity_up" href="{{url('/cart/update-quantity/'.$cart->id.'/1')}}"> + </a>
									<input class="cart_quantity_input" type="text" name="quantity" value="{{$cart->quantity}}" autocomplete="off" size="2" disabled>
									@if($cart->quantity>1)
										<a class="cart_quantity_down" href="{{url('/cart/update-quantity/'.$cart->id.'/-1')}}"> - </a>
									@endif
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">INR {{$cart->price*$cart->quantity}}</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{url('/cart/delete-product/'.$cart->id)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						<?php $total_amount=$total_amount+($cart->price*$cart->quantity); ?>
					@endforeach
							
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code available.</p>
				
				<table style="width:50%">
					<tr>
						<th>Coupon Code</th>
						<th>Percent off</th> 
					</tr>
					@foreach($coupon as $offer)
					<tr> 
						

						<td>{{$offer->code}}</td>
						<td>{{$offer->percent_off}}%</td>
						
					</tr>
					@endforeach
				</table>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
							<li> 
								<form  method="POST" action="{{url('/cart/apply-coupon')}}">
								{{ csrf_field() }}
									<label>Use Coupon Code</label>
									<input type="text" name="coupon">
									<input type="submit" value="Apply" class="btn btn-default">
								</form>
							</li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							@if(!empty(Session::get('CouponAmount')))
								<li>Sub Total <span>INR <?php echo $total_amount; ?></span></li>
								<li>Coupon Discount <span>INR <?php echo Session::get('CouponAmount'); ?></span></li>
								<li>Grand Total <span>INR <?php echo $total_amount-Session::get('CouponAmount'); ?></span></li>
							@else
								<li>Grand Total <span>INR <?php echo $total_amount; ?></span></li>
							@endif
						</ul>
							<a class="btn btn-default check_out" href="{{url('/checkout')}}">Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection