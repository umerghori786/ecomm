<template>
	<main class="main__content_wrapper">
	    
	    <!-- Start breadcrumb section -->
	    <section class="breadcrumb__section breadcrumb__bg">
	        <div class="container-fluid">
	            <div class="row row-cols-1">
	                <div class="col">
	                    <div class="breadcrumb__content">
	                        <h1 class="breadcrumb__content--title text-white mb-10">Shop Left</h1>
	                        <ul class="breadcrumb__content--menu d-flex">
	                            <li class="breadcrumb__content--menu__items"><a class="text-white" href="index.html">Home</a></li>
	                            <li class="breadcrumb__content--menu__items"><span class="text-white">Shop Left Sidebar</span></li>
	                        </ul>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	    <!-- End breadcrumb section -->

	    <!-- Start shop section -->
	    <section class="shop__section section--padding">
	        <div class="container-fluid">
	            <div class="row">
	                <!-- here -->
	                <sidebar></sidebar>
	                <div class="col-xl-9 col-lg-8">
	                    <topbar @clicked="onClickTobarComponent"></topbar>
	                    <div class="shop__product--wrapper">
	                        <div class="tab_content">
	                            <grid v-bind:data="gridProducts"></grid>
	                            <list></list>
	                        </div>
	                        <div class="pagination__area bg__gray--color">
	                            <pagination></pagination>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </section>
	    <!-- End shop section -->

	   
	</main>
</template>

<script type="text/javascript">
	import sidebar from './sidebar.vue';
	import topbar from './topbar.vue';
	import grid from './grid.vue';
	import list from './list.vue';
	import pagination from './pagination.vue';

	export default{

		components : {
			sidebar,
			topbar,
			grid,
			list,
			pagination,
		},

		data(){
			return {

				gridProducts : [],
				loading : false,
				type : null,
			}
		},
		created()
		{	
			this.getData();
			this.onClickTobarComponent()

			
		},
		methods:{
			getData()
			{
				const req = axios.get(`/api/products?subcategory_id=${this.$route.query.subcategory_id ? this.$route.query.subcategory_id : null}`)
						.then((response)=>{
							this.gridProducts = response.data.products;
						}).then(()=>{
							this.loading = true;
						})
			},
			onClickTobarComponent(value)
			{
				this.type = value
				const req = axios.get(`/api/products?type=${this.type}&subcategory_id=${this.$route.query.subcategory_id ? this.$route.query.subcategory_id : null}`)
						.then((response)=>{
							this.gridProducts = response.data.products;
						}).then(()=>{
							this.loading = true;
						})
			}
		}
	}
</script>