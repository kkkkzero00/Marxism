<?php
return array(
		// 自动加载静态资源（HyFrameController）
		'LOAD_ASSETS'			=>array(
			'GLOBAL'	=>	array(
					'CSS'	=>	array(
							
					),
					'JS'	=>	array(
							
					)
			),
			'PLUGINS'	=>	array(
					'CSS'	=>	array(
					),
					'JS'	=>	array(
							
							'MaterialA/all'	=>	array(
			                   /* 'umeditor/umeditor.config.js',
			                    'umeditor/umeditor.min.js',*/
			                    'ueditor/ueditor.config.js',
			                    'ueditor/ueditor.all.min.js',
			                    'ueditor/lang/zh-cn/zh-cn.js'
			                )
					)
			),
			'PAGES'		=>	array(
					'CSS'	=>	array(
							
					),
					'JS'	=>	array(
							'MaterialA/all'	=>	'fullscreen.js',
					)
			)
		),
);