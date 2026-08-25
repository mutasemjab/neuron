<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
<meta charset="UTF-8">
</head>
<body style="margin:0;padding:0;background:#f4f8f7;font-family:Tahoma,Arial,sans-serif;">
  <div style="max-width:560px;margin:0 auto;padding:32px 20px;">
    <div style="background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 4px 16px rgba(0,0,0,.06);">

      <div style="background:#1b4d4a;padding:24px 28px;">
        <h1 style="margin:0;color:#fff;font-size:18px;">حجز موعد جديد — داخل الأردن</h1>
      </div>

      <div style="padding:28px;">
        <table style="width:100%;border-collapse:collapse;font-size:14px;color:#1a2e2b;">
          <tr>
            <td style="padding:10px 0;border-bottom:1px solid #eee;color:#6b7d7a;width:150px">الاسم</td>
            <td style="padding:10px 0;border-bottom:1px solid #eee;font-weight:bold">{{ $appointment->name }}</td>
          </tr>
          <tr>
            <td style="padding:10px 0;border-bottom:1px solid #eee;color:#6b7d7a">الهاتف</td>
            <td style="padding:10px 0;border-bottom:1px solid #eee;font-weight:bold" dir="ltr">{{ $appointment->phone_country_code }} {{ $appointment->phone }}</td>
          </tr>
          @if($appointment->email)
          <tr>
            <td style="padding:10px 0;border-bottom:1px solid #eee;color:#6b7d7a">البريد الإلكتروني</td>
            <td style="padding:10px 0;border-bottom:1px solid #eee" dir="ltr">{{ $appointment->email }}</td>
          </tr>
          @endif
          <tr>
            <td style="padding:10px 0;border-bottom:1px solid #eee;color:#6b7d7a">الفرع</td>
            <td style="padding:10px 0;border-bottom:1px solid #eee">{{ $appointment->branch->name_ar ?? '—' }}</td>
          </tr>
          <tr>
            <td style="padding:10px 0;border-bottom:1px solid #eee;color:#6b7d7a">التاريخ المفضّل</td>
            <td style="padding:10px 0;border-bottom:1px solid #eee">{{ $appointment->preferred_date->format('Y-m-d') }}</td>
          </tr>
          <tr>
            <td style="padding:10px 0;border-bottom:1px solid #eee;color:#6b7d7a">الوقت المفضّل</td>
            <td style="padding:10px 0;border-bottom:1px solid #eee">{{ $appointment->preferred_time_slot }}</td>
          </tr>
          <tr>
            <td style="padding:10px 0;border-bottom:1px solid #eee;color:#6b7d7a">طريقة الدفع</td>
            <td style="padding:10px 0;border-bottom:1px solid #eee">{{ $appointment->payment_method === 'insurance' ? 'تأمين' : 'نقدي' }}</td>
          </tr>
          <tr>
            <td style="padding:10px 0;color:#6b7d7a">سبق له زيارة العيادة؟</td>
            <td style="padding:10px 0">{{ $appointment->visited_before ? 'نعم' : 'لا' }}</td>
          </tr>
        </table>

        <div style="margin-top:26px;text-align:center">
          <a href="{{ route('admin.appointments.show', $appointment) }}" style="display:inline-block;background:#2a807d;color:#fff;padding:12px 28px;border-radius:8px;text-decoration:none;font-weight:bold">عرض الطلب في لوحة التحكم</a>
        </div>
      </div>

    </div>
  </div>
</body>
</html>
