<?php

require INC_ROOT . '/app/routes/home.php';

require INC_ROOT . '/app/routes/auth/register.php';
require INC_ROOT . '/app/routes/auth/login.php';
require INC_ROOT . '/app/routes/auth/activate.php';
require INC_ROOT . '/app/routes/auth/logout.php';

require INC_ROOT . '/app/routes/auth/password/change.php';
require INC_ROOT . '/app/routes/auth/password/recover.php';
require INC_ROOT . '/app/routes/auth/password/reset.php';

require INC_ROOT . '/app/routes/user/profile.php';
require INC_ROOT . '/app/routes/user/all.php';

require INC_ROOT . '/app/routes/account/profile.php';

require INC_ROOT . '/app/routes/admin/backlog/random.php';
require INC_ROOT . '/app/routes/admin/backlog/priority-descending.php';
require INC_ROOT . '/app/routes/admin/backlog/priority-ascending.php';
require INC_ROOT . '/app/routes/admin/backlog/storypoints-descending.php';
require INC_ROOT . '/app/routes/admin/backlog/storypoints-ascending.php';

require INC_ROOT . '/app/routes/admin/sprint/current.php';
require INC_ROOT . '/app/routes/admin/sprint/create.php';
require INC_ROOT . '/app/routes/admin/sprint/finish.php';

require INC_ROOT . '/app/routes/admin/story/add.php';
require INC_ROOT . '/app/routes/admin/story/edit.php';

require INC_ROOT . '/app/routes/admin/history/all.php';
require INC_ROOT . '/app/routes/admin/history/sprint.php';

require INC_ROOT . '/app/routes/errors/404.php';