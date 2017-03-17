<?php

remove_integration_function('integrate_pre_include', '$sourcedir/cs_source/hook_function/IntegrateAction.php', true);
remove_integration_function('integrate_actions', 'csIntegrateAction', true);

remove_integration_function('integrate_pre_include', '$sourcedir/cs_source/hook_function/IntegrateMenu.php', true);
remove_integration_function('integrate_menu_buttons', 'csIntegrateMenu', true);
