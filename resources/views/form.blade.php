<!DOCTYPE html>
<html>
    <head>
        <title>Toto Pixel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
               
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
            label {
            	display:inline-block;
            	width:150px;
            	text-align:left;
            }
            .header {
            	text-align: right;
    			margin-right: 20px;	
    			background-color: #f1f1f1;
            }
        </style>
    </head>
    <body>
    	<div class='header'>
            <?php 
			    if (App::getLocale() == 'fr'){
			    	echo "<a href='/form/en'>English</a>";
			    }else {
			    	echo "<a href='/form/fr'>French</a>";
			    }
			   
		    ?>
		    </div>
        <div class="container">

            <div class="content">
                    @if (session('message'))
    					<div>
        					{{ session('message') }}
    					</div>
					@endif
            
                <?php 
 
                	echo Form::open(array('url' => 'form', 'files' => true));
                	echo Form::label('name', trans('messages.name'));
                	echo Form::text('name');
                	?>
                	<br />
                	<?php
                	echo Form::label('surname', trans('messages.surname'));
                	echo Form::text('surname');
                	?>
                	<br />
                	<?php 
                	echo Form::label('email', trans('messages.email'));
                	echo Form::email('email');
                	?>
                	<br />
                	<?php 
                	echo Form::label('photo', trans('messages.photo'));
                	echo Form::file('photo');
                	?>
                	<br />
                	<?php 
                	echo Form::label('message', trans('messages.message'));
                	echo Form::textarea('text');
                	?>
                	<br />
                	<?php 
                	
                	echo Form::submit('Submit');
                	echo Form::close();

                ?>
            </div>
        </div>
    </body>
</html>