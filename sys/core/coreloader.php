<?php
/*************************************************************************
 Copyright 2011 Vevui Development Team

 Licensed under the Apache License, Version 2.0 (the "License");
 you may not use this file except in compliance with the License.
 You may obtain a copy of the License at

     http://www.apache.org/licenses/LICENSE-2.0

 Unless required by applicable law or agreed to in writing, software
 distributed under the License is distributed on an "AS IS" BASIS,
 WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 See the License for the specific language governing permissions and
 limitations under the License.
*************************************************************************/

define('VEVUI_VERSION', '0.5pre');

@include(CACHE_PATH.'/core_'.VEVUI_VERSION.'_'.ENVIRONMENT.'.php');
if (!class_exists('Vevui', FALSE))
{
	require(SYS_PATH.'/core/install.php');
	$data = vevui_install($errormsg);
	if (NULL === $data)
	{
		die($errormsg);
	}

	require(SYS_PATH.'/core/core.php');
	global $_installation_data;
	$_installation_data = $data;

	$core = & Vevui::get();
	if ((!property_exists($core->e->app, 'dev_mode')) || (!$core->e->app->dev_mode) )
	{
		$installed = file_get_contents(SYS_PATH.'/core/core.php');
		$installed .= '$_installation_data = unserialize(\''.str_replace('\'', '\\\'', serialize($data))."');\n".'// Generated by Vevui '.VEVUI_VERSION.' on '.date('c');
		file_put_contents(CACHE_PATH.'/core_'.VEVUI_VERSION.'_'.ENVIRONMENT.'.php', $installed);
	}
}

/* End of file sys/core/coreloader.php */