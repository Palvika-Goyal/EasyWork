<html>

<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="JS/jquery-1.8.2.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <title>document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">


    <link rel=stylesheet href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        const ratings = {
            hotel_a: 2.8,
            hotel_b: 3.3,
            hotel_c: 1.9,
            hotel_d: 4.3,
            hotel_e: 4.74
        };
        const starTotal = 5;

        for (const rating in ratings) {
            // 2
            const starPercentage = (ratings[rating] / starTotal) * 100;
            // 3
            const starPercentageRounded = `${(Math.round(starPercentage / 10) * 10)}%`;
            // 4
            document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded;
        }

    </script>
    <style>
        table {
            margin: 0 auto;
            text-align: center;
            border-collapse: collapse;
            border: 1px solid #d4d4d4;
            font-size: 20px;
            background: #fff;
        }

        table th,
        table tr:nth-child(2n+2) {
            background: #e7e7e7;
        }

        table th,
        table td {
            padding: 20px 50px;
        }

        table th {
            border-bottom: 1px solid #d4d4d4;
        }

    </style>
    <style>
        .stars-outer {
            display: inline-block;
            position: relative;
            font-family: FontAwesome;
        }

        .stars-outer::before {
            content: "\f006 \f006 \f006 \f006 \f006";
        }

        .stars-inner {
            position: absolute;
            top: 0;
            left: 0;
            white-space: nowrap;
            overflow: hidden;
            width: 50%;
        }

        .stars-inner::before {
            content: "\f005 \f005 \f005 \f005 \f005";
            color: #f8ce0b;
        }

    </style>
</head>
<table>
    <thead>
        <tr>
            <th>Hotel</th>
            <th>Rating</th>
        </tr>
    </thead>
    <tbody>
        <tr class="hotel_a">
            <td>Hotel A</td>
            <td>
                <div class="stars-outer">
                    <div class="stars-inner"></div>
                </div>
            </td>
        </tr>
        <tr class="hotel_b">
            <td>Hotel B</td>
            <td>
                <div class="stars-outer">
                    <div class="stars-inner"></div>
                </div>
            </td>
        </tr>
        <tr class="hotel_c">
            <td>Hotel C</td>
            <td>
                <div class="stars-outer">
                    <div class="stars-inner"></div>
                </div>
            </td>
        </tr>
        <tr class="hotel_d">
            <td>Hotel D</td>
            <td>
                <div class="stars-outer">
                    <div class="stars-inner"></div>
                </div>
            </td>
        </tr>
        
        
        <tr class="hotel_e">
            <td>Hotel E</td>
            <td>
                <div class="stars-outer">
                    <div class="stars-inner"></div>
                </div>
            </td>
        </tr>

        <!-- 3 more rows here -->

    </tbody>
</table>

</html>
