<?php

require __DIR__ . '/bootstrap.php';

function getConfig($name) {
	$value = array();
	
	if ($name == 'socialLinks') {
		$value = array(
			array('name' => 'vk',  'link' => 'https://vk.com/#'),
			array('name' => 'github',  'link' => 'https://github.com/onbalt'),
			array('name' => 'in',  'link' => 'https://www.instagram.com/#'),
		);
	} else if ($name == 'menuIndex') {
		$value = array(
			array('name' => 'Мои работы',  'link' => 'works'),
			array('name' => 'Обо мне',  'link' => 'about'),
			array('name' => 'Блог',  'link' => 'blog'),
		);
	} else if ($name == 'menuMain') {
		$value = array(
			array('name' => 'Мои работы',  'link' => 'works'),
			array('name' => 'Обо мне',  'link' => 'about'),
			array('name' => 'Блог',  'link' => 'blog'),
			array('name' => 'Авторизация',  'link' => '/#auth'),
		);
	}

	return $value;
}

/**
 * Home page
 */
$app->action('/', function(&$view)
{
	$view  = 'index';
	$socialLinks = getConfig('socialLinks');
	$menuIndex = getConfig('menuIndex');
	return compact('socialLinks', 'menuIndex');
});

/**
 * About page
 */
$app->action('about', function()
{
	$socialLinks = getConfig('socialLinks');
	$menuMain = getConfig('menuMain');
	return compact('socialLinks', 'menuMain');
});

/**
 * Blog page
 */
$app->action('blog', function()
{
	$socialLinks = getConfig('socialLinks');
	$menuMain = getConfig('menuMain');
	return compact('socialLinks', 'menuMain');
});

/**
 * Works page
 */
$app->action('works', function()
{
	$socialLinks = getConfig('socialLinks');
	$menuMain = getConfig('menuMain');
	return compact('socialLinks', 'menuMain');
});