<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/chat-konsultasi.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Chat Konsultasi</title>
</head>

<body>
    <div class="container">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card chat-app">
                    <div id="plist" class="people-list">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari...">
                        </div>
                        <ul class="list-unstyled chat-list mt-2 mb-0">
                            <li class="clearfix">
                                <img src="{{ asset('frontend/img/Paramedik1.jpg') }}" alt="avatar">
                                <div class="about">
                                    <div class="name">Drh Burhan Aji</div>
                                    <div class="status"> <i class="fa fa-circle offline"></i> Offline </div>
                                </div>
                            </li>
                            <li class="clearfix ">
                                <img src="{{ asset('frontend/img/Paramedik1.jpg') }}" alt="avatar">
                                <div class="about">
                                    <div class="name">Drh. Saifudin</div>
                                    <div class="status"> <i class="fa fa-circle online"></i> Online </div>
                                </div>
                            </li>
                            <li class="clearfix">
                                <img src="{{ asset('frontend/img/Paramedik1.jpg') }}" alt="avatar">
                                <div class="about">
                                    <div class="name">Drh. Sungkono</div>
                                    <div class="status"> <i class="fa fa-circle offline"></i> Offline </div>
                                </div>
                            <li class="clearfix">
                                <img src="{{ asset('frontend/img/Paramedik1.jpg') }}" alt="avatar">
                                <div class="about">
                                    <div class="name">Drh. Sungkono</div>
                                    <div class="status"> <i class="fa fa-circle online"></i> online </div>
                                </div>
                            <li class="clearfix">
                                <img src="{{ asset('frontend/img/Paramedik1.jpg') }}" alt="avatar">
                                <div class="about">
                                    <div class="name">Drh. Sungkono</div>
                                    <div class="status"> <i class="fa fa-circle online"></i> online </div>
                                </div>
                            <li class="clearfix">
                                <img src="{{ asset('frontend/img/Paramedik1.jpg') }}" alt="avatar">
                                <div class="about">
                                    <div class="name">Drh. Sungkono</div>
                                    <div class="status"> <i class="fa fa-circle offline"></i> Offline </div>
                                </div>
                            </li>
                            </li>
                            </li>
                            </li>
                        </ul>
                    </div>

                    <div class="chat">
                        <div class="chat-header clearfix">
                            <img src="{{ asset('frontend/img/Paramedik1.jpg') }}" alt="avatar">
                            <div class="chat-about">
                                <div class="chat-with">Drh. Toto Sukarno</div>
                                <div class="chat-num-messages">Mengetik....</div>
                            </div>
                        </div>
                        <div class="chat-history">
                            <ul class="m-b-0">
                                <li class="clearfix">
                                    <div class="message-data text-right float-right ">
                                        <span class="message-data-time">10:10 AM, Today</span>
                                        <img src="{{ asset('frontend/img/Paramedik1.jpg') }}" alt="avatar">
                                    </div>
                                    <div class="message other-message float-right "> Hi Aiden, how are you? How is the
                                        project coming along? </div>
                                </li>
                                <li class="clearfix">
                                    <div class="message-data">
                                        <span class="message-data-time">10:12 AM, Today</span>
                                    </div>
                                    <div class="message my-message">Are we meeting today?</div>
                                </li>
                                <li class="clearfix">
                                    <div class="message-data">
                                        <span class="message-data-time">10:15 AM, Today</span>
                                    </div>
                                    <div class="message my-message">Project has been already finished and I have results
                                        to show you.</div>
                                </li>
                            </ul>
                        </div>
                        <div class="chat-message clearfix">
                            <input type="text" class="form-control" placeholder="Masukan Pesan Anda">
                            <button type="button" class="attach-button">
                                <img src="{{ asset('frontend/img/chat-konsultasi/attach.svg') }}">
                            </button>
                            <button type="button">Kirim</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
