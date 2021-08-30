<?php

require 'core/Router.php';
require 'core/database/connection.php';
require 'core/database/querybuilder.php';

return new QueryBuilder(
    Connection::make()
);