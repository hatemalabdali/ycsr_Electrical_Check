<?php
// يجب أن يكون هذا السطر في أعلى الملف قبل أي محتوى HTML
session_start();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جدول صيانة المحولات</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 1.5%;
            width: 97%;
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

        .A-GRD {
            direction: ltr;
        }

        .B-GRD {
            direction: ltr;
        }

        .C-GRD {
            direction: ltr;
        }

        .A-B {
            direction: ltr;
        }

        .B-C {
            direction: ltr;
        }

        .C-A {
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

            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
            margin-left: 5%;
            padding-left: 1%;
            padding-right: 1%;
        }

        .back-btn1 {
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

        .center {
            text-align: center;
        }

        .wide_font {
            font-family: Arial, sans-serif;
            font-weight: 600;
        }

        .whatsapp-btn,
        .telegram-btn {
            display: inline-flex;
            align-items: center;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 14px;
        }

        .whatsapp-btn {
            background-color: #25D366;
            color: white;
        }

        .whatsapp-btn:hover {
            background-color: #128C7E;
            transform: translateY(-2px);
        }

        .telegram-btn {
            background-color: #0088cc;
            color: white;
        }

        .telegram-btn:hover {
            background-color: #006699;
            transform: translateY(-2px);
        }

        .whatsapp-btn i,
        .telegram-btn i {
            margin-left: 8px;
        }

        .buttons-container {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .whats {
            width: 100%;
            display: flex;
            justify-content: center;
            /* لتوسيط الأفقي */
            align-items: center;
            /* لتوسيط العمودي (إذا needed) */
            gap: 15px;
            /* مسافة بين الزرين */

            padding: 10px;
            /* إضافة padding لجمالية أكثر */
        }

        @media screen and (max-width: 480px) {
            body {
                font-family: Arial, sans-serif;
                padding-left: 1.5%;
                padding-right: 1.5%;
                padding-top: 1.5%;
                padding-bottom: 0;
                margin-bottom: 0;
                width: 300%;
            }

            table {
                border-collapse: collapse;
                width: 100%;
                border: 1px solid black;
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

            .A-GRD {
                direction: ltr;
            }

            .B-GRD {
                direction: ltr;
            }

            .C-GRD {
                direction: ltr;
            }

            .A-B {
                direction: ltr;
            }

            .B-C {
                direction: ltr;
            }

            .C-A {
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

                background-color: #007BFF;
                color: white;
                border: none;
                cursor: pointer;
                border-radius: 5px;
                text-decoration: none;
                margin-left: 5%;
                padding-left: 1%;
                padding-right: 1%;
            }

            .back-btn1 {
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

        }
    </style>
</head>

<body>
    <div class="top_div">

        <a href="tr.php" class="back-btn1">العودة للصفحة السابقة</a>

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
            <label for="transfformer-select" class="select-label">اختر المحول:</label>
            <select id="transfformer-select" name="transfformer-select" class="custom-select">
                <option value="TRANSFORMER_NO_1">TRANSFORMER NO-1</option>
                <option value="TRANSFORMER_NO_2">TRANSFORMER NO-2</option>
                <option value="TRANSFORMER_NO_3">TRANSFORMER NO-3</option>
                <option value="TRANSFORMER_NO_5">TRANSOFORMER-5</option>

                <option value="Transformers_SA_ID_FAN">TransformersSA&ID FAN</option>
                <option value="TRANSFORMERS_NO_1_PMCC">TRANSFORMERS NO.1 PMCC</option>

                <option value="TRANSFORMER_ESP_NO_1">TRANSFORMER ESP NO -1</option>
                <option value="TRANSFORMER_ESP_NO_2">TRANSFORMER ESP NO-2</option>
                <option value="TRANSFORMER_ESP_NO_3">TRANSFORMER ESP NO-3</option>
                <option value="TRANSFORMER_ESP_NO_4">TRANSFORMER ESP NO-4</option>

                <option value="TRANSFORMER_RO_NO_1">TRANSFORMER RO NO-1</option>
                <option value="TRANSFORMER_RO_NO_2">TRANSFORMER RO NO-2</option>
                <option value="TRANSFORMER_PACKING">TRANSFORMER PACKING</option>

                <option value="TRANSFORMERS_NO_CHALEHAT_1">TRANSFORMERS NO CHALEHAT 1</option>
                <option value="TRANSFORMERS_NO_CHALEHAT_2">TRANSFORMERS NO CHALEHAT 2</option>
            </select>
        </div>
        <!-- أضف هذه الأزرار الجديدة -->

        <button id="save-data-btn" class="back-btn" ">حفظ البيانات</button>
    </div>
    <div class=" whats">
            <div class="buttons-container" style="display: flex; gap: 10px; margin-right: 2%;">
                <a href="#" class="whatsapp-btn" id="whatsappSupervisor" style="background-color: #25D366; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none; display: flex; align-items: center;">
                    <i class="fab fa-whatsapp"></i> إرسال للمشرف
                </a>
                <a href="#" class="telegram-btn" id="telegramManager" style="background-color: #0088cc; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none; display: flex; align-items: center;">
                    <i class="fab fa-telegram"></i> إرسال لرئيس القسم
                </a>
            </div>
    </div>
    <SCript>
        let isDirty = false;
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@ تصدير البيانات الى الجداول    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        async function saveInspectionData() {
            try {
                const conds = [];
                const notes = [];
                const srs = [];

                const AGRDS = [];
                const BGRDS = [];
                const CGRDS = [];
                const ABS = [];
                const BCS = [];
                const CAS = [];
                const srs2 = [];

                const dateCell = document.querySelector("table:nth-of-type(1) tr:nth-child(3) td:nth-child(1)");

                // جلب قيمة القاطع والسنة من القوائم المنسدلة
                const DateValue = document.querySelector('table:nth-of-type(1) tr:nth-last-child(1) td:nth-child(1)').textContent.trim();


                const selectedBreaker = document.getElementById('transfformer-select').value;
                const selectedYear = document.getElementById('year-select').value;
                // جلب اسم المستخدم من متغير الجلسة في PHP
                const loggedInUser = "<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";
                const noteValue = document.querySelector('table:nth-of-type(5) tr:nth-last-child(1) td:nth-child(1)').textContent.trim();

                // const recommendsValue = document.querySelector('table:nth-of-type(4) tr:nth-last-child(4) td:nth-child(2)').textContent.trim();

                const inspectionTableBody = document.querySelector('table:nth-of-type(4) tbody');
                const rowsToSave = inspectionTableBody.querySelectorAll('tr[data-sr]');

                // أولاً، جمع بيانات الأعمدة من المجموعة الأولى (الأعمدة 3 و 4)
                rowsToSave.forEach(row => {
                    const sr = row.getAttribute('data-sr');
                    srs.push(sr);

                    const cond1 = row.querySelector('td:nth-child(2)').textContent.trim();
                    conds.push(cond1);

                    const note1 = row.querySelector('td:nth-child(1)').textContent.trim();
                    notes.push(note1);
                });

                // ثم، جمع بيانات الأعمدة من المجموعة الثانية (الأعمدة 6 و 7)
                rowsToSave.forEach(row => {
                    const cond2 = row.querySelector('td:nth-child(5)').textContent.trim();
                    conds.push(cond2);

                    const note2 = row.querySelector('td:nth-child(4)').textContent.trim();
                    notes.push(note2);
                });

                const inspectionTableBody2 = document.querySelector('table:nth-of-type(5) tbody');
                const rowsToSave2 = inspectionTableBody2.querySelectorAll('tr[data-sr2]');
                rowsToSave2.forEach(row => {
                    const sr2 = row.getAttribute('data-sr2');
                    srs2.push(sr2);

                    const AGRD = row.querySelector('td:nth-child(6)').textContent.trim();
                    AGRDS.push(AGRD);
                    const BGRD = row.querySelector('td:nth-child(5)').textContent.trim();
                    BGRDS.push(BGRD);
                    const CGRD = row.querySelector('td:nth-child(4)').textContent.trim();
                    CGRDS.push(CGRD);

                    const AB = row.querySelector('td:nth-child(3)').textContent.trim();
                    ABS.push(AB);
                    const BC = row.querySelector('td:nth-child(2)').textContent.trim();
                    BCS.push(BC);
                    const CA = row.querySelector('td:nth-child(1)').textContent.trim();
                    CAS.push(CA);


                });

                console.log("conds Array to be sent:", conds);
                console.log("Notes Array to be sent:", notes);
                // console.log("Note to be sent:", noteValue);
                // console.log("Recommends to be sent:", recommendsValue);
                console.log("Selected Breaker:", selectedBreaker);
                console.log("Selected Year:", selectedYear);

                console.log("AGRDS Array to be sent:", AGRDS);
                console.log("BGRDS Array to be sent:", BGRDS);
                console.log("SR2 Array to be sent:", srs2);
                // console.log("Logged-in User:", loggedInUser);
                console.log("Date:", DateValue);


                const postData = {
                    conds: conds,
                    srs: srs,
                    // إضافة مصفوفة الصيانة إلى كائن البيانات
                    notes: notes,
                    noteValue: noteValue,
                    // recommends: recommendsValue,
                    // إضافة اسم القاطع والسنة
                    breaker: selectedBreaker,
                    year: selectedYear,

                    AGRDS: AGRDS,
                    BGRDS: BGRDS,
                    CGRDS: CGRDS,

                    ABS: ABS,
                    BCS: BCS,
                    CAS: CAS,

                    srs2: srs2,
                    // إضافة اسم المستخدم المسجل دخوله
                    prepared_by: loggedInUser,
                    date_value: DateValue
                };

                const response = await fetch('save_tr_data.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(postData)
                });

                const result = await response.json();

                if (result.success) {
                    isDirty = false;
                    alert('تم حفظ البيانات بنجاح!');
                } else {
                    alert('حدث خطأ أثناء الحفظ: ' + result.error);
                }

            } catch (error) {
                console.error('Error:', error);
                alert('حدث خطأ غير متوقع أثناء حفظ البيانات.');
            }
        }
        // ربط الدالة بزر الحفظ
        document.getElementById('save-data-btn').addEventListener('click', async () => {
            // عرض نافذة التأكيد للمستخدم
            if (confirm("هل أنت متأكد من حفظ البيانات؟")) {
                // إذا ضغط المستخدم على "موافق"، يتم استدعاء الدالة الأصلية
                saveInspectionData();
            } else {
                // إذا ضغط المستخدم على "إلغاء"، يمكن عرض رسالة اختيارية
                console.log("تم إلغاء عملية الحفظ.");
                // يمكنك إضافة كود آخر هنا إذا أردت
            }
        });
        // @@@@@@@@@@@@@@@@@@@@@@@@@@@ تصدير البيانات الى الجداول    @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
        document.addEventListener("DOMContentLoaded", function() {

            const inputFields = document.querySelectorAll('input,textarea');

            inputFields.forEach(field => {
                field.addEventListener('change', () => {
                    isDirty = true;
                });
                // يمكنك استخدام 'input' بدلاً من 'change' إذا كنت تريد تتبع التغييرات الفورية
                // field.addEventListener('input', () => {
                //     isDirty = true;
                // });
            });

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
            });
            document.querySelectorAll('table:nth-of-type(2) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(2) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(2) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(2) tr:nth-child(4) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });

            document.querySelectorAll('table:nth-of-type(3) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(3) tr td').forEach(cell => {
                cell.classList.add('center');
            });
            // استهداف الصف الاول فقط 
            document.querySelectorAll('table:nth-of-type(3) tr:nth-child(2) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(3) tr:nth-child(4) td').forEach(cell => {
                cell.classList.add('blue_color');
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(4) tr:nth-child(1) td').forEach(cell => {
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(5) tr td').forEach(cell => {
                cell.classList.add('wide_font');
            });
            document.querySelectorAll('table:nth-of-type(5) tr:nth-child(10) td').forEach(cell => {
                cell.classList.add('left-align');
            });

            const dateCell = document.querySelector("table:nth-of-type(1) tr:nth-child(3) td:nth-child(1)");
            if (dateCell) {
                const today = new Date();
                const day = String(today.getDate()).padStart(2, '0');
                const month = String(today.getMonth() + 1).padStart(2, '0');
                const year = today.getFullYear();
                dateCell.textContent = `${day}/${month}/${year}`;
            }

            const yearSelect = document.getElementById('year-select');
            const breakerSelect = document.getElementById('transfformer-select');

            function saveSelection(selectElement) {
                sessionStorage.setItem(selectElement.id, selectElement.value);
            }

            function loadSelection(selectElement) {
                const savedValue = sessionStorage.getItem(selectElement.id);
                if (savedValue) {
                    selectElement.value = savedValue;
                }
            }
            // كود الادخال
            function hand_Notr_calLoadInput(cell) {
                const load = prompt("أدخل ملاحظتك .. ان وجدت ..:");

                if (load !== null && load.trim() !== "") {
                    cell.textContent = `${load}`;
                    isDirty = true;
                    // isDirty = true;

                }
            }

            function hand_AGRND(cell) {
                const load = prompt(". أدخل قيمة المقاومة بالجيجا أوم ..:");

                if (load !== null && load.trim() !== "") {
                    cell.textContent = `${load} GὨ`;
                    isDirty = true;
                    // isDirty = true;

                }
            }

            function hand_POLARIZATION_INDEX(cell) {
                const load = prompt(". أدخل قيمة مؤشر الأستقطاب   ..:");

                if (load !== null && load.trim() !== "") {
                    cell.textContent = `${load}`;
                    isDirty = true;
                    // isDirty = true;

                }
            }

            function hand_Oroper_Voltage(cell) {
                const load = prompt(". أدخل قيمة الجهد المقنن    ..:");

                if (load !== null && load.trim() !== "") {
                    cell.textContent = `${load} V`;
                    isDirty = true;
                    // isDirty = true;

                }
            }

            function hand_Elect_Delectric(cell) {
                const load = prompt(". أدخل قيمة الجهد المقنن    ..:");

                if (load !== null && load.trim() !== "") {
                    cell.textContent = `${load} KV`;
                    isDirty = true;
                    // isDirty = true;

                }
            }
            // إضافة الكود للتعامل مع النقر على خلايا "جيد"
            const condCells = document.querySelectorAll('.COND-cell');
            condCells.forEach((cell, index) => {
                cell.addEventListener('click', () => {
                    const adjacentMaintCell = cell.nextElementSibling;
                    const currentValue = cell.textContent.trim();
                    const row = cell.closest('tr');
                    const rowIndex = Array.from(row.parentNode.children).indexOf(row);
                    const colindex = Array.from(cell.parentNode.children).indexOf(cell);
                    // استخدام rowIndex لتسهيل قراءة الكود

                    if (currentValue === '') {
                        cell.textContent = 'A';
                        isDirty = true;
                    } else if (currentValue === 'A') {
                        cell.textContent = 'NA';
                        isDirty = true;
                    } else if (currentValue === 'NA') {
                        cell.textContent = 'C';
                        isDirty = true;
                    } else if (currentValue === 'C') {
                        cell.textContent = 'R';
                        isDirty = true;
                    } else {
                        cell.textContent = '';
                        isDirty = true;
                    }
                });
            });

            const noteCells = document.querySelectorAll('.NOTES-cell');
            noteCells.forEach((cell, index) => {
                cell.addEventListener('click', () => {
                    const adjacentMaintCell = cell.nextElementSibling;
                    const currentValue = cell.textContent.trim();
                    const row = cell.closest('tr');
                    const rowIndex = Array.from(row.parentNode.children).indexOf(row);
                    const colindex = Array.from(cell.parentNode.children).indexOf(cell);
                    // استخدام rowIndex لتسهيل قراءة الكود

                    hand_Notr_calLoadInput(cell)
                    isDirty = true;
                });
            });

            const AGndCells = document.querySelectorAll('.A-GRD');
            AGndCells.forEach((cell, index) => {
                cell.addEventListener('click', () => {
                    const adjacentMaintCell = cell.nextElementSibling;
                    const currentValue = cell.textContent.trim();
                    const row = cell.closest('tr');
                    const rowIndex = Array.from(row.parentNode.children).indexOf(row);
                    const colindex = Array.from(cell.parentNode.children).indexOf(cell);
                    // استخدام rowIndex لتسهيل قراءة الكود
                    if (rowIndex === 2) { // الصف الخاص بـ "Lubrication_check"
                        hand_AGRND(cell);
                    } else if (rowIndex === 3) { // الصف الخاص بـ "Lubrication_check"
                        hand_POLARIZATION_INDEX(cell);
                    } else if (rowIndex === 4) { // الصف الخاص بـ "Lubrication_check"
                        hand_Oroper_Voltage(cell);
                    } else if (rowIndex === 5) { // الصف الخاص بـ "Lubrication_check"
                        hand_Elect_Delectric(cell);
                    }
                });
            });
            const BGndCells = document.querySelectorAll('.B-GRD');
            BGndCells.forEach((cell, index) => {
                cell.addEventListener('click', () => {
                    const adjacentMaintCell = cell.nextElementSibling;
                    const currentValue = cell.textContent.trim();
                    const row = cell.closest('tr');
                    const rowIndex = Array.from(row.parentNode.children).indexOf(row);
                    const colindex = Array.from(cell.parentNode.children).indexOf(cell);
                    // استخدام rowIndex لتسهيل قراءة الكود
                    if (rowIndex === 2) { // الصف الخاص بـ "Lubrication_check"
                        hand_AGRND(cell);
                    } else if (rowIndex === 3) { // الصف الخاص بـ "Lubrication_check"
                        hand_POLARIZATION_INDEX(cell);
                    } else if (rowIndex === 4) { // الصف الخاص بـ "Lubrication_check"
                        hand_Oroper_Voltage(cell);
                    } else if (rowIndex === 5) { // الصف الخاص بـ "Lubrication_check"
                        hand_Elect_Delectric(cell);
                    }
                });
            });
            const CGndCells = document.querySelectorAll('.C-GRD');
            CGndCells.forEach((cell, index) => {
                cell.addEventListener('click', () => {
                    const adjacentMaintCell = cell.nextElementSibling;
                    const currentValue = cell.textContent.trim();
                    const row = cell.closest('tr');
                    const rowIndex = Array.from(row.parentNode.children).indexOf(row);
                    const colindex = Array.from(cell.parentNode.children).indexOf(cell);
                    // استخدام rowIndex لتسهيل قراءة الكود
                    if (rowIndex === 2) { // الصف الخاص بـ "Lubrication_check"
                        hand_AGRND(cell);
                    } else if (rowIndex === 3) { // الصف الخاص بـ "Lubrication_check"
                        hand_POLARIZATION_INDEX(cell);
                    } else if (rowIndex === 4) { // الصف الخاص بـ "Lubrication_check"
                        hand_Oroper_Voltage(cell);
                    } else if (rowIndex === 5) { // الصف الخاص بـ "Lubrication_check"
                        hand_Elect_Delectric(cell);
                    }
                });
            });
            const ABCells = document.querySelectorAll('.A-B');
            ABCells.forEach((cell, index) => {
                cell.addEventListener('click', () => {
                    const adjacentMaintCell = cell.nextElementSibling;
                    const currentValue = cell.textContent.trim();
                    const row = cell.closest('tr');
                    const rowIndex = Array.from(row.parentNode.children).indexOf(row);
                    const colindex = Array.from(cell.parentNode.children).indexOf(cell);
                    // استخدام rowIndex لتسهيل قراءة الكود
                    if (rowIndex === 2) { // الصف الخاص بـ "Lubrication_check"
                        hand_AGRND(cell);
                    } else if (rowIndex === 3) { // الصف الخاص بـ "Lubrication_check"
                        hand_POLARIZATION_INDEX(cell);
                    } else if (rowIndex === 4) { // الصف الخاص بـ "Lubrication_check"
                        hand_Oroper_Voltage(cell);
                    } else if (rowIndex === 5) { // الصف الخاص بـ "Lubrication_check"
                        hand_Elect_Delectric(cell);
                    }
                });
            });
            const BCCells = document.querySelectorAll('.B-C');
            BCCells.forEach((cell, index) => {
                cell.addEventListener('click', () => {
                    const adjacentMaintCell = cell.nextElementSibling;
                    const currentValue = cell.textContent.trim();
                    const row = cell.closest('tr');
                    const rowIndex = Array.from(row.parentNode.children).indexOf(row);
                    const colindex = Array.from(cell.parentNode.children).indexOf(cell);
                    // استخدام rowIndex لتسهيل قراءة الكود
                    if (rowIndex === 2) { // الصف الخاص بـ "Lubrication_check"
                        hand_AGRND(cell);
                    } else if (rowIndex === 3) { // الصف الخاص بـ "Lubrication_check"
                        hand_POLARIZATION_INDEX(cell);
                    } else if (rowIndex === 4) { // الصف الخاص بـ "Lubrication_check"
                        hand_Oroper_Voltage(cell);
                    } else if (rowIndex === 5) { // الصف الخاص بـ "Lubrication_check"
                        hand_Elect_Delectric(cell);
                    }
                });
            });

            const CACells = document.querySelectorAll('.C-A');
            CACells.forEach((cell, index) => {
                cell.addEventListener('click', () => {
                    const adjacentMaintCell = cell.nextElementSibling;
                    const currentValue = cell.textContent.trim();
                    const row = cell.closest('tr');
                    const rowIndex = Array.from(row.parentNode.children).indexOf(row);
                    const colindex = Array.from(cell.parentNode.children).indexOf(cell);
                    // استخدام rowIndex لتسهيل قراءة الكود
                    if (rowIndex === 2) { // الصف الخاص بـ "Lubrication_check"
                        hand_AGRND(cell);
                    } else if (rowIndex === 3) { // الصف الخاص بـ "Lubrication_check"
                        hand_POLARIZATION_INDEX(cell);
                    } else if (rowIndex === 4) { // الصف الخاص بـ "Lubrication_check"
                        hand_Oroper_Voltage(cell);
                    } else if (rowIndex === 5) { // الصف الخاص بـ "Lubrication_check"
                        hand_Elect_Delectric(cell);
                    }
                });
            });

            const NOTE_VALUE_AND_PHASINGCells = document.querySelectorAll('.NOTE_VALUE_AND_PHASING');
            NOTE_VALUE_AND_PHASINGCells.forEach((cell, index) => {
                cell.addEventListener('click', () => {
                    const adjacentMaintCell = cell.nextElementSibling;
                    const currentValue = cell.textContent.trim();
                    const row = cell.closest('tr');
                    const rowIndex = Array.from(row.parentNode.children).indexOf(row);
                    const colindex = Array.from(cell.parentNode.children).indexOf(cell);
                    // استخدام rowIndex لتسهيل قراءة الكود
                    hand_Notr_calLoadInput(cell);
                });
            });
            // كود الادخال

            function updatePageData() {
                const selectedYear = yearSelect.value;
                const selectedBreaker = breakerSelect.value;

                if (selectedYear && selectedBreaker) {
                    fetch(`/fetch_data.php?breaker=${selectedBreaker}&year=${selectedYear}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                console.error(data.error);
                                // مسح البيانات من الجدول إذا حدث خطأ
                                document.querySelector('table:nth-of-type(2) tr:nth-child(3) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(3) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(3) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(3) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(3) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(3) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(3) tr:nth-child(3) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(3) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(3) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(3) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(3) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(1)').textContent = '';

                                const inspectionTableBody = document.querySelector('table:nth-of-type(4) tbody');
                                if (inspectionTableBody) {
                                    const rowsToUpdate = inspectionTableBody.querySelectorAll('tr:not(:nth-last-child(-n+3))');
                                    rowsToUpdate.forEach(row => {
                                        row.querySelectorAll('td:nth-child(2)').forEach(cell => cell.textContent = '');
                                        row.querySelectorAll('td:nth-child(3)').forEach(cell => cell.textContent = '');
                                    });
                                }
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(6) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(5) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(4) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(5) tr:nth-child(3) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(3) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(3) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(3) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(3) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(3) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(5) tr:nth-child(2) td:nth-child(6)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(2) td:nth-child(5)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(2) td:nth-child(4)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(2) td:nth-child(3)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(2) td:nth-child(2)').textContent = '';
                                document.querySelector('table:nth-of-type(5) tr:nth-child(2) td:nth-child(1)').textContent = '';

                                document.querySelector('table:nth-of-type(5) tr:nth-child(10) td:nth-child(1)').textContent = '';

                            } else {
                                const mainData = data[0];
                                document.querySelector('table:nth-of-type(2) tr:nth-child(3) td:nth-child(6)').textContent = mainData.Plant_Bulding || '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(3) td:nth-child(5)').textContent = mainData.location || '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(3) td:nth-child(4)').textContent = mainData.Job_No || '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(3) td:nth-child(3)').textContent = mainData.Circ_Design || '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(3) td:nth-child(2)').textContent = mainData.Last_Date || '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(3) td:nth-child(1)').textContent = mainData.Tested_By || '';

                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(3)').textContent = mainData.Circ_Design || '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(2)').textContent = mainData.Test_Equ_Br_Col_Date || '';
                                document.querySelector('table:nth-of-type(2) tr:nth-child(5) td:nth-child(1)').textContent = mainData.Deb_Head_Approv || '';

                                document.querySelector('table:nth-of-type(3) tr:nth-child(3) td:nth-child(5)').textContent = mainData.Manufact || '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(3) td:nth-child(4)').textContent = mainData.Enclose_type || '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(3) td:nth-child(3)').textContent = mainData.Vol_Rate || '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(3) td:nth-child(2)').textContent = mainData.Bus_Bracing || '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(3) td:nth-child(1)').textContent = mainData.Current_Rate || '';

                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(5)').textContent = mainData.Wet_Bulb_Temp || '';
                                document.querySelector('table:nth-of-type(3) tr:nth-child(5) td:nth-child(4)').textContent = mainData.Dry_Bulb_Temp || '';

                                document.querySelector('table:nth-of-type(5) tr:nth-child(10) td:nth-child(1)').textContent = mainData.Note_Val_Phase || '';

                                const inspectionTableBody2 = document.querySelector('table:nth-of-type(5) tbody');
                                if (inspectionTableBody2) {
                                    const rows = inspectionTableBody2.querySelectorAll('tr[data-sr2]');
                                    const rowsToUpdate = Array.from(rows).slice(0, rows.length - 0);

                                    rowsToUpdate.forEach((row, index) => {
                                        row.querySelector('td:nth-child(6)').textContent = data[index * 1].A_G || '';
                                        row.querySelector('td:nth-child(5)').textContent = data[index * 1].B_G || '';
                                        row.querySelector('td:nth-child(4)').textContent = data[index * 1].C_G || '';
                                        row.querySelector('td:nth-child(3)').textContent = data[index * 1].A_B || '';
                                        row.querySelector('td:nth-child(2)').textContent = data[index * 1].B_C || '';
                                        row.querySelector('td:nth-child(1)').textContent = data[index * 1].C_A || '';


                                    });

                                    // document.querySelector('table:nth-of-type(4) tr:nth-last-child(5) td:nth-child(2)').textContent = mainData.Note || '';
                                    // document.querySelector('table:nth-of-type(4) tr:nth-last-child(4) td:nth-child(2)').textContent = mainData.recommends || '';
                                }

                                // document.querySelector('table:nth-of-type(1) tr:nth-child(4) td:nth-child(3)').textContent = mainData.prepared_by || '';
                                // // تعبئة حقل "الفحص بواسطة" باسم الفاحص
                                // document.querySelector('table:nth-of-type(4) tr:nth-last-child(3) td:nth-child(2)').textContent = mainData.prepared_by || '';

                                const inspectionTableBody = document.querySelector('table:nth-of-type(4) tbody');
                                if (inspectionTableBody) {
                                    const rows = inspectionTableBody.querySelectorAll('tr[data-sr]');
                                    const rowsToUpdate = Array.from(rows).slice(0, rows.length + 15);

                                    rowsToUpdate.forEach((row, index) => {
                                        row.querySelector('td:nth-child(1)').textContent = data[index * 1].Note || '';
                                        row.querySelector('td:nth-child(2)').textContent = data[index * 1].cond || '';

                                        row.querySelector('td:nth-child(4)').textContent = data[index * 1 + 15].Note || '';
                                        row.querySelector('td:nth-child(5)').textContent = data[index * 1 + 15].cond || '';

                                    });


                                }
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });
                }
            }

            window.addEventListener('load', () => {
                loadSelection(yearSelect);
                loadSelection(breakerSelect);
                updatePageData();
            });

            yearSelect.addEventListener('change', () => {
                saveSelection(yearSelect);
                updatePageData();
            });

            breakerSelect.addEventListener('change', () => {
                saveSelection(breakerSelect);
                updatePageData();
            });

            window.addEventListener('beforeunload', (event) => {
                if (isDirty) {
                    event.preventDefault();
                    event.returnValue = '';
                }
            });
            // دالة إنشاء رسالة التقرير
            function createTransformerReportMessage() {
                var currentDate = new Date().toLocaleDateString('ar-EG');

                // الحصول على اسم المحول المختار
                var transformerSelect = document.getElementById('transfformer-select');
                var selectedTransformer = transformerSelect.options[transformerSelect.selectedIndex].text;

                // الحصول على السنة المختارة
                var yearSelect = document.getElementById('year-select');
                var selectedYear = yearSelect.value;

                // الحصول على اسم المهندس من الجدول
                var engineerName = document.querySelector('table:nth-of-type(2) tr:nth-child(3) td:nth-child(1)').textContent.trim();

                var message = `🔧 أشعار فحص المحولات الكهربائية
📅 التاريخ: ${currentDate}
⚡ المحول: ${selectedTransformer}
📆 السنة: ${selectedYear}

تم إجراء الفحص الدوري للمحولات الكهربائية بنجاح.

👨‍💼 المهندس المسؤول: 
${engineerName || 'لم يتم تسجيل اسم المهندس'}

📊 هذا تقرير تلقائي من النظام الإلكتروني

شكراً لكم 👨‍💼
فريق الصيانة الكهربائية ⚡`;

                return message;
            }

            // دالة إرسال رسالة الواتساب
            function sendWhatsApp(phoneNumber, message) {
                var encodedMessage = encodeURIComponent(message);
                window.open(`https://wa.me/${phoneNumber}?text=${encodedMessage}`, '_blank');
            }

            // إرسال للمشرف
            document.getElementById('whatsappSupervisor').addEventListener('click', function(e) {
                e.preventDefault();
                var message = createTransformerReportMessage();
                sendWhatsApp('771598385', message);
            });

            // إرسال لرئيس القسم
            document.getElementById('telegramManager').addEventListener('click', function(e) {
                e.preventDefault();
                var message = createTransformerReportMessage();
                sendWhatsApp('776402808', message);
            });
        });
    </SCript>
    <table>
        <tr>
            <td>YEARLY</td>
            <td class='left-align'>THE UPDATE</td>
            <td colspan='1' class='arabic-text'> تقرير التفتيش على المحولات الكهربائية <br>ELECTRICAL TRANSFORMER CHECK UP</td>
            <td class='left-align'>TITLE</td>
            <td class='tdimg' rowspan='3'><img class='imgx' src='imgs/4.png' alt=''></td>
        </tr>
        <tr>
            <td class='left-align' style="text-align: center;">6 MONTHS & YEARLY</td>
            <td class='left-align'>THE REPETITION</td>
            <td colspan='1'>ELECTRICAL DEPARTMENT</td>
            <td class='left-align'>DEPARTMENT</td>
        </tr>
        <tr>
            <td></td>
            <td class='left-align'>DATE :</td>
            <td colspan='1'>QR-ELE-056</td>
            <td class='left-align'>DOCUMEWNT NO</td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="bisque" colspan='6'>SECTION A - CUSTOMER DATA</td>
        </tr>
        <tr>
            <td class='left-align'>6. TESTED BY</td>
            <td class='left-align'>5. DATE </td>
            <td class='left-align'>4. CIRCUIT DESIGNATION</td>
            <td class='left-align'>3. JOB NUMBER</td>
            <td class='left-align'>2. LOCATION</td>
            <td class='left-align'>1. PLANT/BUILDING</td>
        </tr>
        <tr>
            <td class='left-align'></td>
            <td class='left-align'></td>
            <td class='left-align'></td>
            <td class='left-align'></td>
            <td class='left-align'></td>
            <td class='left-align'></td>
        </tr>
        <tr>
            <td class='left-align'>DEP. HEAD APPROVAL </td>
            <td colspan="3" class='left-align'>8. TEST EQUIPMENT TYPE/BRAND AND CALIBRATION DATE</td>
            <td colspan="2" class='left-align'>7. EQUIPMENT </td>
        </tr>
        <tr>
            <td class='left-align'></td>
            <td colspan="3" class='left-align'></td>
            <td colspan="2" class='left-align'></td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="bisque" colspan='5'>SECTION B - EQUIPMENT DATA</td>
        </tr>
        <tr>
            <td class='left-align'>15. CURRENT RATING</td>
            <td class='left-align'>14. BUS BRACING</td>
            <td class='left-align'>13. VOLTAGE RATING</td>
            <td class='left-align'>12. ENCLOSURE TYPE</td>
            <td class='left-align'>11. MANUFACTURER</td>>
        </tr>
        <tr>
            <td class='left-align'></td>
            <td class='left-align'></td>
            <td class='left-align'></td>
            <td class='left-align'></td>
            <td class='left-align'></td>
        </tr>
        <tr>
            <td class='left-align'></td>
            <td class='left-align'></td>
            <td class='left-align'>18.FREQUENCY</td>
            <td class='left-align'>17. DRY BULB TEMPERATURE</td>
            <td class='left-align'>16. WET BULB TEMPERATURE</td>
        </tr>
        <tr>
            <td class='left-align'></td>
            <td class='left-align'></td>
            <td class='left-align'>50 HZ</td>
            <td class='left-align'></td>
            <td class='left-align'></td>
        </tr>
    </table>
    <table>
        <tr>
            <td class="bisque" colspan='7'>SECTION C - VISUAL AND ELECTRICAL/MECHANICAL INSPECTION</td>
        </tr>
        <tr>
            <th>NOTES</th>
            <th>COND</th>
            <th>CHECK POIN</th>
            <th>NOTES</th>
            <th>COND</th>
            <th>CHECK POIN</th>
            <th>SR</th>
        </tr>
        <tr data-sr="1">
            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>EQUIPMENT IDENTIFICATION<br>تحديد المعدات</td>

            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>EXTERIOR OF EQUIPMENT<br>المعدات الخارجية</td>
            <td>1</td>
        </tr>
        <tr data-sr="2">
            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>GASKET JOINTS (MAY NEED TO BE TIGHTENED TO AVOID UNEVEN PRESSURE)<br>وصلات حشية (قد تحتاج إلى إحكام ربطها لتجنب الضغط غير المحدود)</td>

            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>COMPLETENESS OF ASSEMBLY<br>اكتمال التجميع</td>
            <td>2</td>
        </tr>
        <tr data-sr="3">
            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>PROPER PHASE CONNECTION AND COLORCODE<br>اتصال المرحلة المناسبة ورمز اللون</td>

            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>CHECK IS THERE PROPER GROUNDING<br>تحقق من وجود التأريض المناسب</td>
            <td>3</td>
        </tr>
        <tr data-sr="4">
            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>HAZARDOUS LOCATION<br>موقع خطير</td>

            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>CHECK CONDITION OF INSULATION<br>تحقق من حالة العزل</td>
            <td>4</td>
        </tr>
        <tr data-sr="5">
            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>WORKING CLEARANCE<br>تصريح العمل</td>

            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>TIGHTNESS OF BOLTED CONNECTIONS<br>شد التوصيلات الملتصقة</td>
            <td>5</td>
        </tr>
        <tr data-sr="6">
            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>PAINT CONDITION<br>حالة الطلاء</td>

            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>CHECK CLEANING<br>فحص التنظيف</td>
            <td>6</td>
        </tr>
        <tr data-sr="7">
            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>THE COVER IS INTACT,OUTER SHELL<br>الغلاف سليم ، الغلاف الخارجي </td>

            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>SEALS AND OIL LEVELS<br>التختيم ومستوى الزيت</td>
            <td>7</td>
        </tr>
        <tr data-sr="8">
            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>CHECK PROPER EQUIPMENT GROUNDINGTO GROUNDING BUS<br>تحقق من تأريض المعدات المناسبة لحافلة التأريض</td>

            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>TEST RELAYS (ACCORDING TO ELEC.STUDY RECOMMENDATIONS)<br>تتابع الاختبارات (وفقًا لتوصيات الدراسة الكهربائية)</td>
            <td>8</td>
        </tr>
        <tr data-sr="9">
            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>TURNS RATIO MEASUREMENTS TURNS<br>قياسات النسبة</td>

            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>CHECK INSTRUMENT AND RELAY COVERS<br>تحقق من أغلفة الأداة والتتابع</td>
            <td>9</td>
        </tr>
        <tr data-sr="10">
            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>CHECK COOLING SYSTEM<br>تحقق من نظام التبريد</td>

            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>Check Bushing Bushing<br>تحقق من البطانات</td>
            <td>10</td>
        </tr>
        <tr data-sr="11">
            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>CHECK AUXILIARY DEVICE OPERATION<br>تحقق من تشغيل الجهاز الإضافي</td>

            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>WINDING CONFIGURATION<br>تكوين الملفات</td>
            <td>11</td>
        </tr>
        <tr data-sr="12">
            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>CHECK THE ARC ARRESTORS, IF ANY<br>تحقق من مانعات القوس الكهربائي ان وجدت</td>

            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>CHECK CIRCUIT BREAKER CONTACT SURFACES<br>افحص واجهات التوصيل في قاطع الدائرة</td>
            <td>12</td>
        </tr>
        <tr data-sr="13">
            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>CHECK AND TIGHTEN CONNECTIONS<br>تحقق من شد التوصيلات </td>

            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>CHECK GROUND FAULT DETECTORS <br>تحقق من أجهزة الكشف عن الخطأ الأرض</td>
            <td>13</td>
        </tr>
        <tr data-sr="14">
            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>CHECK FOR LEAKS<br>تحقق من وجود تسريب</td>

            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>CHECK OPENINGS THAT ALLOW DIRT AND MOISTURE AND THE ENTRANCE TO REPAIR<br>افحص الفتحات التي تسمح للأوساخ والرطوبة وإصلاح المدخل </td>
            <td>14</td>
        </tr>
        <tr data-sr="15">
            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>EARTH RESISTANCE<br>مقاومة التاريض</td>

            <td class="NOTES-cell"></td>
            <td class="COND-cell"></td>
            <td>RELAYS ALARM AND OTHER CIRCUITS<br>مرحلات الإنذار والدوائر الأخرى</td>
            <td>15</td>
        </tr>
        <tr">
            <td colspan="4">VERIFY CORRECT OPERATION OF INDICATING LIGHTS, METERS,GAUGES, ETC<br>تحقق من صحة التشغيل للإشارة إلى الأضواء ، العدادات ، المقاييس ، إلخ.</td>
            <td colspan="3">VERIFY LIFT OR BUILT WINCH FOR HANDLING HEAVY PARTS<br>تحقق من الرافعة أو الرافعة المركبة للتعامل مع الأجزاء الثقيلة</td>
            </tr>
            <tr">
                <td colspan="4">VERIFY SPACE HEATER IS PROVIDED AND OPERATIONAL<br>تحقق من توفير السخان وتشغيله</td>
                <td colspan="3">VERIFY BOLTED BUS CONNECTIONS TO MANUFACTURERRECOMMENDATIONS<br>التحقق من اتصالات الحافلات المزروعة لتوصيات الشركة المصنعة </td>
                </tr>
    </table>
    <table>
        <tr>
            <td class="bisque" colspan='8'>SECTION D - ELECTRICAL TESTS</td>
        </tr>
        <tr>
            <td>C-A</td>
            <td>B-C</td>
            <td>A-B</td>
            <td>C-GRD</td>
            <td>B-GRD</td>
            <td>A-GRD</td>
            <td>INSULATION RESISTANCE</td>
            <td></td>
        </tr>
        <tr data-sr2="1">
            <td class="C-A"></td>
            <td class="B-C"></td>
            <td class="A-B"></td>
            <td class="C-GRD"></td>
            <td class="B-GRD"></td>
            <td class="A-GRD"></td>
            <td> V @</td>
            <td>1</td>
        </tr>
        <tr data-sr2="2">
            <td class="C-A"></td>
            <td class="B-C"></td>
            <td class="A-B"></td>
            <td class="C-GRD"></td>
            <td class="B-GRD"></td>
            <td class="A-GRD"></td>
            <td>POLARIZATION INDEX</td>
            <td>2</td>
        </tr>
        <tr data-sr2="3">
            <td class="C-A"></td>
            <td class="B-C"></td>
            <td class="A-B"></td>
            <td class="C-GRD"></td>
            <td class="B-GRD"></td>
            <td class="A-GRD"></td>
            <td>PROPER VOLTAGE</td>
            <td>3</td>
        </tr>
        <tr data-sr2="4">
            <td class="C-A"></td>
            <td class="B-C"></td>
            <td class="A-B"></td>
            <td class="C-GRD"></td>
            <td class="B-GRD"></td>
            <td class="A-GRD"></td>
            <td>ELECTRICAL OIL DIELECTRIC</td>
            <td>4</td>
        </tr>
        <tr>
            <td class="bisque" colspan='8'>NOTES</td>
        </tr>
        <tr>
            <td class="left-align" colspan='8'>"1. PERFORM GROUND RESISTANCE TESTS PRIOR TO ENERGIZING EQUIPMENT. <br>
                اختبارات مقاومة الأرض قبل أداء معدات الطاقة. <br>
                2. GROUND RESISTANCE TESTS MUST BE PERFORMED IN DRY CONDITIONS AND SHALL BE PERFORMED <br>
                يجب إجراء اختبارات مقاومة الأرضية في ظروف الجفاف ويجب إجراؤها
                "
            </td>
        </tr>
        <tr>
            <td class="left-align" colspan='8'>*CONDITION: A=ACCEPTABLE; R=NEEDS REPAIR, REPLACEMENT OR ADJUSTMENT,C=CORRECTED; NA=NOT APPLICABLE <br>
                * الشرط:A=مقبول ؛ R=يحتاج إلى إصلاح أو استبدال أو تعديل ، C=تصحيح ؛ NA=غير قابل للتطبيق
            </td>
        </tr>
        <tr>
            <td class="NOTE_VALUE_AND_PHASING" colspan='7'></td>
            <td class="left-align" colspan='1'>**NOTE VALUE AND PHASING</td>
        </tr>
    </table>
</body>

</html>