<?php
/**
 * @version     1.0.0
 * @package     mod_dztour
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      DZ Team <support@dezign.vn> - dezign.vn
 */
 
// no direct access
defined('_JEXEC') or die;
?>
<div class="dztour-module<?php echo $moduleclass_sfx; ?>">
    <ul>
        <?php foreach ($tours as $tour) : ?>
        <li><a href="<?php echo $tour->link; ?>" ><?php echo $tour->title; ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>