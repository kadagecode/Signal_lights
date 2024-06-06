<!DOCTYPE html>
<html>
<head>
    <title>Signal Lights</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .signal { width: 50px; height: 50px; border-radius: 50%; background: red; margin-bottom: 10px; }
        #A { background: red; }
        #B { background: red; }
        #C { background: red; }
        #D { background: red; }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Signal Lights</h1>
        <form id="signalForm" class="mb-4">
            @csrf
            <div class="row">
                <div class="col-md-3 text-center">
                    <div class="signal" id="A"></div>
                    <div class="form-group">
                        <label for="sequence_a"> A:</label>
                        <input type="number" class="form-control" name="sequence_a" id="sequence_a" max="4" min="1" required>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="signal" id="B"></div>
                    <div class="form-group">
                        <label for="sequence_b"> B:</label>
                        <input type="number" class="form-control" name="sequence_b" id="sequence_b" max="4" min="1" required>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="signal" id="C"></div>
                    <div class="form-group">
                        <label for="sequence_c"> C:</label>
                        <input type="number" class="form-control" name="sequence_c" id="sequence_c" max="4" min="1" required>
                    </div>
                </div>
                <div class="col-md-3 text-center">
                    <div class="signal" id="D"></div>
                    <div class="form-group">
                        <label for="sequence_d"> D:</label>
                        <input type="number" class="form-control" name="sequence_d" id="sequence_d" max="4" min="1" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="green_interval">Green Interval (seconds):</label>
                <input type="number" class="form-control" name="green_interval" id="green_interval" required>
            </div>
            <div class="form-group">
                <label for="yellow_interval">Yellow Interval (seconds):</label>
                <input type="number" class="form-control" name="yellow_interval" id="yellow_interval" required>
            </div>
            <button type="button" id="startButton" class="btn btn-success">Start</button>
            <button type="button" id="stopButton" class="btn btn-danger">Stop</button>
        </form>
    </div>

<script>
        $(document).ready(function() {
            let signals = [];
            let timer;
            let signalIndex = 0;

            $('#startButton').on('click', function() {
                const sequence_a = $('#sequence_a').val();
                const sequence_b = $('#sequence_b').val();
                const sequence_c = $('#sequence_c').val();
                const sequence_d = $('#sequence_d').val();
                const green_interval = $('#green_interval').val();
                const yellow_interval = $('#yellow_interval').val();

                if (!sequence_a || !sequence_b || !sequence_c || !sequence_d || !green_interval || !yellow_interval) {
                    alert('All fields are required.');
                    return;
                }

                $.ajax({
                    url: '/signals',
                    method: 'POST',
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        sequence_a: sequence_a,
                        sequence_b: sequence_b,
                        sequence_c: sequence_c,
                        sequence_d: sequence_d,
                        green_interval: green_interval,
                        yellow_interval: yellow_interval,
                    },
                    success: function(response) {
                        //alert(response.success);
                        console.log(response.signal);
                        startSignalSequence(response.signals);
                    },
                    error: function(response) {
                        alert('Error updating signals');
                    }
                });
            });

            $('#stopButton').on('click', function() {
                stopSignalSequence();
            });

            function startSignalSequence(data) {
                console.log(data);
                if (!Array.isArray(data)) {
                    alert('Invalid data format for signals.');
                    return;
                }
                signals = data.slice().sort((a, b) => a.sequence - b.sequence);
                if (signals.length === 0) {
                    alert('No signals to operate.');
                    return;
                }
                console.log(signals);
                signalIndex = 0;
                operateSignal();
            }

            function operateSignal() {
                if (signalIndex >= signals.length) {
                    signalIndex = 0;
                }
                const currentSignal = signals[signalIndex];

                $('#A, #B, #C, #D').css('background', 'red');
                $(`#${currentSignal.name}`).css('background', 'green');

                timer = setTimeout(() => {
                    $(`#${currentSignal.name}`).css('background', 'yellow');
                    timer = setTimeout(() => {
                        signalIndex++;
                        operateSignal();
                    }, currentSignal.yellow_interval * 1000);
                }, currentSignal.green_interval * 1000);
            }


            //stop the signal
            function stopSignalSequence() {
                clearTimeout(timer);
                $('#A, #B, #C, #D').css('background', 'red');
                alert('Signal sequence stopped.');
            }
        });
    </script> 
</body>
</html>
