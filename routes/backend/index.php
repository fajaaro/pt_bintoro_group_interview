<?php 

Route::group(['prefix' => '/admin'], function () {
	$dir = base_path('routes/backend');
	
	foreach (scandir($dir) as $file) {
		if (!in_array($file, array('.', '..', 'index.php'))) {
			require $dir . '/' . $file;
		}
	};
});
