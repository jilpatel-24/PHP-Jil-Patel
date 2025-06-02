<?php

	header('Content-type:application/octect-stream');
	header('Content-Disposition:attachment;filename="image.jpg"'); 
	readfile('image3.jpg');

?>
