<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="UTF-8">
</head>
<body style="margin:0;padding:0;background:#f4f8f7;font-family:Tahoma,Arial,sans-serif;">
  <div style="max-width:560px;margin:0 auto;padding:32px 20px;">
    <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 16px rgba(0,0,0,.06);">

      <div style="background:#1b4d4a;padding:24px 28px;">
        <h1 style="margin:0;color:#fff;font-size:18px;">طلب استشارة أونلاين جديد — خارج الأردن</h1>
      </div>

      <div style="padding:28px;">
        <table style="width:100%;border-collapse:collapse;font-size:14px;color:#1a2e2b;">
          <tr>
            <td style="padding:10px 0;border-bottom:1px solid #eee;color:#6b7d7a;width:150px">الاسم</td>
            <td style="padding:10px 0;border-bottom:1px solid #eee;font-weight:bold">{{ $consultation->name }}</td>
          </tr>
          <tr>
            <td style="padding:10px 0;border-bottom:1px solid #eee;color:#6b7d7a">البريد الإلكتروني</td>
            <td style="padding:10px 0;border-bottom:1px solid #eee;font-weight:bold" dir="ltr">{{ $consultation->email }}</td>
          </tr>
          <tr>
            <td style="padding:10px 0;border-bottom:1px solid #eee;color:#6b7d7a">الهاتف / واتساب</td>
            <td style="padding:10px 0;border-bottom:1px solid #eee" dir="ltr">{{ $consultation->phone_country_code }} {{ $consultation->phone }}</td>
          </tr>
          <tr>
            <td style="padding:10px 0;border-bottom:1px solid #eee;color:#6b7d7a">بلد الإقامة</td>
            <td style="padding:10px 0;border-bottom:1px solid #eee">{{ $consultation->country_of_residence }}</td>
          </tr>
          <tr>
            <td style="padding:10px 0;border-bottom:1px solid #eee;color:#6b7d7a">تاريخ الميلاد</td>
            <td style="padding:10px 0;border-bottom:1px solid #eee">{{ $consultation->date_of_birth->format('Y-m-d') }}</td>
          </tr>
          <tr>
            <td style="padding:10px 0;border-bottom:1px solid #eee;color:#6b7d7a">الأيام المناسبة</td>
            <td style="padding:10px 0;border-bottom:1px solid #eee">{{ $consultation->preferred_days_label ?: '—' }}</td>
          </tr>
          <tr>
            <td style="padding:10px 0;border-bottom:1px solid #eee;color:#6b7d7a">الفترة المناسبة</td>
            <td style="padding:10px 0;border-bottom:1px solid #eee">{{ $consultation->preferred_periods_label ?: '—' }}</td>
          </tr>
          <tr>
            <td style="padding:10px 0;color:#6b7d7a;vertical-align:top">وصف الحالة</td>
            <td style="padding:10px 0;white-space:pre-line">{{ $consultation->condition_description }}</td>
          </tr>
        </table>

        @if(!empty($consultation->attachment_urls))
        <div style="margin-top:20px">
          <p style="margin:0 0 8px;color:#6b7d7a;font-size:14px">التقارير والصور الطبية المرفقة:</p>
          @foreach($consultation->attachment_urls as $i => $url)
            <a href="{{ $url }}" style="display:block;color:#2a807d;font-weight:bold;text-decoration:none;margin-bottom:4px">📎 ملف {{ $i + 1 }}</a>
          @endforeach
        </div>
        @endif

        <div style="margin-top:26px;text-align:center">
          <a href="{{ route('admin.consultations.show', $consultation) }}" style="display:inline-block;background:#2a807d;color:#fff;padding:12px 28px;border-radius:8px;text-decoration:none;font-weight:bold">عرض الطلب في لوحة التحكم</a>
        </div>
      </div>

    </div>
  </div>
</body>
</html>
