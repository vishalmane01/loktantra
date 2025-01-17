<?php

// $fn->nonAuthPage();
?>
<head>
    <title>Villagewise | Loktantra</title>
</head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #007b5e;
            color: white;
            padding: 10px;
            text-align: center;
        }

        .container {
            padding: 20px;
        }

        
        .search-bar {
            margin-bottom: 20px;
        }

        .search-bar input {
            padding: 10px;
            width: calc(100% - 90px);
            margin-right: 10px;
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

        .search-bar button {
            padding: 10px;
            background-color: #007b5e;
            color: white;
            border: none;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007b5e;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>गावानुसार यादी</h1>
    </header>

    <div class="container">


        <table>
            <thead>
                <tr>
                    <th>अनु क्र.</th>
                    <th>गाव</th>
                    <th>एकूण</th>
                </tr>
            </thead>
            <tbody>
            <?php   
            $con = mysqli_connect("localhost","root","","voter");

                if (isset($_GET['villagewise'])) {
                    $filtervalues = mysqli_real_escape_string($con, $_GET['villagewise']); // Prevent SQL injection

                    // Adjust the query to handle NULL values and improve performance
                    $query = "SELECT * FROM villagewise WHERE CONCAT(id,village_name,total_voters) LIKE '%$filtervalues%' ";

                    $query_run = mysqli_query($con, $query);

                        if (!$query_run) {
                            die("Query failed: " . mysqli_error($con));
                        }

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $items) {
                                    ?>
                                    <tr>
                                        <td><?= $items['id']; ?></td>
                                        <td><?= $items['village_name']; ?></td>
                                        <td><?= $items['total_voters']; ?></td>                                                 
                                    </tr>
                                    <?php
                                }
                        } 
                    
                    }

                    else{
                        $query = "SELECT * FROM villagewise";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $items)
                            {
                                ?>
                                <tr>
                                    <td><?= $items['id']; ?></td>
                                    <td><?= $items['village_name']; ?></td>
                                    <td><?= $items['total_voters']; ?></td>
                                </tr>
                                <?php
                            }
                        }
                    }
                ?>
            </tbody>
        </table>
        
    </div>
    <div class="btn">
        <a href="listpage.php">
            <button>
                Back
            </button>
        </a>
    </div>

