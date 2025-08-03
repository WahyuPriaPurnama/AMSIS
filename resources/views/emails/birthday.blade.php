<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Selamat Ulang Tahun!</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f4;
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
            font-size: 24px;
            font-weight: bold;
            color: #007bff;
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

        <div class="title">🎉 Selamat Ulang Tahun {{ $employee->nama }}!</div>

        <div class="body">
            <p>Halo {{ $employee->nama }},</p>
            <p>Seluruh tim dari <strong>AMS Group</strong> mengucapkan selamat ulang tahun! Semoga hari ini penuh
                kebahagiaan, kesehatan, dan kesuksesan untukmu.</p>
            <p>Terima kasih atas dedikasi dan kontribusimu selama ini. Kami bangga memiliki kamu sebagai bagian dari tim
                kami di plant <strong>{{ $employee->subsidiary->name }}</strong>.</p>
            <p>Semoga tahun yang baru ini membawa banyak berkah dan pencapaian luar biasa!</p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} AMSIS • Human Resources Department<br>
            Email ini dikirim secara otomatis oleh sistem <strong>AMSIS</strong>. Mohon tidak membalas email ini.
        </div>
    </div>
</body>

</html>
