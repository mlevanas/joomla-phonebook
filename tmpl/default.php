<?php
defined('_JEXEC') or die;

?>

<div data-ng-app="test">
    <span data-ng-controller="testController">{{message}}</span>
    <ng-view></ng-view>
</div>

<script src="<?= JUri::root(). 'modules/mod_angularjs/tmpl/main.js' ?>"
        type="text/javascript"></script>
