@extends('layouts.eshop')
@push('css')
<style>
	#product-pagination nav .pagination {
		display: flex;
	}
</style>
@endpush
@section('content')
<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="blog-single.html">Shop Grid</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Product Style -->
<section class="product-area shop-sidebar shop section">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-4 col-12">
				<div class="shop-sidebar">
						<!-- Single Widget -->
					<div class="single-widget category">
						<h3 class="title">Categories</h3>
						<ul class="categor-list">
							@foreach ($kategori as $item)
							<li><a href="?kategori={{ $item->id }}">{{ $item->nama_kategori }}</a></li>
							@endforeach
						</ul>
					</div>
					<!--/ End Single Widget -->
					<!-- Shop By Price -->
					<div class="single-widget range">
						<h3 class="title">Shop by Price</h3>
						<div class="price-filter">
							<div class="price-filter-inner">
								<div id="slider-range"></div>
									<div class="price_slider_amount">
									<div class="label-input">
										<span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price"/>
									</div>
								</div>
							</div>
						</div>
						<ul class="check-box-list">
							<li>
								<label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">$20 - $50<span class="count">(3)</span></label>
							</li>
							<li>
								<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">$50 - $100<span class="count">(5)</span></label>
							</li>
							<li>
								<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">$100 - $250<span class="count">(8)</span></label>
							</li>
						</ul>
					</div>
					<!--/ End Shop By Price -->
						
				</div>
			</div>
			<div class="col-lg-9 col-md-8 col-12">
				<div class="row">
					<div class="col-12">
						<!-- Shop Top -->
						<div class="shop-top">
							<div class="shop-shorter">
								<div class="single-shorter">
									<label>Show :</label>
									<select>
										<option selected="selected">09</option>
										<option>15</option>
										<option>25</option>
										<option>30</option>
									</select>
								</div>
								<div class="single-shorter">
									<label>Sort By :</label>
									<select>
										<option selected="selected">Name</option>
										<option>Price</option>
										<option>Size</option>
									</select>
								</div>
							</div>
							
						</div>
						<!--/ End Shop Top -->
					</div>
				</div>
				<div class="row">
					@foreach ($produk as $item)
					<div class="col-lg-4 col-md-6 col-12">
						<div class="single-product">
							<div class="product-img">
								<a href="{{ url('products/'.$item->id) }}">
									<img class="default-img" src="{{ isset($item->gambar_preview) ? $item->gambar_preview->getFile() : 'https://picsum.photos/300/200' }}" alt="#">
									<img class="hover-img" src="{{ isset($item->gambar_preview) ? $item->gambar_preview->getFile() : 'https://picsum.photos/300/200' }}" alt="#">
								</a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										{{-- <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a> --}}
										{{-- <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a> --}}
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="{{ route('cart.store', $item->id) }}">Add to cart</a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3><a href="{{ url('products/'.$item->id) }}">{{ $item->nama_produk }}</a></h3>
								<div class="product-price">
									<span>{{ Formatter::formatRupiah($item->harga) }}</span>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-12 text-center" id="product-pagination">
					{{-- {{ $produk->links('pagination::bootstrap-4') }} --}}
					{{ $produk->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ End Product Style 1  -->	

<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section">
	<div class="container">
		<div class="inner-top">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 col-12">
					<!-- Start Newsletter Inner -->
					<div class="inner">
						<h4>Newsletter</h4>
						<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
						<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
							<input name="EMAIL" placeholder="Your email address" required="" type="email">
							<button class="btn">Subscribe</button>
						</form>
					</div>
					<!-- End Newsletter Inner -->
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Shop Newsletter -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
			</div>
			<div class="modal-body">
				<div class="row no-gutters">
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<!-- Product Slider -->
							<div class="product-gallery">
								<div class="quickview-slider-active">
									<div class="single-slider">
										<img src="https://via.placeholder.com/569x528" alt="#">
									</div>
									<div class="single-slider">
										<img src="https://via.placeholder.com/569x528" alt="#">
									</div>
									<div class="single-slider">
										<img src="https://via.placeholder.com/569x528" alt="#">
									</div>
									<div class="single-slider">
										<img src="https://via.placeholder.com/569x528" alt="#">
									</div>
								</div>
							</div>
						<!-- End Product slider -->
					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<div class="quickview-content">
							<h2>Flared Shift Dress</h2>
							<div class="quickview-ratting-review">
								<div class="quickview-ratting-wrap">
									<div class="quickview-ratting">
										<i class="yellow fa fa-star"></i>
										<i class="yellow fa fa-star"></i>
										<i class="yellow fa fa-star"></i>
										<i class="yellow fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<a href="#"> (1 customer review)</a>
								</div>
								<div class="quickview-stock">
									<span><i class="fa fa-check-circle-o"></i> in stock</span>
								</div>
							</div>
							<h3>$29.00</h3>
							<div class="quickview-peragraph">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
							</div>
							<div class="size">
								<div class="row">
									<div class="col-lg-6 col-12">
										<h5 class="title">Size</h5>
										<select>
											<option selected="selected">s</option>
											<option>m</option>
											<option>l</option>
											<option>xl</option>
										</select>
									</div>
									<div class="col-lg-6 col-12">
										<h5 class="title">Color</h5>
										<select>
											<option selected="selected">orange</option>
											<option>purple</option>
											<option>black</option>
											<option>pink</option>
										</select>
									</div>
								</div>
							</div>
							<div class="quantity">
								<!-- Input Order -->
								<div class="input-group">
									<div class="button minus">
										<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
											<i class="ti-minus"></i>
										</button>
									</div>
									<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
									<div class="button plus">
										<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
											<i class="ti-plus"></i>
										</button>
									</div>
								</div>
								<!--/ End Input Order -->
							</div>
							<div class="add-to-cart">
								<a href="#" class="btn">Add to cart</a>
								<a href="#" class="btn min"><i class="ti-heart"></i></a>
								<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
							</div>
							<div class="default-social">
								<h4 class="share-now">Share:</h4>
								<ul>
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
									<li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal end -->
@endsection