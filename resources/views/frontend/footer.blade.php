<?php
use App\Http\Controllers\Controller; 
use App\cms;
$cms=cms::all();
?>
<footer id="footer"><!--Footer-->
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<div class="companyinfo">
						<h2><span>e</span>-shopper</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
					</div>
				</div>
				<div class="col-sm-7">
					<div class="col-sm-3">
						<div class="video-gallery text-center">
							<a href="#">
								<div class="iframe-img">
									<img src="{{asset('images/home/iframe1.png')}}" alt="" />
								</div>
								<div class="overlay-icon">
									<i class="fa fa-play-circle-o"></i>
								</div>
							</a>
							<p>Circle of Hands</p>
							<h2>24 DEC 2014</h2>
						</div>
					</div>
						
					<div class="col-sm-3">
						<div class="video-gallery text-center">
							<a href="#">
								<div class="iframe-img">
									<img src="{{asset('images/home/iframe2.png')}}" alt="" />
								</div>
								<div class="overlay-icon">
									<i class="fa fa-play-circle-o"></i>
								</div>
							</a>
							<p>Circle of Hands</p>
							<h2>24 DEC 2014</h2>
						</div>
					</div>
						
					<div class="col-sm-3">
						<div class="video-gallery text-center">
							<a href="#">
								<div class="iframe-img">
									<img src="{{asset('images/home/iframe3.png')}}" alt="" />
								</div>
								<div class="overlay-icon">
									<i class="fa fa-play-circle-o"></i>
								</div>
							</a>
							<p>Circle of Hands</p>
							<h2>24 DEC 2014</h2>
						</div>
					</div>
						
					<div class="col-sm-3">
						<div class="video-gallery text-center">
							<a href="#">
								<div class="iframe-img">
									<img src="{{asset('images/home/iframe4.png')}}" alt="" />
								</div>
								<div class="overlay-icon">
									<i class="fa fa-play-circle-o"></i>
								</div>
							</a>
							<p>Circle of Hands</p>
							<h2>24 DEC 2014</h2>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="address">
						<img src="{{asset('images/home/map.png')}}" alt="" />
						<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	<div class="footer-widget">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
					<div class="single-widget">
					<h2>Service</h2>
						<ul class="nav nav-pills nav-stacked">
						@foreach($cms as $pages)
							<li><a href="{{ url('/page/'.$pages->url)}}">{{$pages->title}}</a></li>
						@endforeach
						</ul>
					</div>
				</div>
						
				<div class="col-sm-3 col-sm-offset-1">
					<div class="single-widget">
						<h2>About Shopper</h2>
						@if(Session::has('flash_message_success'))
							<div class="alert alert-success">
								<p>{!! session('flash_message_success') !!}</p>
							</div>
						@endif
						@if(Session::has('flash_message_error'))
							<div class="alert alert-error">
								<p>{!! session('flash_message_error') !!}</p>
							</div>
						@endif
						<form action="{{ url('trial') }}" method="post">
							{{ csrf_field()}}
							<input  name="user_email"  id="email" type="email" placeholder="Your email address" required=""/>
							<button   id="btnSubmit" type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
							<p>Get the most recent updates from <br />our site and be updated your self...</p>
						</form>
					</div>
				</div>
					
			</div>
		</div>
	</div>
		
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
				<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
			</div>
		</div>
	</div>
		
	</footer><!--/Footer-->
	



	
	