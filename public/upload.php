

<?php

//complete source code forupload.php

//$newImageSubmitted is TRUE if form was submitted, otherwise FALSE

$newImageSubmitted = isset( $_POST['new-image'] );

if ( $newImageSubmitted ) {
//this code runs if form was submitted
$output = upload();
}
return $output;
//declare new function
function upload(){
include_once "Uploader.class.php";
//image-data is the name attribute used in <input type='file' />
$uploader = new Uploader( "image-data" );
$uploader->saveIn("img");
$fileUploaded = $uploader->save();
if ( $fileUploaded ) {
$out = "<span class='rare'>Image uploaded success!!!. See it in gallery. ENJOY UPLOADING. SUBSCRIBE.</span>";
} else {
$out = "something went wrong";
}
return $out;
}



uploader.class:

<?php
//complete code for Uploader.class.php
class Uploader {
private $filename;
private $fileData;
private $destination;

//declare a constructor method
public function __construct( $key ) {
$this->filename = $_FILES[$key]['name'];
$this->fileData = $_FILES[$key]['tmp_name'];
}
public function saveIn( $folder ) {
$this->destination = $folder;
}
public function save(){
$folderIsWriteAble = is_writable( $this->destination );
if( $folderIsWriteAble ){
$name = "$this->destination/$this->filename";
$succes = move_uploaded_file( $this->fileData, $name );
} else {
trigger_error("cannot write to $this->destination");
$succes = false;
}
return $succes;
}
}



upload form:

<?php
return "
Upload new jpg images</h1>
<form method='post' action='indexx.php?page=upload' enctype='multipart/form-data' >
<label>Find a jpg image to upload</label>
<input type='file' name='image-data' accept='image/jpg'/>
<input type='submit' value='upload' name='new-image' />
</form>";