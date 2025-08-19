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
@php
    use Carbon\Carbon;
    $usia = $employee->tgl_lahir ? Carbon::parse($employee->tgl_lahir)->age : null;
@endphp

<body>
    <div class="container">
        <div class="header">
            <div class="title">🎉{{ $mailData['title'] ?? 'Selamat Ulang Tahun' }}</div>
        </div>

        <div class="body">
            <p>Halo {{ e($employee->nama ?? 'Rekan AMS') }},</p>
            <p>Seluruh tim dari <strong>AMS Group</strong> mengucapkan selamat ulang tahun yang
                ke-<strong>{{ $usia ?? '...' }}</strong>!
                Semoga hari ini penuh
                kebahagiaan, kesehatan, dan kesuksesan untukmu.</p>
            <p>Terima kasih atas dedikasi dan kontribusimu selama ini. Kami bangga memiliki kamu sebagai bagian dari tim
                kami di plant <strong>{{ $employee->subsidiary->name ?? 'tidak diketahui' }}</strong>.</p>
            <p>Semoga tahun yang baru ini membawa banyak berkah dan pencapaian luar biasa!</p>
            <p>🎵 Klik untuk mendengarkan lagu ulang tahun:</p>
            <a href="https://music.youtube.com/watch?v=QJ80jTm4K8I&si=Wmn4HC38_vtEbf_A" target="_blank">
                🎶 Selamat Ulang Tahun - Jamrud
            </a>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} AMSIS • Membangun Sistem, Mendukung Moment • Powered By IT<br>
            Email ini dikirim secara otomatis oleh <strong>AMSIS</strong>. Mohon tidak membalas email ini.<br>
            <hr style="border: none; border-top: 1px solid #ccc; margin: 20px 0;">
            Untuk pertanyaan, silakan hubungi <a href="mailto:it@amsgroup.co.id">it@amsgroup.co.id</a>
        </div>
    </div>
</body>

</html>
