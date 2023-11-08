<html>

<head>
    <title>Login</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
        }

        input[type="button"] {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 15px;
            background-color: #F1948A;
            color: #fff;
            border: none;
            border-radius: 1em;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
        }

        input[type="text"] {
            display: block;
            width: 50%;
            margin: 50px auto;
            padding: 10px;
            border: 1px solid #CCC;
            border-radius: 1em;
            text-align: center;
            background-color: white;
        }

        table {
            table-layout: auto;
            width: 100%;
            border-collapse: collapse;
            border: 3px solid purple;
            margin: 20px auto;
        }

        th {
            background-color: #54585d;
            color: #FED8B1;
            font-weight: bold;
            font-size: 13px;
            border: 1px solid #54585d;
            padding: 10px;
        }

        td {
            color: #636363;
            border: 1px solid #dddfe1;
            padding: 10px;
        }

        tr {
            background-color: #f9fafb;
        }

        tr:nth-child(odd) {
            background-color: #74bdb7;
        }

        tr.header,
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>

    <input type="text" id="myInput" onkeyup="searchFunction()" placeholder="Recherche par ID" title="Entrer un ID">

    <script>
        function searchFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</head>

<body>
    <a href="loanPage.php">
        <input type="button" value="Page de Prêt" class="displayDataClass" />
    </a>

    <table id="myTable">
        <tr>
            <th>Nom</th>
            <th>ID Abonné</th>
            <th>Occupation</th>
            <th>Age</th>
            <th>ID Document</th>
            <th>Titre de Document</th>
            <th>Type de Document</th>
            <th>Auteur de Document</th>
            <th>Date de Prêt</th>
            <th>Date de Retour</th>
        </tr>
        <?php
        $host = "localhost";
        $user = "root";
        $password = '';
        $db_name = "loanp";

        $con = mysqli_connect($host, $user, $password, $db_name);

        $sql = " SELECT * FROM loanInfo";
        $result = mysqli_query($con, $sql);

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc(($result))) {
                if ($row['Name'] == "") {
                    continue;
                }
                echo "<tr>
                        <td>" . $row['Name'] . "</td>
                        <td>" . $row['PersonID'] . "</td>
                        <td>" . $row['Occupation'] . "</td>
                        <td>" . $row['Age'] . "</td>
                        <td>" . $row['BookID'] . "</td>
                        <td>" . $row['BookTitle'] . "</td>
                        <td>" . $row['BookType'] . "</td>
                        <td>" . $row['BookAuthor'] . "</td>
                        <td>" . $row['LoanDate'] . "</td>
                        <td>" . $row['ReturnDate'] . "</td>
                      </tr>";
            }
        }
        ?>
    </table>
</body>

</html>
