<?php

$modular_category = wp_insert_category([
	'cat_name' => 'Модульные картины',
	'category_description' => 'Модульные картины',
	'category_nicename' => 'modular',
], true);
print_r(['modular_category', $modular_category, ]);