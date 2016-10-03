<?php
    require 'vendor/autoload.php';
    $firebase = Firebase::fromServiceAccount(__DIR__.'/NaSuaKZ-1a5bc00fa66e.json');
    $database = $firebase->getDatabase();
    $root = $database->getReference('/');
    $completeSnapshot = $root->getSnapshot();
    $root->getChild('users')->push([
    'username' => uniqid('user',
    true
    ),
    'email' => uniqid('email',
    true
    ).'@domain.tld'
    ]);
    $users = $database->getReference('users');
    $sortedUsers = $users
    ->orderByChild('username', SORT_DESC)
    ->limitToFirst(10)
    ->getValue();
    // shortcut for ->getSnapshot()->getValue()
    $users->remove();
?>