<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/**
 * Template Library
 * Handle masterview and views within masterview
 */

class Pandora {

 // ------------------------------------------------------------------------
// astralnebula: "HERE WE HAVE A DIVER." 


function div($class='',$style=''){
    $div = "<div";
        if($class != ''){ 
            $div = $div . " class=\"$class\"";
        }
    if($style != ''){ 
        $div = $div . "style=\"$style\"";
    }
    $div = $div . ">";
    //$div = "<div class=\"$class\" style=\"$style\">";
    return $div;
}




function undiv(){
$undiv1 = "</div>";
return $undiv1;
}


// astralnebula: "HERE WE HAVE A SPANNER." 

function span($color='',$size=''){
    $div = "<span";
        if($color != ''){ 
            $div = $div . " style=\"color:$color;";
    }
    
        if($size != ''){ 
            $div = $div . " font-size:$size;\"";
        }
    $div = $div . "\">";
    //$div = "<div class=\"$class\" style=\"$style\">";
    return $div;
}



function unspan(){
$undiv1 = "</span>";
return $undiv1;
}


// astralnebula: here we have a colored box!


function box($bgcolor)
    {
            $code = '<div style="padding:5px;background-color:'.$bgcolor.'">';
            return $code;
    }


function unbox()
    {
            $code = '</div>';
            return $code;
    }
 
 




}

/* End of file Template.php */
/* Location: ./application/libraries/Template.php */
