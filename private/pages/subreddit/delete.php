<?php
db_execute('DELETE FROM subreddits WHERE id = :id', [':id' => $_GET['r']]);
