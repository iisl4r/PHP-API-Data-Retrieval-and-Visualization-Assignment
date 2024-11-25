<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UOB Student Nationality Data</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>

    <main class="container my-4">

        <header>
            <h1 class="mb-4">UOB Students Enrolled According To Their Nationalities</h1>
        </header>

        <?php
        // API URL
        $URL = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

        // Fetching data
        $response = file_get_contents($URL);

        // Decode response to get records
        $data = json_decode($response, true);
        $records = $data['results'];
        ?>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <!-- thead -->
                <thead>
                    <tr>
                        <!-- TABLE TH -->
                        <th scope="col">Year</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Program</th>
                        <th scope="col">Nationality</th>
                        <th scope="col">College</th>
                        <th scope="col">Number of Students</th>
                    </tr>
                    <!-- thead end -->
                </thead>

                <!-- tbody -->
                <tbody>
                    <?php
                    // Iterate over records
                    foreach ($records as $record) {
                        echo '<tr>';
                        echo '<td>' . $record['year'] . '</td>';
                        echo '<td>' . $record['semester'] . '</td>';
                        echo '<td>' . $record['the_programs'] . '</td>';
                        echo '<td>' . $record['nationality'] . '</td>';
                        echo '<td>' . $record['colleges'] . '</td>';
                        echo '<td>' . $record['number_of_students'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                    <!-- tbody end -->
                </tbody>
            </table>
        </div>

    </main>

</body>

</html>