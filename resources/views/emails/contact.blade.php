<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Pesan Baru dari Website</title>
</head>
<body style="margin:0;padding:0;font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif;background:#f4f6f8;">
    <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center" style="padding:30px 15px;">
                <table width="600" cellpadding="0" cellspacing="0" role="presentation" style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 2px 6px rgba(0,0,0,0.08);">
                    <tr>
                        <td style="background:#0ea5a0;padding:20px 30px;color:#ffffff;">
                            <h1 style="margin:0;font-size:20px;line-height:1.2;">Pesan Baru dari Website</h1>
                            <p style="margin:6px 0 0;font-size:13px;opacity:0.95;">Form Kontak — Inti Semai</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:20px 30px;color:#333333;">
                            <p style="margin:0 0 12px;font-size:14px;"><strong>Subjek:</strong> {{ $data['subjek'] }}</p>

                            <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="border-collapse:collapse;font-size:14px;color:#333;">
                                <tr>
                                    <td style="padding:6px 0;width:140px;color:#555;"><strong>Nama</strong></td>
                                    <td style="padding:6px 0;">{{ $data['nama'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:6px 0;color:#555;"><strong>Institusi</strong></td>
                                    <td style="padding:6px 0;">{{ $data['institusi'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:6px 0;color:#555;"><strong>Telepon</strong></td>
                                    <td style="padding:6px 0;">{{ $data['telepon'] }}</td>
                                </tr>
                                <tr>
                                    <td style="padding:6px 0;color:#555;"><strong>Email</strong></td>
                                    <td style="padding:6px 0;"><a href="mailto:{{ $data['email'] }}" style="color:#0ea5a0;text-decoration:none;">{{ $data['email'] }}</a></td>
                                </tr>
                            </table>

                            <hr style="border:none;border-top:1px solid #e6e9ec;margin:18px 0;">

                            <p style="margin:0 0 8px;font-size:14px;"><strong>Pesan:</strong></p>
                            <div style="font-size:14px;color:#555;line-height:1.6;">
                                {!! nl2br(e($data['pesan'])) !!}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="background:#fafafa;padding:12px 30px;font-size:12px;color:#888;text-align:center;">
                            <p style="margin:0;">Dikirim dari formulir kontak website. Harap balas melalui alamat pengirim di atas.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
