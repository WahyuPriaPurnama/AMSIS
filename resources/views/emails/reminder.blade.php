<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $mailData['title'] }}</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f9f9f9;
            padding: 20px;
            color: #333;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header img {
            max-width: 100px;
        }

        .title {
            font-size: 22px;
            font-weight: bold;
            color: #dc3545;
        }

        .body {
            font-size: 16px;
            line-height: 1.6;
        }

        .footer {
            margin-top: 30px;
            font-size: 14px;
            color: #777;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            {{-- Logo perusahaan (opsional) --}}
            <img src="{{ asset('subsidiary/logo/' . $employee->subsidiary->logo) }}" class="img-fluid mx-auto d-block"
                alt="Logo {{ $employee->subsidiary->name }}" style="max-width: 200px; height: auto;">
        </div>

        <div class="title">{{$mailData['title']}}</div>

        <div class="body">
            <p>{{ $mailData['body'] }}</p>
            <p>Mohon untuk segera melakukan tindak lanjut sesuai prosedur HRD terkait perpanjangan atau evaluasi
                kontrak.</p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} AMSIS • Human Resources Department<br>
            Email ini dikirim secara otomatis oleh sistem <strong>AMSIS</strong>. Mohon tidak membalas email ini.
        </div>
    </div>
</body>

</html>
