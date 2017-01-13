<?php

remove_integration_hook('integrate_pre_include', '$sourcedir/cs_source/hook_function/IntegrateAction.php', true);
remove_integration_hook('integrate_actions', 'csIntegrateAction', true);
