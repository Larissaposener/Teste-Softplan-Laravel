<!-- resources/views/emails/sendBolosInteresseHtmlEmail.blade.php -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interessado em Bolos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 10px 0;
            border-radius: 8px 8px 0 0;
        }
        .content {
            margin-top: 20px;
        }
        .bolo-list {
            margin-top: 20px;
        }
        .bolo-item {
            margin-bottom: 10px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Interessado em Bolos</h1>
        </div>

        <div class="content">
            <p>Olá, <strong>{{ $userName }}</strong>,</p>
            <p>Você demonstrou interesse nos seguintes bolos:</p>

            <div class="bolo-list">
                @foreach($bolos as $bolo)
                    <div class="bolo-item">
                        <strong>{{ $bolo->nome }}</strong><br>
                        Peso: {{ $bolo->peso }}kg<br>
                        Valor: R${{ number_format($bolo->valor, 2, ',', '.') }}<br>
                        Quantidade disponível: {{ $bolo->quantidade_disponivel }}<br><br>
                    </div>
                @endforeach
            </div>

            <p>Obrigado por seu interesse!</p>
        </div>

        <div class="footer">
            <p>Este e-mail foi enviado automaticamente. Não é necessário respondê-lo.</p>
        </div>
    </div>
</body>
</html>