<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        /* Importando fontes do Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e9f5ec; /* Fundo verde suave */
            color: #333; /* Cor principal do texto */
        }
        .hero-container {
            position: relative;
            background-image: url('https://example.com/path/to/your/image.jpg'); /* Substitua pelo caminho da sua imagem */
            background-size: cover;
            background-position: center;
            color: #ffffff;
            padding: 4rem 2rem;
            text-align: center;
            margin-bottom: 2rem;
            border-radius: 0 0 10px 10px;
            z-index: 1; /* Certifique-se de que o hero container está abaixo do header */
        }
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4); /* Sobreposição escura */
            border-radius: 0 0 10px 10px;
            z-index: 0; /* Sobreposição abaixo do conteúdo */
        }
        .hero-content {
            position: relative;
            z-index: 1; /* Garante que o conteúdo seja visível acima da sobreposição */
        }
        header {
            background-color: #2f855a; /* Verde médio */
            color: #ffffff;
            padding: 1.5rem 2rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 10; /* Certifica que o header está acima do conteúdo anterior */
            position: relative; /* Mantém o header no topo */
        }
        header .container {
            background-color: transparent; /* Removendo o fundo branco */
        }
        header h1 {
            margin: 0;
            font-size: 1.8rem;
        }
        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        nav ul li {
            transition: background-color 0.3s ease;
            border-radius: 5px;
        }
        nav ul li:hover {
            background-color: #38a169; /* Verde mais claro ao hover */
        }
        nav ul li a {
            color: #ffffff;
            text-decoration: none;
            padding: 0.5rem 1rem;
            display: block;
        }
        .container {
            padding: 2rem;
            margin-bottom: 2rem;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }
        .item-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            justify-content: center;
        }
        .item {
            border: 1px solid #d3e6d9; /* Borda verde clara */
            border-radius: 10px;
            overflow: hidden;
            width: calc(33.333% - 1.5rem);
            background-color: #f0faf4; /* Fundo verde muito claro */
            transition: box-shadow 0.3s ease, transform 0.3s ease;
        }
        .item:hover {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }
        .item img {
            width: 100%;
            height: auto;
            display: block;
        }
        .item-content {
            padding: 1.5rem;
            text-align: center;
        }
        .item-content h3 {
            margin: 0;
            font-size: 1.4rem;
            color: #2f855a; /* Verde médio */
        }
        .item-content p {
            margin: 0.75rem 0 0;
            color: #555;
        }
        footer {
            background-color: #2f855a; /* Verde médio */
            color: #ffffff;
            text-align: center;
            padding: 1rem;
            position: relative;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .item {
                width: calc(50% - 1.5rem);
            }
        }
        @media (max-width: 480px) {
            .item {
                width: 100%;
            }
            header h1 {
                font-size: 1.5rem;
            }
            nav ul {
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>{{ config('app.name', 'Laravel') }}</h1>
            <nav>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="{{ url('/ciencias')}}">Ciências</a></li>
                </ul>
            </nav>
        </div>
    </header>

   

    <div class="container">
        @yield('content')
    </div>

    <footer>
        &copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.
    </footer>
</body>
</html>
