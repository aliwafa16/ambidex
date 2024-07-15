<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <link rel="shortcut icon" href="https://survey.actconsulting.co/assets/images/act.png" type="image/x-icon" />

    <!-- Jquery -->
    <script src="<?= base_url('assets/jquery/jquery-3.7.1.js') ?>"></script>

    <!-- Wizard -->
    <link href="<?= base_url('assets/wizards') ?>/dist/css/smart_wizard_dots.css" rel="stylesheet" type="text/css" />

    <!-- Alert -->
    <link rel="stylesheet" href="<?= base_url('assets/alerts/style.css') ?>">

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Load Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <title><?= NAME_APL ?></title>

    <style>
        .table-container {
            width: 100%;
            border-collapse: collapse;
        }

        .table-container td {
            padding: 10px;
            text-align: center;
            vertical-align: top;
        }

        .radio-label {
            display: block;
            text-align: center;
            margin-top: 5px;
            /* Ruang antara radio button dan label */
        }

        .radio-input {
            transform: scale(2.3);

        }

        blockquote p {
            font-size: 18px !important;
        }

        .gradient-bg- {
            color: #000;
            background: linear-gradient(145deg, #5a68ff 31%, #002a8e 92%);
        }

        .gradient-bg {
            background-image: radial-gradient(circle farthest-corner at 0.2% 0.5%, rgba(68, 36, 164, 1) 3.7%, rgba(84, 212, 228, 1) 92.7%);
        }

        .table-container td label {
            color: #070F2B;
            font-weight: 650;
        }

        .results-mood p {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 1px;
        }

        body {
            background-color: #E9F6FF !important;
            font-family: 'Poppins', sans-serif !important;
        }


        /* // Extra small devices (portrait phones, less than 576px) */
        @media (max-width: 575.98px) {
            .table-container td label {
                font-size: 12px;
                font-weight: 650;
            }

            .table-container td {
                width: auto !important;
                /* Remove width on small screens */
            }

            .radio-input {
                transform: scale(2.0);
            }

            blockquote p {
                font-size: 16px;
            }

            .results-mood p {
                font-size: 16px;
                font-weight: 500;
            }
        }

        /* // Small devices (landscape phones, 576px and up) */
        @media (min-width: 576px) and (max-width: 767.98px) {}

        /* // Medium devices (tablets, 768px and up) */
        @media (min-width: 768px) and (max-width: 991.98px) {}

        /* // Large devices (desktops, 992px and up) */
        @media (min-width: 992px) and (max-width: 1199.98px) {}

        /* // Extra large devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) {}
    </style>
</head>

<body>
    <nav class="navbar navbar-light gradient-bg">
        <h3 class="mx-auto text-center text-white"><?= NAME_APL ?></h3>
    </nav>

    <div class="container">
        <div class="row align-items-center mt-5 justify-content-center">
            <div class="col-md-10">
                <div class="mb-2 border-primary card shadow ">
                    <div class="card-header gradient-bg">
                        <blockquote class="blockquote">
                            <h4 class="text-light text-center">Hasil</h4>
                            <h2 class="mb-0 text-center font-weight-bold text-light"><?= $transaksi['f_survey_username'] ?></h2>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10">
                <div class="mb-4 border-primary card shadow ">
                    <div class="card-header gradient-bg">
                        <blockquote class="blockquote">
                            <h4 class="text-light text-center">Five Traits</h4>
                        </blockquote>
                    </div>
                    <div class="card-body">
                        <canvas id="myPolarChart" class="text-center" width="200" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center">
            <div class="col-md-10">
                <div class="mb-4 border-primary card shadow ">
                    <div class="card-header gradient-bg">
                        <blockquote class="blockquote">
                            <h4 class="text-light text-center">Mood Detector</h4>
                        </blockquote>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-10">
                                <img src="<?= base_url('assets/emote2.jpg') ?>" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="row justify-content-between text-center results-mood">
                            <div class="col-6 text-left text-danger">
                                <p>Mood Negatif</p>
                                <p><?= $survey['distribusi_mood'][0]['mood_negatif'] ?></p>
                            </div>
                            <div class="col-6 text-right text-success">
                                <p>Mood Positif</p>
                                <p><?= $survey['distribusi_mood'][0]['mood_positif'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <nav class="navbar fixed-bottom navbar-light gradient-bg">
    </nav>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->

    <!-- Wizards -->
    <script src="https://cdn.jsdelivr.net/npm/smartwizard@6/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>

    <!-- Alerts -->
    <script src="<?= base_url('assets/alerts/cute-alert.js') ?>"></script>

    <script>
        // Data untuk Polar Area Chart
        const data = {
            labels: <?= json_encode($label_chart)  ?>,
            datasets: [{
                label: 'My First Dataset',
                data: <?= json_encode($data_value_chart) ?>,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(75, 192, 192)',
                    'rgb(255, 205, 86)',
                    'rgb(153, 102, 255)',
                    'rgb(54, 162, 235)'
                ]
            }]
        };

        // Konfigurasi Polar Area Chart
        const config = {
            type: 'polarArea',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.label + ': ' + context.raw;
                            }
                        }
                    }
                }
            }
        };

        // Inisialisasi Chart
        const myPolarChart = new Chart(
            document.getElementById('myPolarChart'),
            config
        );
    </script>
</body>

</html>