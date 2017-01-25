<?php

printf("Mem at start of test (real): %d (%d)\n", memory_get_usage(), memory_get_usage(true));

for ($i = 0; $i < 1000; ++$i) {
    printf("Mem at start of loop (real): %d (%d)\n", memory_get_usage(), memory_get_usage(true));

    $lua = new Lua();
    $lua->assign('foo', function() {});
//    $lua->eval('foo()');
    printf("Mem at end of loop (real): %d (%d)\n", memory_get_usage(), memory_get_usage(true));
}

$lua = null;

printf("Mem at end of test (real): %d (%d)\n", memory_get_usage(), memory_get_usage(true));
