<?php
$title = "";
// $fn->nonAuthPage();
?>
<head>
    <title>List | Loktantra</title>
</head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
         
        .button-section {
            padding: 20px;
            text-align: center;
            background-color: #f4f4f4;
        }
        .button-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            margin: 20px 0;
        }
        
        .button {
            display: inline-block;
            padding: 15px 30px;
            background-color: #0056b3;
            color: white;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            border-radius: 50px;
            border: none;
            transition: transform 0.2s, background-color 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .button:hover {
            background-color: #003d80;
            transform: scale(1.05);
        }
    </style>

    <div class="button-section">
        <h1>याध्या</h1>
        <div class="button-container">
            <a href="namewise.php" class="button">नावानुसार यादी</a>
            <a href="villagewise.php" class="button">गावानुसार यादी</a>
            <a href="/search.html" class="button">वयानुसार यादी</a>
            <a href="/search.html" class="button">मोबाईल नं. असलेले</a>
            <a href="/search.html" class="button">आडनावानुसार यादी</a>
            <a href="#" class="button">पत्न्यांनुसार यादी</a>
            <a href="#" class="button">दुबार मतदार</a>
            <a href="#" class="button">वाढदिवसा नुसार यादी</a>
            <a href="#" class="button">जाती नुसार यादी</a>
            <a href="#" class="button">समर्थन नुसार यादी</a>
            <a href="#" class="button">नगरनुसार यादी</a>
            <a href="#" class="button">सोसायटीनुसार यादी</a>
            <a href="#" class="button">पदा नुसार यादी</a>
            <a href="#" class="button">कार्यकर्त्यानुसार यादी</a>
        </div>
        
    </div>
