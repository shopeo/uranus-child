const mix = require('laravel-mix');

mix.js('javascript/app.js', 'theme/assets/js').js('javascript/customize.js', 'theme/assets/js').js('javascript/customize-controls.js', 'theme/assets/js').js('javascript/customize-preview.js', 'theme/assets/js').js('javascript/editor-script-block.js', 'theme/assets/js').sass('style/style.scss', 'theme', [], [
	require('postcss-import'),
	require('autoprefixer'),
]).sass('style/style-rtl.scss', 'theme', [], [
	require('postcss-import'),
	require('rtlcss'),
	require('autoprefixer'),
]).sass('style/print.scss', 'theme', [], [
	require('postcss-import'),
	require('autoprefixer'),
]).sass('style/editor-block.scss', 'theme/assets/css', [], [
	require('postcss-import'),
	require('autoprefixer'),
]).sass('style/editor-block-rtl.scss', 'theme/assets/css', [], [
	require('postcss-import'),
	require('rtlcss'),
	require('autoprefixer'),
]).sass('style/editor-classic.scss', 'theme/assets/css', [], [
	require('postcss-import'),
	require('autoprefixer'),
]).sass('style/editor-classic-rtl.scss', 'theme/assets/css', [], [
	require('postcss-import'),
	require('rtlcss'),
	require('autoprefixer'),
]);
