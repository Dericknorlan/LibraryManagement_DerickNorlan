<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newspapers List</title>
    <style>
        /* Atur body dan margin */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Navbar Styling */
        nav {
            position: fixed; /* Mengatur navbar agar tetap di atas */
            top: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            padding: 10px 0;
            text-align: center;
            z-index: 1000; /* Pastikan navbar selalu berada di atas konten */
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 14px 20px;
            margin: 0 10px;
            display: inline-block;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #4CAF50;
        }

        /* Container untuk tabel dan tombol */
        .container {
            width: 80%;
            max-width: 1200px;
        }

        /* Tabel styling */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Styling header tabel */
        th {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            text-align: left;
        }

        /* Styling untuk data dalam tabel */
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        /* Hover effect untuk baris tabel */
        tr:hover {
            background-color: #f2f2f2;
        }

        /* Styling untuk baris ganjil dan genap */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        /* Styling untuk tombol ASC dan DESC */
        .sort-buttons {
            margin-bottom: 20px;
            text-align: center;
        }

        .sort-buttons a {
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .sort-buttons a:hover {
            background-color: #45a049;
        }

        /* Styling untuk tabel saat ukuran layar lebih kecil */
        @media screen and (max-width: 768px) {
            table {
                width: 100%;
            }
            th, td {
                padding: 8px;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <a href="{{ url('/books') }}">Books</a>
        <a href="{{ url('/cd') }}">CDs</a>
        <a href="{{ url('/journals') }}">Journals</a>
        <a href="{{ url('/newspapers') }}">Newspapers</a>
        <a href="{{ url('/finalYearProject') }}">Final Year Project</a>
    </nav>

    <div class="container">
        <!-- Tombol ASC dan DESC -->
        <div class="sort-buttons">
            <a href="{{ url('/newspapers/asc') }}">Sort ASC</a>
            <a href="{{ url('/newspapers/desc') }}">Sort DESC</a>
        </div>

        <!-- Tabel Newspapers -->
        <table>
            <tr>
                <th>Title</th>
                <th>Publisher</th>
                <th>Editor</th>
                <th>Date of Publication</th>
                <th>ISSN</th>
            </tr>
            @foreach($newspapers as $newspaper)
            <tr>
                <td>{{ $newspaper->title }}</td>
                <td>{{ $newspaper->publisher }}</td>
                <td>{{ $newspaper->editor }}</td>
                <td>{{ $newspaper->dateOfPublication }}</td>
                <td>{{ $newspaper->ISSN }}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
