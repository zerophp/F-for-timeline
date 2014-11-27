<html>
<head>
    <title>Formulario</title>
    <style type="text/css">
        body {
        	font-family: Verdana, Arial, sans-serif;
        	font-size: 100%;
        	background: #FFF;
        }
        #formulario {
            width: 320px;
            background: #F9F1E6;
            border-style: solid;
            border-width: 1px;
            border-color: #663300;
        }
        form {
        	margin: 10px;
        }
        .titulo {
        	text-align: center;
        	margin: 5 auto;
        }
        fieldset {}
        label {
            display: block;
        	margin-top: 15px;
        }
        input {
        	display: block;
        	width: 22.5em;
        	height: 1.8em;
        }
        textarea {
        	width: 100%;
        	display: block;
        }
        textarea:hover, textarea:focus, textarea:visited, input:hover, input:focus, input:visited {}
        select {
        	width: 11em;
        }
        #botones {
        	margin-top: 20px;
        	padding: 10px;
        	background: #ECD2B0;
        }
        .submit {
        	margin: auto;
            width: 6em;
        }
        .submit:hover {
        	cursor: pointer;
        }    
    </style>

<body>
<?php
include_once 'forms/timelineForm.php';
include_once 'drawForm.php';

echo drawForm($timeline_form, 'action.php');
?>
</body>
</head>
</html>