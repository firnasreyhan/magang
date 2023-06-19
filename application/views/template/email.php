<html>
    <head>
    <meta charset="utf-8" />

  <title>Akun</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <style type="text/css">
            html{ height:100%; }
            body{ min-height:100%; padding:0; margin:0; position:relative; }

            footer{ 
                position:absolute; 
                bottom:0; 
                width:100%; 
                height:200px; 
            }


            article{ 
                width: 100%; 
                color: #444; 
            }

            header{ 
                background:#ecf0f1; 
                text-align: center;
                padding: 20px;
            }

            footer{ 
                border-top: 1px solid #abb7b7; 
            }

            .content-footer{
                padding: 5px 7px;
            }

            .content-penting{
                color: #6c7a89;
            }
        </style>
    </head>
    
    <body>
        
        <article>
            <p><strong>Akun Password</strong></p>
            <p>Yth. Bapak/Ibu <strong><?php echo $EMAIL?></strong></p>
            <p>Password Akun: <strong><?php echo $PASSWORD?></strong><p>
            <p>Terima Kasih,<br></p>
            <p>&nbsp;</p>
            <p>Admin Poinku</p>
        </article>
        <footer>
            <div class="content-footer">
                <p>&copy; 2021 <strong>Poinku</strong> All rights reserved</p>
                <hr>
                <div class="content-penting">
                    <p>PENTING!</p>
                    <p>Informasi yang disampaikan melalui e-mail ini hanya diperuntukkan bagi pihak penerima dan bersifat rahasia, jangan berikan informasi apapun kepada pihak lain demi keamanan akun Anda</p>
                </div>
                
            </div>
        </footer>
    </body>
</html>