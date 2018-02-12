<!DOCTYPE html>
<html>
    <head>
        <?php include 'include/meta_include.php' ?>
        <meta charset="utf-8">
        <title>Testing</title>
        <?php include 'include/css_include.php' ?>
        <style media="screen">
            .graph{
                max-width: 500px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="graph">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div>
        </div>
        <?php include 'include/js_include.php' ?>
        <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Question 1", "Question 2", "Question 3", "Question 4","Question 5"],
                datasets: [{
                    label: 'Students',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },

            options: {
                title: {
                   display: true,
                   text: 'Class Test : Sets'
               },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        </script>

    </body>
</html>
