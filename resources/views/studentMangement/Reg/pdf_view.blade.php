<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
</head>
<body>

<style>
    @import url(https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=fallback);

main {
  font-family: "Inter", sans-serif;
  color: #343a40;
  line-height: 1;
  display: flex;
  justify-content: center;
}
    table {
  width: 700px;
  margin: 50px auto;
  border-collapse: collapse;
  font-size: 14px

}

td,
th {
  padding: 16px 24px;
  text-align: left;

}

thead tr {
  background-color: #233B6E;
  color: #fff;
}


tbody tr:nth-child(odd) {
  background-color: #f8f9fa;
}

tbody tr:nth-child(even) {
  background-color: #e9ecef;
}

</style>
    <main>

        <table>
            <thead>
              <tr>
                <th>SI</th>
                <th>Student Details</th>
                <th>Student Data</th>

              </tr>
            </thead>
            <tbody>
              <tr>
                <th>1</th>
                <td>Student Name</td>
                <td>{{ $detail["student"]->name }}</td>

              </tr>
              <tr>
                <th>2</th>
                <td>Mother Name</td>
                <td>{{ $detail["student"]->mname }}</td>

              </tr>
              <tr>
                <th>3</th>
                <td>Father Name</td>
                <td>{{ $detail["student"]->fname }}</td>

              </tr>
              <tr>
                <th>4</th>
                <td>Gender</td>
                <td>{{ $detail["student"]->gender }}</td>

              </tr>
              <tr>
                <th>5</th>
                <td>Address</td>
                <td>{{ $detail["student"]->address }}</td>

              </tr>
              <tr>
                <th>6</th>
                <td>Mobile Number</td>
                <td>{{ $detail["student"]->mobile }}</td>

              </tr>
              <tr>
                <th>7</th>
                <td>Date Of Birth</td>
                <td>{{ $detail["student"]->dob }}</td>

              </tr>
              <tr>
                <th>8</th>
                <td>Year</td>
                <td>{{ $detail["year"]->name }}</td>

              </tr>
              <tr>
                <th>9</th>
                <td>Class</td>
                <td>{{ $detail["class"]->name }}</td>

              </tr>
              <tr>
                <th>9</th>
                <td>Group</td>
                <td>{{ $detail["group"]->name }}</td>

              </tr>

            </tbody>
          </table>






    </main>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
