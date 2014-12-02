<?php 

/**
 * Dibuja un formulario desde una definicion en array
 * 
 * @param unknown $formDefinition
 * @return unknown
 */

function drawForm($formDefinition, $action, $values, $method='post')
{
    if(isset($values)) {
        foreach ($values as $key => $value)
        {
            $formDefinition[$key]['defaultValue']=$value;
            echo $value;
        }
    }
    
    $html='';

    $html.="<div id=\"formulario\">".chr(13)."<label class=\"titulo\" >TimeLine Form</label>";
    
    $html.=chr(13)."<form action=\"".$action."\" method=\"".$method."\">";
    
    foreach ($formDefinition as $key => $value)
    {
        
        switch ($value['type'])
        {
            case 'html':
                $html.=chr(13)."<div id=\"html\">";
                
                $html.=$value['defaultValue'];
                
                $html.=chr(13).'</div>';
            break;
            case 'text':
                $html.=chr(13)."<label>".$value['label']."</label>
                        <input type=\"".$value['type']."\" 
                        placeholder=\"".$value['placeholder']."\"
                               name=\"".$value['name']."\" 
                              value=\"".$value['defaultValue']."\">";
            break;

            case 'textarea':
                $html.=chr(13)."<label>".$value['label']."</label>
                        <textarea name=\"".$value['name']."\"
                           placeholder=\"".$value['placeholder']."\"
                             maxlength=\"1000\" rows=\"5\">
                        </textarea>";
            break;
                        
            case 'select-simple': 
                $html.=chr(13)."<label>".$value['label']."</label>
                        <select name=".$value['name'].">";
                // 
                foreach ($value['values'] as $key => $selectValue)
                {
                    $html.="<option value=\"".$key."\">".$selectValue."</option>";
                }                
                $html.="</select>";
            break;

            case 'select-multiple':
                $html.=chr(13)."<label>".$value['label']."</label>
                        <select name=".$value['name']."[] MULTIPLE>";
                foreach ($value['values'] as $key => $selectValue)
                {
                    $html.="<option value=\"".$key."\">".$selectValue."</option>";
                }
                $html.="</select>";
            break;
                        
            case 'submit':
                $html.=chr(13)."<div id=\"botones\">";
                
                $html.=chr(13)."<input type=\"".$value['type']."\" 
                               name=\"".$value['name']."\"  
                              class=\"".$value['type']."\"                                   
                              value=\"".$value['defaultValue']."\" 
                         />";
                
                $html.=chr(13).'</div>';
                
            break;
         
        }
    }
        
    $html.=chr(13).'</form>';
    
    $html.=chr(13).'</div>';
    
    return $html;
}
