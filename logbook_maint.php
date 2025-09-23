<?php
// يجب أن يكون هذا السطر في أعلى الملف قبل أي محتوى HTML
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل القراءات والتقارير</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 1.5%;
            width: 130%;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid black;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
            vertical-align: middle;
            font-size: 14px;
        }

        th {
            background-color: #8cacdeff;
        }

        .left-align {
            text-align: left;
            direction: ltr;
        }

        .right-align {
            text-align: right;
        }

        .arabic-text {
            direction: rtl;
        }

        .En-text {
            direction: ltr;
        }

        table img.imgx {
            width: 100px;
            height: 100px;
        }

        table .tdimg {
            text-align: center;
            width: 10%;
        }

        .blue_color {
            color: #0052ED;
        }

        /* سمات السيلكتور جروب وزر العودة */
        .select-container {
            position: relative;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border: 1px solid #e0e0e0;
            width: 20%;
            margin-left: 5%;
            margin-top: 0.2%;
            display: flex;
        }

        .date-selectors {
            position: relative;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 10px;
            border: 1px solid #e0e0e0;
            width: 10%;
            margin-left: 5%;
            margin-top: 0.2%;
            display: flex;
        }

        .select-label {
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        .custom-select {
            width: 100%;
            padding: 10px 15px;
            font-size: 16px;
            color: #333;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 6px;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .custom-select:hover {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }

        .custom-select:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* تنسيق أسهم القائمة المنسدلة */
        .select-container::after {
            content: '\25BC';
            /* سهم للأسفل */
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(20%);
            font-size: 12px;
            color: #555;
            pointer-events: none;
            transition: transform 0.3s ease;
        }

        .custom-select:focus+.select-container::after {
            transform: translateY(20%) rotate(180deg);
        }

        /* تنسيق الخيارات */
        .custom-select option {
            padding: 10px;
            font-size: 16px;
            background-color: #fff;
            color: #333;
        }

        .top_div {
            display: flex;
            justify-content: space-between;
            background-color: bisque;
        }

        .back-btn {
            padding-top: 2%;
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            margin-right: 5%;
            padding-left: 1%;
            padding-right: 1%;
        }

        form {
            width: 100%;
            display: flex;
            justify-content: space-between;
            background-color: bisque;
        }

        .SR_col {
            width: 5%;
        }

        .bisque {
            background-color: bisque;
        }

        .greenyellow {
            background-color: greenyellow;
        }

        .center {
            text-align: center;
        }

        .wide_font {
            font-family: Arial, sans-serif;
            font-weight: 600;
        }

        .print-button {
            cursor: pointer;
        }

        .eng {
            padding-left: 5%;
            padding-right: 5%;

            text-align: center;
            width: 90%;
            display: flex;
            justify-content: space-between;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-weight: 600;

        }

        .tail {
            text-align: center;
            width: 100%;

        }

        .reload-btn {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            border: none;
            padding: 16px 40px;
            font-size: 18px;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(106, 17, 203, 0.4);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin: 0.5% 20%;
        }

        .reload-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(106, 17, 203, 0.6);
        }

        .reload-btn:active {
            transform: translateY(1px);
        }

        .icon {
            margin-left: 10px;
            transition: transform 0.5s ease;
        }

        .reload-btn:hover .icon {
            transform: rotate(360deg);
        }

        .spinning {
            animation: spin 0.5s linear infinite;
        }

        @media screen and (max-width: 480px) {
            body {
                font-family: Arial, sans-serif;
                padding-left: 5%;
                padding-right: 5%;
                padding-top: 1.5%;
                padding-bottom: 0;
                margin-bottom: 0;
                width: 690%;
            }

            table {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid black;
                margin-left: 10%;
                margin-bottom: 0;
                padding-bottom: 0;
            }

            th,
            td {
                border: 1px solid black;
                padding: 8px;
                text-align: center;
                vertical-align: middle;
                font-size: 14px;
            }

            .left-align {
                text-align: left;
            }

            .right-align {
                text-align: right;
            }

            .arabic-text {
                direction: rtl;
            }

            .En-text {
                direction: ltr;
            }

            table img.imgx {
                width: 100px;
                height: 100px;
            }

            table .tdimg {
                text-align: center;
                width: 10%;
            }

            .blue_color {
                color: #0052ED;
            }

            /* سمات السيلكتور جروب وزر العودة */
            .select-container {
                position: relative;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 10px;
                border: 1px solid #e0e0e0;
                width: 20%;
                margin-left: 5%;
                margin-top: 0.2%;
                display: flex;
            }

            .date-selectors {
                position: relative;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                padding: 10px;
                border: 1px solid #e0e0e0;
                width: 10%;
                margin-left: 5%;
                margin-top: 0.2%;
                display: flex;
            }

            .select-label {
                font-size: 16px;
                color: #555;
                margin-bottom: 8px;
                display: block;
            }

            .custom-select {
                width: 100%;
                padding: 10px 15px;
                font-size: 16px;
                color: #333;
                background-color: #f9f9f9;
                border: 1px solid #ccc;
                border-radius: 6px;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .custom-select:hover {
                border-color: #007bff;
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
            }

            .custom-select:focus {
                outline: none;
                border-color: #007bff;
                box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            }

            /* تنسيق أسهم القائمة المنسدلة */
            .select-container::after {
                content: '\25BC';
                /* سهم للأسفل */
                position: absolute;
                top: 50%;
                left: 20px;
                transform: translateY(20%);
                font-size: 12px;
                color: #555;
                pointer-events: none;
                transition: transform 0.3s ease;
            }

            .custom-select:focus+.select-container::after {
                transform: translateY(20%) rotate(180deg);
            }

            /* تنسيق الخيارات */
            .custom-select option {
                padding: 10px;
                font-size: 16px;
                background-color: #fff;
                color: #333;
            }

            .top_div {
                display: flex;
                justify-content: space-between;
                background-color: bisque;
            }

            .back-btn {
                padding-top: 2%;
                background-color: #007BFF;
                color: white;
                border: none;
                cursor: pointer;
                border-radius: 5px;
                text-decoration: none;
                margin-right: 5%;
                padding-left: 1%;
                padding-right: 1%;
            }

            form {
                width: 100%;
                display: flex;
                justify-content: space-between;
                background-color: bisque;
            }

            .SR_col {
                width: 5%;
            }

            .bisque {
                background-color: bisque;
            }

            .greenyellow {
                background-color: greenyellow;
            }

        }

        @media print {
            body {
                width: 100%;
                padding: 0;
                margin-left: 0;
                margin-right: 0;
                margin-bottom: 0;
                margin-top: 5%;
                background: #fff !important;
            }

            .top_div {
                display: none !important;
            }

        }
    </style>
</head>

<body>
    <div class="top_div">

        <a href="logbook.php" class="back-btn">العودة للصفحة السابقة</a>


        <div class="select-container">
            <label for="year-select" class="select-label">اختر السنة:</label>
            <select id="year-select" name="year-select" class="custom-select">
                <!-- <option value="" disabled selected>-- اختر سنة --</option> -->
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>
            </select>
        </div>
        <div class="select-container">
            <label for="year-select" class="select-label">اختر الشهر:</label>
            <select id="month-select" name="year-select" class="custom-select">
                <!-- <option value="" disabled selected>-- اختر سنة --</option> -->
                <!-- <option value="">اختر الشهر</option> -->
                <option value="1">يناير</option>
                <option value="2">فبراير</option>
                <option value="3">مارس</option>
                <option value="4">أبريل</option>
                <option value="5">مايو</option>
                <option value="6">يونيو</option>
                <option value="7">يوليو</option>
                <option value="8">أغسطس</option>
                <option value="9">سبتمبر</option>
                <option value="10">أكتوبر</option>
                <option value="11">نوفمبر</option>
                <option value="12">ديسمبر</option>
            </select>
        </div>
        <div class="select-container">
            <label for="year-select" class="select-label">اختر الشهر:</label>
            <select id="day-select" name="year-select" class="custom-select">
                <!-- <option value="" disabled selected>-- اختر سنة --</option> -->
                <!-- <option value="">اختر الشهر</option> -->
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
        </div>


        <!-- <button id="save-data-btn" class="back-btn" style="margin-right: 2%;">حفظ البيانات</button> -->
        <!-- <button class="print-button" onclick="window.print()"><img class="pdf_img" src="imgs/printdoc2.png"
                alt=""></button> -->
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // كود الادخال للبيانات XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
            // إضافة دالة التعديل بالنقر المزدوج
            // دالة لتمكين التعديل بالنقر المزدوج للأعمدة 1-8 و 15-20
            // دالة لتمكين التعديل بالنقر المزدوج للأعمدة 1-8 و 15-20
            // دالة لتمكين التعديل بالنقر المزدوج للأعمدة 1-8 و 15-20
            function enableDoubleClickEditing() {
                const table = document.querySelector('table:nth-of-type(2)');

                // تحديد الصفوف (4, 5, 6) - الفهرس يبدأ من 0 (الصفوف 3, 4, 5 في DOM)
                for (let row = 3; row <= 6; row++) {
                    // جميع الأعمدة من 1 إلى 20 (باستثناء 9-14 التي لها معالجة خاصة)
                    for (let col = 1; col <= 20; col++) {
                        // تخطي الأعمدة 9-14 التي لها معالجة خاصة
                        if (col >= 9 && col <= 14) continue;

                        const cell = table.querySelector(`tr:nth-child(${row}) td:nth-child(${col})`);
                        if (cell) {
                            cell.addEventListener('dblclick', function() {
                                makeCellEditable(this);
                            });

                            // إضافة نمط المؤشر للإشارة إلى أن الخلية قابلة للتعديل
                            cell.style.cursor = 'pointer';
                        }
                    }
                }
            }
            // دالة لتمكين التعديل بالنقر المزدوج للأعمدة 9-14
            // دالة لتمكين التعديل بالنقر المزدوج للأعمدة 9-14
            function enableToggleEditing() {
                const table = document.querySelector('table:nth-of-type(2)');

                // تحديد الصفوف (4, 5, 6) - الفهرس يبدأ من 0 (الصفوف 3, 4, 5 في DOM)
                for (let row = 3; row <= 6; row++) {
                    // الأعمدة من 9 إلى 14
                    for (let col = 9; col <= 14; col++) {
                        const cell = table.querySelector(`tr:nth-child(${row}) td:nth-child(${col})`);
                        if (cell) {
                            cell.addEventListener('dblclick', function() {
                                toggleCellValue(this);
                            });

                            // إضافة نمط المؤشر للإشارة إلى أن الخلية قابلة للتعديل
                            cell.style.cursor = 'pointer';

                            // تنسيق الخلايا بناءً على قيمتها
                            updateCellStyle(cell);
                        }
                    }
                }
            }

            // دالة لتمكين التعديل بالنقر المزدوج للجدول الثالث
            function enableTable3Editing() {
                const table = document.querySelector('table:nth-of-type(3)');

                if (!table) return;

                // تحديد الصفوف (4, 5, 6) - الفهرس يبدأ من 0 (الصفوف 3, 4, 5 في DOM)
                for (let row = 3; row <= 6; row++) {
                    // جميع الأعمدة من 1 إلى 36
                    for (let col = 1; col <= 36; col++) {
                        const cell = table.querySelector(`tr:nth-child(${row}) td:nth-child(${col})`);
                        if (cell) {
                            cell.addEventListener('dblclick', function() {
                                makeCellEditable(this);
                            });

                            // إضافة نمط المؤشر للإشارة إلى أن الخلية قابلة للتعديل
                            cell.style.cursor = 'pointer';
                        }
                    }
                }
            }

            // دالة لتمكين التعديل بالنقر المزدوج للجدول الرابع
            function enableTable4Editing() {
                const table = document.querySelector('table:nth-of-type(4)');

                if (!table) return;

                // تحديد الصفوف (4, 5, 6) - الفهرس يبدأ من 0 (الصفوف 3, 4, 5 في DOM)
                for (let row = 3; row <= 6; row++) {
                    // جميع الأعمدة من 1 إلى 32
                    for (let col = 1; col <= 32; col++) {
                        const cell = table.querySelector(`tr:nth-child(${row}) td:nth-child(${col})`);
                        if (cell) {
                            cell.addEventListener('dblclick', function() {
                                makeCellEditable(this);
                            });

                            // إضافة نمط المؤشر للإشارة إلى أن الخلية قابلة للتعديل
                            cell.style.cursor = 'pointer';
                        }
                    }
                }
            }


            // دالة لتمكين التعديل بالنقر المزدوج للجدول الخامس
            function enableTable5Editing() {
                const table = document.querySelector('table:nth-of-type(5)');

                if (!table) return;

                // تحديد الصفوف (4, 5, 6) - الفهرس يبدأ من 0 (الصفوف 3, 4, 5 في DOM)
                for (let row = 3; row <= 6; row++) {
                    // جميع الأعمدة من 1 إلى 32 (باستثناء الخلايا غير القابلة للتعديل)
                    for (let col = 1; col <= 32; col++) {
                        // تخطي الخلايا غير القابلة للتعديل
                        if ([15, 12, 6, 3, 2].includes(col)) continue;

                        const cell = table.querySelector(`tr:nth-child(${row}) td:nth-child(${col})`);
                        if (cell) {
                            cell.addEventListener('dblclick', function() {
                                makeCellEditable(this);
                            });

                            // إضافة نمط المؤشر للإشارة إلى أن الخلية قابلة للتعديل
                            cell.style.cursor = 'pointer';
                        }
                    }
                }
            }
            // دالة لتمكين التعديل بالنقر المزدوج للجدول السادس
            function enableTable6Editing() {
                const table = document.querySelector('table:nth-of-type(6)');

                if (!table) return;

                // تحديد الصفوف (4, 5, 6, 7, 8, 9) - الفهرس يبدأ من 0 (الصفوف 3, 4, 5, 6, 7, 8 في DOM)
                for (let row = 3; row <= 9; row++) {
                    // جميع الأعمدة من 1 إلى 18
                    for (let col = 1; col <= 18; col++) {
                        const cell = table.querySelector(`tr:nth-child(${row}) td:nth-child(${col})`);
                        if (cell) {
                            cell.addEventListener('dblclick', function() {
                                makeCellEditable(this);
                            });

                            // إضافة نمط المؤشر للإشارة إلى أن الخلية قابلة للتعديل
                            cell.style.cursor = 'pointer';
                        }
                    }
                }
            }

            // دالة لتمكين التعديل بالنقر المزدوج للجدول السابع (الصف الخامس فقط)
            function enableTable7Editing() {
                const table = document.querySelector('table:nth-of-type(7)');

                if (!table) return;

                // تحديد الصف الخامس فقط (الفهرس 4 في DOM)
                const row = 5;

                // جميع الأعمدة من 1 إلى 14
                for (let col = 1; col <= 14; col++) {
                    const cell = table.querySelector(`tr:nth-child(${row}) td:nth-child(${col})`);
                    if (cell) {
                        cell.addEventListener('dblclick', function() {
                            makeCellEditable7(this);
                        });

                        // إضافة نمط المؤشر للإشارة إلى أن الخلية قابلة للتعديل
                        cell.style.cursor = 'pointer';
                    }
                }
            }

            function makeCellEditable7(cell) {
                const currentValue = cell.textContent;
                let The_OldValue = 0;
                const columnIndex = Array.from(cell.parentElement.children).indexOf(cell) + 1;
                const rowIndex = Array.from(cell.closest('table').querySelectorAll('tr')).indexOf(cell.parentElement) + 1;
                console.log('🎯 تم النقر على الخلية - الصف:', rowIndex, 'العمود:', columnIndex);
                const correct_row = 19 - columnIndex;
                The_OldValue = document.querySelector(`table:nth-of-type(10) tr:nth-child(${correct_row}) td:nth-child(4)`).textContent || 0;

                const input = document.createElement('input');
                input.type = 'number';
                input.value = currentValue;
                input.style.width = '100%';
                input.style.height = '100%';
                input.style.border = 'none';
                input.style.background = 'transparent';
                input.style.textAlign = 'center';
                input.style.fontSize = 'inherit';
                input.style.backgroundColor = '#dce3efff';

                cell.textContent = 0;
                cell.appendChild(input);
                input.focus();
                input.select();

                let isCancelling = false;
                let isConfirmDialogOpen = false;
                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') {
                        isConfirmDialogOpen = true;
                        if (input.value >= The_OldValue) {
                            finishEditing(cell, input.value);
                             cell.style.backgroundColor = '#d4edda'; // أخضر فاتح
                        } else {
                            cell.textContent = currentValue;
                            cell.style.backgroundColor = '#ffcccc';
                            showMessage('❌ القيمة يجب أن تكون أكبر من أو تساوي ' + The_OldValue);
                            cell.style.backgroundColor = '#d21313ff'; // لون أحمر فاتح
                            setTimeout(() => {
                                cell.style.backgroundColor = '#f6c3efff'; // إعادة اللون بعد ثانيتين
                                hideMessage();
                            }, 2000);
                        }

                    } else if (e.key === 'Escape') {
                        isCancelling = true; // وضع علامة للإلغاء
                        cell.textContent = currentValue;
                    }
                });

                input.addEventListener('blur', function() {
                    if (!isCancelling && !isConfirmDialogOpen) { // عدم التنفيذ إذا كان إلغاء
                        if (input.value >= The_OldValue) {
                            finishEditing(cell, input.value);
                             cell.style.backgroundColor = '#d4edda'; // أخضر فاتح
                        } else {
                            cell.textContent = currentValue;
                            
                            showMessage('❌ القيمة يجب أن تكون أكبر من أو تساوي ' + The_OldValue);
                            cell.style.backgroundColor = '#d21313ff'; // لون أحمر فاتح
                            setTimeout(() => {
                                cell.style.backgroundColor = '#f6c3efff'; // إعادة اللون بعد ثانيتين
                                hideMessage();
                            }, 2000);
                        }
                    }
                    isCancelling = false; // إعادة تعيين المتغير
                    isConfirmDialogOpen = false;
                });
            }

            // دالة لعرض الرسالة
            function showMessage(message) {
                let messageDiv = document.getElementById('error-message');
                if (!messageDiv) {
                    messageDiv = document.createElement('div');
                    messageDiv.id = 'error-message';
                    messageDiv.style.position = 'fixed';
                    messageDiv.style.top = '20px';
                    messageDiv.style.left = '50%';
                    messageDiv.style.transform = 'translateX(-50%)';
                    messageDiv.style.background = '#ff4444';
                    messageDiv.style.color = 'white';
                    messageDiv.style.padding = '10px 20px';
                    messageDiv.style.borderRadius = '5px';
                    messageDiv.style.zIndex = '10000';
                    document.body.appendChild(messageDiv);
                }
                messageDiv.textContent = message;
                messageDiv.style.display = 'block';
            }

            // دالة لإخفاء الرسالة
            function hideMessage() {
                const messageDiv = document.getElementById('error-message');
                if (messageDiv) {
                    messageDiv.style.display = 'none';
                }
            }
            // gool
            function enableTable9Editing() {
                const table = document.querySelector('table:nth-of-type(9)');
                if (!table) return;

                // ✅ الصف الثالث فقط - قابل للتعديل
                const cellRow3 = table.querySelector('tr:nth-child(3) td:nth-child(3)');
                const cellRow31 = table.querySelector('tr:nth-child(3) td:nth-child(1)');
                const cellRow41 = table.querySelector('tr:nth-child(4) td:nth-child(1)');
                const cellRow51 = table.querySelector('tr:nth-child(5) td:nth-child(1)');
                if (cellRow3 || cellRow31) {
                    cellRow3.addEventListener('dblclick', function() {
                        makeCellEditable(this);
                    });
                    cellRow31.addEventListener('dblclick', function() {
                        makeCellEditable(this);
                    });
                    cellRow41.addEventListener('dblclick', function() {
                        makeCellEditable(this);
                    });
                    cellRow51.addEventListener('dblclick', function() {
                        makeCellEditable(this);
                    });
                    cellRow3.style.cursor = 'pointer';
                    cellRow3.style.backgroundColor = '#e3f2fd'; // تمييز بصري
                    cellRow31.style.cursor = 'pointer';
                    cellRow31.style.backgroundColor = '#e3f2fd'; // تمييز بصري
                    cellRow41.style.cursor = 'pointer';
                    cellRow41.style.backgroundColor = '#e3f2fd'; // تمييز بصري
                    cellRow51.style.cursor = 'pointer';
                    cellRow51.style.backgroundColor = '#e3f2fd'; // تمييز بصري
                }


            }

            function notAllow() {
                const table = document.querySelector('table:nth-of-type(9)');
                if (!table) return;
                const cellRow32 = table.querySelector('tr:nth-child(3) td:nth-child(2)');
                const cellRow34 = table.querySelector('tr:nth-child(3) td:nth-child(4)');
                const cellRow35 = table.querySelector('tr:nth-child(3) td:nth-child(5)');
                const cellRow42 = table.querySelector('tr:nth-child(4) td:nth-child(2)');
                const cellRow45 = table.querySelector('tr:nth-child(4) td:nth-child(5)');
                const cellRow44 = table.querySelector('tr:nth-child(4) td:nth-child(4)');
                const cellRow43 = table.querySelector('tr:nth-child(4) td:nth-child(3)');
                const cellRow53 = table.querySelector('tr:nth-child(5) td:nth-child(3)');
                const cellRow52 = table.querySelector('tr:nth-child(5) td:nth-child(2)');
                const cellRow54 = table.querySelector('tr:nth-child(5) td:nth-child(4)');
                const cellRow55 = table.querySelector('tr:nth-child(5) td:nth-child(5)');

                [cellRow42, cellRow45, cellRow44, cellRow43, cellRow53, cellRow52, cellRow54, cellRow55, cellRow32, cellRow34, cellRow35].forEach(cell => {
                    if (cell) {
                        // إنشاء نسخة جديدة من الخلية لإزالة جميع event listeners
                        const newCell = cell.cloneNode(true);
                        cell.parentNode.replaceChild(newCell, cell);

                        // تعطيل المظهر
                        newCell.style.cursor = 'not-allowed';
                        newCell.style.backgroundColor = '#f0f0f0';
                        newCell.style.color = '#666';
                        newCell.title = 'يتم حسابه تلقائياً';
                    }
                });
                const table7 = document.querySelector('table:nth-of-type(7)');
                if (!table7) return;
                const cellRow741 = table7.querySelector('tr:nth-child(4) td:nth-child(1)');
                const cellRow742 = table7.querySelector('tr:nth-child(4) td:nth-child(2)');
                const cellRow743 = table7.querySelector('tr:nth-child(4) td:nth-child(3)');
                const cellRow744 = table7.querySelector('tr:nth-child(4) td:nth-child(4)');
                const cellRow745 = table7.querySelector('tr:nth-child(4) td:nth-child(5)');
                const cellRow746 = table7.querySelector('tr:nth-child(4) td:nth-child(6)');
                const cellRow747 = table7.querySelector('tr:nth-child(4) td:nth-child(7)');
                const cellRow748 = table7.querySelector('tr:nth-child(4) td:nth-child(8)');
                const cellRow749 = table7.querySelector('tr:nth-child(4) td:nth-child(9)');
                const cellRow7410 = table7.querySelector('tr:nth-child(4) td:nth-child(10)');
                const cellRow7411 = table7.querySelector('tr:nth-child(4) td:nth-child(11)');
                const cellRow7412 = table7.querySelector('tr:nth-child(4) td:nth-child(12)');
                const cellRow7413 = table7.querySelector('tr:nth-child(4) td:nth-child(13)');
                const cellRow7414 = table7.querySelector('tr:nth-child(4) td:nth-child(14)');

                const cellRow761 = table7.querySelector('tr:nth-child(6) td:nth-child(1)');
                const cellRow762 = table7.querySelector('tr:nth-child(6) td:nth-child(2)');
                const cellRow763 = table7.querySelector('tr:nth-child(6) td:nth-child(3)');
                const cellRow764 = table7.querySelector('tr:nth-child(6) td:nth-child(4)');
                const cellRow765 = table7.querySelector('tr:nth-child(6) td:nth-child(5)');
                const cellRow766 = table7.querySelector('tr:nth-child(6) td:nth-child(6)');
                const cellRow767 = table7.querySelector('tr:nth-child(6) td:nth-child(7)');
                const cellRow768 = table7.querySelector('tr:nth-child(6) td:nth-child(8)');
                const cellRow769 = table7.querySelector('tr:nth-child(6) td:nth-child(9)');
                const cellRow7610 = table7.querySelector('tr:nth-child(6) td:nth-child(10)');
                const cellRow7611 = table7.querySelector('tr:nth-child(6) td:nth-child(11)');
                const cellRow7612 = table7.querySelector('tr:nth-child(6) td:nth-child(12)');
                const cellRow7613 = table7.querySelector('tr:nth-child(6) td:nth-child(13)');
                const cellRow7614 = table7.querySelector('tr:nth-child(6) td:nth-child(14)');

                [cellRow741, cellRow742, cellRow743, cellRow744, cellRow745, cellRow746, cellRow747, cellRow748,
                    cellRow749, cellRow7410, cellRow7411, cellRow7412, cellRow7413, cellRow7414,
                    cellRow761, cellRow762, cellRow763, cellRow764, cellRow765, cellRow766, cellRow767, cellRow768,
                    cellRow769, cellRow7610, cellRow7611, cellRow7612, cellRow7613, cellRow7614
                ].forEach(cell => {
                    if (cell) {
                        // إنشاء نسخة جديدة من الخلية لإزالة جميع event listeners
                        const newCell7 = cell.cloneNode(true);
                        cell.parentNode.replaceChild(newCell7, cell);

                        // تعطيل المظهر
                        newCell7.style.cursor = 'not-allowed';
                        newCell7.style.backgroundColor = '#f0f0f0';
                        newCell7.style.color = '#666';
                        newCell7.title = 'يتم حسابه تلقائياً';
                    }
                });
            }

            // دالة للتبديل بين القيم OK و N OK
            function toggleCellValue(cell) {
                const currentValue = cell.textContent.trim().toUpperCase();
                const oldValue = currentValue; // حفظ القيمة القديمة

                // تحديد القيمة الجديدة بناءً على القيمة الحالية
                let newValue;
                if (currentValue === 'OK') {
                    newValue = 'N OK';
                } else if (currentValue === 'N OK') {
                    newValue = '';
                } else {
                    newValue = 'OK';
                }

                // تطبيق القيمة الجديدة
                cell.textContent = newValue;

                // تحديث تنسيق الخلية
                updateCellStyle(cell);

                // ✅ الإضافة المهمة: حفظ البيانات في الخادم للأعمدة 9-14
                const table = cell.closest('table');
                const tableIndex = Array.from(document.querySelectorAll('table')).indexOf(table) + 1;
                const row = cell.parentElement;
                const rowIndex = row.rowIndex;
                const cellIndex = cell.cellIndex + 1;

                const yearSelect = document.getElementById('year-select');
                const monthSelect = document.getElementById('month-select');
                const daySelect = document.getElementById('day-select');

                const year = yearSelect.value;
                const month = monthSelect.value;
                const day = daySelect.value;

                // الحصول على اسم العمود فقط للأعمدة 9-14 في الجدول 2
                let columnName = null;
                if (tableIndex === 2 && (rowIndex === 3 || rowIndex === 4 || rowIndex === 5) &&
                    cellIndex >= 9 && cellIndex <= 14) {
                    columnName = getColumnName(cellIndex, rowIndex);
                }

                // حفظ البيانات إذا كانت الشروط متوفرة
                if (columnName && year && month && day) {
                    // استدعاء دالة الحفظ بنفس المعلمات التي تستخدمها finishEditing
                    saveToDatabase(day, columnName, newValue, day, month, year, cell, oldValue);
                } else {
                    console.log('تم تغيير القيمة إلى:', newValue, '(لم تحفظ في الخادم)');
                }
            }

            // دالة لتحديث تنسيق الخلية بناءً على قيمتها
            function updateCellStyle(cell) {
                const value = cell.textContent.trim().toUpperCase();

                // إعادة تعيين التنسيق
                cell.style.backgroundColor = '';
                cell.style.color = '';
                cell.style.fontWeight = '';

                // تطبيق التنسيق بناءً على القيمة
                if (value === 'OK') {
                    cell.style.backgroundColor = '#d4edda'; // أخضر فاتح
                    cell.style.color = '#155724'; // أخضر غامق
                    cell.style.fontWeight = 'bold';
                } else if (value === 'N OK') {
                    cell.style.backgroundColor = '#f8d7da'; // أحمر فاتح
                    cell.style.color = '#721c24'; // أحمر غامق
                    cell.style.fontWeight = 'bold';
                }
            }

            function makeCellEditable(cell) {
                const currentValue = cell.textContent;
                let The_OldValue = 0;

                const input = document.createElement('input');
                input.type = 'number';
                input.value = currentValue;
                input.style.width = '100%';
                input.style.height = '100%';
                input.style.border = 'none';
                input.style.background = 'transparent';
                input.style.textAlign = 'center';
                input.style.fontSize = 'inherit';
                input.style.backgroundColor = '#dce3efff';

                cell.textContent = '';
                cell.appendChild(input);
                input.focus();
                input.select();

                let isCancelling = false;
                let isConfirmDialogOpen = false;
                input.addEventListener('keydown', function(e) {
                    if (e.key === 'Enter') {
                        if (input.value === '') {
                            isConfirmDialogOpen = true;
                            // عرض مربع حوار التأكيد
                            const userConfirmed = confirm('هل تريد فعلاً مسح محتوى الخلية؟');

                            if (userConfirmed) {
                                // إذا اختار "نعم" - مسح المحتوى
                                finishEditing(cell, '');
                                 cell.style.backgroundColor = '';
                            } else {
                                // إذا اختار "لا" - إعادة القيمة الأصلية
                                cell.textContent = currentValue;
                            }
                        } else if (input.value < The_OldValue) {
                            cell.textContent = currentValue;
                            showMessage('❌ القيمة يجب أن تكون أكبر من أو تساوي ' + The_OldValue);
                            cell.style.backgroundColor = '#d21313ff'; // لون أحمر فاتح
                            setTimeout(() => {
                                cell.style.backgroundColor = ''; // إعادة اللون بعد ثانيتين
                                hideMessage();
                            }, 2000);
                        } else {
                            finishEditing(cell, input.value);
                             cell.style.backgroundColor = '#d4edda'; // أخضر فاتح
                        }

                    } else if (e.key === 'Escape') {
                        isCancelling = true; // وضع علامة للإلغاء
                        cell.textContent = currentValue;
                    }
                });

                input.addEventListener('blur', function() {
                    if (!isCancelling && !isConfirmDialogOpen) {
                        if (input.value === '') {
                            // عرض مربع حوار التأكيد
                            const userConfirmed = confirm('هل تريد فعلاً مسح محتوى الخلية؟');

                            if (userConfirmed) {
                                // إذا اختار "نعم" - مسح المحتوى
                                finishEditing(cell, '');
                                cell.style.backgroundColor = ''; 
                            } else {
                                // إذا اختار "لا" - إعادة القيمة الأصلية
                                cell.textContent = currentValue;
                            }
                        } else if (input.value < The_OldValue) {
                            cell.textContent = currentValue;
                            showMessage('❌ القيمة يجب أن تكون أكبر من أو تساوي ' + The_OldValue);
                            cell.style.backgroundColor = '#d21313ff'; // لون أحمر فاتح
                            setTimeout(() => {
                                cell.style.backgroundColor = ''; // إعادة اللون بعد ثانيتين
                                hideMessage();
                            }, 2000);
                        } else {
                            finishEditing(cell, input.value);
                             cell.style.backgroundColor = '#d4edda'; 
                        }
                    }
                    isCancelling = false; // إعادة تعيين المتغير
                     isConfirmDialogOpen = false;
                });
            }

            function saveToDatabase(row, columnName, value, day, month, year, cell, oldValue) {
                // إنشاء كائن FormData لإرسال البيانات
                const formData = new FormData();
                formData.append('row', row);
                formData.append('column', columnName);
                formData.append('value', value);
                formData.append('day', day);
                formData.append('month', month);
                formData.append('year', year);

                // إظهار مؤشر تحميل
                const originalContent = cell.textContent;
                cell.innerHTML = '<div style="color: blue;">⏳</div>';

                // إرسال البيانات باستخدام fetch
                fetch('save_logbook_data.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('تم حفظ البيانات بنجاح:', data.message);
                            cell.textContent = value; // تأكيد القيمة

                            // إذا كانت الخلية من الأعمدة 9-14، قم بتحديث التنسيق
                            const cellIndex = cell.cellIndex + 1;
                            if (cellIndex >= 9 && cellIndex <= 14) {
                                updateCellStyle(cell);
                            }
                        } else {
                            console.error('خطأ في حفظ البيانات:', data.message);
                            cell.textContent = oldValue; // استعادة القيمة القديمة

                            // إذا كانت الخلية من الأعمدة 9-14، قم بتحديث التنسيق
                            const cellIndex = cell.cellIndex + 1;
                            if (cellIndex >= 9 && cellIndex <= 14) {
                                updateCellStyle(cell);
                            }

                            alert('حدث خطأ أثناء حفظ البيانات: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('خطأ في الاتصال:', error);
                        cell.textContent = oldValue; // استعادة القيمة القديمة

                        // إذا كانت الخلية من الأعمدة 9-14، قم بتحديث التنسيق
                        const cellIndex = cell.cellIndex + 1;
                        if (cellIndex >= 9 && cellIndex <= 14) {
                            updateCellStyle(cell);
                        }

                        alert('حدث خطأ في الاتصال بالخادم');
                    });
            }

            // دالة للحصول على اسم العمود بناءً على رقمه ورقم الصف
            function getColumnName(columnIndex, rowIndex) {
                // تحديد اللاحقة بناءً على رقم الصف
                let suffix;
                if (rowIndex === 3) { // الصف الرابع (A)
                    suffix = 'A';
                } else if (rowIndex === 4) { // الصف الخامس (B)
                    suffix = 'B';
                } else if (rowIndex === 5) { // الصف السادس (C)
                    suffix = 'C';
                } else {
                    return null; // للصفوف الأخرى
                }

                const columnMap = {
                    // الأعمدة 20-15
                    20: 'SW_G_CU_INC',
                    19: 'SW_G_CU_TR_1',
                    18: 'SW_G_CU_TR_2',
                    17: 'SW_G_CU_TR_3',
                    16: 'SW_G_CU_TR_5',
                    15: 'SW_G_CU_TR_RO',

                    // الأعمدة 14-1
                    14: 'SW_G_SF6_INC',
                    13: 'SW_G_SF6_TR_1',
                    12: 'SW_G_SF6_TR_2',
                    11: 'SW_G_SF6_TR_3',
                    10: 'SW_G_SF6_TR_5',
                    9: 'SW_G_SF6_TR_RO',
                    8: 'SW_G_ROOM_TEMP',
                    7: 'LV_SW_G_CU_MCC_1',
                    6: 'LV_SW_G_CU_MCC_2',
                    5: 'LV_SW_G_CU_MCC_3A',
                    4: 'LV_SW_G_CU_MCC_3',
                    3: 'LV_SW_G_CU_MCC_5',
                    2: 'LV_SW_G_CU_MCC_RS',
                    1: 'LV_SW_G_ROOM_TEMP'
                };

                const baseName = columnMap[columnIndex];
                return baseName ? baseName + '_' + suffix : null;
            }

            // دالة للحصول على اسم العمود في الجدول الثالث بناءً على رقمه ورقم الصف
            function getColumnNameTable3(columnIndex, rowIndex) {
                // تحديد اللاحقة بناءً على رقم الصف
                let suffix;
                if (rowIndex === 3) { // الصف الرابع (A)
                    suffix = 'A';
                } else if (rowIndex === 4) { // الصف الخامس (B)
                    suffix = 'B';
                } else if (rowIndex === 5) { // الصف السادس (C)
                    suffix = 'C';
                } else {
                    return null; // للصفوف الأخرى
                }

                const columnMap = {
                    36: 'M_08130_A',
                    35: 'M_08130_T',
                    34: 'M_08140_A',
                    33: 'M_08140_T',
                    32: 'M_08150_A',
                    31: 'M_08150_T',
                    30: 'M_08160_A',
                    29: 'M_08160_T',
                    28: 'M_08230_A',
                    27: 'M_08230_T',
                    26: 'M_08240_A',
                    25: 'M_08240_T',
                    24: 'M_08330_A',
                    23: 'M_08330_T',
                    22: 'M_08340_A',
                    21: 'M_08340_T',
                    20: 'M_08430_A',
                    19: 'M_08430_T',
                    18: 'M_09130_A',
                    17: 'M_09130_T',
                    16: 'M_09140_A',
                    15: 'M_09140_T',
                    14: 'M_09230_A',
                    13: 'M_09230_T',
                    12: 'M_09380_A',
                    11: 'M_09380_T',
                    10: 'M_09430_A',
                    9: 'M_09430_T',
                    8: 'M_10160_A',
                    7: 'M_10160_T',
                    6: 'M_04240_A',
                    5: 'M_04240_T',
                    4: 'M_04250_A',
                    3: 'M_04250_T',
                    2: 'M_10020_A',
                    1: 'M_10020_T'
                };

                const baseName = columnMap[columnIndex];
                return baseName ? baseName + '_' + suffix : null;
            }

            // دالة للحصول على اسم العمود في الجدول الرابع بناءً على رقمه ورقم الصف
            function getColumnNameTable4(columnIndex, rowIndex) {
                // تحديد اللاحقة بناءً على رقم الصف
                let suffix;
                if (rowIndex === 3) { // الصف الرابع (A)
                    suffix = 'A';
                } else if (rowIndex === 4) { // الصف الخامس (B)
                    suffix = 'B';
                } else if (rowIndex === 5) { // الصف السادس (C)
                    suffix = 'C';
                } else {
                    return null; // للصفوف الأخرى
                }

                const columnMap = {
                    32: 'M_13020_A',
                    31: 'M_13020_T',
                    30: 'M_13025_A',
                    29: 'M_13025_T',
                    28: 'M_13040_A',
                    27: 'M_13040_T',
                    26: 'M_13045_A',
                    25: 'M_13045_T',
                    24: 'M_13060_A',
                    23: 'M_13060_T',
                    22: 'M_13065_A',
                    21: 'M_13065_T',
                    20: 'M_13080_A',
                    19: 'M_13080_T',
                    18: 'M_13085_A',
                    17: 'M_13085_T',
                    16: 'M_13100_A',
                    15: 'M_13100_T',
                    14: 'M_13105_A',
                    13: 'M_13105_T',
                    12: 'M_13120_A',
                    11: 'M_13120_T',
                    10: 'M_13125_A',
                    9: 'M_13125_T',
                    8: 'M_13140_A',
                    7: 'M_13140_T',
                    6: 'M_13145_A',
                    5: 'M_13145_T',
                    4: 'M_13160_A',
                    3: 'M_13160_T',
                    2: 'M_13165_A',
                    1: 'M_13165_T'
                };

                const baseName = columnMap[columnIndex];
                return baseName ? baseName + '_' + suffix : null;
            }

            // دالة للحصول على اسم العمود في الجدول الخامس بناءً على رقمه ورقم الصف
            function getColumnNameTable5(columnIndex, rowIndex) {
                // تحديد اللاحقة بناءً على رقم الصف
                let suffix;
                if (rowIndex === 3) { // الصف الرابع (A)
                    suffix = 'A';
                } else if (rowIndex === 4) { // الصف الخامس (B)
                    suffix = 'B';
                } else if (rowIndex === 5) { // الصف السادس (C)
                    suffix = 'C';
                } else {
                    return null; // للصفوف الأخرى
                }

                const columnMap = {
                    // الأعمدة 32-17 (الجزء الأول)
                    32: 'M_05840_A',
                    31: 'M_05840_T',
                    30: 'M_05845_A',
                    29: 'M_05845_T',
                    28: 'M_05850_A',
                    27: 'M_05850_T',
                    26: 'M_13210_A',
                    25: 'M_13210_T',
                    24: 'M_13220_A',
                    23: 'M_13220_T',
                    22: 'M_13230_A',
                    21: 'M_13230_T',
                    20: 'M_10120_A',
                    19: 'M_10120_T',
                    18: 'M_10640_A',
                    17: 'M_10640_T',

                    // الأعمدة 16-1 (الجزء الثاني)
                    16: 'TR_TR1_AMP',
                    15: '', // خلية غير قابلة للتعديل
                    14: 'TR_TR1_OTI',
                    13: 'TR_TR2_AMP',
                    12: '', // خلية غير قابلة للتعديل
                    11: 'TR_TR2_OTI',
                    10: 'TR_TR3_AMP',
                    9: 'TR_TR3_WTI',
                    8: 'TR_TR3_OTI',
                    7: 'TR_TR5_AMP',
                    6: '', // خلية غير قابلة للتعديل
                    5: 'TR_TR5_OTI',
                    4: 'TR_TRRO_AMP',
                    3: '', // خلية غير قابلة للتعديل
                    2: '', // خلية غير قابلة للتعديل
                    1: 'TR_REMARKS'
                };

                const baseName = columnMap[columnIndex];
                return baseName ? baseName + '_' + suffix : null;
            }

            // دالة للحصول على اسم العمود في الجدول السادس بناءً على رقمه ورقم الصف
            function getColumnNameTable6(columnIndex, rowIndex) {
                // تحديد اللاحقة الزمنية بناءً على رقم الصف
                let timeSuffix;
                if (rowIndex === 3) { // الصف الرابع (9_AM)
                    timeSuffix = '9_AM';
                } else if (rowIndex === 4) { // الصف الخامس (1_PM)
                    timeSuffix = '1_PM';
                } else if (rowIndex === 5) { // الصف السادس (5_PM)
                    timeSuffix = '5_PM';
                } else if (rowIndex === 6) { // الصف السابع (9_PM)
                    timeSuffix = '9_PM';
                } else if (rowIndex === 7) { // الصف الثامن (1_AM)
                    timeSuffix = '1_AM';
                } else if (rowIndex === 8) { // الصف التاسع (5_AM)
                    timeSuffix = '5_AM';
                } else {
                    return null; // للصفوف الأخرى
                }

                const columnMap = {
                    18: 'BCVFD_08130_INV',
                    17: 'BCVFD_08130_CNV',
                    16: 'BCVFD_08140_INV',
                    15: 'BCVFD_08140_CNV',
                    14: 'BCVFD_08150_INV',
                    13: 'BCVFD_08150_CNV',
                    12: 'BCVFD_08160_INV',
                    11: 'BCVFD_08160_CNV',
                    10: 'BCVFD_08230_INV',
                    9: 'BCVFD_08230_CNV',
                    8: 'BCVFD_08240_INV',
                    7: 'BCVFD_08240_CNV',
                    6: 'BCVFD_08330_INV',
                    5: 'BCVFD_08330_CNV',
                    4: 'BCVFD_08340_INV',
                    3: 'BCVFD_08340_CNV',
                    2: 'BCVFD_08430_INV',
                    1: 'BCVFD_08430_CNV'
                };

                const baseName = columnMap[columnIndex];
                return baseName ? baseName + '_' + timeSuffix : null;
            }

            // دالة للحصول على اسم العمود في الجدول السابع بناءً على رقمه (للصف الخامس فقط)
            function getColumnNameTable7(columnIndex) {
                const columnMap = {
                    14: 'ENE_MCC_1',
                    13: 'ENE_MCC_2',
                    12: 'ENE_MCC_3',
                    11: 'ENE_MCC_3A',
                    10: 'ENE_MCC_5',
                    9: 'ENE_AIR_COMPRESSOR',
                    8: 'ENE_COMP_FROM_MCC_3',
                    7: 'ENE_RO_PLANT',
                    6: 'ENE_K_SILO',
                    5: 'ENE_PACKING',
                    4: 'ENE_RAW_SUGAR',
                    3: 'ENE_MCC_2B',
                    2: 'ENE_B_CONVEYOR',
                    1: 'ENE_COMPRESSOR'
                };

                const baseName = columnMap[columnIndex];
                return baseName ? baseName + '_A' : null; // كلها تنتهي بـ _A
            }
            // gool


            // دالة للحصول على اسم العمود في الجدول السابع بناءً على رقمه (للصف الخامس فقط)
            function getColumnNameTable9(columnIndex, rowIndex) {
                const columnMap = {
                    // العمود 1 - الصفوف 3، 4، 5
                    '1_2': 'PLANT_REF_CONS_REMARKS_A',
                    '1_3': 'PLANT_REF_CONS_REMARKS_B',
                    '1_4': 'PLANT_REF_CONS_REMARKS_C',

                    // العمود 3 - الصفوف 3، 4، 5 (إذا كنت لا تزال تحتاجها)
                    '3_2': 'SUGAR_PROD_TON_A',
                    '3_3': 'SUGAR_PROD_TON_B',
                    '3_4': 'SUGAR_PROD_TON_C'
                };

                const key = `${columnIndex}_${rowIndex}`;
                return columnMap[key] || null;
            }

            //99999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999
            function saveTable9DataToDatabase() {
                // الحصول على القيم من الجدول التاسع
                const refiningValue = document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(5)').textContent;
                const packingValue = document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(4)').textContent;

                const refing_production_A = document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(3)').textContent;
                const refing_production_B = document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(3)').textContent;
                const refing_production_C = document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(3)').textContent;

                const rsfining_month_consumption = document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(5)').textContent;
                const packing_month_consumption = document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(4)').textContent;

                // الحصول على التاريخ المحدد
                const year = yearSelect.value;
                const month = monthSelect.value;
                const day = daySelect.value;

                // التأكد من وجود القيم والتاريخ
                if (!refiningValue || !packingValue || !day || !month || !year) {
                    console.error('❌ بيانات ناقصة لحفظ بيانات الجدول التاسع');
                    return;
                }

                // إنشاء كائن FormData لإرسال البيانات
                const formData = new FormData();
                formData.append('row', day); // SR هو يوم الشهر
                formData.append('column', 'REFINING_KWH_A');
                formData.append('value', refiningValue);
                formData.append('day', day);
                formData.append('month', month);
                formData.append('year', year);

                // إرسال البيانات الأولى (REFINING_KWH_A)
                fetch('save_logbook_data.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('✅ تم حفظ REFINING_KWH_A بنجاح:', refiningValue);
                        } else {
                            console.error('❌ فشل حفظ REFINING_KWH_A:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('❌ خطأ في الاتصال عند حفظ REFINING_KWH_A:', error);
                    });

                // إرسال البيانات الثانية (PACKING_KWH_A)
                const formData2 = new FormData();
                formData2.append('row', day);
                formData2.append('column', 'PACKING_KWH_A');
                formData2.append('value', packingValue);
                formData2.append('day', day);
                formData2.append('month', month);
                formData2.append('year', year);

                fetch('save_logbook_data.php', {
                        method: 'POST',
                        body: formData2
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('✅ تم حفظ PACKING_KWH_A بنجاح:', packingValue);
                        } else {
                            console.error('❌ فشل حفظ PACKING_KWH_A:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('❌ خطأ في الاتصال عند حفظ PACKING_KWH_A:', error);
                    });


                // إنشاء كائن FormData لإرسال البيانات
                const formDat3 = new FormData();
                formDat3.append('row', day); // SR هو يوم الشهر
                formDat3.append('column', 'SUGAR_PROD_TON_A');
                formDat3.append('value', refing_production_A);
                formDat3.append('day', day);
                formDat3.append('month', month);
                formDat3.append('year', year);

                // إرسال البيانات الأولى (REFINING_KWH_A)
                fetch('save_logbook_data.php', {
                        method: 'POST',
                        body: formDat3
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('✅ تم حفظ REFINING_KWH_A بنجاح:', refiningValue);
                        } else {
                            console.error('❌ فشل حفظ REFINING_KWH_A:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('❌ خطأ في الاتصال عند حفظ REFINING_KWH_A:', error);
                    });



                const formData4 = new FormData();
                formData4.append('row', 1);
                formData4.append('column', 'SUGAR_PROD_TON_B');
                formData4.append('value', refing_production_B);
                formData4.append('day', 1);
                formData4.append('month', month);
                formData4.append('year', year);

                fetch('save_logbook_data.php', {
                        method: 'POST',
                        body: formData4
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('✅ تم حفظ PACKING_KWH_A بنجاح:', packingValue);
                        } else {
                            console.error('❌ فشل حفظ PACKING_KWH_A:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('❌ خطأ في الاتصال عند حفظ PACKING_KWH_A:', error);
                    });

                const formData5 = new FormData();
                formData5.append('row', 1);
                formData5.append('column', 'SUGAR_PROD_TON_C');
                formData5.append('value', refing_production_C);
                formData5.append('day', 1);
                formData5.append('month', 1);
                formData5.append('year', year);

                fetch('save_logbook_data.php', {
                        method: 'POST',
                        body: formData5
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('✅ تم حفظ PACKING_KWH_A بنجاح:', packingValue);
                        } else {
                            console.error('❌ فشل حفظ PACKING_KWH_A:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('❌ خطأ في الاتصال عند حفظ PACKING_KWH_A:', error);
                    });

                const formData6 = new FormData();
                formData6.append('row', 1);
                formData6.append('column', 'REFINING_KWH_B');
                formData6.append('value', rsfining_month_consumption);
                formData6.append('day', 1);
                formData6.append('month', month);
                formData6.append('year', year);

                fetch('save_logbook_data.php', {
                        method: 'POST',
                        body: formData6
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('✅ تم حفظ PACKING_KWH_A بنجاح:', packingValue);
                        } else {
                            console.error('❌ فشل حفظ PACKING_KWH_A:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('❌ خطأ في الاتصال عند حفظ PACKING_KWH_A:', error);
                    });

                const formData7 = new FormData();
                formData7.append('row', 1);
                formData7.append('column', 'PACKING_KWH_B');
                formData7.append('value', packing_month_consumption);
                formData7.append('day', 1);
                formData7.append('month', month);
                formData7.append('year', year);

                fetch('save_logbook_data.php', {
                        method: 'POST',
                        body: formData7
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('✅ تم حفظ PACKING_KWH_A بنجاح:', packingValue);
                        } else {
                            console.error('❌ فشل حفظ PACKING_KWH_A:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('❌ خطأ في الاتصال عند حفظ PACKING_KWH_A:', error);
                    });
            }

            function saveTable9Row4ToDatabase() {
                // الحصول على القيم من الجدول التاسع - الصف الرابع
                const refiningValueC = document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(5)').textContent;
                const packingValueC = document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(4)').textContent;

                // الحصول على السنة والشهر المحددين (اليوم دائماً 1)
                const year = yearSelect.value;
                const month = 1;
                const day = 1; // دائماً الصف الأول

                // التأكد من وجود القيم والتاريخ
                if (!refiningValueC || !packingValueC || !month || !year) {
                    console.error('❌ بيانات ناقصة لحفظ بيانات الجدول التاسع - الصف الرابع');
                    return;
                }

                // إنشاء كائن FormData لإرسال البيانات الأولى (REFINING_KWH_B)
                const formData1 = new FormData();
                formData1.append('row', day);
                formData1.append('column', 'REFINING_KWH_C');
                formData1.append('value', refiningValueC);
                formData1.append('day', day);
                formData1.append('month', month);
                formData1.append('year', year);

                // إرسال البيانات الأولى
                fetch('save_logbook_data.php', {
                        method: 'POST',
                        body: formData1
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('✅ تم حفظ REFINING_KWH_C بنجاح:', refiningValueC);
                        } else {
                            console.error('❌ فشل حفظ REFINING_KWH_C:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('❌ خطأ في الاتصال عند حفظ REFINING_KWH_C:', error);
                    });

                // إنشاء كائن FormData لإرسال البيانات الثانية (PACKING_KWH_B)
                const formData2 = new FormData();
                formData2.append('row', day);
                formData2.append('column', 'PACKING_KWH_C');
                formData2.append('value', packingValueC);
                formData2.append('day', day);
                formData2.append('month', month);
                formData2.append('year', year);

                // إرسال البيانات الثانية
                fetch('save_logbook_data.php', {
                        method: 'POST',
                        body: formData2
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('✅ تم حفظ PACKING_KWH_C بنجاح:', packingValueC);
                        } else {
                            console.error('❌ فشل حفظ PACKING_KWH_C:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('❌ خطأ في الاتصال عند حفظ PACKING_KWH_C:', error);
                    });
            }

            function saveTable9_KW_per_Ton() {
                // الحصول على القيم من الجدول التاسع - الصف الرابع
                const KW_Per_TON_A = document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(2)').textContent;
                const KW_Per_TON_B = document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(2)').textContent;
                const KW_Per_TON_C = document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(2)').textContent;

                // الحصول على السنة والشهر المحددين (اليوم دائماً 1)
                const year = yearSelect.value;
                const month = monthSelect.value;
                const day = daySelect.value;

                // التأكد من وجود القيم والتاريخ
                if (!KW_Per_TON_A || !KW_Per_TON_B || !KW_Per_TON_C || !month || !year) {
                    console.error('❌ بيانات ناقصة لحفظ بيانات الجدول التاسع - الصف الرابع');
                    return;
                }

                // إنشاء كائن FormData لإرسال البيانات الأولى (REFINING_KWH_B)
                const formData1 = new FormData();
                formData1.append('row', day);
                formData1.append('column', 'KW_PER_TON_A');
                formData1.append('value', KW_Per_TON_A);
                formData1.append('day', day);
                formData1.append('month', month);
                formData1.append('year', year);

                // إرسال البيانات الأولى
                fetch('save_logbook_data.php', {
                        method: 'POST',
                        body: formData1
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('✅ تم حفظ KW_PER_TON_A بنجاح:', KW_Per_TON_A);
                        } else {
                            console.error('❌ فشل حفظ KW_PER_TON_A:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('❌ خطأ في الاتصال عند حفظ REFINING_KWH_B:', error);
                    });

                // إنشاء كائن FormData لإرسال البيانات الثانية (PACKING_KWH_B)

                const formData2 = new FormData();
                formData2.append('row', 1);
                formData2.append('column', 'KW_PER_TON_B');
                formData2.append('value', KW_Per_TON_B);
                formData2.append('day', 1);
                formData2.append('month', month);
                formData2.append('year', year);

                // إرسال البيانات الثانية
                fetch('save_logbook_data.php', {
                        method: 'POST',
                        body: formData2
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('✅ تم حفظ KW_PER_TON_B بنجاح:', KW_Per_TON_B);
                        } else {
                            console.error('❌ فشل حفظ KW_PER_TON_B:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('❌ خطأ في الاتصال عند حفظ PACKING_KWH_B:', error);
                    });


                // إنشاء كائن FormData لإرسال البيانات الثانية (PACKING_KWH_B)

                const formData3 = new FormData();
                formData3.append('row', 1);
                formData3.append('column', 'KW_PER_TON_C');
                formData3.append('value', KW_Per_TON_C);
                formData3.append('day', 1);
                formData3.append('month', 1);
                formData3.append('year', year);

                // إرسال البيانات الثانية
                fetch('save_logbook_data.php', {
                        method: 'POST',
                        body: formData3
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('✅ تم حفظ KW_Per_TON_C بنجاح:', KW_Per_TON_C);
                        } else {
                            console.error('❌ فشل حفظ KW_Per_TON_C:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('❌ خطأ في الاتصال عند حفظ KW_Per_TON_C:', error);
                    });

            }


            function PLANT_REF_CONS_REMARKS_A_B_C() {
                // الحصول على القيم من الجدول التاسع - الصف الرابع
                const PLANT_REF_CONS_REMARKS_A = document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(1)').textContent;
                const PLANT_REF_CONS_REMARKS_B = document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(1)').textContent;
                const PLANT_REF_CONS_REMARKS_C = document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(1)').textContent;

                // الحصول على السنة والشهر المحددين (اليوم دائماً 1)
                const year = yearSelect.value;
                const month = monthSelect.value;
                const day = daySelect.value;

                // التأكد من وجود القيم والتاريخ
                if (!PLANT_REF_CONS_REMARKS_A || !PLANT_REF_CONS_REMARKS_B || !PLANT_REF_CONS_REMARKS_C || !month || !year) {
                    console.error('❌ بيانات ناقصة لحفظ بيانات الجدول التاسع - الصف الرابع');
                    return;
                }

                // إنشاء كائن FormData لإرسال البيانات الأولى (REFINING_KWH_B)
                const formData1 = new FormData();
                formData1.append('row', day);
                formData1.append('column', 'PLANT_REF_CONS_REMARKS_A');
                formData1.append('value', PLANT_REF_CONS_REMARKS_A);
                formData1.append('day', day);
                formData1.append('month', month);
                formData1.append('year', year);

                // إرسال البيانات الأولى
                fetch('save_logbook_data.php', {
                        method: 'POST',
                        body: formData1
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('✅ تم حفظ  PLANT_REF_CONS_REMARKS_A بنجاح:', PLANT_REF_CONS_REMARKS_A);
                        } else {
                            console.error('❌ فشل حفظ  PLANT_REF_CONS_REMARKS_A:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('❌ خطأ في الاتصال عند حفظ REFINING_KWH_B:', error);
                    });

                // إنشاء كائن FormData لإرسال البيانات الثانية (PACKING_KWH_B)

                const formData2 = new FormData();
                formData2.append('row', 1);
                formData2.append('column', 'PLANT_REF_CONS_REMARKS_B');
                formData2.append('value', PLANT_REF_CONS_REMARKS_B);
                formData2.append('day', 1);
                formData2.append('month', month);
                formData2.append('year', year);

                // إرسال البيانات الثانية
                fetch('save_logbook_data.php', {
                        method: 'POST',
                        body: formData2
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('✅ تم حفظ  PLANT_REF_CONS_REMARKS_B بنجاح:', PLANT_REF_CONS_REMARKS_B);
                        } else {
                            console.error('❌ فشل حفظ  PLANT_REF_CONS_REMARKS_B:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('❌ خطأ في الاتصال عند حفظ PLANT_REF_CONS_REMARKS_B:', error);
                    });


                // إنشاء كائن FormData لإرسال البيانات الثانية (PACKING_KWH_B)

                const formData3 = new FormData();
                formData3.append('row', 1);
                formData3.append('column', 'PLANT_REF_CONS_REMARKS_C');
                formData3.append('value', PLANT_REF_CONS_REMARKS_C);
                formData3.append('day', 1);
                formData3.append('month', 1);
                formData3.append('year', year);

                // إرسال البيانات الثانية
                fetch('save_logbook_data.php', {
                        method: 'POST',
                        body: formData3
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('✅ تم حفظ  PLANT_REF_CONS_REMARKS_C بنجاح:', PLANT_REF_CONS_REMARKS_C);
                        } else {
                            console.error('❌ فشل حفظ  PLANT_REF_CONS_REMARKS_C:', data.message);
                        }
                    })
                    .catch(error => {
                        console.error('❌ خطأ في الاتصال عند حفظ  PLANT_REF_CONS_REMARKS_C:', error);
                    });

            }
            //999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999
            // تعديل دالة finishEditing لحفظ البيانات تلقائياً
            async function finishEditing(cell, value) {



                const oldValue = cell.textContent;
                cell.textContent = value;

                // حفظ البيانات في الخادم للخلايا المحددة
                const table = cell.closest('table');
                const tableIndex = Array.from(document.querySelectorAll('table')).indexOf(table) + 1;
                const row = cell.parentElement;
                const rowIndex = row.rowIndex;
                const cellIndex = cell.cellIndex + 1;

                console.log('=== finishEditing called ===');
                console.log('Table index:', tableIndex);
                console.log('Row index:', rowIndex);
                console.log('Cell index:', cellIndex);
                console.log('Value:', value);

                const yearSelect = document.getElementById('year-select');
                const monthSelect = document.getElementById('month-select');
                const daySelect = document.getElementById('day-select');

                const year = yearSelect.value;
                const month = monthSelect.value;
                const day = daySelect.value;

                let columnName = null;

                // الجدول الثاني (الصفوف 3-5، الأعمدة 1-20)
                if (tableIndex === 2 && (rowIndex === 3 || rowIndex === 4 || rowIndex === 5) && cellIndex >= 1 && cellIndex <= 20) {
                    columnName = getColumnName(cellIndex, rowIndex);
                }
                // الجدول الثالث (الصفوف 3-5، الأعمدة 1-36)
                else if (tableIndex === 3 && (rowIndex === 3 || rowIndex === 4 || rowIndex === 5) && cellIndex >= 1 && cellIndex <= 36) {
                    columnName = getColumnNameTable3(cellIndex, rowIndex);
                }
                // الجدول الرابع (الصفوف 3-5، الأعمدة 1-32)
                else if (tableIndex === 4 && (rowIndex === 3 || rowIndex === 4 || rowIndex === 5) && cellIndex >= 1 && cellIndex <= 32) {
                    columnName = getColumnNameTable4(cellIndex, rowIndex);
                }
                // الجدول الخامس (الصفوف 3-5، الأعمدة 1-32)
                else if (tableIndex === 5 && (rowIndex === 3 || rowIndex === 4 || rowIndex === 5) && cellIndex >= 1 && cellIndex <= 32) {
                    columnName = getColumnNameTable5(cellIndex, rowIndex);
                }
                // الجدول السادس (الصفوف 3-8، الأعمدة 1-18)
                else if (tableIndex === 6 && (rowIndex >= 3 && rowIndex <= 8) && cellIndex >= 1 && cellIndex <= 18) {
                    columnName = getColumnNameTable6(cellIndex, rowIndex);
                }
                // الجدول السابع (الصف الخامس فقط، الأعمدة 1-14)
                else if (tableIndex === 7 && rowIndex === 4 && cellIndex >= 1 && cellIndex <= 14) {
                    columnName = getColumnNameTable7(cellIndex);
                    await calculatingImproved_Change();

                }
                // ✅ المعالجة الخاصة للجدول التاسع - العمود الثالث
                else if (tableIndex === 9 && (rowIndex === 2 || rowIndex === 3 || rowIndex === 4) &&
                    (cellIndex === 1 || cellIndex === 3)) {
                    columnName = getColumnNameTable9(cellIndex, rowIndex);
                    await calculatingImproved_Change();
                }
                if (columnName && year && month && day) {
                    saveToDatabase(day, columnName, value, day, month, year, cell, oldValue);
                    return;
                }

                // إذا لم تكن الخلية من الخلايا التي تحفظ تلقائياً
                console.log('تم تعديل القيمة (لم تحفظ في الخادم):', value);
            }
            // تفعيل ميزات التعديل
            enableDoubleClickEditing();
            enableToggleEditing();
            enableTable3Editing();
            enableTable4Editing();
            enableTable5Editing();
            enableTable6Editing();
            enableTable7Editing(); // إضافة هذا السطر
            enableTable9Editing();
            notAllow();

            // تطبيق التنسيق الأولي على الخلايا 9-14
            function applyInitialStyles() {
                const table = document.querySelector('table:nth-of-type(2)');

                for (let row = 3; row <= 5; row++) {
                    for (let col = 9; col <= 14; col++) {
                        const cell = table.querySelector(`tr:nth-child(${row}) td:nth-child(${col})`);
                        if (cell) {
                            updateCellStyle(cell);
                        }
                    }
                }
            }

            applyInitialStyles();

            function changecolor() {
                // الحصول على الجدول السابع
                const table = document.querySelector('table:nth-of-type(7)');

                if (!table) {
                    console.error('❌ الجدول السابع غير موجود');
                    return;
                }

                // الحصول على الصف الخامس في الجدول
                const row = table.querySelector('tr:nth-child(5)');

                if (!row) {
                    console.error('❌ الصف الخامس غير موجود في الجدول السابع');
                    return;
                }

                // الحصول على جميع خلايا الصف الخامس (14 خلية)
                const cells = row.querySelectorAll('td');

                if (cells.length === 0) {
                    console.error('❌ لا توجد خلايا في الصف الخامس');
                    return;
                }

                // تغيير لون خلفية كل خلية
                cells.forEach((cell, index) => {

                    if (cell.cellIndex + 1 === 15) {
                        return; // تخطي العمود 15
                    }

                    cell.style.backgroundColor = '#f6c3efff'; // لون أزرق فاتح
                    cell.style.border = '2px solid #7b0966ff'; // إطار أزرق
                    cell.style.padding = '8px';
                    cell.style.fontWeight = 'bold';
                    cell.style.color = '#71075fff';

                });
                const table9 = document.querySelector('table:nth-of-type(9)');

                if (!table9) {
                    console.error('❌ الجدول التاسع غير موجود');
                    return;
                }

                // الحصول على الصف الثالث في الجدول

                const row93 = table9.querySelector('tr:nth-child(3)');
                const row94 = table9.querySelector('tr:nth-child(4)');
                const row95 = table9.querySelector('tr:nth-child(5)');



                if (!row93) {
                    console.error('❌ الصف الثالث غير موجود في الجدول التاسع');
                    return;
                }

                // الحصول على الخلية الثالثة في الصف الثالث (العمود الثالث)
                const cell933 = row93.querySelector('td:nth-child(3)');

                if (!cell933) {
                    console.error('❌ الخلية الثالثة غير موجودة في الصف الثالث');
                    return;
                }

                // تغيير لون خلفية الخلية
                cell933.style.backgroundColor = '#f6c3efff'; // لون أزرق فاتح
                cell933.style.border = '2px solid #7b0966ff'; // إطار أزرق
                cell933.style.padding = '8px';
                cell933.style.fontWeight = 'bold';
                cell933.style.color = '#71075fff';

                const cell931 = row93.querySelector('td:nth-child(1)');
                cell931.style.backgroundColor = '#f6c3efff'; // لون أزرق فاتح
                cell931.style.border = '2px solid #7b0966ff'; // إطار أزرق
                cell931.style.padding = '8px';
                cell931.style.fontWeight = 'bold';
                cell931.style.color = '#71075fff';

                const cell941 = row94.querySelector('td:nth-child(1)');
                cell941.style.backgroundColor = '#f6c3efff'; // لون أزرق فاتح
                cell941.style.border = '2px solid #7b0966ff'; // إطار أزرق
                cell941.style.padding = '8px';
                cell941.style.fontWeight = 'bold';
                cell941.style.color = '#71075fff';

                const cell951 = row95.querySelector('td:nth-child(1)');
                cell951.style.backgroundColor = '#f6c3efff'; // لون أزرق فاتح
                cell951.style.border = '2px solid #7b0966ff'; // إطار أزرق
                cell951.style.padding = '8px';
                cell951.style.fontWeight = 'bold';
                cell951.style.color = '#71075fff';


            }

            // كود الادخال للبيانات XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX

            // يمكنك وضع هذا الكود هنا لضمان تنفيذه بعد تحميل الصفحة
            // استهداف خلية الاولى فقط 
            // document.querySelector('table:nth-of-type(2) tr:nth-child(1) td:nth-child(6)').classList.add('center');
            // استهداف الصف الاول فقط 
            // document.querySelectorAll('table:nth-of-type(2) tr:nth-child(1) td').forEach(cell => {
            //     cell.classList.add('center');
            // });
            // استهداف الجدول بالكامل 
            document.querySelectorAll('table:nth-of-type(1) tr td').forEach(cell => {
                cell.classList.add('wide_font');
                cell.classList.add('center');
            });

            document.querySelectorAll('table:nth-of-type(2) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(2) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(2) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(2) tr:nth-child(3) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });


            document.querySelectorAll('table:nth-of-type(3) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            document.querySelectorAll('table:nth-of-type(3) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(3) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(3) tr:nth-child(3) td').forEach(cell => {
                cell.classList.add('wide_font');
            });


            document.querySelectorAll('table:nth-of-type(4) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            document.querySelectorAll('table:nth-of-type(4) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(4) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(4) tr:nth-child(3) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            document.querySelectorAll('table:nth-of-type(5) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            document.querySelectorAll('table:nth-of-type(5) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(5) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(5) tr:nth-child(3) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            document.querySelectorAll('table:nth-of-type(6) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            document.querySelectorAll('table:nth-of-type(6) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(6) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(6) tr:nth-child(3) td').forEach(cell => {
                cell.classList.add('wide_font');
            });


            document.querySelectorAll('table:nth-of-type(7) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            document.querySelectorAll('table:nth-of-type(7) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(7) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(7) tr:nth-child(3) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            document.querySelectorAll('table:nth-of-type(8) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            document.querySelectorAll('table:nth-of-type(8) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(8) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(8) tr:nth-child(3) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            document.querySelectorAll('table:nth-of-type(9) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            document.querySelectorAll('table:nth-of-type(9) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });

            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(9) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });

            // start


            const dateCell = document.querySelector("table:nth-of-type(1) tr:nth-child(1) td:nth-child(1)");
            if (dateCell) {
                const today = new Date();
                const day = String(today.getDate()).padStart(2, '0');
                const month = String(today.getMonth() + 1).padStart(2, '0');
                const year = today.getFullYear();
                dateCell.textContent = `${day}/${month}/${year}`;
            }



            const yearSelect = document.getElementById('year-select');
            const monthSelect = document.getElementById('month-select');
            const daySelect = document.getElementById('day-select');

            function saveSelection(selectElement) {
                sessionStorage.setItem(selectElement.id, selectElement.value);
            }

            function loadSelection(selectElement) {
                const savedValue = sessionStorage.getItem(selectElement.id);
                if (savedValue) {
                    selectElement.value = savedValue;
                }
            }

            // تحميل القيم المحفوظة
            loadSelection(yearSelect);
            loadSelection(monthSelect);
            loadSelection(daySelect);

            // إضافة event listeners للحفظ
            yearSelect.addEventListener('change', function() {
                saveSelection(this);
            });

            monthSelect.addEventListener('change', function() {
                saveSelection(this);
            });

            daySelect.addEventListener('change', function() {
                saveSelection(this);
            });

            function updatePageData() {
                const selectedYear = yearSelect.value;
                const selectedmonth = monthSelect.value;
                const selectday = daySelect.value;


                if (selectedYear && selectedmonth) {
                    fetch(`/fetch_Logbook_data.php?breaker=${selectedmonth}&year=${selectedYear}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                console.error(data.error);
                                // table2
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(20)').textContent = '';

                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(20)').textContent = '';

                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(20)').textContent = '';

                                // table 3
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(36)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(35)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(34)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(33)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(36)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(35)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(34)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(33)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(36)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(35)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(34)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(33)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(1)').textContent = '';
                                // TABLE 4 
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(1)').textContent = '';
                                // TABLE 5
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(16)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(13)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(7)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(4)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(3)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(16)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(13)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(7)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(4)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(3)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(32)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(31)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(30)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(29)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(28)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(26)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(27)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(25)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(24)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(23)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(22)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(21)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(20)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(19)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(16)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(13)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(7)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(4)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(3)').textContent = '';
                                // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(1)').textContent = '';
                                // table 6
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(18)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(17)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(16)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(15)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(1)').textContent = '';
                                // table 7
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(14)').textContent = '0';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(13)').textContent = '0';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(12)').textContent = '0';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(11)').textContent = '0';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(10)').textContent = '0';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(9)').textContent = '0';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(8)').textContent = '0';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(7)').textContent = '0';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(6)').textContent = '0';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(5)').textContent = '0';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(4)').textContent = '0';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(3)').textContent = '0';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(2)').textContent = '0';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(1)').textContent = '0';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(14)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(13)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(1)').textContent = '';
                                // table 8
                                document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(12)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(1)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(7)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(8)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(9)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(10)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(11)').textContent = '';
                                document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(12)').textContent = '';
                                // table 9
                                document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(1)').textContent = '0';
                                document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(2)').textContent = '0';
                                document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(3)').textContent = '0';
                                document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(4)').textContent = '0';
                                document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(5)').textContent = '0';
                                document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(1)').textContent = '0';
                                document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(2)').textContent = '0';
                                document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(3)').textContent = '0';


                                document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(1)').textContent = '0';
                                document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(2)').textContent = '0';
                                document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(3)').textContent = '0';


                            } else {
                                const mainData = data[0];

                                const targetSR = daySelect.value
                                const targetData = data.find(item => item.SR == targetSR);
                                if (targetData) {
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(20)').textContent = targetData.SW_G_CU_INC_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(19)').textContent = targetData.SW_G_CU_TR_1_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(18)').textContent = targetData.SW_G_CU_TR_2_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(17)').textContent = targetData.SW_G_CU_TR_3_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(16)').textContent = targetData.SW_G_CU_TR_5_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(15)').textContent = targetData.SW_G_CU_TR_RO_A || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(14)').textContent = targetData.SW_G_SF6_INC_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(13)').textContent = targetData.SW_G_SF6_TR_1_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(12)').textContent = targetData.SW_G_SF6_TR_2_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(11)').textContent = targetData.SW_G_SF6_TR_3_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(10)').textContent = targetData.SW_G_SF6_TR_5_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(9)').textContent = targetData.SW_G_SF6_TR_RO_A || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(8)').textContent = targetData.SW_G_ROOM_TEMP_A || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(7)').textContent = targetData.LV_SW_G_CU_MCC_1_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(6)').textContent = targetData.LV_SW_G_CU_MCC_2_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(5)').textContent = targetData.LV_SW_G_CU_MCC_3A_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(4)').textContent = targetData.LV_SW_G_CU_MCC_3_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(3)').textContent = targetData.LV_SW_G_CU_MCC_5_A || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(2)').textContent = targetData.LV_SW_G_CU_MCC_RS_A || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(1)').textContent = targetData.LV_SW_G_ROOM_TEMP_A || '';

                                    //2
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(20)').textContent = targetData.SW_G_CU_INC_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(19)').textContent = targetData.SW_G_CU_TR_1_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(18)').textContent = targetData.SW_G_CU_TR_2_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(17)').textContent = targetData.SW_G_CU_TR_3_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(16)').textContent = targetData.SW_G_CU_TR_5_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(15)').textContent = targetData.SW_G_CU_TR_RO_B || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(14)').textContent = targetData.SW_G_SF6_INC_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(13)').textContent = targetData.SW_G_SF6_TR_1_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(12)').textContent = targetData.SW_G_SF6_TR_2_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(11)').textContent = targetData.SW_G_SF6_TR_3_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(10)').textContent = targetData.SW_G_SF6_TR_5_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(9)').textContent = targetData.SW_G_SF6_TR_RO_B || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(8)').textContent = targetData.SW_G_ROOM_TEMP_B || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(7)').textContent = targetData.LV_SW_G_CU_MCC_1_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(6)').textContent = targetData.LV_SW_G_CU_MCC_2_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(5)').textContent = targetData.LV_SW_G_CU_MCC_3A_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(4)').textContent = targetData.LV_SW_G_CU_MCC_3_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(3)').textContent = targetData.LV_SW_G_CU_MCC_5_B || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(2)').textContent = targetData.LV_SW_G_CU_MCC_RS_B || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(1)').textContent = targetData.LV_SW_G_ROOM_TEMP_B || '';

                                    //3
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(20)').textContent = targetData.SW_G_CU_INC_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(19)').textContent = targetData.SW_G_CU_TR_1_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(18)').textContent = targetData.SW_G_CU_TR_2_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(17)').textContent = targetData.SW_G_CU_TR_3_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(16)').textContent = targetData.SW_G_CU_TR_5_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(15)').textContent = targetData.SW_G_CU_TR_RO_C || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(14)').textContent = targetData.SW_G_SF6_INC_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(13)').textContent = targetData.SW_G_SF6_TR_1_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(12)').textContent = targetData.SW_G_SF6_TR_2_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(11)').textContent = targetData.SW_G_SF6_TR_3_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(10)').textContent = targetData.SW_G_SF6_TR_5_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(9)').textContent = targetData.SW_G_SF6_TR_RO_C || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(8)').textContent = targetData.SW_G_ROOM_TEMP_C || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(7)').textContent = targetData.LV_SW_G_CU_MCC_1_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(6)').textContent = targetData.LV_SW_G_CU_MCC_2_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(5)').textContent = targetData.LV_SW_G_CU_MCC_3A_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(4)').textContent = targetData.LV_SW_G_CU_MCC_3_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(3)').textContent = targetData.LV_SW_G_CU_MCC_5_C || '';
                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(2)').textContent = targetData.LV_SW_G_CU_MCC_RS_C || '';

                                    document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(1)').textContent = targetData.LV_SW_G_ROOM_TEMP_C || '';
                                    // table 3
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(36)').textContent = targetData.M_08130_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(35)').textContent = targetData.M_08130_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(34)').textContent = targetData.M_08140_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(33)').textContent = targetData.M_08140_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(32)').textContent = targetData.M_08150_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(31)').textContent = targetData.M_08150_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(30)').textContent = targetData.M_08160_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(29)').textContent = targetData.M_08160_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(28)').textContent = targetData.M_08230_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(27)').textContent = targetData.M_08230_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(26)').textContent = targetData.M_08240_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(25)').textContent = targetData.M_08240_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(24)').textContent = targetData.M_08330_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(23)').textContent = targetData.M_08330_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(22)').textContent = targetData.M_08340_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(21)').textContent = targetData.M_08340_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(20)').textContent = targetData.M_08430_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(19)').textContent = targetData.M_08430_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(18)').textContent = targetData.M_09130_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(17)').textContent = targetData.M_09130_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(16)').textContent = targetData.M_09140_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(15)').textContent = targetData.M_09140_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(14)').textContent = targetData.M_09230_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(13)').textContent = targetData.M_09230_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(12)').textContent = targetData.M_09380_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(11)').textContent = targetData.M_09380_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(10)').textContent = targetData.M_09430_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(9)').textContent = targetData.M_09430_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(8)').textContent = targetData.M_10160_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(7)').textContent = targetData.M_10160_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(6)').textContent = targetData.M_04240_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(5)').textContent = targetData.M_04240_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(4)').textContent = targetData.M_04250_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(3)').textContent = targetData.M_04250_T_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(2)').textContent = targetData.M_10020_A_A || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(1)').textContent = targetData.M_10020_T_A || '';

                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(36)').textContent = targetData.M_08130_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(35)').textContent = targetData.M_08130_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(34)').textContent = targetData.M_08140_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(33)').textContent = targetData.M_08140_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(32)').textContent = targetData.M_08150_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(31)').textContent = targetData.M_08150_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(30)').textContent = targetData.M_08160_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(29)').textContent = targetData.M_08160_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(28)').textContent = targetData.M_08230_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(27)').textContent = targetData.M_08230_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(26)').textContent = targetData.M_08240_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(25)').textContent = targetData.M_08240_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(24)').textContent = targetData.M_08330_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(23)').textContent = targetData.M_08330_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(22)').textContent = targetData.M_08340_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(21)').textContent = targetData.M_08340_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(20)').textContent = targetData.M_08430_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(19)').textContent = targetData.M_08430_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(18)').textContent = targetData.M_09130_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(17)').textContent = targetData.M_09130_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(16)').textContent = targetData.M_09140_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(15)').textContent = targetData.M_09140_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(14)').textContent = targetData.M_09230_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(13)').textContent = targetData.M_09230_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(12)').textContent = targetData.M_09380_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(11)').textContent = targetData.M_09380_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(10)').textContent = targetData.M_09430_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(9)').textContent = targetData.M_09430_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(8)').textContent = targetData.M_10160_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(7)').textContent = targetData.M_10160_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(6)').textContent = targetData.M_04240_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(5)').textContent = targetData.M_04240_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(4)').textContent = targetData.M_04250_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(3)').textContent = targetData.M_04250_T_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(2)').textContent = targetData.M_10020_A_B || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(1)').textContent = targetData.M_10020_T_B || '';

                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(36)').textContent = targetData.M_08130_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(35)').textContent = targetData.M_08130_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(34)').textContent = targetData.M_08140_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(33)').textContent = targetData.M_08140_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(32)').textContent = targetData.M_08150_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(31)').textContent = targetData.M_08150_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(30)').textContent = targetData.M_08160_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(29)').textContent = targetData.M_08160_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(28)').textContent = targetData.M_08230_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(27)').textContent = targetData.M_08230_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(26)').textContent = targetData.M_08240_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(25)').textContent = targetData.M_08240_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(24)').textContent = targetData.M_08330_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(23)').textContent = targetData.M_08330_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(22)').textContent = targetData.M_08340_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(21)').textContent = targetData.M_08340_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(20)').textContent = targetData.M_08430_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(19)').textContent = targetData.M_08430_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(18)').textContent = targetData.M_09130_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(17)').textContent = targetData.M_09130_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(16)').textContent = targetData.M_09140_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(15)').textContent = targetData.M_09140_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(14)').textContent = targetData.M_09230_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(13)').textContent = targetData.M_09230_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(12)').textContent = targetData.M_09380_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(11)').textContent = targetData.M_09380_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(10)').textContent = targetData.M_09430_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(9)').textContent = targetData.M_09430_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(8)').textContent = targetData.M_10160_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(7)').textContent = targetData.M_10160_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(6)').textContent = targetData.M_04240_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(5)').textContent = targetData.M_04240_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(4)').textContent = targetData.M_04250_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(3)').textContent = targetData.M_04250_T_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(2)').textContent = targetData.M_10020_A_C || '';
                                    document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(1)').textContent = targetData.M_10020_T_C || '';
                                    // table 4
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(32)').textContent = targetData.M_13020_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(31)').textContent = targetData.M_13020_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(32)').textContent = targetData.M_13020_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(31)').textContent = targetData.M_13020_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(32)').textContent = targetData.M_13020_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(31)').textContent = targetData.M_13020_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(30)').textContent = targetData.M_13025_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(29)').textContent = targetData.M_13025_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(30)').textContent = targetData.M_13025_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(29)').textContent = targetData.M_13025_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(30)').textContent = targetData.M_13025_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(29)').textContent = targetData.M_13025_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(28)').textContent = targetData.M_13040_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(27)').textContent = targetData.M_13040_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(28)').textContent = targetData.M_13040_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(27)').textContent = targetData.M_13040_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(28)').textContent = targetData.M_13040_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(27)').textContent = targetData.M_13040_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(26)').textContent = targetData.M_13045_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(25)').textContent = targetData.M_13045_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(26)').textContent = targetData.M_13045_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(25)').textContent = targetData.M_13045_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(26)').textContent = targetData.M_13045_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(25)').textContent = targetData.M_13045_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(24)').textContent = targetData.M_13060_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(23)').textContent = targetData.M_13060_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(24)').textContent = targetData.M_13060_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(23)').textContent = targetData.M_13060_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(24)').textContent = targetData.M_13060_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(23)').textContent = targetData.M_13040_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(22)').textContent = targetData.M_13065_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(21)').textContent = targetData.M_13065_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(22)').textContent = targetData.M_13065_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(21)').textContent = targetData.M_13065_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(22)').textContent = targetData.M_13065_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(21)').textContent = targetData.M_13065_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(20)').textContent = targetData.M_13080_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(19)').textContent = targetData.M_13080_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(20)').textContent = targetData.M_13080_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(19)').textContent = targetData.M_13080_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(20)').textContent = targetData.M_13080_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(19)').textContent = targetData.M_13080_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(18)').textContent = targetData.M_13085_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(17)').textContent = targetData.M_13085_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(18)').textContent = targetData.M_13085_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(17)').textContent = targetData.M_13085_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(18)').textContent = targetData.M_13085_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(17)').textContent = targetData.M_13085_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(16)').textContent = targetData.M_13100_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(15)').textContent = targetData.M_13100_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(16)').textContent = targetData.M_13100_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(15)').textContent = targetData.M_13100_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(16)').textContent = targetData.M_13100_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(15)').textContent = targetData.M_13100_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(14)').textContent = targetData.M_13105_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(13)').textContent = targetData.M_13105_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(14)').textContent = targetData.M_13105_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(13)').textContent = targetData.M_13105_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(14)').textContent = targetData.M_13105_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(13)').textContent = targetData.M_13105_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(12)').textContent = targetData.M_13120_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(11)').textContent = targetData.M_13120_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(12)').textContent = targetData.M_13120_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(11)').textContent = targetData.M_13120_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(12)').textContent = targetData.M_13120_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(11)').textContent = targetData.M_13120_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(10)').textContent = targetData.M_13125_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(9)').textContent = targetData.M_13125_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(10)').textContent = targetData.M_13125_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(9)').textContent = targetData.M_13125_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(10)').textContent = targetData.M_13125_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(9)').textContent = targetData.M_13125_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(8)').textContent = targetData.M_13140_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(7)').textContent = targetData.M_13140_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(8)').textContent = targetData.M_13140_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(7)').textContent = targetData.M_13140_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(8)').textContent = targetData.M_13140_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(7)').textContent = targetData.M_13140_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(6)').textContent = targetData.M_13145_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(5)').textContent = targetData.M_13145_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(6)').textContent = targetData.M_13145_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(5)').textContent = targetData.M_13145_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(6)').textContent = targetData.M_13145_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(5)').textContent = targetData.M_13145_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(4)').textContent = targetData.M_13160_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(3)').textContent = targetData.M_13160_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(4)').textContent = targetData.M_13160_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(3)').textContent = targetData.M_13160_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(4)').textContent = targetData.M_13160_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(3)').textContent = targetData.M_13160_T_C || '';

                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(2)').textContent = targetData.M_13165_A_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(1)').textContent = targetData.M_13165_T_A || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(2)').textContent = targetData.M_13165_A_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(1)').textContent = targetData.M_13165_T_B || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(2)').textContent = targetData.M_13165_A_C || '';
                                    document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(1)').textContent = targetData.M_13165_T_C || '';

                                    // table 5  
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(32)').textContent = targetData.M_05840_A_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(31)').textContent = targetData.M_05840_T_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(32)').textContent = targetData.M_05840_A_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(31)').textContent = targetData.M_05840_T_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(32)').textContent = targetData.M_05840_A_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(31)').textContent = targetData.M_05840_T_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(30)').textContent = targetData.M_05845_A_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(29)').textContent = targetData.M_05845_T_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(30)').textContent = targetData.M_05845_A_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(29)').textContent = targetData.M_05845_T_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(30)').textContent = targetData.M_05845_A_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(29)').textContent = targetData.M_05845_T_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(28)').textContent = targetData.M_05850_A_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(27)').textContent = targetData.M_05850_T_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(28)').textContent = targetData.M_05850_A_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(27)').textContent = targetData.M_05850_T_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(28)').textContent = targetData.M_05850_A_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(27)').textContent = targetData.M_05850_T_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(26)').textContent = targetData.M_13210_A_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(25)').textContent = targetData.M_13210_T_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(26)').textContent = targetData.M_13210_A_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(25)').textContent = targetData.M_13210_T_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(26)').textContent = targetData.M_13210_A_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(25)').textContent = targetData.M_13210_T_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(24)').textContent = targetData.M_13220_A_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(23)').textContent = targetData.M_13220_T_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(24)').textContent = targetData.M_13220_A_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(23)').textContent = targetData.M_13220_T_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(24)').textContent = targetData.M_13220_A_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(23)').textContent = targetData.M_13220_T_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(22)').textContent = targetData.M_13230_A_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(21)').textContent = targetData.M_13230_T_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(22)').textContent = targetData.M_13230_A_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(21)').textContent = targetData.M_13230_T_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(22)').textContent = targetData.M_13230_A_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(21)').textContent = targetData.M_13230_T_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(20)').textContent = targetData.M_10120_A_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(19)').textContent = targetData.M_10120_T_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(20)').textContent = targetData.M_10120_A_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(19)').textContent = targetData.M_10120_T_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(20)').textContent = targetData.M_10120_A_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(19)').textContent = targetData.M_10120_T_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(18)').textContent = targetData.M_10640_A_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(17)').textContent = targetData.M_10640_T_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(18)').textContent = targetData.M_10640_A_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(17)').textContent = targetData.M_10640_T_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(18)').textContent = targetData.M_10640_A_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(17)').textContent = targetData.M_10640_T_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(16)').textContent = targetData.TR_TR1_AMP_A || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(15)').textContent = targetData.TR_TR1_WTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(14)').textContent = targetData.TR_TR1_OTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(16)').textContent = targetData.TR_TR1_AMP_B || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(15)').textContent = targetData.TR_TR1_WTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(14)').textContent = targetData.TR_TR1_OTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(16)').textContent = targetData.TR_TR1_AMP_C || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(15)').textContent = targetData.TR_TR1_WTI_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(14)').textContent = targetData.TR_TR1_OTI_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(13)').textContent = targetData.TR_TR2_AMP_A || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(12)').textContent = targetData.TR_TR2_WTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(11)').textContent = targetData.TR_TR2_OTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(13)').textContent = targetData.TR_TR2_AMP_B || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(12)').textContent = targetData.TR_TR2_WTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(11)').textContent = targetData.TR_TR2_OTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(13)').textContent = targetData.TR_TR2_AMP_C || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(12)').textContent = targetData.TR_TR2_WTI_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(11)').textContent = targetData.TR_TR2_OTI_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(10)').textContent = targetData.TR_TR3_AMP_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(9)').textContent = targetData.TR_TR3_WTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(8)').textContent = targetData.TR_TR3_OTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(10)').textContent = targetData.TR_TR3_AMP_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(9)').textContent = targetData.TR_TR3_WTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(8)').textContent = targetData.TR_TR3_OTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(10)').textContent = targetData.TR_TR3_AMP_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(9)').textContent = targetData.TR_TR3_WTI_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(8)').textContent = targetData.TR_TR3_OTI_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(7)').textContent = targetData.TR_TR5_AMP_A || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(6)').textContent = targetData.TR_TR5_WTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(5)').textContent = targetData.TR_TR5_OTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(7)').textContent = targetData.TR_TR5_AMP_B || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(6)').textContent = targetData.TR_TR5_WTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(5)').textContent = targetData.TR_TR5_OTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(7)').textContent = targetData.TR_TR5_AMP_C || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(6)').textContent = targetData.TR_TR5_WTI_C || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(5)').textContent = targetData.TR_TR5_OTI_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(4)').textContent = targetData.TR_TRRO_AMP_A || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(3)').textContent = targetData.TR_TRRO_WTI_A || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(2)').textContent = targetData.TR_TRRO_OTI_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(4)').textContent = targetData.TR_TRRO_AMP_B || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(3)').textContent = targetData.TR_TRRO_WTI_B || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(2)').textContent = targetData.TR_TRRO_OTI_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(4)').textContent = targetData.TR_TRRO_AMP_C || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(3)').textContent = targetData.TR_TRRO_WTI_C || '';
                                    // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(2)').textContent = targetData.TR_TRRO_OTI_C || '';

                                    document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(1)').textContent = targetData.TR_REMARKS_A || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(1)').textContent = targetData.TR_REMARKS_B || '';
                                    document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(1)').textContent = targetData.TR_REMARKS_C || '';

                                    // table 6
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(18)').textContent = targetData.BCVFD_08130_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(17)').textContent = targetData.BCVFD_08130_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(18)').textContent = targetData.BCVFD_08130_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(17)').textContent = targetData.BCVFD_08130_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(18)').textContent = targetData.BCVFD_08130_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(17)').textContent = targetData.BCVFD_08130_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(18)').textContent = targetData.BCVFD_08130_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(17)').textContent = targetData.BCVFD_08130_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(18)').textContent = targetData.BCVFD_08130_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(17)').textContent = targetData.BCVFD_08130_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(18)').textContent = targetData.BCVFD_08130_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(17)').textContent = targetData.BCVFD_08130_CNV_5_AM || '';

                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(16)').textContent = targetData.BCVFD_08140_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(15)').textContent = targetData.BCVFD_08140_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(16)').textContent = targetData.BCVFD_08140_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(15)').textContent = targetData.BCVFD_08140_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(16)').textContent = targetData.BCVFD_08140_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(15)').textContent = targetData.BCVFD_08140_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(16)').textContent = targetData.BCVFD_08140_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(15)').textContent = targetData.BCVFD_08140_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(16)').textContent = targetData.BCVFD_08140_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(15)').textContent = targetData.BCVFD_08140_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(16)').textContent = targetData.BCVFD_08140_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(15)').textContent = targetData.BCVFD_08140_CNV_5_AM || '';

                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(14)').textContent = targetData.BCVFD_08150_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(13)').textContent = targetData.BCVFD_08150_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(14)').textContent = targetData.BCVFD_08150_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(13)').textContent = targetData.BCVFD_08150_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(14)').textContent = targetData.BCVFD_08150_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(13)').textContent = targetData.BCVFD_08150_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(14)').textContent = targetData.BCVFD_08150_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(13)').textContent = targetData.BCVFD_08150_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(14)').textContent = targetData.BCVFD_08150_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(13)').textContent = targetData.BCVFD_08150_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(14)').textContent = targetData.BCVFD_08150_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(13)').textContent = targetData.BCVFD_08150_CNV_5_AM || '';

                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(12)').textContent = targetData.BCVFD_08160_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(11)').textContent = targetData.BCVFD_08160_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(12)').textContent = targetData.BCVFD_08160_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(11)').textContent = targetData.BCVFD_08160_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(12)').textContent = targetData.BCVFD_08160_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(11)').textContent = targetData.BCVFD_08160_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(12)').textContent = targetData.BCVFD_08160_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(11)').textContent = targetData.BCVFD_08160_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(12)').textContent = targetData.BCVFD_08160_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(11)').textContent = targetData.BCVFD_08160_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(12)').textContent = targetData.BCVFD_08160_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(11)').textContent = targetData.BCVFD_08160_CNV_5_AM || '';

                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(10)').textContent = targetData.BCVFD_08230_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(9)').textContent = targetData.BCVFD_08230_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(10)').textContent = targetData.BCVFD_08230_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(9)').textContent = targetData.BCVFD_08230_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(10)').textContent = targetData.BCVFD_08230_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(9)').textContent = targetData.BCVFD_08230_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(10)').textContent = targetData.BCVFD_08230_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(9)').textContent = targetData.BCVFD_08230_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(10)').textContent = targetData.BCVFD_08230_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(9)').textContent = targetData.BCVFD_08230_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(10)').textContent = targetData.BCVFD_08230_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(9)').textContent = targetData.BCVFD_08230_CNV_5_AM || '';

                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(8)').textContent = targetData.BCVFD_08240_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(7)').textContent = targetData.BCVFD_08240_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(8)').textContent = targetData.BCVFD_08240_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(7)').textContent = targetData.BCVFD_08240_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(8)').textContent = targetData.BCVFD_08240_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(7)').textContent = targetData.BCVFD_08240_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(8)').textContent = targetData.BCVFD_08240_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(7)').textContent = targetData.BCVFD_08240_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(8)').textContent = targetData.BCVFD_08240_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(7)').textContent = targetData.BCVFD_08240_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(8)').textContent = targetData.BCVFD_08240_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(7)').textContent = targetData.BCVFD_08240_CNV_5_AM || '';

                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(6)').textContent = targetData.BCVFD_08330_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(5)').textContent = targetData.BCVFD_08330_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(6)').textContent = targetData.BCVFD_08330_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(5)').textContent = targetData.BCVFD_08330_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(6)').textContent = targetData.BCVFD_08330_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(5)').textContent = targetData.BCVFD_08330_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(6)').textContent = targetData.BCVFD_08330_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(5)').textContent = targetData.BCVFD_08330_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(6)').textContent = targetData.BCVFD_08330_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(5)').textContent = targetData.BCVFD_08330_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(6)').textContent = targetData.BCVFD_08330_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(5)').textContent = targetData.BCVFD_08330_CNV_5_AM || '';

                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(4)').textContent = targetData.BCVFD_08340_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(3)').textContent = targetData.BCVFD_08340_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(4)').textContent = targetData.BCVFD_08340_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(3)').textContent = targetData.BCVFD_08340_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(4)').textContent = targetData.BCVFD_08340_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(3)').textContent = targetData.BCVFD_08340_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(4)').textContent = targetData.BCVFD_08340_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(3)').textContent = targetData.BCVFD_08340_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(4)').textContent = targetData.BCVFD_08340_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(3)').textContent = targetData.BCVFD_08340_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(4)').textContent = targetData.BCVFD_08340_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(3)').textContent = targetData.BCVFD_08340_CNV_5_AM || '';

                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(2)').textContent = targetData.BCVFD_08430_INV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(1)').textContent = targetData.BCVFD_08430_CNV_9_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(2)').textContent = targetData.BCVFD_08430_INV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(1)').textContent = targetData.BCVFD_08430_CNV_1_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(2)').textContent = targetData.BCVFD_08430_INV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(1)').textContent = targetData.BCVFD_08430_CNV_5_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(2)').textContent = targetData.BCVFD_08430_INV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(1)').textContent = targetData.BCVFD_08430_CNV_9_PM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(2)').textContent = targetData.BCVFD_08430_INV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(1)').textContent = targetData.BCVFD_08430_CNV_1_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(2)').textContent = targetData.BCVFD_08430_INV_5_AM || '';
                                    document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(1)').textContent = targetData.BCVFD_08430_CNV_5_AM || '';

                                    // table 7
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(14)').textContent = targetData.ENE_MCC_1_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(13)').textContent = targetData.ENE_MCC_2_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(12)').textContent = targetData.ENE_MCC_3_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(11)').textContent = targetData.ENE_MCC_3A_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(10)').textContent = targetData.ENE_MCC_5_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(9)').textContent = targetData.ENE_AIR_COMPRESSOR_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(8)').textContent = targetData.ENE_COMP_FROM_MCC_3_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(7)').textContent = targetData.ENE_RO_PLANT_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(6)').textContent = targetData.ENE_K_SILO_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(5)').textContent = targetData.ENE_PACKING_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(4)').textContent = targetData.ENE_RAW_SUGAR_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(3)').textContent = targetData.ENE_MCC_2B_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(2)').textContent = targetData.ENE_B_CONVEYOR_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(1)').textContent = targetData.ENE_COMPRESSOR_A || '';
                                    // table 8
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(12)').textContent = targetData.UBS_BAT_VOLT_V1_A || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(12)').textContent = targetData.UBS_BAT_VOLT_V1_B || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(12)').textContent = targetData.UBS_BAT_VOLT_V1_C || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(11)').textContent = targetData.UBS_BAT_VOLT_V2_A || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(11)').textContent = targetData.UBS_BAT_VOLT_V2_B || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(11)').textContent = targetData.UBS_BAT_VOLT_V2_C || '';

                                    document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(10)').textContent = targetData.UBS_OUT_VOLT_V1_A || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(10)').textContent = targetData.UBS_OUT_VOLT_V1_B || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(10)').textContent = targetData.UBS_OUT_VOLT_V1_C || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(9)').textContent = targetData.UBS_OUT_VOLT_V2_A || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(9)').textContent = targetData.UBS_OUT_VOLT_V2_B || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(9)').textContent = targetData.UBS_OUT_VOLT_V2_C || '';

                                    document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(8)').textContent = targetData.UBS_OUT_AMP_L1_A || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(8)').textContent = targetData.UBS_OUT_AMP_L1_B || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(8)').textContent = targetData.UBS_OUT_AMP_L1_C || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(7)').textContent = targetData.UBS_OUT_AMP_L2_A || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(7)').textContent = targetData.UBS_OUT_AMP_L2_B || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(7)').textContent = targetData.UBS_OUT_AMP_L2_C || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(6)').textContent = targetData.UBS_OUT_AMP_L3_A || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(6)').textContent = targetData.UBS_OUT_AMP_L3_B || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(6)').textContent = targetData.UBS_OUT_AMP_L3_C || '';

                                    document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(5)').textContent = targetData.UBS_AB_NOISE_OK_A || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(5)').textContent = targetData.UBS_AB_NOISE_OK_B || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(5)').textContent = targetData.UBS_AB_NOISE_OK_C || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(4)').textContent = targetData.UBS_AB_NOISE_NOK_A || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(4)').textContent = targetData.UBS_AB_NOISE_NOK_B || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(4)').textContent = targetData.UBS_AB_NOISE_NOK_C || '';

                                    document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(3)').textContent = targetData.UBS_IN_TEMP_A || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(3)').textContent = targetData.UBS_IN_TEMP_B || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(3)').textContent = targetData.UBS_IN_TEMP_C || '';

                                    document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(2)').textContent = targetData.UBS_BAT_TEMP_A || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(2)').textContent = targetData.UBS_BAT_TEMP_B || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(2)').textContent = targetData.UBS_BAT_TEMP_C || '';

                                    document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(1)').textContent = targetData.UBS_REMARKS_A || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(1)').textContent = targetData.UBS_REMARKS_B || '';
                                    document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(1)').textContent = targetData.UBS_REMARKS_C || '';

                                    document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(5)').textContent = targetData.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(4)').textContent = targetData.PACKING_KWH_A || '';

                                    // table 9
                                    document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(2)').textContent = targetData.KW_PER_TON_A || '';
                                    document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(3)').textContent = targetData.SUGAR_PROD_TON_A || '';
                                    document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(1)').textContent = targetData.PLANT_REF_CONS_REMARKS_A || '';



                                }



                            }
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });
                }
            }

            function updatePageData5() {
                const selectedYear = yearSelect.value;
                const selectedmonth = 1;
                const selectday = 1;

                if (selectedYear && selectedmonth) {
                    fetch(`/fetch_Logbook_data.php?breaker=${selectedmonth}&year=${selectedYear}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                console.error(data.error);
                                document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(5)').textContent = '0';
                                document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(4)').textContent = '0';

                                document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(3)').textContent = '0';
                                document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(1)').textContent = '0';

                                document.querySelector('table:nth-of-type(10) tr:nth-child(1) td:nth-child(6)').textContent = '0';
                                document.querySelector('table:nth-of-type(10) tr:nth-child(1) td:nth-child(7)').textContent = '0';
                                document.querySelector('table:nth-of-type(10) tr:nth-child(2) td:nth-child(5)').textContent = '0';
                            } else {
                                const mainData = data[0];

                                const targetSRy = 1;
                                const targetDatay = data.find(item => item.SR == targetSRy);
                                if (targetDatay) {

                                    document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(5)').textContent = targetDatay.REFINING_KWH_C || '';
                                    document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(4)').textContent = targetDatay.PACKING_KWH_C || '';

                                    document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(2)').textContent = targetDatay.KW_PER_TON_C || '';

                                    document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(3)').textContent = targetDatay.SUGAR_PROD_TON_C || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(2) td:nth-child(5)').textContent = targetDatay.SUGAR_PROD_TON_C || '';
                                    document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(1)').textContent = targetDatay.PLANT_REF_CONS_REMARKS_C || '';

                                    document.querySelector('table:nth-of-type(10) tr:nth-child(1) td:nth-child(6)').textContent = targetDatay.REFINING_KWH_C || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(1) td:nth-child(7)').textContent = targetDatay.PACKING_KWH_C || '';
                                }
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });
                }
            }

            function updatePageData6() {
                const selectedYear = yearSelect.value;
                let selectedmonth = monthSelect.value;

                if (selectedYear && selectedmonth) {
                    fetch(`/fetch_Logbook_data.php?breaker=${selectedmonth}&year=${selectedYear}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                console.error(data.error);
                                document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(3)').textContent = '0';
                                document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(10) tr:nth-child(1) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(2) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(4) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(4) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(5) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(6) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(7) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(8) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(9) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(10) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(11) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(12) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(13) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(14) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(15) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(16) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(17) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(18) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(19) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(20) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(21) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(22) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(23) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(24) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(25) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(26) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(27) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(28) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(29) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(30) td:nth-child(2)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(31) td:nth-child(2)').textContent = '0'

                                document.querySelector('table:nth-of-type(10) tr:nth-child(1) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(2) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(4) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(4) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(5) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(6) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(7) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(8) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(9) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(10) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(11) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(12) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(13) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(14) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(15) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(16) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(17) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(18) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(19) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(20) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(21) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(22) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(23) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(24) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(25) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(26) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(27) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(28) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(29) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(30) td:nth-child(3)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(31) td:nth-child(3)').textContent = '0'

                                document.querySelector('table:nth-of-type(10) tr:nth-child(1) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(2) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(4) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(4) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(5) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(6) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(7) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(8) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(9) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(10) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(11) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(12) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(13) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(14) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(15) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(16) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(17) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(18) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(19) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(20) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(21) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(22) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(23) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(24) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(25) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(26) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(27) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(28) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(29) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(30) td:nth-child(8)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(31) td:nth-child(8)').textContent = '0'


                                document.querySelector('table:nth-of-type(10) tr:nth-child(1) td:nth-child(4)').textContent = '0'
                                document.querySelector('table:nth-of-type(10) tr:nth-child(1) td:nth-child(5)').textContent = '0'

                                document.querySelector('table:nth-of-type(10) tr:nth-child(2) td:nth-child(4)').textContent = '0'


                            } else {
                                const mainData = data[0];

                                const targetSRX1 = 1
                                const targetDataX1 = data.find(item => item.SR == targetSRX1);
                                if (targetDataX1) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(1) td:nth-child(2)').textContent = targetDataX1.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(1) td:nth-child(3)').textContent = targetDataX1.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(1) td:nth-child(8)').textContent = targetDataX1.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX2 = 2
                                const targetDataX2 = data.find(item => item.SR == targetSRX2);
                                if (targetDataX2) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(2) td:nth-child(2)').textContent = targetDataX2.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(2) td:nth-child(3)').textContent = targetDataX2.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(2) td:nth-child(8)').textContent = targetDataX2.SUGAR_PROD_TON_A || '';

                                }
                                const targetSRX3 = 3
                                const targetDataX3 = data.find(item => item.SR == targetSRX3);
                                if (targetDataX3) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(3) td:nth-child(2)').textContent = targetDataX3.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(3) td:nth-child(3)').textContent = targetDataX3.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(3) td:nth-child(8)').textContent = targetDataX3.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX4 = 4
                                const targetDataX4 = data.find(item => item.SR == targetSRX4);
                                if (targetDataX4) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(4) td:nth-child(2)').textContent = targetDataX4.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(4) td:nth-child(3)').textContent = targetDataX4.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(4) td:nth-child(8)').textContent = targetDataX4.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX5 = 5
                                const targetDataX5 = data.find(item => item.SR == targetSRX5);
                                if (targetDataX5) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(5) td:nth-child(2)').textContent = targetDataX5.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(5) td:nth-child(3)').textContent = targetDataX5.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(5) td:nth-child(8)').textContent = targetDataX5.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX6 = 6
                                const targetDataX6 = data.find(item => item.SR == targetSRX6);
                                if (targetDataX6) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(6) td:nth-child(2)').textContent = targetDataX6.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(6) td:nth-child(3)').textContent = targetDataX6.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(6) td:nth-child(8)').textContent = targetDataX6.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX7 = 7
                                const targetDataX7 = data.find(item => item.SR == targetSRX7);
                                if (targetDataX7) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(7) td:nth-child(2)').textContent = targetDataX7.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(7) td:nth-child(3)').textContent = targetDataX7.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(7) td:nth-child(8)').textContent = targetDataX7.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX8 = 8
                                const targetDataX8 = data.find(item => item.SR == targetSRX8);
                                if (targetDataX8) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(8) td:nth-child(2)').textContent = targetDataX8.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(8) td:nth-child(3)').textContent = targetDataX8.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(8) td:nth-child(8)').textContent = targetDataX8.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX9 = 9
                                const targetDataX9 = data.find(item => item.SR == targetSRX9);
                                if (targetDataX9) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(9) td:nth-child(2)').textContent = targetDataX9.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(9) td:nth-child(3)').textContent = targetDataX9.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(9) td:nth-child(8)').textContent = targetDataX9.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX10 = 10
                                const targetDataX10 = data.find(item => item.SR == targetSRX10);
                                if (targetDataX10) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(10) td:nth-child(2)').textContent = targetDataX10.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(10) td:nth-child(3)').textContent = targetDataX10.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(10) td:nth-child(8)').textContent = targetDataX10.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX11 = 11
                                const targetDataX11 = data.find(item => item.SR == targetSRX11);
                                if (targetDataX11) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(11) td:nth-child(2)').textContent = targetDataX11.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(11) td:nth-child(3)').textContent = targetDataX11.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(11) td:nth-child(8)').textContent = targetDataX11.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX12 = 12
                                const targetDataX12 = data.find(item => item.SR == targetSRX12);
                                if (targetDataX12) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(12) td:nth-child(2)').textContent = targetDataX12.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(12) td:nth-child(3)').textContent = targetDataX12.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(12) td:nth-child(8)').textContent = targetDataX12.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX13 = 13
                                const targetDataX13 = data.find(item => item.SR == targetSRX13);
                                if (targetDataX13) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(13) td:nth-child(2)').textContent = targetDataX13.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(13) td:nth-child(3)').textContent = targetDataX13.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(13) td:nth-child(8)').textContent = targetDataX13.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX14 = 14
                                const targetDataX14 = data.find(item => item.SR == targetSRX14);
                                if (targetDataX14) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(14) td:nth-child(2)').textContent = targetDataX14.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(14) td:nth-child(3)').textContent = targetDataX14.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(14) td:nth-child(8)').textContent = targetDataX14.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX15 = 15
                                const targetDataX15 = data.find(item => item.SR == targetSRX15);
                                if (targetDataX15) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(15) td:nth-child(2)').textContent = targetDataX15.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(15) td:nth-child(3)').textContent = targetDataX15.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(16) td:nth-child(8)').textContent = targetDataX15.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX16 = 16
                                const targetDataX16 = data.find(item => item.SR == targetSRX16);
                                if (targetDataX16) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(16) td:nth-child(2)').textContent = targetDataX16.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(16) td:nth-child(3)').textContent = targetDataX16.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(16) td:nth-child(8)').textContent = targetDataX16.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX17 = 17
                                const targetDataX17 = data.find(item => item.SR == targetSRX17);
                                if (targetDataX17) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(17) td:nth-child(2)').textContent = targetDataX17.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(17) td:nth-child(3)').textContent = targetDataX17.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(17) td:nth-child(8)').textContent = targetDataX17.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX18 = 18
                                const targetDataX18 = data.find(item => item.SR == targetSRX18);
                                if (targetDataX18) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(18) td:nth-child(2)').textContent = targetDataX18.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(18) td:nth-child(3)').textContent = targetDataX18.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(18) td:nth-child(8)').textContent = targetDataX18.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX19 = 19
                                const targetDataX19 = data.find(item => item.SR == targetSRX19);
                                if (targetDataX19) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(19) td:nth-child(2)').textContent = targetDataX19.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(19) td:nth-child(3)').textContent = targetDataX19.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(19) td:nth-child(8)').textContent = targetDataX19.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX20 = 20
                                const targetDataX20 = data.find(item => item.SR == targetSRX20);
                                if (targetDataX20) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(20) td:nth-child(2)').textContent = targetDataX20.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(20) td:nth-child(3)').textContent = targetDataX20.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(20) td:nth-child(8)').textContent = targetDataX20.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX21 = 21
                                const targetDataX21 = data.find(item => item.SR == targetSRX21);
                                if (targetDataX21) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(21) td:nth-child(2)').textContent = targetDataX21.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(21) td:nth-child(3)').textContent = targetDataX21.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(21) td:nth-child(8)').textContent = targetDataX21.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX22 = 22
                                const targetDataX22 = data.find(item => item.SR == targetSRX22);
                                if (targetDataX22) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(22) td:nth-child(2)').textContent = targetDataX22.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(22) td:nth-child(3)').textContent = targetDataX22.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(22) td:nth-child(8)').textContent = targetDataX22.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX23 = 23
                                const targetDataX23 = data.find(item => item.SR == targetSRX23);
                                if (targetDataX23) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(23) td:nth-child(2)').textContent = targetDataX23.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(23) td:nth-child(3)').textContent = targetDataX23.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(23) td:nth-child(8)').textContent = targetDataX23.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX24 = 24
                                const targetDataX24 = data.find(item => item.SR == targetSRX24);
                                if (targetDataX24) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(24) td:nth-child(2)').textContent = targetDataX24.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(24) td:nth-child(3)').textContent = targetDataX24.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(24) td:nth-child(8)').textContent = targetDataX24.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX25 = 25
                                const targetDataX25 = data.find(item => item.SR == targetSRX25);
                                if (targetDataX25) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(25) td:nth-child(2)').textContent = targetDataX25.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(25) td:nth-child(3)').textContent = targetDataX25.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(25) td:nth-child(8)').textContent = targetDataX25.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX26 = 26
                                const targetDataX26 = data.find(item => item.SR == targetSRX26);
                                if (targetDataX26) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(26) td:nth-child(2)').textContent = targetDataX26.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(26) td:nth-child(3)').textContent = targetDataX26.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(26) td:nth-child(8)').textContent = targetDataX26.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX27 = 27
                                const targetDataX27 = data.find(item => item.SR == targetSRX27);
                                if (targetDataX27) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(27) td:nth-child(2)').textContent = targetDataX27.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(27) td:nth-child(3)').textContent = targetDataX27.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(27) td:nth-child(8)').textContent = targetDataX27.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX28 = 28
                                const targetDataX28 = data.find(item => item.SR == targetSRX28);
                                if (targetDataX28) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(28) td:nth-child(2)').textContent = targetDataX28.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(28) td:nth-child(3)').textContent = targetDataX28.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(28) td:nth-child(8)').textContent = targetDataX28.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX29 = 29
                                const targetDataX29 = data.find(item => item.SR == targetSRX29);
                                if (targetDataX29) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(29) td:nth-child(2)').textContent = targetDataX29.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(29) td:nth-child(3)').textContent = targetDataX29.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(29) td:nth-child(8)').textContent = targetDataX29.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX30 = 30
                                const targetDataX30 = data.find(item => item.SR == targetSRX30);
                                if (targetDataX30) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(30) td:nth-child(2)').textContent = targetDataX30.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(30) td:nth-child(3)').textContent = targetDataX30.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(30) td:nth-child(8)').textContent = targetDataX30.SUGAR_PROD_TON_A || '';
                                }
                                const targetSRX31 = 31
                                const targetDataX31 = data.find(item => item.SR == targetSRX31);
                                if (targetDataX31) {
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(31) td:nth-child(2)').textContent = targetDataX31.REFINING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(31) td:nth-child(3)').textContent = targetDataX31.PACKING_KWH_A || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(31) td:nth-child(8)').textContent = targetDataX31.SUGAR_PROD_TON_A || '';
                                }

                                const targetSRX = 1
                                const targetDataX = data.find(item => item.SR == targetSRX);
                                if (targetDataX) {
                                    document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(2)').textContent = targetDataX.KW_PER_TON_B || '';

                                    document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(3)').textContent = targetDataX.SUGAR_PROD_TON_B || '';
                                    document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(1)').textContent = targetDataX.PLANT_REF_CONS_REMARKS_B || '';

                                    document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(5)').textContent = targetDataX.REFINING_KWH_B || '';
                                    document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(4)').textContent = targetDataX.PACKING_KWH_B || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(1) td:nth-child(4)').textContent = targetDataX.REFINING_KWH_B || '';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(1) td:nth-child(5)').textContent = targetDataX.PACKING_KWH_B || '';

                                    document.querySelector('table:nth-of-type(10) tr:nth-child(2) td:nth-child(4)').textContent = targetDataX.SUGAR_PROD_TON_B || '';


                                }

                            }
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });
                }
            }



            //********************************************************************************************* */
            function updatePageData2() {
                let selectedYear = yearSelect.value;
                let selectedmonth = monthSelect.value;
                let selectday = daySelect.value;
                let targetSR2 = daySelect.value - 1;
                if (targetSR2 < 1 && selectedmonth == 1 && selectedYear == 2025) {
                    targetSR2 = 1;
                } else if (targetSR2 < 1 && selectedmonth == 1) {
                    targetSR2 = 31;
                    selectedmonth = 12;
                    selectedYear = selectedYear - 1;
                } else if (targetSR2 < 1) {
                    if (selectedmonth == 5 || selectedmonth == 7 || selectedmonth == 10 || selectedmonth == 12) {
                        targetSR2 = 30;
                    } else {
                        targetSR2 = 31;
                    }

                    selectedmonth = selectedmonth - 1;
                }

                if (selectedYear && selectedmonth) {
                    fetch(`/fetch_Logbook_data.php?breaker=${selectedmonth}&year=${selectedYear}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                console.error(data.error);
                                // مسح البيانات من الجدول إذا حدث خطأ
                            } else {
                                const mainData = data[0];

                                const targetData2 = data.find(item => item.SR == targetSR2);
                                if (targetData2) {
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(14)').textContent = targetData2.ENE_MCC_1_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(13)').textContent = targetData2.ENE_MCC_2_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(12)').textContent = targetData2.ENE_MCC_3_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(11)').textContent = targetData2.ENE_MCC_3A_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(10)').textContent = targetData2.ENE_MCC_5_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(9)').textContent = targetData2.ENE_AIR_COMPRESSOR_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(8)').textContent = targetData2.ENE_COMP_FROM_MCC_3_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(7)').textContent = targetData2.ENE_RO_PLANT_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(6)').textContent = targetData2.ENE_K_SILO_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(5)').textContent = targetData2.ENE_PACKING_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(4)').textContent = targetData2.ENE_RAW_SUGAR_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(3)').textContent = targetData2.ENE_MCC_2B_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(2)').textContent = targetData2.ENE_B_CONVEYOR_A || '';
                                    document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(1)').textContent = targetData2.ENE_COMPRESSOR_A || '';

                                    document.querySelector('table:nth-of-type(10) tr:nth-child(5) td:nth-child(4)').textContent = targetData2.ENE_MCC_1_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(6) td:nth-child(4)').textContent = targetData2.ENE_MCC_2_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(7) td:nth-child(4)').textContent = targetData2.ENE_MCC_3_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(8) td:nth-child(4)').textContent = targetData2.ENE_MCC_3A_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(9) td:nth-child(4)').textContent = targetData2.ENE_MCC_5_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(10) td:nth-child(4)').textContent = targetData2.ENE_AIR_COMPRESSOR_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(11) td:nth-child(4)').textContent = targetData2.ENE_COMP_FROM_MCC_3_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(12) td:nth-child(4)').textContent = targetData2.ENE_RO_PLANT_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(13) td:nth-child(4)').textContent = targetData2.ENE_K_SILO_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(14) td:nth-child(4)').textContent = targetData2.ENE_PACKING_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(15) td:nth-child(4)').textContent = targetData2.ENE_RAW_SUGAR_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(16) td:nth-child(4)').textContent = targetData2.ENE_MCC_2B_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(17) td:nth-child(4)').textContent = targetData2.ENE_B_CONVEYOR_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(18) td:nth-child(4)').textContent = targetData2.ENE_COMPRESSOR_A || '0';
                                }
                                const targetData2_1 = data.find(item => item.SR == targetSR2 + 1);
                                if (targetData2) {

                                    document.querySelector('table:nth-of-type(10) tr:nth-child(5) td:nth-child(5)').textContent = targetData2_1.ENE_MCC_1_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(6) td:nth-child(5)').textContent = targetData2_1.ENE_MCC_2_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(7) td:nth-child(5)').textContent = targetData2_1.ENE_MCC_3_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(8) td:nth-child(5)').textContent = targetData2_1.ENE_MCC_3A_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(9) td:nth-child(5)').textContent = targetData2_1.ENE_MCC_5_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(10) td:nth-child(5)').textContent = targetData2_1.ENE_AIR_COMPRESSOR_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(11) td:nth-child(5)').textContent = targetData2_1.ENE_COMP_FROM_MCC_3_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(12) td:nth-child(5)').textContent = targetData2_1.ENE_RO_PLANT_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(13) td:nth-child(5)').textContent = targetData2_1.ENE_K_SILO_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(14) td:nth-child(5)').textContent = targetData2_1.ENE_PACKING_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(15) td:nth-child(5)').textContent = targetData2_1.ENE_RAW_SUGAR_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(16) td:nth-child(5)').textContent = targetData2_1.ENE_MCC_2B_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(17) td:nth-child(5)').textContent = targetData2_1.ENE_B_CONVEYOR_A || '0';
                                    document.querySelector('table:nth-of-type(10) tr:nth-child(18) td:nth-child(5)').textContent = targetData2_1.ENE_COMPRESSOR_A || '0';
                                }
                                // ✅ بعد تحميل البيانات، قم بالحسابات

                            }
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });
                }
            }
            // إضافة cache للبيانات لتجنب طلبات متكررة
            const dataCache = {};

            function updatePageData3() {
                const selectedYear = yearSelect.value;
                const selectedmonth = monthSelect.value;
                const selectday = daySelect.value;


                if (selectedYear && selectedmonth) {
                    fetch(`/fetch_Logbook_data.php?breaker=${selectedmonth}&year=${selectedYear}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                console.error(data.error);

                            } else {
                                const mainData = data[0];

                                const targetSRy3 = 1;
                                const targetDatay3 = data.find(item => item.SR == targetSRy3);
                                if (targetDatay3) {
                                    document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(5)').textContent = targetDatay3.REFINING_KWH_B || '';
                                    document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(4)').textContent = targetDatay3.PACKING_KWH_B || '';
                                }
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });
                }
            }
            // إضافة cache خاص لهذه الدالة
            const yearlyDataCache = {};

            function updatePageData4() {
                const selectedYear = yearSelect.value;

                if (!selectedYear) {
                    console.error('❌ لم يتم تحديد السنة');
                    return;
                }

                // استخدام البيانات المخزنة إذا كانت متاحة
                if (yearlyDataCache[selectedYear]) {
                    console.log(`📦 استخدام البيانات المخزنة لسنة ${selectedYear}`);
                    processYearlyData(yearlyDataCache[selectedYear]);
                    return;
                }

                console.log(`🌐 جلب بيانات السنة ${selectedYear} من الخادم...`);

                // إنشاء مصفوفة لجميع طلبات الـ fetch
                const fetchPromises = [];

                for (let month = 1; month <= 12; month++) {
                    fetchPromises.push(
                        fetch(`/fetch_Logbook_data.php?breaker=${month}&year=${selectedYear}`)
                        .then(response => response.json())
                        .catch(error => {
                            console.error(`❌ خطأ في جلب بيانات الشهر ${month}:`, error);
                            return {
                                error: `خطأ في الشهر ${month}`
                            };
                        })
                    );
                }

                // انتظار اكتمال جميع الطلبات
                Promise.all(fetchPromises)
                    .then(monthlyDataArray => {
                        // تخزين البيانات في cache
                        yearlyDataCache[selectedYear] = monthlyDataArray;

                        // معالجة البيانات
                        processYearlyData(monthlyDataArray);
                    })
                    .catch(error => {
                        console.error('❌ خطأ في جلب بيانات السنة:', error);
                        // مسح الخلايا في حالة الخطأ
                        clearYearlyCells();
                    });
            }

            function processYearlyData(monthlyDataArray) {
                let totalRefiningSum = 0;
                let totalPackingSum = 0;
                let processedMonths = 0;

                monthlyDataArray.forEach((monthData, monthIndex) => {
                    const monthNumber = monthIndex + 1;

                    if (monthData.error) {
                        console.warn(`⚠️ خطأ في بيانات الشهر ${monthNumber}: ${monthData.error}`);
                        return;
                    }

                    if (!Array.isArray(monthData) || monthData.length === 0) {
                        console.warn(`⚠️ لا توجد بيانات للشهر ${monthNumber}`);
                        return;
                    }

                    // البحث عن السجل الأول (SR = 1) في كل شهر
                    const firstRecord = monthData.find(item => item.SR == 1);

                    if (firstRecord) {
                        // جمع قيم REFINING_KWH_B
                        if (firstRecord.REFINING_KWH_B) {
                            const value = parseFloat(firstRecord.REFINING_KWH_B);
                            if (!isNaN(value)) {
                                totalRefiningSum += value;
                                console.log(`✅ الشهر ${monthNumber} - REFINING_KWH_B: ${value}`);
                            }
                        }

                        // جمع قيم PACKING_KWH_B
                        if (firstRecord.PACKING_KWH_B) {
                            const value = parseFloat(firstRecord.PACKING_KWH_B);
                            if (!isNaN(value)) {
                                totalPackingSum += value;
                                console.log(`✅ الشهر ${monthNumber} - PACKING_KWH_B: ${value}`);
                            }
                        }

                        processedMonths++;
                    } else {
                        console.warn(`⚠️ الشهر ${monthNumber}: لا يوجد سجل مع SR = 1`);
                    }
                });

                console.log(`✅ تم معالجة ${processedMonths} شهر - REFINING: ${totalRefiningSum.toFixed(7)}, PACKING: ${totalPackingSum.toFixed(7)}`);

                // تحديث الخلايا
                updateYearlyCells(totalRefiningSum, totalPackingSum);
            }

            function updateYearlyCells(refiningSum, packingSum) {
                const refiningCell = document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(5)');
                const packingCell = document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(4)');

                if (refiningCell) refiningCell.textContent = refiningSum.toFixed(7);
                if (packingCell) packingCell.textContent = packingSum.toFixed(7);
            }

            function clearYearlyCells() {
                const refiningCell = document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(5)');
                const packingCell = document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(4)');

                if (refiningCell) refiningCell.textContent = '';
                if (packingCell) packingCell.textContent = '';
            }

            async function calculating() {
                return new Promise((resolve) => {
                    const day = daySelect.value;
                    const selectedYear = yearSelect.value;
                    const selectedmonth = monthSelect.value;

                    if (day == 1 && selectedmonth == 1 && selectedYear == 2025) {
                        for (let col = 1; col <= 14; col++) {
                            const element4 = document.querySelector(`table:nth-of-type(7) tr:nth-child(4) td:nth-child(${col})`);
                            const element5 = document.querySelector(`table:nth-of-type(7) tr:nth-child(5) td:nth-child(${col})`);

                            if (element4 && element5) {
                                element4.textContent = element5.textContent; // هنا التعديل
                            }
                        }
                    }

                    function calculateCell(column) {
                        const selectorBase = `table:nth-of-type(7) tr:nth-child`;

                        // الحصول على العناصر أولاً
                        const element5 = document.querySelector(`${selectorBase}(5) td:nth-child(${column})`);
                        const element4 = document.querySelector(`${selectorBase}(4) td:nth-child(${column})`);
                        const resultElement = document.querySelector(`${selectorBase}(6) td:nth-child(${column})`);

                        // التحقق من وجود العناصر
                        if (!element5 || !element4 || !resultElement) {
                            console.error(`❌ عنصر غير موجود للعمود ${column}`);
                            return;
                        }

                        // عرض القيم الفعلية في الكونسول
                        console.log(`📊 العمود ${column}:`);
                        console.log(`الصف 5: '${element5.textContent}'`);
                        console.log(`الصف 4: '${element4.textContent}'`);

                        // تحويل القيم إلى أرقام
                        const value5 = parseFloat(element5.textContent);
                        const value4 = parseFloat(element4.textContent);
                        const Subtract = value5 - value4;
                        if (Subtract <= 0) {


                            resultElement.textContent = 0;
                        } else {
                            if (column === 1 || column === 2 || column === 3 || column === 4 || column === 9 || column === 13 || column === 11) {
                                resultElement.textContent = (Subtract * 1000).toFixed(7);
                            } else if (column === 12) {
                                // الحصول على قيمة العمود 8
                                const element5_col8 = document.querySelector(`${selectorBase}(5) td:nth-child(8)`);
                                const element4_col8 = document.querySelector(`${selectorBase}(4) td:nth-child(8)`);

                                // التحقق من وجود عناصر العمود 8
                                if (!element5_col8 || !element4_col8) {
                                    console.error(`❌ عنصر غير موجود للعمود 8`);
                                    return;
                                }

                                const value5_col8 = parseFloat(element5_col8.textContent);
                                const value4_col8 = parseFloat(element4_col8.textContent);

                                // التحقق من القيم الرقمية للعمود 8
                                if (isNaN(value5_col8) || isNaN(value4_col8)) {
                                    console.error(`❌ قيم غير رقمية في العمود 8`);
                                    return;
                                }

                                // حساب قيمة العمود 12: ((value5 - value4)*1000) - (value5_col8 - value4_col8)
                                const result = (Subtract * 1000) - (value5_col8 - value4_col8);
                                resultElement.textContent = result.toFixed(7);
                            } else if (column === 10) {
                                // الحصول على قيمة العمود 9
                                const element5_col9 = document.querySelector(`${selectorBase}(5) td:nth-child(9)`);
                                const element4_col9 = document.querySelector(`${selectorBase}(4) td:nth-child(9)`);

                                // التحقق من وجود عناصر العمود 9
                                if (!element5_col9 || !element4_col9) {
                                    console.error(`❌ عنصر غير موجود للعمود 9`);
                                    return;
                                }

                                const value5_col9 = parseFloat(element5_col9.textContent);
                                const value4_col9 = parseFloat(element4_col9.textContent);

                                // التحقق من القيم الرقمية للعمود 9
                                if (isNaN(value5_col9) || isNaN(value4_col9)) {
                                    console.error(`❌ قيم غير رقمية في العمود 9`);
                                    return;
                                }

                                // حساب قيمة العمود 10: ((value5 - value4)*1000) - (value5_col9 - value4_col9) * 1000
                                const result = (Subtract * 1000) - (value5_col9 - value4_col9) * 1000;
                                resultElement.textContent = result.toFixed(7);
                            } else {
                                resultElement.textContent = Subtract.toFixed(7);
                            }
                        }




                        console.log(`✅ النتيجة: ${value5} - ${value4} = ${value5 - value4}`);
                    }

                    // حساب جميع الأعمدة من 1 إلى 14
                    for (let column = 1; column <= 14; column++) {
                        calculateCell(column);
                    }
                    resolve();
                });
            } // نسخة بديلة باستخدام querySelectorAll لأسلوب أكثر موثوقية


            /////////////////////////////////////////////////////////////////////////////////
            // دالة جديدة لجمع محتوى الصف السادس (مع استثناء الأعمدة 1، 2، 5) ووضعه في الجدول التاسع
            function calculateSumAndPlaceInTable9() {

                console.log('🧮 بدء جمع نتائج الصف السادس من الجدول السابع (مع استثناء الأعمدة 1، 2، 5)...');

                // الحصول على الجدول السابع
                const table7 = document.querySelector('table:nth-of-type(7)');
                if (!table7) {
                    console.error('❌ لا يوجد جدول سابع');
                    return;
                }

                // الحصول على الصف السادس من الجدول السابع
                const row6 = table7.querySelector('tr:nth-child(6)');
                if (!row6) {
                    console.error('❌ لا يوجد صف سادس في الجدول السابع');
                    return;
                }

                // الحصول على جميع خلايا الصف السادس
                const cells = row6.querySelectorAll('td');
                if (cells.length === 0) {
                    console.error('❌ لا توجد خلايا في الصف السادس');
                    return;
                }

                // جمع قيم جميع الخلايا في الصف السادس مع استثناء الأعمدة 1، 2، 5
                let sum = 0;
                let values = [];

                for (let i = 0; i < cells.length; i++) {
                    // تخطي الأعمدة 1، 2، 5 (الخلايا 0، 1، 4 لأن الفهرس يبدأ من 0)
                    if (i === 0 || i === 1 || i === 2 || i === 3 || i === 4 || i === 5 || i === 6 || i === 11) {
                        console.log(`⏭️ تخطي العمود ${i + 1} (مستثنى من الجمع)`);
                        continue;
                    }

                    const value = parseFloat(cells[i].textContent || '0');
                    if (!isNaN(value)) {
                        sum += value;
                        values.push(value);
                        console.log(`📊 الخلية ${i + 1}: ${value}`);
                    }
                }




                // الحصول على الجدول التاسع
                const table9 = document.querySelector('table:nth-of-type(9)');
                if (!table9) {
                    console.error('❌ لا يوجد جدول تاسع');
                    return;
                }

                // الحصول على الصف الثالث العمود الخامس في الجدول التاسع
                const targetCell = table9.querySelector('tr:nth-child(3) td:nth-child(5)');
                if (!targetCell) {
                    console.error('❌ لا يوجد خلية في الصف الثالث العمود الخامس من الجدول التاسع');
                    return;
                }


                // وضع نتيجة الجمع في الخلية المستهدفة

                targetCell.textContent = sum.toFixed(7);







                console.log(`✅ تم وضع نتيجة الجمع (${sum}) في الجدول التاسع - الصف الثالث العمود الخامس`);

                return sum;
                // حساب وتحديث الاستهلاك الشهري
                // gool2

            }

            function Calcul_month_Consump() {
                const day = daySelect.value;
                const selectedYear = yearSelect.value;
                const selectedmonth = monthSelect.value;

                // الحصول على العناصر مرة واحدة لتجنب التكرار
                const table9 = document.querySelector('table:nth-of-type(9)');
                const table10 = document.querySelector('table:nth-of-type(10)');

                // الحصول على القيم الأساسية مع معالجة القيم الفارغة
                const dayValue2 = parseFloat(table10.querySelector(`tr:nth-child(${day}) td:nth-child(2)`).textContent) || 0;
                const dayValue3 = parseFloat(table10.querySelector(`tr:nth-child(${day}) td:nth-child(3)`).textContent) || 0;
                const dayValue8 = parseFloat(table10.querySelector(`tr:nth-child(${day}) td:nth-child(8)`).textContent) || 0;

                const row3col3 = parseFloat(table9.querySelector('tr:nth-child(3) td:nth-child(3)').textContent) || 0;
                const row3col4 = parseFloat(table9.querySelector('tr:nth-child(3) td:nth-child(4)').textContent) || 0;
                const row3col5 = parseFloat(table9.querySelector('tr:nth-child(3) td:nth-child(5)').textContent) || 0;

                // حساب الاستهلاك الشهري
                const monthlyConsump5 = (parseFloat(table10.querySelector('tr:nth-child(1) td:nth-child(4)').textContent) - dayValue2 + row3col5).toFixed(7);
                const monthlyConsump4 = (parseFloat(table10.querySelector('tr:nth-child(1) td:nth-child(5)').textContent) - dayValue3 + row3col4).toFixed(7);
                const monthlyConsump3 = (parseFloat(table10.querySelector('tr:nth-child(2) td:nth-child(4)').textContent) - dayValue8 + row3col3).toFixed(7);
                // if (day === 1 && selectedmonth === 1 && selectedYear === 2025) {

                // } else {
                //     const monthlyConsump5 = (parseFloat(table10.querySelector('tr:nth-child(1) td:nth-child(4)').textContent) - dayValue2 + row3col5).toFixed(7);
                //     const monthlyConsump4 = (parseFloat(table10.querySelector('tr:nth-child(1) td:nth-child(5)').textContent) - dayValue3 + row3col4).toFixed(7);
                //     const monthlyConsump3 = (parseFloat(table10.querySelector('tr:nth-child(2) td:nth-child(4)').textContent) - dayValue8 + row3col3).toFixed(7);
                // }


                table9.querySelector('tr:nth-child(4) td:nth-child(5)').textContent = monthlyConsump5;
                table9.querySelector('tr:nth-child(4) td:nth-child(4)').textContent = monthlyConsump4;
                table9.querySelector('tr:nth-child(4) td:nth-child(3)').textContent = monthlyConsump3;

                // حساب الاستهلاك السنوي
                const yearlyConsump5 = (parseFloat(table10.querySelector('tr:nth-child(1) td:nth-child(6)').textContent) - dayValue2 + row3col5).toFixed(7);
                const yearlyConsump4 = (parseFloat(table10.querySelector('tr:nth-child(1) td:nth-child(7)').textContent) - dayValue3 + row3col4).toFixed(7);
                const yearlyConsump3 = (parseFloat(table10.querySelector('tr:nth-child(2) td:nth-child(5)').textContent) - dayValue8 + row3col3).toFixed(7);
                // if (day === 1 && selectedmonth === 1 && selectedYear === 2025) {

                // } else {
                //     const yearlyConsump5 = (parseFloat(table10.querySelector('tr:nth-child(1) td:nth-child(6)').textContent) - dayValue2 + row3col5).toFixed(7);
                //     const yearlyConsump4 = (parseFloat(table10.querySelector('tr:nth-child(1) td:nth-child(7)').textContent) - dayValue3 + row3col4).toFixed(7);
                //     const yearlyConsump3 = (parseFloat(table10.querySelector('tr:nth-child(2) td:nth-child(5)').textContent) - dayValue8 + row3col3).toFixed(7);
                // }

                table9.querySelector('tr:nth-child(5) td:nth-child(5)').textContent = yearlyConsump5;
                table9.querySelector('tr:nth-child(5) td:nth-child(4)').textContent = yearlyConsump4;
                table9.querySelector('tr:nth-child(5) td:nth-child(3)').textContent = yearlyConsump3;

                // حساب النسب مع منع القسمة على الصفر والقيم الفارغة
                if (row3col3 !== 0) {
                    table9.querySelector('tr:nth-child(3) td:nth-child(2)').textContent = (row3col5 / row3col3).toFixed(7);
                } else {
                    table9.querySelector('tr:nth-child(3) td:nth-child(2)').textContent = '0';
                }

                if (parseFloat(monthlyConsump3) !== 0) {
                    table9.querySelector('tr:nth-child(4) td:nth-child(2)').textContent = (parseFloat(monthlyConsump5) / parseFloat(monthlyConsump3)).toFixed(7);
                } else {
                    table9.querySelector('tr:nth-child(4) td:nth-child(2)').textContent = '0';
                }

                if (parseFloat(yearlyConsump3) !== 0) {
                    table9.querySelector('tr:nth-child(5) td:nth-child(2)').textContent = (parseFloat(yearlyConsump5) / parseFloat(yearlyConsump3)).toFixed(7);
                } else {
                    table9.querySelector('tr:nth-child(5) td:nth-child(2)').textContent = '0';
                }
            }

            // دالة جديدة لجمع الأعمدة 1، 2، 5 فقط ووضعها في العمود الرابع
            function calculateSumOfColumns125() {
                console.log('🧮 بدء جمع الأعمدة 1، 2، 5 من الصف السادس في الجدول السابع...');

                // الحصول على الجدول السابع
                const table7 = document.querySelector('table:nth-of-type(7)');
                if (!table7) {
                    console.error('❌ لا يوجد جدول سابع');
                    return;
                }

                // الحصول على الصف السادس من الجدول السابع
                const row6 = table7.querySelector('tr:nth-child(6)');
                if (!row6) {
                    console.error('❌ لا يوجد صف سادس في الجدول السابع');
                    return;
                }

                // الحصول على جميع خلايا الصف السادس
                const cells = row6.querySelectorAll('td');
                if (cells.length === 0) {
                    console.error('❌ لا توجد خلايا في الصف السادس');
                    return;
                }

                // جمع قيم الأعمدة 1، 2، 5 فقط
                let sum = 0;
                let values = [];
                const columnsToSum = [0, 1, 4]; // الفهرس يبدأ من 0 (العمود 1، 2، 5)

                for (let i = 0; i < cells.length; i++) {
                    // جمع الأعمدة 1، 2، 5 فقط
                    if (columnsToSum.includes(i)) {
                        const value = parseFloat(cells[i].textContent || '0');
                        if (!isNaN(value)) {
                            sum += value;
                            values.push(value);
                            console.log(`📊 الخلية ${i + 1}: ${value}`);
                        }
                    } else {
                        console.log(`⏭️ تخطي العمود ${i + 1} (غير مدرج في الجمع)`);
                    }
                }

                console.log(`📊 قيم الأعمدة 1، 2، 5: ${values.join(' + ')} = ${sum}`);

                // الحصول على الجدول التاسع
                const table9 = document.querySelector('table:nth-of-type(9)');
                if (!table9) {
                    console.error('❌ لا يوجد جدول تاسع');
                    return;
                }

                // الحصول على الصف الثالث العمود الرابع في الجدول التاسع
                const targetCell = table9.querySelector('tr:nth-child(3) td:nth-child(4)');
                if (!targetCell) {
                    console.error('❌ لا يوجد خلية في الصف الثالث العمود الرابع من الجدول التاسع');
                    return;
                }

                // وضع نتيجة الجمع في الخلية المستهدفة
                targetCell.textContent = sum;
                console.log(`✅ تم وضع نتيجة الجمع (${sum}) في الجدول التاسع - الصف الثالث العمود الرابع`);

                return sum;
            }
            // دالة جديدة لقسمة العمود الخامس على العمود الثالث في الصف الثالث من الجدول التاسع
            function divideColumnsInTable9() {
                console.log('➗ بدء عملية القسمة في الجدول التاسع...');

                // الحصول على الجدول التاسع
                const table9 = document.querySelector('table:nth-of-type(9)');
                if (!table9) {
                    console.error('❌ لا يوجد جدول تاسع');
                    return;
                }

                // الحصول على الصف الثالث من الجدول التاسع
                const row3 = table9.querySelector('tr:nth-child(3)');
                const row4 = table9.querySelector('tr:nth-child(4)');
                const row5 = table9.querySelector('tr:nth-child(5)');
                if (!row3) {
                    console.error('❌ لا يوجد صف ثالث في الجدول التاسع');
                    return;
                }
                if (!row4) {
                    console.error('❌ لا يوجد صف رابع في الجدول التاسع');
                    return;
                }
                if (!row5) {
                    console.error('❌ لا يوجد صف رابع في الجدول التاسع');
                    return;
                }

                // الحصول على خلايا العمود الخامس والعمود الثالث من الصف الثالث
                const column5Cell = row3.querySelector('td:nth-child(5)');
                const column3Cell = row3.querySelector('td:nth-child(3)');

                const column4_5Cell = row4.querySelector('td:nth-child(5)');
                const column4_3Cell = row4.querySelector('td:nth-child(3)');


                const column5_5Cell = row5.querySelector('td:nth-child(5)');
                const column5_3Cell = row5.querySelector('td:nth-child(3)');

                if (!column5Cell || !column3Cell) {
                    console.error('❌ لا توجد خلايا في العمود الخامس أو الثالث من الصف الثالث');
                    return;
                }
                if (!column4_5Cell || !column4_3Cell) {
                    console.error('❌ لا توجد خلايا في العمود الخامس أو الثالث من الصف الرابع');
                    return;
                }

                if (!column5_5Cell || !column5_3Cell) {
                    console.error('❌ لا توجد خلايا في العمود الخامس أو الثالث من الصف الرابع');
                    return;
                }

                // تحويل القيم إلى أعداد عشرية
                const value5 = parseFloat(column5Cell.textContent || '0');
                const value3 = parseFloat(column3Cell.textContent || '1'); // استخدام 1 كقيمة افتراضية لتجنب القسمة على صفر

                const value4_5 = parseFloat(column4_5Cell.textContent || '0');
                const value4_3 = parseFloat(column4_3Cell.textContent || '1'); // استخدام 1 كقيمة افتراضية لتجنب القسمة على صفر

                const value5_5 = parseFloat(column5_5Cell.textContent || '0');
                const value5_3 = parseFloat(column5_3Cell.textContent || '1'); // استخدام 1 كقيمة افتراضية لتجنب القسمة على صفر

                console.log(`📊 قيمة العمود الخامس: ${value5}`);
                console.log(`📊 قيمة العمود الثالث: ${value3}`);

                console.log(`📊 قيمة العمود الخامس: ${value4_5}`);
                console.log(`📊 قيمة العمود الثالث: ${value4_3}`);

                console.log(`📊 قيمة العمود الخامس: ${value5_5}`);
                console.log(`📊 قيمة العمود الثالث: ${value5_3}`);

                // التحقق من القسمة على الصفر
                if (value3 === 0) {
                    console.error('❌ لا يمكن القسمة على صفر');
                    return;
                }

                // التحقق من القسمة على الصفر
                if (value4_3 === 0) {
                    console.error('❌ لا يمكن القسمة على صفر');
                    return;
                }

                // التحقق من القسمة على الصفر
                if (value5_3 === 0) {
                    console.error('❌ لا يمكن القسمة على صفر');
                    return;
                }
                // إجراء عملية القسمة
                const result = value5 / value3;
                console.log(`✅ نتيجة القسمة: ${value5} / ${value3} = ${result}`);

                // إجراء عملية القسمة
                const result4 = value4_5 / value4_3;
                console.log(`✅ نتيجة القسمة: ${value4_5} / ${value4_3} = ${result4}`);

                // إجراء عملية القسمة
                const result5 = value5_5 / value5_3;
                console.log(`✅ نتيجة القسمة: ${value5_5} / ${value5_3} = ${result5}`);

                // الحصول على خلية العمود الثاني من الصف الثالث
                const column2Cell = row3.querySelector('td:nth-child(2)');
                if (!column2Cell) {
                    console.error('❌ لا توجد خلية في العمود الثاني من الصف الثالث');
                    return;
                }

                // الحصول على خلية العمود الثاني من الصف الثالث
                const column4_2Cell = row4.querySelector('td:nth-child(2)');
                if (!column4_2Cell) {
                    console.error('❌ لا توجد خلية في العمود الثاني من الصف الرابع');
                    return;
                }

                // الحصول على خلية العمود الثاني من الصف الثالث
                const column5_2Cell = row5.querySelector('td:nth-child(2)');
                if (!column5_2Cell) {
                    console.error('❌ لا توجد خلية في العمود الثاني من الصف الرابع');
                    return;
                }
                // وضع نتيجة القسمة في الخلية المستهدفة
                column2Cell.textContent = result.toFixed(7); // حفظ النتيجة بمنزلتين عشريتين
                console.log(`✅ تم وضع نتيجة القسمة (${result.toFixed(7)}) في الجدول التاسع - الصف الثالث العمود الثاني`);

                // وضع نتيجة القسمة في الخلية المستهدفة
                column4_2Cell.textContent = result4.toFixed(7); // حفظ النتيجة بمنزلتين عشريتين
                console.log(`✅ تم وضع نتيجة القسمة (${result4.toFixed(7)}) في الجدول التاسع - الصف الثالث العمود الثاني`);

                // وضع نتيجة القسمة في الخلية المستهدفة
                column5_2Cell.textContent = result5.toFixed(7); // حفظ النتيجة بمنزلتين عشريتين
                console.log(`✅ تم وضع نتيجة القسمة (${result5.toFixed(7)}) في الجدول التاسع - الصف الثالث العمود الثاني`);

                return result;

            }

            function Rea_calculating() {
                function calculateCell(column) {
                    const selectorBase = `table:nth-of-type(7) tr:nth-child`;

                    // الحصول على العناصر أولاً
                    const element5 = document.querySelector(`${selectorBase}(5) td:nth-child(${column})`);
                    const element4 = document.querySelector(`${selectorBase}(4) td:nth-child(${column})`);
                    const resultElement = document.querySelector(`${selectorBase}(6) td:nth-child(${column})`);

                    // التحقق من وجود العناصر
                    if (!element5 || !element4 || !resultElement) {
                        console.error(`❌ عنصر غير موجود للعمود ${column}`);
                        return;
                    }

                    // عرض القيم الفعلية في الكونسول
                    console.log(`📊 العمود ${column}:`);
                    console.log(`الصف 5: '${element5.textContent}'`);
                    console.log(`الصف 4: '${element4.textContent}'`);

                    // تحويل القيم إلى أرقام
                    const value5 = parseFloat(element5.textContent) || 0;
                    const value4 = parseFloat(element4.textContent) || 0;
                    const Subtract = value5 - value4;
                    if (Subtract <= 0) {


                        resultElement.textContent = 0;
                    } else {
                        if (column === 1 || column === 2 || column === 3 || column === 4 || column === 9 || column === 13 || column === 11) {
                            resultElement.textContent = (Subtract * 1000).toFixed(7);
                        } else if (column === 12) {
                            // الحصول على قيمة العمود 8
                            const element5_col8 = document.querySelector(`${selectorBase}(5) td:nth-child(8)`);
                            const element4_col8 = document.querySelector(`${selectorBase}(4) td:nth-child(8)`);

                            // التحقق من وجود عناصر العمود 8
                            if (!element5_col8 || !element4_col8) {
                                console.error(`❌ عنصر غير موجود للعمود 8`);
                                return;
                            }

                            const value5_col8 = parseFloat(element5_col8.textContent) || 0;
                            const value4_col8 = parseFloat(element4_col8.textContent) || 0;

                            // التحقق من القيم الرقمية للعمود 8
                            if (isNaN(value5_col8) || isNaN(value4_col8)) {
                                console.error(`❌ قيم غير رقمية في العمود 8`);
                                return;
                            }

                            // حساب قيمة العمود 12: ((value5 - value4)*1000) - (value5_col8 - value4_col8)
                            const result = (Subtract * 1000) - (value5_col8 - value4_col8);
                            resultElement.textContent = result.toFixed(7);
                        } else if (column === 10) {
                            // الحصول على قيمة العمود 9
                            const element5_col9 = document.querySelector(`${selectorBase}(5) td:nth-child(9)`);
                            const element4_col9 = document.querySelector(`${selectorBase}(4) td:nth-child(9)`);

                            // التحقق من وجود عناصر العمود 9
                            if (!element5_col9 || !element4_col9) {
                                console.error(`❌ عنصر غير موجود للعمود 9`);
                                return;
                            }

                            const value5_col9 = parseFloat(element5_col9.textContent) || 0;
                            const value4_col9 = parseFloat(element4_col9.textContent) || 0;

                            // التحقق من القيم الرقمية للعمود 9
                            if (isNaN(value5_col9) || isNaN(value4_col9)) {
                                console.error(`❌ قيم غير رقمية في العمود 9`);
                                return;
                            }

                            // حساب قيمة العمود 10: ((value5 - value4)*1000) - (value5_col9 - value4_col9) * 1000
                            const result = (Subtract * 1000) - (value5_col9 - value4_col9) * 1000;
                            resultElement.textContent = result.toFixed(7);
                        } else {
                            resultElement.textContent = Subtract.toFixed(7);
                        }
                    }




                    console.log(`✅ النتيجة: ${value5} - ${value4} = ${value5 - value4}`);
                }

                // حساب جميع الأعمدة من 1 إلى 14
                for (let column = 1; column <= 14; column++) {
                    calculateCell(column);
                }

            }

            /////////////////////////////////////////////////////////////////////////////////
            // إضافة الاستدعاء إلى الدالة الرئيسية
            function calculatingImproved_Load() {
                clearAllCells();
                setTimeout(() => {
                    updatePageData2();
                    setTimeout(() => {
                        updatePageData();
                        setTimeout(() => {
                            changecolor();
                            Rea_calculating();
                            setTimeout(() => {
                                updatePageData6();
                                updatePageData5();
                                updatePageData3();
                            }, 500);
                        }, 2400);
                    }, 200);
                }, 200);
            }



            async function calculatingImproved_Change() {
                try {
                    await calculating();
                    await calculateSumAndPlaceInTable9();
                    await calculateSumOfColumns125();
                    await Calcul_month_Consump();
                    await saveTable9DataToDatabase();
                    await saveTable9Row4ToDatabase();
                    await saveTable9_KW_per_Ton();
                    await PLANT_REF_CONS_REMARKS_A_B_C();

                    // التشغيل المتوازي للدوال التي لا تعتمد على بعضها
                    await Promise.all([
                        updatePageData2(),
                        updatePageData6(),
                        updatePageData5()
                    ]);

                    console.log("✅ جميع العمليات اكتملت بنجاح");
                } catch (error) {
                    console.error("❌ خطأ في التنفيذ:", error);
                }
            }



            // ✅ النسخة المصححة:
            window.addEventListener('load', () => {
                loadSelection(yearSelect);
                loadSelection(monthSelect);
                loadSelection(daySelect);
                calculatingImproved_Load();



            });

            yearSelect.addEventListener('change', () => {
                saveSelection(yearSelect);
                loadSelection(yearSelect);

                calculatingImproved_Load();

            });

            monthSelect.addEventListener('change', () => {
                saveSelection(monthSelect);
                loadSelection(monthSelect);
                calculatingImproved_Load();


            });

            daySelect.addEventListener('change', () => {
                saveSelection(daySelect);
                calculatingImproved_Load();
            });

        });

        function clearAllCells() {
            // table2
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(1)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(16)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(19)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(4) td:nth-child(20)').textContent = '0';

            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(1)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(16)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(19)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(20)').textContent = '0';

            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(1)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(16)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(19)').textContent = '0';
            document.querySelector('table:nth-of-type(2) tr:nth-child(6) td:nth-child(20)').textContent = '0';

            // table 3
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(36)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(35)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(34)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(33)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(32)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(31)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(30)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(29)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(28)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(27)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(26)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(25)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(24)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(23)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(22)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(21)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(20)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(19)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(16)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(4) td:nth-child(1)').textContent = '0';

            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(36)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(35)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(34)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(33)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(32)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(31)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(30)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(29)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(28)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(27)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(26)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(25)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(24)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(23)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(22)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(21)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(20)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(19)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(16)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(1)').textContent = '0';

            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(36)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(35)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(34)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(33)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(32)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(31)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(30)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(29)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(28)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(27)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(26)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(25)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(24)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(23)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(22)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(21)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(20)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(19)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(16)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(3) tr:nth-child(6) td:nth-child(1)').textContent = '0';
            // TABLE 4 
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(32)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(31)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(30)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(29)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(28)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(27)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(26)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(25)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(24)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(23)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(22)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(21)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(20)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(19)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(16)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(4) td:nth-child(1)').textContent = '0';

            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(32)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(31)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(30)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(29)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(28)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(27)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(26)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(25)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(24)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(23)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(22)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(21)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(20)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(19)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(16)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(5) td:nth-child(1)').textContent = '0';

            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(32)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(31)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(30)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(29)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(28)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(27)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(26)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(25)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(24)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(23)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(22)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(21)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(20)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(19)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(16)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(4) tr:nth-child(6) td:nth-child(1)').textContent = '0';
            // TABLE 5
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(32)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(31)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(30)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(29)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(28)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(26)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(27)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(25)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(24)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(23)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(22)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(21)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(20)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(19)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(16)').textContent = '0';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(13)').textContent = '0';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(7)').textContent = '0';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(4)').textContent = '0';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(3)').textContent = '0';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(1)').textContent = '0';

            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(32)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(31)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(30)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(29)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(28)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(26)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(27)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(25)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(24)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(23)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(22)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(21)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(20)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(19)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(16)').textContent = '0';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(13)').textContent = '0';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(7)').textContent = '0';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(4)').textContent = '0';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(3)').textContent = '0';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(1)').textContent = '0';

            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(32)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(31)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(30)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(29)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(28)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(26)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(27)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(25)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(24)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(23)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(22)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(21)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(20)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(19)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(16)').textContent = '0';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(13)').textContent = '0';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(7)').textContent = '0';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(4)').textContent = '0';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(3)').textContent = '0';
            // document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(1)').textContent = '0';
            // table 6
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(16)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(4) td:nth-child(1)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(16)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(5) td:nth-child(1)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(16)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(6) td:nth-child(1)').textContent = '0';

            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(16)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(7) td:nth-child(1)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(16)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(8) td:nth-child(1)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(18)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(17)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(16)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(15)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(6) tr:nth-child(9) td:nth-child(1)').textContent = '0';

            // table 7
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(4) td:nth-child(1)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(5) td:nth-child(1)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(14)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(13)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(7) tr:nth-child(6) td:nth-child(1)').textContent = '0';
            // table 8
            document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(1)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(4) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(1)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(5) td:nth-child(12)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(1)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(6)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(7)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(8)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(9)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(10)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(11)').textContent = '0';
            document.querySelector('table:nth-of-type(8) tr:nth-child(6) td:nth-child(12)').textContent = '0';
            // table 9
            document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(1)').textContent = '0';
            document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(9) tr:nth-child(3) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(1)').textContent = '0';
            document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(9) tr:nth-child(4) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(1)').textContent = '0';
            document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(2)').textContent = '0';
            document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(3)').textContent = '0';
            document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(4)').textContent = '0';
            document.querySelector('table:nth-of-type(9) tr:nth-child(5) td:nth-child(5)').textContent = '0';
            document.querySelector('table:nth-of-type(10) tr:nth-child(2) td:nth-child(5)').textContent = '0';
        }
    </script>
    <!-- table1 -->
    <table>
        <tr>
            <td></td>
            <td class='left-align'>Date</td>
            <td colspan='1' class='arabic-text'>YEMEN COMPANY FOR SUGAR REFINING , RASS ISSA , HODIEDAH<br>ELECTRICAL DEPARTMENT<br>REFINERY ELECTRICAL LOG BOOK</td>
            <td class='tdimg' rowspan='5'><img class='imgx' src='imgs/4.png' alt=''></td>
        </tr>

    </table>
    <!-- table2 -->
    <table>
        <tr>
            <td class="bisque" colspan='7'>LV SWITCH GEAR PANAL</td>
            <td class="bisque" colspan='13'>11 KV SWITCH GEAR PANAL</td>
            <td rowspan="3">SHIFT</td>
        </tr>
        <tr>
            <td rowspan="2">ROOM<br>TEMP.</td>
            <td colspan="6">CURRENT IN AMPERE</td>

            <td rowspan="2">ROOM<br>TEMP.</td>
            <td colspan="6">SF6 GAS PRESSURE IN KG</td>
            <td colspan="6">CURRENT IN AMPERE</td>
        </tr>
        <tr>
            <td>MCC-RS</td>
            <td>MCC-5</td>
            <td>MCC-3A</td>
            <td>MCC-3</td>
            <td>MCC-2</td>
            <td>MCC-1</td>

            <td>TR-RO</td>
            <td>TR-5</td>
            <td>TR-3</td>
            <td>TR-2</td>
            <td>TR-1</td>
            <td>INCOMER</td>

            <td>TR-RO</td>
            <td>TR-5</td>
            <td>TR-3</td>
            <td>TR-2</td>
            <td>TR-1</td>
            <td>INCOMER</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>A</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>B</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>C</td>
        </tr>
    </table>
    <!-- table3 -->
    <table>
        <tr>
            <td class="bisque" colspan='2'>DRYER</td>
            <td class="bisque" colspan='4'>REMELT LEQUOR <br> PUMP</td>
            <td class="bisque" colspan='2'>EXT FAN</td>
            <td class="bisque" colspan='10'>CONTINUOUS CENTERIFUGAL MOTORS</td>
            <td class="bisque" colspan='18'>BATCH CENTERIFUGAL MOTORS</td>
            <td rowspan="3">SHIFT</td>
        </tr>
        <tr>
            <td colspan="2">10020</td>
            <td colspan="2">04250</td>
            <td colspan="2">04240</td>
            <td colspan="2">10160</td>

            <td colspan="2">09430</td>
            <td colspan="2">09380</td>
            <td colspan="2">09230</td>
            <td colspan="2">09140</td>
            <td colspan="2">09130</td>
            <td colspan="2">08430</td>
            <td colspan="2">08340</td>
            <td colspan="2">08330</td>
            <td colspan="2">08240</td>
            <td colspan="2">08230</td>
            <td colspan="2">08160</td>
            <td colspan="2">08150</td>
            <td colspan="2">08140</td>
            <td colspan="2">08130</td>
        </tr>
        <tr>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>A</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>B</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>c</td>
        </tr>
    </table>
    <!-- table 4 -->
    <table>
        <tr>
            <td class="bisque" colspan='32'>ACC FANS MOTORS</td>
            <td rowspan="3">SHIFT</td>
        </tr>
        <tr>
            <td colspan="2">13165</td>
            <td colspan="2">13160</td>
            <td colspan="2">13145</td>
            <td colspan="2">13140</td>

            <td colspan="2">13125</td>
            <td colspan="2">13120</td>
            <td colspan="2">13105</td>
            <td colspan="2">13100</td>

            <td colspan="2">13085</td>
            <td colspan="2">13080</td>
            <td colspan="2">13065</td>
            <td colspan="2">13060</td>

            <td colspan="2">13045</td>
            <td colspan="2">13040</td>
            <td colspan="2">13025</td>
            <td colspan="2">13020</td>
        </tr>
        <tr>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>A</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>B</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>c</td>
        </tr>
    </table>
    <!-- table 5 -->
    <table>
        <tr>
            <td class="bisque" colspan='20'>TRANSFORMERS OBSERVATIONS</td>
            <td class="bisque" colspan='4'>RADIAL FANS</td>
            <td class="bisque" colspan='6'>VACUME PUMP MOTORS</td>
            <td class="bisque" colspan='6'>CO2 PUMP MOTORS</td>
            <td rowspan="3">SHIFT</td>
        </tr>
        <tr>
            <td rowspan="2" colspan="5">REMARKS</td>
            <td colspan="3">TR-RO</td>
            <td colspan="3">TR-5</td>
            <td colspan="3">TR-3</td>
            <td colspan="3">TR-2</td>
            <td colspan="3">TR-1</td>

            <td colspan="2">10640</td>
            <td colspan="2">10120</td>

            <td colspan="2">13230</td>
            <td colspan="2">13220</td>
            <td colspan="2">13210</td>

            <td colspan="2">05850</td>
            <td colspan="2">05245</td>
            <td colspan="2">05840</td>
        </tr>
        <tr>


            <td>OTI</td>
            <td>WTI</td>
            <td>AMP</td>

            <td>OTI</td>
            <td>WTI</td>
            <td>AMP</td>

            <td>OTI</td>
            <td>WTI</td>
            <td>AMP</td>

            <td>OTI</td>
            <td>WTI</td>
            <td>AMP</td>

            <td>OTI</td>
            <td>WTI</td>
            <td>AMP</td>

            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
            <td>T</td>
            <td>A</td>
        </tr>
        <tr>
            <td colspan="5"></td>

            <td>-</td>
            <td>-</td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>A</td>
        </tr>
        </tr>
        <tr>
            <td colspan="5"></td>

            <td>-</td>
            <td>-</td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>B</td>
        </tr>
        </tr>
        <tr>
            <td colspan="5"></td>

            <td>-</td>
            <td>-</td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td>-</td>
            <td></td>

            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>C</td>
        </tr>
    </table>
    <!-- table 6 -->
    <table>
        <tr>
            <td class="bisque" colspan='18'>BATCH CENTERIFUGAL VARIABLE FREQUENCY DEVICES</td>
            <td rowspan="3">SHIFT</td>
        </tr>
        <tr>
            <td colspan="2">08430</td>
            <td colspan="2">08340</td>
            <td colspan="2">08330</td>
            <td colspan="2">08240</td>
            <td colspan="2">08230</td>
            <td colspan="2">05160</td>
            <td colspan="2">08150</td>
            <td colspan="2">08140</td>
            <td colspan="2">08130</td>
        </tr>
        <tr>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
            <td>CONV-TEMP</td>
            <td>INV-TEMP</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">9 AM</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">1 PM</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">5 PM</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">9 PM</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">1 AM</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">5 AM</td>
        </tr>
    </table>
    <!-- table 7 -->
    <table>
        <tr>
            <td class="bisque" colspan='14'>ENERGY METERS READINGS</td>
            <td rowspan="3">TIME</td>
        </tr>
        <tr>
            <td>COMPRESSOR</td>
            <td>B-CONVEYOR</td>
            <td>MCC-2B</td>
            <td>RAW SUGAR</td>
            <td>PACKING</td>
            <td>K-SILO</td>
            <td>RO-PLANT</td>
            <td>COMP FROM MCC-3</td>
            <td>AIR COMPRESSOR</td>
            <td>MCC-5</td>
            <td>MCC-3A</td>
            <td>MCC-3</td>
            <td>MCC-2</td>
            <td>MCC-1</td>
        </tr>
        <tr>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
            <td>KWH</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">8 AM Pre</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">8 AM Final</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="direction: ltr;">CONSUNP.</td>
        </tr>
    </table>
    <!-- table 8 -->
    <table>
        <tr>
            <td class="greenyellow" colspan='24'>UBS OBSERVATION</td>
            <td rowspan="3">SHIFT</td>
        </tr>
        <tr>
            <td rowspan="2" colspan="5">REMARKS</td>
            <td rowspan="2" colspan="7">BATTERY TEMPERATURE</td>
            <td rowspan="2" colspan="3">INTERNAL TEMP.</td>
            <td colspan="2">ABNORMAL NOISE</td>
            <td colspan="3">OUTPUT CURRENT</td>
            <td colspan="2">OUTPUT VOLTAGR</td>
            <td colspan="2">BATTERY VOLTAGE</td>
        </tr>
        <tr>
            <td>NOT</td>
            <td>OK</td>
            <td>L3</td>
            <td>L2</td>
            <td>L1</td>
            <td>V2</td>
            <td>V1</td>
            <td>V2</td>
            <td>V1</td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td colspan="7"></td>
            <td colspan="3"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>A</td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td colspan="7"></td>
            <td colspan="3"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>B</td>
        </tr>
        <tr>
            <td colspan="5"></td>
            <td colspan="7"></td>
            <td colspan="3"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>C</td>
        </tr>
    </table>
    <!-- table 9 -->
    <table>
        <tr>
            <td class="greenyellow" colspan='5'>PLANT REFINERY CONSUMPTION</td>
            <td rowspan="2">TIME</td>
        </tr>
        <tr>
            <td>REMARKS</td>
            <td>KW/TON</td>
            <td>SUGAR PRODUCTION IN TON</td>
            <td>PACKING SECTION IN KWH</td>
            <td>REFINING PLANT IN KWH</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>TODAY</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>TO THIS MONTH</td>
        </tr>
        <tr>
            <td>244</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>TO THIS YEAR</td>
        </tr>
    </table>
    <!-- أضف هذا في نهاية body قبل إغلاق tag -->
    <table id="hiddenDataTable" style="display: none;"">
    <!-- <table id="hiddenDataTable" ""> -->
        <thead>
            <tr>
                <th>Day</th>
                <th>REFINING_KWH_A</th>
                <th>PACKING_KWH_A</th>
                <th>REFINING_KWH_B</th>
                <th>PACKING_KWH_B</th>
                <th>REFINING_KWH_C</th>
                <th>PACKING_KWH_C</th>
                <th>SUGAR_PROD_TON_A</th>
            </tr>
        </thead>
        <tbody>
            <!-- 31 صف فقط لأيام الشهر -->
            <tr id=" hiddenRow_1">
                <td>1</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>

            </tr>
            <tr id="hiddenRow_2">
                <td>2</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>

            </tr>
            <tr id="hiddenRow_3">
                <td>3</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_4">
                <td>4</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_5">
                <td>5</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_6">
                <td>6</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_7">
                <td>6</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_8">
                <td>8</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_9">
                <td>9</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_10">
                <td>10</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_11">
                <td>11</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_12">
                <td>12</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_13">
                <td>13</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_14">
                <td>14</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_15">
                <td>15</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_16">
                <td>16</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_17">
                <td>17</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_18">
                <td>18</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_19">
                <td>19</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_20">
                <td>20</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_21">
                <td>21</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_22">
                <td>22</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_23">
                <td>23</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_24">
                <td>24</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_25">
                <td>25</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_26">
                <td>26</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_27">
                <td>27</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_28">
                <td>28</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_29">
                <td>29</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>

            <!-- ... -->
            <tr id="hiddenRow_30">
                <td>30</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
            <tr id="hiddenRow_31">
                <td>31</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
                <td>0</td>
            </tr>
        </tbody>
    </table>
    <!-- <div class="top_div">

        <a href="logbook.php" class="back-btn">العودة للصفحة السابقة</a>
        <h1>تحديث القرائات</h1>

        <button class="reload-btn" id="reloadButton">
            تحديث القرائات
            <span class="icon">🔄</span>
        </button>
        <script>
            const reloadButton = document.getElementById('reloadButton');
            const icon = document.querySelector('.icon');

            reloadButton.addEventListener('click', function() {
                // إضافة تأثير الدوران عند النقر
                icon.classList.add('spinning');

                // تأخير إعادة التحميل قليلاً لرؤية تأثير الدوران
                setTimeout(() => {
                    window.location.reload();
                }, 500);
            });
        </script>

    </div> -->


</body>

</html>