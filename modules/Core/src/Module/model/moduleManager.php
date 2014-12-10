<?php

class Core_src_Module_model_moduleManager
{
    /**
     * Return modules merge configuration
     * 
     * @param string $configfile
     */
    public static function moduleManager($configfile)
    {
        include $configfile;
        
        foreach ($config['modules'] as $module)
        {
            $globalConfig=array();
            $localConfig=array();
            
            $globalfile = __DIR__.'/../../../../../config/autoload/'
                          .strtolower($module).'.global.php';
            if(file_exists($globalfile))
            {
                include ($globalfile);
                $globalConfig = $config;
            }
            
            $localfile = __DIR__.'/../../../../../config/autoload/'
                        .strtolower($module).'.local.php';
            if(file_exists($localfile))
            {
                include ($localfile);
                $localConfig = $config;
            }
            $config = array_replace_recursive($globalConfig,$localConfig);
        }
        return $config;
    }
}