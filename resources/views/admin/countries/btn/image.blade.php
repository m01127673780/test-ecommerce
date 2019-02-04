<?php
if (empty ($logo)){?>
	<img src="{{ Storage::url($logo) }}noImage.png " >   
<?php
}else{
 }
 ?> 
  	 <img src="{{ Storage::url($logo) }}" class="img-falg"> 

  <style type="text/css">
  	
.img-falg{
    width: 50px;
    /* border-radius: 50%; */
    display: block;
    /* text-align: center; */
    margin: auto;
}
}
 </style>

 