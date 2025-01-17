<?php
$title = "Search | Loktantra";
// $fn->nonAuthPage();
?>
<head>
    <title>Search | Loktantra</title>
</head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }

        .container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 10px;
            border-radius: 5px;
        }

        h1 {
            background-color: #4caf50;
            color: white;
            text-align: center;
            padding: 10px 0;
            font-size: 24px;
            margin: 0;
        }

        .search-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            gap: 10px;
        }

        .search-container input[type="text"] {
            flex: 1;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            min-width: 150px;
        }

        .search-container button {
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            flex-shrink: 0;
        }

        .search-container button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
            overflow-x: auto;
            display: block;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
            white-space: nowrap;
        }
        .btn {
            display: flex;
            justify-content: end;
            align-items: end;
        }

         button {
            margin-right: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color:green;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

         button:hover {
            background-color: green;
        }
        table th {
            background-color: #4caf50;
            color: white;
        }

        table td:first-child {
            text-align: center;
        }

        .indicator {
            height: 10px;
            width: 10px;
            display: inline-block;
            border-radius: 50%;
        }

        .green-indicator {
            background-color: green;
        }

        .yellow-indicator {
            background-color: yellow;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 20px;
                padding: 8px 0;
            }

            .container {
                padding: 10px;
            }

            .search-container {
                flex-direction: column;
                gap: 5px;
            }

            .search-container input[type="text"], 
            .search-container button {
                width: 100%;
            }

            table th, table td {
                padding: 8px;
                font-size: 12px;
            }

            table {
                font-size: 12px;
                overflow-x: auto;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 18px;
            }

            .search-container input[type="text"], 
            .search-container button {
                padding: 8px;
                font-size: 12px;
            }

            table th, table td {
                padding: 6px;
                font-size: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>नावानुसार यादी</h1>
        
        <form action="" method="GET">
            <div class="search-container">
                            <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="पूर्ण नाव शोधा... ">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <div style="overflow-x: auto;">
            <table id="editableTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Card Number</th>
                    </tr>
                </thead>

                <tbody>
                    <?php   
                        $con = mysqli_connect("localhost","root","","voter");

                            if (isset($_GET['search'])) {
                                $filtervalues = mysqli_real_escape_string($con, $_GET['search']); // Prevent SQL injection

                                // Adjust the query to handle NULL values and improve performance
                                $query = "SELECT * FROM search WHERE CONCAT(id,full_name,age,gender,address,mobile,card_number) LIKE '%$filtervalues%' ";

                                $query_run = mysqli_query($con, $query);

                                    if (!$query_run) {
                                        die("Query failed: " . mysqli_error($con));
                                    }

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $items) {
                                            ?>
                                            <tr>
                                                <td><?= $items['id']; ?></td>
                                                <td><?= $items['full_name']; ?></td>
                                                <td><?= $items['age']; ?></td>
                                                <td><?= $items['gender']; ?></td>
                                                <td><?= $items['address']; ?></td>
                                                <td><?= $items['mobile']; ?></td>
                                                <td><?= $items['card_number']; ?></td>
                                                </tr>
                                            <?php
                                        }
                                    } 
                                
                                }

                                else{
                                    $query = "SELECT * FROM search";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $items)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $items['id']; ?></td>
                                                <td><?= $items['full_name']; ?></td>
                                                <td><?= $items['age']; ?></td>
                                                <td><?= $items['gender']; ?></td>
                                                <td><?= $items['address']; ?></td>
                                                <td><?= $items['mobile']; ?></td>
                                                <td><?= $items['card_number']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                </tbody>
            </table>
            <div class="btn">
                <a href="index.php"> <button >Back </button></a>
            </div>
        </div>
    </div>


</body>
</html>
