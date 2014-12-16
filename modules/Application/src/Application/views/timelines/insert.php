<?php

include_once (__DIR__ . '/../../../forms/timelineForm.php');
include_once (__DIR__ . '/../../../drawForm.php');

echo drawForm($timeline_form, 'action.php');
