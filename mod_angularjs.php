<?php

defined('_JEXEC') or die;

$doc = JFactory::getDocument();
$doc->addScript('https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.min.js');
$doc->addScript('https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular-route.min.js');

require JModuleHelper::getLayoutPath('mod_angularjs', $params->get('layout', 'default'));
