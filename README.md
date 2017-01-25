# PoC for memory leak in the PHP LUA extension

    $ cat /etc/issue
    Ubuntu 16.04.1 LTS \n \l

    $ php -v
    PHP 7.0.13-0ubuntu0.16.04.1 (cli) ( NTS )
    Copyright (c) 1997-2016 The PHP Group
    Zend Engine v3.0.0, Copyright (c) 1998-2016 Zend Technologies
        with Zend OPcache v7.0.13-0ubuntu0.16.04.1, Copyright (c) 1999-2016, by Zend Technologies

    $ dpkg -s liblua5.2-dev | grep Version
    Version: 5.2.4-1ubuntu1

    $ php -i | grep '^lua '
    lua support => enabled
    lua extension version => 2.0.2
    lua release => Lua 5.2.4
    lua copyright => Lua 5.2.4  Copyright (C) 1994-2015 Lua.org, PUC-Rio
    lua authors => R. Ierusalimschy, L. H. de Figueiredo, W. Celes

    $ php test-assign.php
    Mem at start of test (real): 362920 (2097152)
    Mem at start of loop (real): 362952 (2097152)
    Mem at end of loop (real): 363712 (2097152)
    Mem at start of loop (real): 363712 (2097152)
    Mem at end of loop (real): 364032 (2097152)
    (...)
    Mem at start of loop (real): 719296 (2097152)
    Mem at end of loop (real): 719616 (2097152)
    Mem at start of loop (real): 719616 (2097152)
    Mem at end of loop (real): 719936 (2097152)
    Mem at end of test (real): 719888 (2097152)

    $ php test-registerCallback.php
    Mem at start of test (real): 363080 (2097152)
    Mem at start of loop (real): 363112 (2097152)
    Mem at end of loop (real): 363872 (2097152)
    Mem at start of loop (real): 363872 (2097152)
    Mem at end of loop (real): 364192 (2097152)
    (...)
    Mem at start of loop (real): 719456 (2097152)
    Mem at end of loop (real): 719776 (2097152)
    Mem at start of loop (real): 719776 (2097152)
    Mem at end of loop (real): 720096 (2097152)
    Mem at end of test (real): 720048 (2097152)
