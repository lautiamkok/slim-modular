<?php
// Tell the container how to construct Foo.
$container->add('Monsoon\Core\Foo', function() {
    return new \Monsoon\Core\Foo(20, 40);
});
