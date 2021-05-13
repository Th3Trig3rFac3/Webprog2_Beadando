<?php
db_execute('DELETE FROM posts WHERE Id = :id', [':id' => $_GET['r']]);
