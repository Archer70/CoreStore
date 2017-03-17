<?php

add_integration_function('integrate_pre_include', '$sourcedir/cs_source/hook_function/IntegrateAction.php', true);
add_integration_function('integrate_actions', 'csIntegrateAction', true);

add_integration_function('integrate_pre_include', '$sourcedir/cs_source/hook_function/IntegrateMenu.php', true);
add_integration_function('integrate_menu_buttons', 'csIntegrateMenu', true);
