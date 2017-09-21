<?php
// Tell the container how to construct TimestampVisitor.
$container->add('Monsoon\Core\Utils\TimestampConvertor', function() use ($container) {
    $convertor = new \Monsoon\Core\Utils\TimestampConvertor();
    $convertor->setFormat("d-m-Y h:i:s A");

    $settings = $container->get("settings");
    $convertor->setTimezone($settings['timezone']);
    return $convertor;
});
