<template>
	<div>
		<div class="container mx-auto">
			<carousel-3d :perspective="0"  v-if="loaded" :controls-visible="true" :controls-prev-html="'&#10092;'" :controls-next-html="'&#10093;'" 
               :controls-width="30" :controls-height="60" :space="600" :display="3" :autoplay="true" :autoplay-timeout="4000" :width="713" :height="255">
			    <slide v-for="(slide, i) in sliders" :index="i" :key="i">
			       <img  :src="'/slider/'+slide.logo" class="object-contain">
			    </slide>
			  </carousel-3d>
		</div>

		<section class="container mx-auto" id="favourite-game">
			<div class="text-center">
				<h2 class="text-4xl text-purple-700 font-bold">FAVOURITE GAMES</h2>
				<div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 gap-2 md:gap-4 p-2 lg:p-0">
					<div
						v-for="product in products"
						:key="product.id"
						class="rounded overflow-hidden shadow-lg hover:shadow-xl border-2 mt-5"
					>
						<router-link
							:to="{
								name: 'details',
								params: { id: product.id, slug: makeSlug(product.name) }
							}"
						>
							<!-- params: { id: product.id,slug: makeSlug(product.name) }, -->

							<img
								class="w-full"
								:src="'/product/' + product.logo"
								v-bind:alt="product.name"
							/>
							<div class="px-2 py-4">
								<div class="font-bold text-sm mb-2">{{ product.name }}</div>
								<p class="text-gray-700 text-base">
									{{ product.tag_line }}
								</p>
							</div>
						</router-link>
					</div>
				</div>
			</div>
		</section>
		
		<section>
			<div class="container mx-auto mt-5">
				<div class="mx-auto"> <!-- max-w-screen-lg -->
					<main class="mt-12">
						<!-- recent posts -->
						<div
							class="flex mt-16 mb-4 px-4 lg:px-0 items-center justify-between"
						>
							<h2 class="font-bold text-xl sm:text-2xl md:text-3xl">Earn money</h2>
							<router-link
								:to="{
									name: 'blogs',
								}"
								class="text-white cursor-pointer bg-pink-500 hover:bg-pink-700 text-white font-bold py-1 px-2 rounded ml-2"
							>
								View all
							</router-link>
						</div>
						<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-4">
						<!-- <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-4 mt-4"> -->
							<div
								v-for="blog in blogs"
								:key="blog.id"
								class="rounded w-full p-3 sm:p-3 md:p-4 lg:p-0 xl:p-0">
								<img
									:src="'/blog/' + blog.logo"
									v-bind:alt="blog.title"
									class="rounded h-48 w-full"
								/>
								<div class="p-4 pl-0">
									<h2 class="font-bold text-xl text-gray-800">
										{{ blog.title }}
									</h2>
									<p v-if="blog.description.length <= 200" class="text-gray-700 text-sm mt-2 h-24 min-h-full" v-html="blog.description.substring(-6, 200)">
									</p>

									<p v-else class="text-gray-700 text-sm mt-2 h-24 min-h-full" v-html="blog.description.substring(-6, 150)+ ' ........'">
									</p> 

									<router-link
										:to="{
											name: 'blog-details',
											params: { id: blog.id, slug: makeSlug(blog.title) }
										}"
										class="inline-block mt-4 ml-auto bg-pink-500 hover:bg-pink-700 text-white font-bold py-1 px-2 rounded"
									>
										Read more
									</router-link>
								</div>
							</div>

						</div>
						<!-- end recent posts -->
					</main>
					<!-- main ends here -->
				</div>
			</div>
		</section>

		<div class="container mx-auto">
		<h2 class="text-4xl text-purple-700 font-bold text-center">
			TOP 20 CUSTOMER
		</h2>
		<p class="top-p">SOME OF OUR SPACIAL CUSTOMER</p>
		<carousel-3d
			:disable3d="true"
			:space="365"
			v-if="cloaded"
			:clickable="false"
			:controls-visible="true"
		>
			<slide
			v-for="(topcustomer, i) in topcustomers"
			:index="i"
			:key="i"
			class="user-box"
			>
			<img v-if="topcustomer.user.file" :src="'/user/'+topcustomer.user.file" class="user-img" />
			<img v-else class="user-img" src="/img/test.jpg"/>
			<div class="user-content mt-2">
				<h4 class="top">
				TOP <span class="text-pink-500">{{ i + 1 }}</span> 
				</h4>
				<p><sub>({{ topcustomer.user.name }})</sub></p>
				<h5 class="total">
				COMPLETED ORDER
				<span class="text-purple-700">{{ topcustomer.sum }}</span> BDT
				</h5>
			</div>
			</slide>
		</carousel-3d>
		</div>
		
	</div>
</template>

<script>
import { mapGetters } from "vuex";
import axios from "axios";

export default {
	layout: "default",
	metaInfo() {
		return { title: this.$t("home") };
	},
	data: () => ({
		title: "Fighter BD",
		topcustomers: [],
		products: [],
		blogs: [],
		sliders: [],
		loaded:false,
		cloaded:false
	}),

	methods: {
		topCustomers(){
			axios.get("/api/topcustomers").then(response => {
				this.topcustomers = response.data;
				this.cloaded=true;
			});
		},
		prizewin(sum){
			return Math.floor(sum/10000)
		},
		loadSliders() {
			axios.get("/api/sliders").then(response => {
				this.sliders = response.data;
				this.loaded=true;
			});
		},
		loadProducts() {
			axios.get("/api/products").then(response => {
				this.products = response.data;
			});
		},
		loadBlogs() {
			axios.get("/api/blogs").then(response => {
				this.blogs = response.data;
			});
		},
		makeSlug(slug) {
			var words = slug.split(" ");
			for (var i = 0; i < words.length; i++) {
				var word = words[i];
				words[i] = word.charAt(0).toLowerCase() + word.slice(1);
			}
			return words.join("-");
		}
	},

	computed: mapGetters({
		authenticated: "auth/check"
	}),
	created() {
		this.loadProducts();
		this.loadBlogs();
		this.loadSliders();
		this.topCustomers();
	}
};
</script>
<style type="text/css">
	.top-p{
		text-align: center;
		font-weight: 600;
	}
	.user-box{
		background: white;
		padding: 15px;
		border: 1px solid #e2dede;
		text-align: center;
	}
	.user-img {
		width: 150px !important;
		height: 150px !important;
		border-radius: 50%;
		border: 5px solid #f9f9f9;
		margin: auto;
		box-shadow: 0px 0px 2px 2px #c7c7c7;
	}
	.top{
		font-size: 20px;
		font-weight: 600;
	}
	.total{
	font-size: 12px;
	font-weight: 700;
	} 
	h5.prize {
		font-size: 13px;
		font-weight: 200;
	}
	.prize-number {
		background: black;
		width: 20px;
		display: inline-block;
		height: 20px;
		border-radius: 50%;
		color: white;
	}
	.carousel-3d-container {
	  .carousel-3d-slide {
	    padding: 20px;
	    
	    .title { font-size: 22px; }
	  }
	}

</style>

<!-- ALTER TABLE `orders` ADD `comment` TEXT NULL DEFAULT NULL AFTER `security_code`; -->