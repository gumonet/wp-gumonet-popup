<?php

/**
 * Render the string file passed in "$file" param.
 *
 * @since 1.0.0
 *
 * @param  string       $file         The file string to render.
 * @param  array|null   $extra_data   The data to use on that rendered file.
 * @return string                     The rendered file.
 *
 * @SuppressWarnings(PHPMD)
 */
function wpgm_view( $file, $extra_data = null ) {
	ob_start();
	include $file;
	return ob_get_clean();
}
