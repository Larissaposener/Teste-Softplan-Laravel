
php artisan makke:job nomejob
php artisan make:controller NomeControle
php artisan make:viwe nomedaview
php artisan make:model nomemodel -- onde fica a tabela que será manipulada e o nome dos campos que serão manipulados
php artisan make:mail nomearquivo -- dentro da pasta mail, add na controller
php artisan make:job nomejob --agendamento do envio do email assim fica mais leve a pagina
php artisan queue:work --queue=default -- roda o job

rodar job php artisan queue:work --queue=default

JobSendWelcomeEmail::dispatch($user->id)->onQueue('default'); -- default é o nome da fila quardada em queue no banco