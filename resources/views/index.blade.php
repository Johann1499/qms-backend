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

    <!-- ***** Queue Monitoring Area Start ***** -->
    <div class="container">
        <!-- College Name -->
        <header class="text-center mb-5">
            <h1 id="queue-monitor-title" class="display-4 queue-monitor-title">Dominican College of Tarlac</h1>
        </header>

        <!-- Now Serving Section -->
        <section class="mb-5 queue-area">
            <div class="text-center mb-4">
                <h2 class="display-4 queue-monitor-title">Now Serving</h2>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 text-center mb-4">
                    <h3 class="queue-label">Basic Education</h3>
                    <p class="queue-number display-3" id="currentQueueNumberBasic" aria-live="polite">Loading...</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 text-center mb-4">
                    <h3 class="queue-label">College</h3>
                    <p class="queue-number display-3" id="currentQueueNumberCollege" aria-live="polite">Loading...</p>
                </div>
            </div>
        </section>

        <!-- Next in Line Section -->
        <section class="queue-area">
            <div class="text-center mb-4">
                <h2 class="display-4 queue-monitor-title">Next in Line</h2>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 text-center mb-4">
                    <h3 class="queue-label">Basic Education</h3>
                    <p class="queue-number small mb-2" id="nextQueueNumberBasic1" aria-live="polite">Loading...</p>
                    <p class="queue-number small mb-2" id="nextQueueNumberBasic2" aria-live="polite">Loading...</p>
                    <p class="queue-number small" id="nextQueueNumberBasic3" aria-live="polite">Loading...</p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 text-center mb-4">
                    <h3 class="queue-label">College</h3>
                    <p class="queue-number small mb-2" id="nextQueueNumberCollege1" aria-live="polite">Loading...</p>
                    <p class="queue-number small mb-2" id="nextQueueNumberCollege2" aria-live="polite">Loading...</p>
                    <p class="queue-number small" id="nextQueueNumberCollege3" aria-live="polite">Loading...</p>
                </div>
            </div>
        </section>
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
