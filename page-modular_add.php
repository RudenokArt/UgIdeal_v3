<?php
get_header();
$photo_catalog = [
	'img_folder' => WpBwgGallery::$img_folder,
	'categories' => WpBwgGallery::getList(),
	'images' => WpBwgImage::getList(),
];
?>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<div id="modular_add">
	<div class="card">
		<div class="card-header">
			<div class="d-flex justify-content-between">
				<div class="h4 text-secondary">Добавить изображение:</div>
				<div>
					<a title="Отмена" href="/" class="text-danger h3">
						<i class="fa fa-times-circle" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>
		<div class="card-body">
			<div>
				<button
				class="btn btn-outline-primary"
				type="button"
				data-bs-toggle="offcanvas"
				data-bs-target="#offcanvasRight"
				aria-controls="offcanvasRight">Выбрать изображение</button>
				<div
				class="offcanvas offcanvas-end w-75"
				tabindex="-1"
				id="offcanvasRight"
				aria-labelledby="offcanvasRightLabel"
				><div class="offcanvas-header">
					<h5 id="offcanvasRightLabel">Выбрать изображение</h5>
					<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
				</div>
				<div class="offcanvas-body">
					<div v-if="selected_category" class="row">
						<div class="">
							<button class="btn btn-outline-primary" v-on:click="selected_category=false">
								<i class="fa fa-chevron-left" aria-hidden="true"></i>
							</button>
						</div>
						<template v-for="(item, index) in photo_catalog.images">
							<a
							href="#"
							v-if="item.gallery_id==selected_category"				
							class="col p-1 m-1 bg-light text-decoration-none"
							><img v-bind:src="photo_catalog.img_folder+item.thumb_url" width="150" alt="img">
							<br>
							<span>{{item.slug}}</span></a>
						</template>
					</div>
					<div v-if="!selected_category" class="row">
						<template v-for="(item, index) in photo_catalog.categories">								
							<a
							href="#"
							v-on:click="selected_category=item.id"
							v-if="item.slug!='modular_templates'&&item.slug!='wallpaper_textures'&&item.slug!='interiors'"				
							class="col p-1 m-1 bg-light text-decoration-none"
							v-bind:title="item.name"
							><template v-if="item.preview_image">
								<img v-bind:src="photo_catalog.img_folder+item.preview_image" width="150">
							</template>
							<template v-else="item.random_preview_image">
								<img v-bind:src="photo_catalog.img_folder+item.random_preview_image" width="150">
							</template>
							<br>
							<span>{{item.name}}</span></a>
						</template>
					</div>
				</div>
			</div>

		</div>
	</div>

</div>
</div>

<script>
	Vue.createApp({
		data () {
			return {
				photo_catalog: JSON.parse('<?php echo json_encode($photo_catalog);?>'),
				selected_category: false,
			};
		}
	}).mount('#modular_add');
</script>
<?php get_footer(); ?>