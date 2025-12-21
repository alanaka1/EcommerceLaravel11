@extends('Ecommerce.Web.Template.layouts.index')
 
@section('title', 'OneTech')

@section('css')

@endsection
 
@section('content')

    <div class="super_container">
	
	<!-- Header -->
	
	@include('Ecommerce.Web.Template.Include.header')
	
	<!-- Banner -->

	@include('Ecommerce.Web.Template.Include.banner')


	<!-- Characteristics -->

	@include('Ecommerce.Web.Template.Include.characteristics')

	<!-- Deals of the week -->

	@include('Ecommerce.Web.Template.Include.deals')

	<!-- Popular Categories -->

	@include('Ecommerce.Web.Template.Include.popular_categories')

	<!-- Banner -->

	@include('Ecommerce.Web.Template.Include.banner2')

	<!-- Hot New Arrivals -->

	@include('Ecommerce.Web.Template.Include.new_arrivals')
	
	<!-- Best Sellers -->

	@include('Ecommerce.Web.Template.Include.best_sellers')

	<!-- Adverts -->

	@include('Ecommerce.Web.Template.Include.adverts')

	<!-- Trends -->

	@include('Ecommerce.Web.Template.Include.trends')
	
	<!-- Reviews -->

	@include('Ecommerce.Web.Template.Include.reviews')

	<!-- Recently Viewed -->.
	 
	@include('Ecommerce.Web.Template.Include.viewed')

	<!-- Brands -->

	@include('Ecommerce.Web.Template.Include.brands')

	<!-- Newsletter -->

	@include('Ecommerce.Web.Template.Include.newsletter')

	<!-- Footer -->

	@include('Ecommerce.Web.Template.Include.footer')

	<!-- Copyright -->

	@include('Ecommerce.Web.Template.Include.copyright')
	
</div>

@endsection
 
@section('javascript')

@endsection