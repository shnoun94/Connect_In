<?php
echo "<pre>";
echo "DIR: " . __DIR__ . "\n";
echo "ROOT: " . dirname(__DIR__) . "\n";
echo "FILES: ";
print_r(scandir(dirname(__DIR__)));
echo "</pre>";
