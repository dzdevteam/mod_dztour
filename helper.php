<?php
// no direct access
defined('_JEXEC') or die;


abstract class modDZTourHelper
{    
    public static function getTours($params)
    {
        // Get the model
        JModelLegacy::addIncludePath(JPATH_SITE.'/components/com_dztour/models/');
        $model = JModelLegacy::getInstance('Tours', 'DZTourModel', array('ignore_request' => true));
        
        if ($model) {
            $model->setState($params);
            
            // Filtering
            $model->setState('filter.language', JLanguageMultilang::isEnabled());
            $model->setState('filter.access', true);
            
            $type = $params->get('tours_typeid');
            if ($type) $model->setState('filter.typeid', $type);
            
            $location = $params->get('tours_locationid');
            if ($location) $model->setState('filter.locationid', $location);
            
            $model->setState('filter.display_items', $params->get('tours_display_items', 'all'));
            
            foreach ($params->get('tours_special_types', array('featured')) as $type)
                $model->setState('filter.' . $type, true);
            
            $tags = $params->get('tours_tags', array());
            if (!empty($tags) && is_array($tags))
                $model->setState('filter.tags', $tags);
            
            // Ordering
            $model->setState('list.ordering', $params->get('tours_order_by', 'created'));
            $model->setState('list.direction', $params->get('tours_order_direction', 'DESC')); 
            $model->setState('list.limit', $params->get('tours_limit'));
            
            // Get products
            return $model->getItems();
        }
    }
}
