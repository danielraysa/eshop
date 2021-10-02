@extends('layouts.eshop')
@section('content')

		<!-- Breadcrumbs -->
		{{-- <div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="{{ url('/') }}">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">Blog Single Sidebar</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		<!-- End Breadcrumbs -->
			
		<!-- Start Blog Single -->
		<section class="blog-single section">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-12">
						<div class="blog-single-main">
							<div class="row">
								<div class="col-12">
									<div class="image">
										@foreach($produk->gambar_produk as $gambar)
										<img src="{{ $gambar->getFile() }}" alt="#">
										@endforeach
									</div>
									<div class="blog-detail">
										<h2 class="blog-title">{{ $produk->nama_produk }}</h2>
										<div class="blog-meta">
											<span class="author"><a href="#"><i class="fa fa-user"></i>By Admin</a><a href="#"><i class="fa fa-calendar"></i>Dec 24, 2018</a><a href="#"><i class="fa fa-comments"></i>Comment (15)</a></span>
											<div class="button float-right">
												<a href="{{ route('cart.store', $produk->id) }}" class="btn text-white">Add to Card</a>
											</div>
										</div>
										<div class="content">
											<p style="white-space: pre-line">{{ $produk->deskripsi }}</p>
											{{-- <p>What a crazy time. I have five children in colleghigh school graduates.jpge or pursing post graduate studies  Each of my children attends college far from home, the closest of which is more than 800 miles away. While I miss being with my older children, I know that a college experience can be the source of great growth and experience can be the source of source of great growth and can provide them with even greater in future.</p>
											<blockquote> <i class="fa fa-quote-left"></i> Do what you love to do and give it your very best. Whether it's business or baseball, or the theater, or any field. If you don't love what you're doing and you can't give it your best, get out of it. Life is too short. You'll be an old man before you know it. risus. Ut tincidunt, erat eget feugiat eleifend, eros magna dapibus diam.</blockquote>
											<p>What a crazy time. I have five children in colleghigh school graduates.jpge or pursing post graduate studies  Each of my children attends college far from home, the closest of which is more than 800 miles away. While I miss being with my older children, I know that a college experience can be the source of great growth and experience can be the source of source of great growth and can provide them with even greater in future.</p>
											<p>What a crazy time. I have five children in colleghigh school graduates.jpge or pursing post graduate studies  Each of my children attends college far from home, the closest of which is more than 800 miles away. While I miss being with my older children, I know that a college experience can be the source of great growth and experience can be the source of source of great growth and can provide them with even greater in future.</p> --}}
										</div>
									</div>
									
								</div>
								
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-12">
						{{-- @include('layouts.components.blog-sidebar') --}}
					</div>
				</div>
			</div>
		</section>
		<!--/ End Blog Single -->
@endsection