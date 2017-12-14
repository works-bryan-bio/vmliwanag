<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Hostings helper
 */
class NavigationSelectorHelper extends Helper
{

    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function __construct(View $view, $config = [])
    {
        parent::__construct($view, $config);
    }

    /*
     * Selected Main Navigation
     *
     * @param string|null $selected Navigation.
     * @return array of selected navagation with selected
     * 
     */
    public function selectedMainNavigation($selected) {
        $navigation = array(
            "dashboard" => "",
            "pages" => "",
            "abouts" => "",            
            "news" => "",
            "technicals" => "",
            "accreditations" => "",
            "products" => "",
            "groups"  => "",
            "users"   => "",  
            "slides" => "",        
            "services" => "",  
            "system_settings" => "",            
        );
        $navigation[$selected] = "active";

        return $navigation;
    }
}
