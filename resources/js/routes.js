import {createRouter, createWebHistory}  from 'vue-router';
import homepagecomponent from './home/homeone.vue';
import aboutuscomponent from './pages/aboutUs.vue';
import contactuscomponent from './pages/contactUs.vue';
import shopgridcomponent from './shop/shopGrid.vue';
import indexpagecomponent from './index/index.vue';
import productcomponent from './show/product.vue';
import pagination from './index/paginationprec.vue';

const routes = [

	{
		path: "/",
		name: "home",
		component : homepagecomponent,
	},
	{
		path : "/about-us",
		name : "about_us",
		component : aboutuscomponent,
	},
	{
		path : "/contact-us",
		name : "contact_us",
		component : contactuscomponent,
	},
	{
		path : "/shop",
		name : "shop",
		component : shopgridcomponent,
	},
	{
		path : "/indexpage",
		name : "indexpage",
		component : indexpagecomponent,
	},
	{
		path : "/product/show/:id",
		name : "showproduct",
		component : productcomponent,
	},
	{
		path : "/prec",
		name : 'prec',
		component : pagination,
	}

];

const router = createRouter({
    history:createWebHistory(),
    routes
});

export default router;