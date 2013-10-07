<?php
session_cache_expire (180);
session_start();

require_once("../rack_api/cloudfiles.php");

$auth = new CF_Authentication("knassar", "cbed6dd83b3d2fd6813ada146d330002");
$auth->authenticate();

$conn = new CF_Connection($auth);
$conn->ssl_use_cabundle();

/*
Uploadify v2.1.0
Release Date: August 24, 2009

Copyright (c) 2009 Ronnie Garcia, Travis Nickels

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
*/
if (!empty($_FILES)) {
	$my_domain = $_SERVER['SERVER_NAME'];
	$c_name = $my_domain;
	$container = $conn->create_container($c_name);
	$container->make_public();
	$original_name = "design/".urlencode(strtolower(time()."_".$_FILES['Filedata']['name']));
	$object = $container->create_object($original_name);
	$container->create_paths($original_name);
	if(!function_exists("findexts")){
	function findexts ($filename){ 
		$filename = strtolower($filename) ; 
		$exts = split("[/\\.]", $filename) ; 
		$n = count($exts)-1; 
		$exts = $exts[$n]; 
		return $exts; 
	}
	}
	$ext = findexts($original_name);
	if($ext == "png"){
		$tpe = "image/png";
	}
	elseif($ext == "gif"){
		$tpe = "image/gif";
	}
	elseif($ext == "css"){
		$tpe = "text/css";
	}
	elseif($ext == "txt"){
		$tpe = "text/plain";
	}
elseif($ext == "jpg"){
$tpe = "image/jpeg";
}
	else{
		$tpe = "";
	}
	// find type
	$object->content_type = $tpe;
	$object->load_from_filename($_FILES[Filedata]["tmp_name"]);
	$pub_url = $conn->get_container($c_name);
	$get_obj = $pub_url->get_object($original_name);
	
$var1 = $get_obj->public_uri();
if($tpe != ""){
	// Get image height and width
	list($aawidth, $aaheight, $type, $attr) = getimagesize($_FILES[Filedata]["tmp_name"]);
}
$var2 = $aawidth;
$var3 = $aaheight;
$arr = array ('a'=>$var1,'b'=>$var2,'c'=>$var3);
echo json_encode($arr);	

// echo $get_obj->public_uri();
	// echo $pub_url."/".$original_name;
	
	/*
	echo "<pre>";
	print_r($_FILES);
	echo "</pre>";
	
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_REQUEST['folder'] . '/';
	$targetFile =  str_replace('//','/',$targetPath) . $_FILES['Filedata']['name'];
	
	// $fileTypes  = str_replace('*.','',$_REQUEST['fileext']);
	// $fileTypes  = str_replace(';','|',$fileTypes);
	// $typesArray = split('\|',$fileTypes);
	// $fileParts  = pathinfo($_FILES['Filedata']['name']);
	
	// if (in_array($fileParts['extension'],$typesArray)) {
		// Uncomment the following line if you want to make the directory if it doesn't exist
		// mkdir(str_replace('//','/',$targetPath), 0755, true);
		
		// move_uploaded_file($tempFile,$targetFile);
		echo "2";
	// } else {
	// 	echo 'Invalid file type.';
	// }
	*/
}
?>