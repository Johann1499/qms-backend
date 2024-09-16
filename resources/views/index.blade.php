<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Queue Monitoring">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">

    <title>Queue Monitoring System</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-softy-pinko.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>

<body>

    <!-- ***** Queue Monitoring Area Start (in Welcome Area) ***** -->
    <div class="welcome-area" id="monitor">
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center">
                        <h1>Dominican College of Tarlac</h1>
                    </div>
                </div>
                <!-- Start of Queue Area -->
                <div class="row queue-area">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                        <div class="queue-label">Now Serving (Basic Education)</div>
                        <div class="queue-number" id="currentQueueNumberBasic">Loading...</div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                        <div class="queue-label">Now Serving (College)</div>
                        <div class="queue-number" id="currentQueueNumberCollege">Loading...</div>
                    </div>
                </div>

                <!-- Display Next 3 Queue Numbers -->
                <div class="row queue-area">
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                        <div class="queue-label">Next in Line (Basic Education)</div>
                        <div class="queue-number small" id="nextQueueNumberBasic1">Loading...</div>
                        <div class="queue-number small" id="nextQueueNumberBasic2">Loading...</div>
                        <div class="queue-number small" id="nextQueueNumberBasic3">Loading...</div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                        <div class="queue-label">Next in Line (College)</div>
                        <div class="queue-number small" id="nextQueueNumberCollege1">Loading...</div>
                        <div class="queue-number small" id="nextQueueNumberCollege2">Loading...</div>
                        <div class="queue-number small" id="nextQueueNumberCollege3">Loading...</div>
                    </div>
                </div>
                <!-- End of Queue Area -->
            </div>
        </div>
    </div>
    <!-- ***** Queue Monitoring Area End ***** -->

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Script to Update Queue Numbers -->
    <script src="{{ asset('assets/js/queue.js') }}"></script>
</body>

</html>
``
