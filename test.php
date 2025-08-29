<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جدول بكلاس center</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        td {
            border: 1px solid #ddd;
            padding: 10px;
            height: 40px;
        }
        /* تنسيق الخلايا */
        .left-align {
            text-align: left;
        }
        .center {
            text-align: center;
            background-color: #e8f4f8;
        }
        .code-container {
            background: #2c3e50;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
            overflow-x: auto;
        }
        .explanation {
            background: #f9f9f9;
            padding: 15px;
            border-right: 4px solid #2c3e50;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>إضافة كلاس "center" إلى خلايا الجدول</h1>
        
        <div class="explanation">
            <h2>الخطوات المتبعة:</h2>
            <ol>
                <li>تم تحديد جميع خلايا الجدول باستخدام <code>document.querySelectorAll('td')</code></li>
                <li>تمت إضافة الكلاس "center" إلى كل خلية باستخدام <code>classList.add()</code></li>
                <li>تم الحفاظ على الكلاس الأصلي "left-align" في كل خلية</li>
            </ol>
        </div>
        
        <h2>النتيجة:</h2>
        <table>
            <tr>
                <td class='left-align'>6. TESTED BY</td>
                <td class='left-align'>5. DATE </td>
                <td class='left-align'>4. CIRCUIT DESIGNATION</td>
                <td class='left-align'>3. JOB NUMBER</td>
                <td class='left-align'>2. LOCATION</td>
                <td class='left-align'>1. PLANT/BUILDING</td>
            </tr>
        </table>
        
        <div class="code-container">
            <h3>الكود المستخدم:</h3>
            <pre><code>
// تحديد جميع خلايا TD
const cells = document.querySelectorAll('td');

// إضافة كلاس "center" إلى كل خلية
cells.forEach(cell => {
    cell.classList.add('center');
});
            </code></pre>
        </div>
    </div>

    <script>
        // تنفيذ الكود بعد تحميل الصفحة
        document.addEventListener('DOMContentLoaded', function() {
            // تحديد جميع خلايا TD
            const cells = document.querySelectorAll('td');
            
            // إضافة كلاس "center" إلى كل خلية
            cells.forEach(cell => {
                cell.classList.add('center');
            });
            
            console.log('تم إضافة كلاس center إلى جميع الخلايا بنجاح');
        });
    </script>
</body>
</html>