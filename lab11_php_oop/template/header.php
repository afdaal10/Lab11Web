<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Framework PHP OOP - Lab 11</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .header { background-color: #333; color: white; padding: 20px; text-align: center; }
        .nav { background-color: #444; padding: 10px; }
        .nav ul { list-style: none; display: flex; justify-content: center; gap: 20px; }
        .nav a { color: white; text-decoration: none; padding: 5px 15px; }
        .nav a:hover { background-color: #555; }
        .container { max-width: 1200px; margin: 20px auto; background-color: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .alert { padding: 15px; margin-bottom: 20px; border-radius: 4px; }
        .alert-success { background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-danger { background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table td { padding: 10px; }
        input[type="text"], input[type="password"], input[type="email"], textarea, select {
            width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;
        }
        input[type="submit"], .btn {
            background-color: #007bff; color: white; padding: 10px 20px; border: none;
            border-radius: 4px; cursor: pointer; text-decoration: none; display: inline-block;
        }
        input[type="submit"]:hover, .btn:hover { background-color: #0056b3; }
        .btn-success { background-color: #28a745; }
        .btn-success:hover { background-color: #218838; }
        .btn-danger { background-color: #dc3545; }
        .btn-danger:hover { background-color: #c82333; }
        .data-table { width: 100%; border: 1px solid #ddd; }
        .data-table th, .data-table td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        .data-table th { background-color: #007bff; color: white; }
        .data-table tr:hover { background-color: #f5f5f5; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Framework PHP OOP - Praktikum 11</h1>
    </div>
    <div class="nav">
        <ul>
            <li><a href="index.php?mod=home&page=index">Home</a></li>
            <li><a href="index.php?mod=artikel&page=index">Artikel</a></li>
            <li><a href="index.php?mod=artikel&page=tambah">Tambah Artikel</a></li>
            <li><a href="index.php?mod=user&page=index">User</a></li>
            <li><a href="index.php?mod=user&page=tambah">Tambah User</a></li>
        </ul>
    </div>
    <div class="container">